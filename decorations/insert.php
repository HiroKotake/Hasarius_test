<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationInsert extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" style=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" class=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" title=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" lang=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" dir=\"auto\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" dir=\"rl\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" datetime=\"2005-09-22T00:00:00Z\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "datetime" => '2005-09-22T00:00:00Z',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @insert id=\"id703_30\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id703_30',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id702_33\" style=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" class=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" lang=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" dir=\"ltr\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" dir=\"ato\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @insert id=\"id702_33\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id702_33',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id368_43\" style=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" class=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" dir=\"auto\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" dir=\"rl\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @insert id=\"id368_43\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id368_43',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id203_10\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" class=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" title=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" dir=\"auto\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" dir=\"ato\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @insert id=\"id203_10\" datetime=\"2005-09-22T23:15:30Z09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id203_10',
                    "datetime" => '2005-09-22T23:15:30Z09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-09-22T23:15:30Z09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id520_98\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" class=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" title=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" lang=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" dir=\"auto\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" dir=\"lr\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" datetime=\"2005-09-22T00:00:00Z\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "datetime" => '2005-09-22T00:00:00Z',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @insert id=\"id520_98\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id520_98',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id471_61\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" title=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" lang=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" dir=\"ltr\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" dir=\"lr\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" datetime=\"2005-09-22T00:00:00-09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "datetime" => '2005-09-22T00:00:00-09:00',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @insert id=\"id471_61\" datetime=\"2005-09-22T23:15:30Z09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id471_61',
                    "datetime" => '2005-09-22T23:15:30Z09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-09-22T23:15:30Z09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id999_27\" style=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" class=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" dir=\"ltr\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" dir=\"lr\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @insert id=\"id999_27\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id999_27',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id311_8\" style=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" class=\"テスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" title=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" dir=\"rtl\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" dir=\"rl\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" cite=\"../script/sample.js\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "cite" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" datetime=\"2005-09-22T00:00:00Z\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "datetime" => '2005-09-22T00:00:00Z',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @insert id=\"id311_8\" datetime=\"2005-09-22T23:15:30Z09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id311_8',
                    "datetime" => '2005-09-22T23:15:30Z09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-09-22T23:15:30Z09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
                "text" => "This is @insert id=\"id9_19\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" style=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" class=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" class=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" title=\"sample text\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" title=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" lang=\"test\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" lang=\"\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" dir=\"auto\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" dir=\"lr\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // cite OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" cite=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "cite" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // cite NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" cite=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "cite" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] cite : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cite",
            ],
            // datetime OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @insert id=\"id9_19\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "insert",
                "params" => [
                    "id" => 'id9_19',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => "[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

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
