<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationTeletype extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" style=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" class=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" class=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" title=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" title=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" lang=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" lang=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" dir=\"rtl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @teletype id=\"id402_11\" dir=\"lr\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id402_11',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateHtml4Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" style=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" class=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" title=\"sample text\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" title=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" lang=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" lang=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" dir=\"rtl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @teletype id=\"id626_35\" dir=\"rl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id626_35',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" style=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" class=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" class=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" title=\"テスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" title=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" lang=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" dir=\"rtl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @teletype id=\"id515_22\" dir=\"lr\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id515_22',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml1Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" style=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" style=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" class=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" class=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" title=\"sample text\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" title=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" lang=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" lang=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" dir=\"ltr\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @teletype id=\"id810_31\" dir=\"rl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id810_31',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml1Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" style=\"テスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" style=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" class=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" title=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" title=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" lang=\"sample text\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" lang=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" dir=\"ltr\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @teletype id=\"id518_94\" dir=\"rl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id518_94',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" style=\"テスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" style=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" class=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" class=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" title=\"テスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" title=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" lang=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" lang=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" dir=\"rtl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @teletype id=\"id73_14\" dir=\"lr\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id73_14',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml11()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" style=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" class=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" title=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" title=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" lang=\"test\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" lang=\"\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" dir=\"rtl\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @teletype id=\"id76_50\" dir=\"ato\" sample@ text.",
                "decoration" => "teletype",
                "params" => [
                    "id" => 'id76_50',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

}
