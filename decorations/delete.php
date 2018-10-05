<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationDelete extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" style=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" dir=\"ltr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" dir=\"rl\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @delete id=\"id833_95\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id833_95',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id15_2\" style=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" class=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" title=\"test\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" lang=\"test\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" dir=\"rtl\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" dir=\"ato\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" datetime=\"2005-09-22T00:00:00Z\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "datetime" => '2005-09-22T00:00:00Z',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @delete id=\"id15_2\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id15_2',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id683_31\" style=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" class=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" title=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" lang=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" dir=\"auto\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" dir=\"ato\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" datetime=\"2005-09-22T00:00:00-09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "datetime" => '2005-09-22T00:00:00-09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @delete id=\"id683_31\" datetime=\"2005-09-22T23:15:30Z09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id683_31',
                    "datetime" => '2005-09-22T23:15:30Z09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-09-22T23:15:30Z09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id903_36\" style=\"test\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" class=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" title=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" dir=\"ltr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" dir=\"lr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @delete id=\"id903_36\" datetime=\"2005-09-22T23:15:30Z09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id903_36',
                    "datetime" => '2005-09-22T23:15:30Z09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-09-22T23:15:30Z09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id630_11\" style=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" class=\"test\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" title=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" lang=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" dir=\"ltr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" dir=\"rl\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" datetime=\"2005-09-22T00:00:00-09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "datetime" => '2005-09-22T00:00:00-09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @delete id=\"id630_11\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id630_11',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id38_63\" style=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" class=\"test\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" dir=\"ltr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" dir=\"lr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" datetime=\"2005-09-22T00:00:00-09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "datetime" => '2005-09-22T00:00:00-09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @delete id=\"id38_63\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id38_63',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id230_81\" style=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" title=\"test\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" lang=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" dir=\"auto\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" dir=\"lr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @delete id=\"id230_81\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id230_81',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id964_71\" style=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" class=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" title=\"テスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" lang=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" dir=\"ltr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" dir=\"lr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" datetime=\"2005-09-22T00:00:00Z\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "datetime" => '2005-09-22T00:00:00Z',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @delete id=\"id964_71\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id964_71',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
                "text" => "This is @delete id=\"id326_49\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" style=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" class=\"test\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" class=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" title=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" title=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" lang=\"sample text\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" lang=\"\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" dir=\"ltr\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" dir=\"ato\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @delete id=\"id326_49\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "delete",
                "params" => [
                    "id" => 'id326_49',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
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
