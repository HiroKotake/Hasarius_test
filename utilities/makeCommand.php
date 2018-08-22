<?php
/**
 * UnitTest向けコマンドテストケース雛形生成コマンド
 *
 * 引数：対象コマンド名
 */

require "comparesample.php";
CompareSample::showSampleData();

function spr(int $number): string
{
    return str_repeat(' ', $number);
}

if ($argc <= 1) {
    echo '[ERROR] Not Enough Paramater !!' . PHP_EOL;
    return 0;
}
$command = strtolower($argv[1]);
$ucCommand = ucfirst($command);

define('DEFINE_JSON', __DIR__
                        . DIRECTORY_SEPARATOR . ".."
                        . DIRECTORY_SEPARATOR . ".."
                        . DIRECTORY_SEPARATOR . "Hasarius"
                        . DIRECTORY_SEPARATOR . "commands"
                        . DIRECTORY_SEPARATOR . $command);
define('DIST_FILE', __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "commands" .DIRECTORY_SEPARATOR . $command . ".php");
define('TEMPLATE_FILE', __DIR__ . DIRECTORY_SEPARATOR . "makeCommand.tmpl");

if (!file_exists(DEFINE_JSON)) {
    echo '[FATAL ERROR] ' . $command . 'CLASS NOT EXISTS !!' . PHP_EOL;
    return 0;
}

$defineFile = DEFINE_JSON . DIRECTORY_SEPARATOR . "define.json";
if (!file_exists($defineFile)) {
    echo '[FATAL ERROR] ' . $command . 'CLASS DOS NOT HAVE define.json !!' . PHP_EOL;
    return 0;
}

// 対象のdefine.jsonを読み込む
$json = file_get_contents($defineFile);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$defs = json_decode($json, true);

// DTD毎にテストケースを作成
$testData = "";
foreach ($defs["DocumentType"] as $dtd) {
    $testData .= spr(12) . '// ' . $dtd . PHP_EOL;
    // Global
    $testData .= spr(12) . '// -- Global' . PHP_EOL;
    foreach ($defs["GlobalAttributes"][$dtd] as $key) {
        $testData .= spr(12) . "[" . PHP_EOL
                  .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                  .  spr(16) . "\"text\" => '#$command $key=\"\"'," . PHP_EOL
                  .  spr(16) . "\"params\" => [" . PHP_EOL
                  .  spr(20) . "\"$key\" => ''," . PHP_EOL
                  .  spr(16) . "]," . PHP_EOL
                  .  spr(16) . "\"result\" => ''," . PHP_EOL
                  .  spr(12) . "]," . PHP_EOL;
    }
    // Attribute
    $testData .= spr(12) . '// -- Tag Attribute' . PHP_EOL;
    foreach ($defs["TagAttributes"][$dtd] as $key => $attr) {
        $testData .= spr(12) . "[" . PHP_EOL
                  .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                  .  spr(16) . "\"text\" => '#$command  $key=\"\"'," . PHP_EOL
                  .  spr(16) . "\"params\" => [" . PHP_EOL
                  .  spr(20) . "\"$key\" => ''," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                  .  spr(16) . "]," . PHP_EOL
                  .  spr(16) . "\"result\" => ''," . PHP_EOL
                  .  spr(12) . "]," . PHP_EOL;
    }
    // Custom
    $testData .= spr(12) . '// -- Custom Attribute' . PHP_EOL;
    foreach ($defs["CustomAttributes"] as $key => $attr) {
        if (in_array($dtd, $attr["DocumentType"])) {
            $testData .= spr(12) . "[" . PHP_EOL
                      .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                      .  spr(16) . "\"text\" => '#$command  $key=\"\"'," . PHP_EOL
                      .  spr(16) . "\"params\" => [" . PHP_EOL
                      .  spr(20) . "\"$key\" => ''," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                      .  spr(16) . "]," . PHP_EOL
                      .  spr(16) . "\"result\" => ''," . PHP_EOL
                      .  spr(12) . "]," . PHP_EOL;
        }
    }
}

// 出力
try {
    $hTempFile = fopen(TEMPLATE_FILE, 'r');
    $hDistFile = fopen(DIST_FILE, 'w');

    while (($line = fgets($hTempFile)) !== false) {
        $line = str_replace('@COMMAND_NAME@', $ucCommand, $line);
        $line = str_replace("@DATA@", $testData, $line);
        fwrite($hDistFile, $line);
    }

    fclose($hDistFile);
    fclose($hTempFile);
} catch (Exception $e) {
    echo PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    return 0;
}

echo 'DONE !!' . PHP_EOL;
