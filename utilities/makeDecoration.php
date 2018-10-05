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
                        . DIRECTORY_SEPARATOR . "decorations"
                        . DIRECTORY_SEPARATOR . $command);
define('DIST_FILE', __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "decorations" .DIRECTORY_SEPARATOR . $command . ".php");
define('TEMPLATE_FILE', __DIR__ . DIRECTORY_SEPARATOR . "makeDecoration.tmpl");
define('TEMPLATE_CLASS_FILE', __DIR__ . DIRECTORY_SEPARATOR . "makeDecorationClass.tmpl");

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
if (empty($defs)) {
    $eMessage = "";
    switch (json_last_error) {
        case JSON_ERROR_NONE:
            $eMessage = "エラーは発生しませんでした";
            break;
        case JSON_ERROR_DEPTH:
            $eMessage = "スタックの深さの最大値を超えました";
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $eMessage = "JSON の形式が無効、あるいは壊れています";
            break;
        case JSON_ERROR_CTRL_CHAR:
            $eMessage = "制御文字エラー。おそらくエンコーディングが違います";
            break;
        case JSON_ERROR_SYNTAX:
            $eMessage = "構文エラー";
            break;
        case JSON_ERROR_UTF8:
            $eMessage = "正しくエンコードされていないなど、不正な形式の UTF-8 文字";
            break;
        case JSON_ERROR_RECURSION:
            $eMessage = "エンコード対象の値に再帰参照が含まれています";
            break;
        case JSON_ERROR_INF_OR_NAN:
            $eMessage = "エンコード対象の値に NAN あるいは INF が含まれています。";
            break;
        case JSON_ERROR_UNSUPPORTED_TYPE:
            $eMessage = "エンコード不可能な型の値が渡されました";
            break;
        case JSON_ERROR_INVALID_PROPERTY_NAME:
            $eMessage = "A property name that cannot be encoded was given";
            break;
        case JSON_ERROR_UTF16:
            $eMessage = "Malformed UTF-16 characters, possibly incorrectly encoded";
            break;
    }
    echo '[FATAL ERROR] JSON FILE IS INVALIED !! - ' . $eMessage . PHP_EOL;
    return 0;
}

// DTD毎にテストケースを作成
$testDataSource = "";
foreach ($defs["DocumentType"] as $dtd) {
    $testData = "";
    $id = CompareSample::makeId();
    // Global
    $testData .= spr(12) . '// -- Global' . PHP_EOL;
    foreach ($defs["GlobalAttributes"][$dtd] as $key) {
        if (preg_match("/^id$/iu", $key) == 1) {
            continue;
        }
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
                  .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" $key=\\\"" . $testValue["OK"] . "\\\" sample@ text.\"," . PHP_EOL
                  .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                  .  spr(16) . "\"params\" => [" . PHP_EOL
                  .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                  .  spr(20) . "\"$key\" => '" . $testValue['OK'] . "'," . PHP_EOL
                  .  spr(16) . "]," . PHP_EOL
                  .  spr(16) . "\"result\" => []," . PHP_EOL
                  .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                  .  spr(12) . "]," . PHP_EOL;
        // NG Case
        $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                  .  spr(12) . "[" . PHP_EOL
                  .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                  .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" $key=\\\"" . $testValue["NG"] . "\\\" sample@ text.\"," . PHP_EOL
                  .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                  .  spr(16) . "\"params\" => [" . PHP_EOL
                  .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                  .  spr(20) . "\"$key\" => '" . $testValue['NG'] . "'," . PHP_EOL
                  .  spr(16) . "]," . PHP_EOL
                  .  spr(16) . "\"result\" => [\"[Validate Error] " . $key . " : " . $testValue['NG'] . "\" . PHP_EOL]," . PHP_EOL
                  .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                  .  spr(12) . "]," . PHP_EOL;
    }
    // Attribute
    if (array_key_exists("TagAttributes", $defs)) {
        $testData .= spr(12) . '// -- Tag Attribute' . PHP_EOL;
        foreach ($defs["TagAttributes"][$dtd] as $key => $attr) {
            $unDefined = false;
            if ($attr["CompareType"] == "DEFINED" || $attr["CompareType"] == "NONE") {
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
                          .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" shape=\\\"" . $testValue["OK"]["key"] . "\\\" coords=\\\"" . $testValue["OK"]["value"] . "\\\" sample@ text.\"," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                          .  spr(20) . "\"shape\" => '" . $testValue["OK"]["key"] . "'," . PHP_EOL
                          .  spr(20) . "\"coords\" => '" . $testValue["OK"]["value"] . "'," . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => []," . PHP_EOL
                          .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
                // NG Case
                $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" shape=\\\"" . $testValue["NG"]["key"] . "\\\" coords=\\\"" . $testValue["NG"]["value"] . "\\\" sample@ text.\"," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                          .  spr(20) . "\"shape\" => '" . $testValue["NG"]["key"] . "'," . PHP_EOL
                          .  spr(20) . "\"coords\" => '" . $testValue["NG"]["value"] . "'," . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => [\"[Validate Error] coords : " . $testValue['NG']["value"] . "\" . PHP_EOL]," . PHP_EOL
                          .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
            } else {
                // OK Case
                $testData .= spr(12) . "// $key OK Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" $key=\\\"" . $testValue["OK"] . "\\\" sample@ text.\"," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["OK"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => []," . PHP_EOL
                          .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
                // NG Case
                $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" $key=\\\"" . $testValue["NG"] . "\\\" sample@ text.\"," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["NG"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL;
                if ($attr["CompareType"] == "DEFINED" || $attr["CompareType"] == "VALUE") {
                    $testData .= spr(16) . "\"result\" => [\"[Validate Error] " . $key . " : " . $testValue['NG'] . "\" . PHP_EOL]," . PHP_EOL
                              .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                              .  spr(12) . "]," . PHP_EOL;
                } else {
                    $testData .= spr(16) . "\"result\" => []," . PHP_EOL
                              .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                              .  spr(12) . "]," . PHP_EOL;
                }
            }
        }
    }
    // Custom
    if (array_key_exists("CustomAttributes", $defs)) {
        $testData .= spr(12) . '// -- Custom Attribute' . PHP_EOL;
        foreach ($defs["CustomAttributes"] as $key => $attr) {
            if (in_array($dtd, $attr["DocumentType"])) {
                $unDefined = false;
                if ($attr["CompareType"] == "DEFINED" || $attr["CompareType"] == "NONE") {
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
                          .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" $key=\\\"" . $testValue["OK"] . "\\\" sample@ text.\"," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["OK"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL
                          .  spr(16) . "\"result\" => []," . PHP_EOL
                          .  spr(16) . "\"description\" => \"OK CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                          .  spr(12) . "]," . PHP_EOL;
                // NG Case
                $testData .= spr(12) . "// $key NG Case" . PHP_EOL
                          .  spr(12) . "[" . PHP_EOL
                          .  spr(16) . "\"dtd\" => \"$dtd\"," . PHP_EOL
                          .  spr(16) . "\"text\" => \"This is @$command id=\\\"$id\\\" $key=\\\"" . $testValue["NG"] . "\\\" sample@ text.\"," . ($unDefined ? "// ToDo UNDEFINED VALUE !!" : "") . PHP_EOL
                          .  spr(16) . "\"decoration\" => \"$command\"," . PHP_EOL
                          .  spr(16) . "\"params\" => [" . PHP_EOL
                          .  spr(20) . "\"id\" => '" . $id . "'," . PHP_EOL
                          .  spr(20) . "\"$key\" => '" . $testValue["NG"] . "'," . spr(4) . "// " . $attr['Value'] . PHP_EOL
                          .  spr(16) . "]," . PHP_EOL;
                if ($attr["CompareType"] == "DEFINED" || $attr["CompareType"] == "VALUE") {
                    $testData .= spr(16) . "\"result\" => [\"[Validate Error] " . $key . " : " . $testValue['NG'] . "\" . PHP_EOL]," . PHP_EOL
                              .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                              .  spr(12) . "]," . PHP_EOL;
                } else {
                    $testData .= spr(16) . "\"result\" => []," . PHP_EOL
                              .  spr(16) . "\"description\" => \"NG CHECK PROCESS[\" . " . '__LINE__' . " . \"] " . $key . "\"," . PHP_EOL
                              .  spr(12) . "]," . PHP_EOL;
                }
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
