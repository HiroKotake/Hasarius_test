<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationStrong extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" class=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" lang=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" dir=\"rtl\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @strong id=\"id547_45\" dir=\"lr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id547_45',
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
                "text" => "This is @strong id=\"id577_33\" style=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" class=\"sample text\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" title=\"テスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" dir=\"ltr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @strong id=\"id577_33\" dir=\"lr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id577_33',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
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
                "text" => "This is @strong id=\"id171_70\" style=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" class=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" title=\"テスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" lang=\"テスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" dir=\"auto\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @strong id=\"id171_70\" dir=\"ato\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id171_70',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
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
                "text" => "This is @strong id=\"id336_63\" style=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" class=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" title=\"テスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" dir=\"rtl\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @strong id=\"id336_63\" dir=\"rl\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id336_63',
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
                "text" => "This is @strong id=\"id574_30\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" class=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" title=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" lang=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" dir=\"ltr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @strong id=\"id574_30\" dir=\"ato\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id574_30',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
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
                "text" => "This is @strong id=\"id169_99\" style=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" class=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" title=\"テスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" lang=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" dir=\"rtl\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @strong id=\"id169_99\" dir=\"lr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id169_99',
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
                "text" => "This is @strong id=\"id239_36\" style=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" class=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" lang=\"sample text\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" dir=\"auto\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @strong id=\"id239_36\" dir=\"lr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id239_36',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
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

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" style=\"sample text\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" title=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" dir=\"ltr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @strong id=\"id757_77\" dir=\"lr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id757_77',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml5 */
    public function testValidateHtml5(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateHtml51()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" style=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" style=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" class=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" class=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" title=\"test\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" title=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" lang=\"sample text\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" lang=\"\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" dir=\"ltr\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @strong id=\"id913_11\" dir=\"ato\" sample@ text.",
                "decoration" => "strong",
                "params" => [
                    "id" => 'id913_11',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml51 */
    public function testValidateHtml51(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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
