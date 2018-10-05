<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationQuotation extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" style=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" class=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" title=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" lang=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" dir=\"rtl\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" dir=\"rl\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @quotation id=\"id235_88\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id235_88',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id942_88\" style=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" lang=\"sample text\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" dir=\"ltr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" dir=\"lr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @quotation id=\"id942_88\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id942_88',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id457_53\" style=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" title=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" lang=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" dir=\"ltr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" dir=\"rl\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @quotation id=\"id457_53\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id457_53',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id816_32\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" class=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" lang=\"sample text\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" dir=\"ltr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" dir=\"lr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @quotation id=\"id816_32\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id816_32',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id441_69\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" class=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" title=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" lang=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" dir=\"ltr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" dir=\"lr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @quotation id=\"id441_69\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id441_69',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id252_73\" style=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" class=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" title=\"sample text\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" lang=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" dir=\"ltr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" dir=\"ato\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @quotation id=\"id252_73\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id252_73',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id157_81\" style=\"sample text\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" class=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" title=\"sample text\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" lang=\"sample text\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" dir=\"ltr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" dir=\"lr\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @quotation id=\"id157_81\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id157_81',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id151_99\" style=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" class=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" title=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" lang=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" dir=\"auto\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" dir=\"rl\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @quotation id=\"id151_99\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id151_99',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml5 */
    public function testValidateHtml5(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @quotation id=\"id188_40\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" style=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" class=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" class=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" title=\"テスト\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" title=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" lang=\"test\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" lang=\"\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" dir=\"rtl\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" dir=\"ato\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @quotation id=\"id188_40\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "quotation",
                "params" => [
                    "id" => 'id188_40',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml51 */
    public function testValidateHtml51(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
