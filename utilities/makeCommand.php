<?php
/**
 * UnitTest向けコマンドテストケース雛形生成コマンド
 *
 * 引数：対象コマンド名
 */

require "comparesample.php";
// CompareSample::showSampleData();

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
define('TEMPLATE_CLASS_FILE', __DIR__ . DIRECTORY_SEPARATOR . "makeCommandClass.tmpl");

if (!file_exists(DEFINE_JSON)) {
    echo '[FATAL ERROR] ' . $command . 'CLASS NOT EXISTS !!' . PHP_EOL;
    return 0;
}

$defineFile = DEFINE_JSON . DIRECTORY_SEPARATOR . "define.json";
if (!file_exists($defineFile)) {
    echo '[FATAL ERROR] ' . $command . 'CLASS DOS NOT HAVE define.json !!' . PHP_EOL;
    return 0;
}

// テンプレートファイル読み込み
$template = [];
try {
    $hTempFile = fopen(TEMPLATE_FILE, 'r');
    while (($line = fgets($hTempFile)) !== false) {
        $template[] = $line;
    }
    fclose($hTempFile);
} catch (Exceotion $e) {
    echo PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    return 0;
}

// 対象のdefine.jsonを読み込む
$json = file_get_contents($defineFile);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$defs = json_decode($json, true);

// DTD毎にテストケースを作成
$testDataSource = "";
foreach ($defs["DocumentType"] as $dtd) {
    $testData = "";
    // Global
    $testData .= spr(12) . '// -- Global' . PHP_EOL;
    foreach ($defs["GlobalAttributes"][$dtd] as $key) {
        $define = CompareSample::getGlobalDefine($key);
        if (empty($define)) {
            continue;
        }
        $testValue = CompareSample::getTestCaseData($define, $dtd);
        if (empty($testValue)) {
            echo "[FATAL ERROR] KEY IS NOT EXISTS !! - $key" . PHP_EOL;
            return 0;
        }
        // OK Case
        $testData .= spr(12) . "// $key OK Case" . PHP_EOL
                  .  spr(12) . "[" . PHP_EOL
                  .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                  .  spr(16) . "\"text\" => '#$command $key=\"" . $testValue['OK'] . "\"'," . PHP_EOL
                  .  spr(16) . "\"params\" => [" . PHP_EOL
                  .  spr(20) . "\"$key\" => '" . $testValue['OK'] . "'," . PHP_EOL
                  .  spr(16) . "]," . PHP_EOL
                  .  spr(16) . "\"result\" => ''," . PHP_EOL
                  .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                  .  spr(12) . "]," . PHP_EOL;
        // NG Case
        $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                  .  spr(12) . "[" . PHP_EOL
                  .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                  .  spr(16) . "\"text\" => '#$command $key=\"" . $testValue['NG'] . "\"'," . PHP_EOL
                  .  spr(16) . "\"params\" => [" . PHP_EOL
                  .  spr(20) . "\"$key\" => '" . $testValue['NG'] . "'," . PHP_EOL
                  .  spr(16) . "]," . PHP_EOL
                  .  spr(16) . "\"result\" => \"[Validate Error] " . $key . " : " . $testValue['NG'] . "\" . PHP_EOL," . PHP_EOL
                  .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                  .  spr(12) . "]," . PHP_EOL;
    }
    // Attribute
    if (array_key_exists("TagAttributes", $defs)) {
        $testData .= spr(12) . '// -- Tag Attribute' . PHP_EOL;
        foreach ($defs["TagAttributes"][$dtd] as $key => $attr) {
            $unDefined = false;
            if ($attr["CompareType"] == "DEFINED") {
                $testValue = CompareSample::getTestCaseData($attr["Value"], $dtd);
                if (empty($testValue)) {
                    echo "[FATAL ERROR] KEY IS NOT EXISTS !! - " . $attr["Value"] . PHP_EOL;
                    return 0;
                }
            } else {
                $unDefined = true;
                $testValue = [
                    "OK" => "<SAMPLE>",
                    "NG" => "<SAMPLE>",
                ];
            }
            if ($attr["Value"] == "COORDS") {
                // OK Case
                $testData .= spr(12) . "// $key OK Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => '#$command shape=\"" . $testValue["OK"]["key"] . "\" coords=\"" . $testValue["OK"]["value"] . "\"'," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"shape\" => '" . $testValue["OK"]["key"] . "'," . PHP_EOL
                          .  spr(20) . "\"coords\" => '" . $testValue["OK"]["key"] . "'," . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => ''," . PHP_EOL
                          .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
                // NG Case
                $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => '#$command shape=\"" . $testValue["NG"]["key"] . "\" coords=\"" . $testValue["NG"]["value"] . "\"'," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"shape\" => '" . $testValue["NG"]["key"] . "'," . PHP_EOL
                          .  spr(20) . "\"coords\" => '" . $testValue["NG"]["key"] . "'," . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => \"[Validate Error] coords : " . $testValue['NG']["value"] . "\" . PHP_EOL," . PHP_EOL
                          .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
            } else {
                // OK Case
                $testData .= spr(12) . "// $key OK Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => '#$command $key=\"" . $testValue["OK"] . "\"'," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["OK"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => ''," . PHP_EOL
                          .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
                // NG Case
                $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => '#$command $key=\"" . $testValue["OK"] . "\"'," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["OK"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => \"[Validate Error] " . $key . " : " . $testValue['NG'] . "\" . PHP_EOL," . PHP_EOL
                          .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
            }
        }
    }
    // Custom
    if (array_key_exists("CustomAttributes", $defs)) {
        $testData .= spr(12) . '// -- Custom Attribute' . PHP_EOL;
        foreach ($defs["CustomAttributes"] as $key => $attr) {
            if (in_array($dtd, $attr["DocumentType"])) {
                $unDefined = false;
                if ($attr["CompareType"] == "DEFINED") {
                    $testValue = CompareSample::getTestCaseData($attr["Value"], $dtd);
                    if (empty($testValue)) {
                        echo "[FATAL ERROR] KEY IS NOT EXISTS !! - " . $attr["Value"] . PHP_EOL;
                        return 0;
                    }
                } else {
                    $unDefined = true;
                    $testValue = [
                        "OK" => "<SAMPLE>",
                        "NG" => "<SAMPLE>",
                    ];
                }
                // OK Case
                $testData .= spr(12) . "// $key OK Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => '#$command $key=\"" . $testValue["OK"] . "\"'," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["OK"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => ''," . PHP_EOL
                          .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
                // NG Case
                $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => '#$command $key=\"" . $testValue["NG"] . "\"'," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["NG"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => \"[Validate Error] " . $key . " : " . $testValue['NG'] . "\" . PHP_EOL," . PHP_EOL
                          .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
            }
        }
    }
    // テストメソッド生成
    $dtdWork = explode("_", strtolower($dtd));
    $methodSufix = "";
    foreach ($dtdWork as $word) {
        $methodSufix .= ucfirst($word);
    }
    foreach ($template as $line) {
        $testDataSource .= str_replace(["@DTD@", "@DATA@"], [$methodSufix, $testData], $line);
    }
}

// 出力
try {
    $hTempClassFile = fopen(TEMPLATE_CLASS_FILE, 'r');
    $hDistFile = fopen(DIST_FILE, 'w');

    while (($line = fgets($hTempClassFile)) !== false) {
        $line = str_replace(['@COMMAND_NAME@', "@TEST_SOURCE@"], [$ucCommand, $testDataSource], $line);
        fwrite($hDistFile, $line);
    }

    fclose($hDistFile);
    fclose($hTempClassFile);
} catch (Exception $e) {
    echo PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    return 0;
}

echo 'DONE !!' . PHP_EOL;
