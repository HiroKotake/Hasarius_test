<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationHorizontally extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" style=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" class=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" title=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" lang=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" dir=\"ltr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" dir=\"rl\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" size=\"10\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "size" => '10',    // NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" size=\"0\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "size" => '0',    // NZ
                ],
                "result" => ["[Validate Error] size : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" width=\"50%\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" width=\"50 %\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" align=\"right\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "align" => 'right',    // SIDE_LMR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" align=\"light\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "align" => 'light',    // SIDE_LMR
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // -- Custom Attribute
            // noshade OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" noshade=\"off\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "noshade" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] noshade",
            ],
            // noshade NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @horizontally id=\"id690_63\" noshade=\"om\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id690_63',
                    "noshade" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] noshade : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] noshade",
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
                "text" => "This is @horizontally id=\"id373_11\" style=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" class=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" title=\"test\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" lang=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" dir=\"auto\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @horizontally id=\"id373_11\" dir=\"rl\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id373_11',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute

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
                "text" => "This is @horizontally id=\"id566_27\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" class=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" lang=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" dir=\"ltr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" dir=\"lr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" size=\"10\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "size" => '10',    // NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" size=\"16.5\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "size" => '16.5',    // NZ
                ],
                "result" => ["[Validate Error] size : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" width=\"50%\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" width=\"200.05\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" align=\"left\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "align" => 'left',    // SIDE_LMR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" align=\"lift\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "align" => 'lift',    // SIDE_LMR
                ],
                "result" => ["[Validate Error] align : lift" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // -- Custom Attribute
            // noshade OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" noshade=\"on\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "noshade" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] noshade",
            ],
            // noshade NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @horizontally id=\"id566_27\" noshade=\"om\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id566_27',
                    "noshade" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] noshade : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] noshade",
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
                "text" => "This is @horizontally id=\"id196_85\" style=\"test\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" class=\"test\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" title=\"test\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" lang=\"test\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" dir=\"ltr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" dir=\"lr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" size=\"20\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "size" => '20',    // NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" size=\"16.5\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "size" => '16.5',    // NZ
                ],
                "result" => ["[Validate Error] size : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" width=\"50%\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" width=\"200.05\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" align=\"middle\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "align" => 'middle',    // SIDE_LMR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" align=\"light\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "align" => 'light',    // SIDE_LMR
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // noshade OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" noshade=\"noshade\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "noshade" => 'noshade',    // /^noshade$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] noshade",
            ],
            // noshade NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @horizontally id=\"id196_85\" noshade=\"noshad\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id196_85',
                    "noshade" => 'noshad',    // /^noshade$/i
                ],
                "result" => ["[Validate Error] noshade : noshad" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] noshade",
            ],
            // -- Custom Attribute

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
                "text" => "This is @horizontally id=\"id241_42\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" class=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" title=\"test\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" lang=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" dir=\"ltr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @horizontally id=\"id241_42\" dir=\"rl\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id241_42',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute

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
                "text" => "This is @horizontally id=\"id173_86\" style=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" class=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" title=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" dir=\"ltr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" dir=\"rl\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" size=\"10\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "size" => '10',    // NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" size=\"16.5\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "size" => '16.5',    // NZ
                ],
                "result" => ["[Validate Error] size : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" width=\"200\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "width" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" width=\"200.05\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" align=\"left\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "align" => 'left',    // SIDE_LMR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" align=\"bttom\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "align" => 'bttom',    // SIDE_LMR
                ],
                "result" => ["[Validate Error] align : bttom" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // noshade OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" noshade=\"noshade\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "noshade" => 'noshade',    // /^noshade$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] noshade",
            ],
            // noshade NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @horizontally id=\"id173_86\" noshade=\"shade\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id173_86',
                    "noshade" => 'shade',    // /^noshade$/i
                ],
                "result" => ["[Validate Error] noshade : shade" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] noshade",
            ],
            // -- Custom Attribute

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
                "text" => "This is @horizontally id=\"id305_31\" style=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" class=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" title=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" lang=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" dir=\"ltr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @horizontally id=\"id305_31\" dir=\"rl\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id305_31',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute

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
                "text" => "This is @horizontally id=\"id307_7\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" title=\"test\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" lang=\"テスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" dir=\"auto\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @horizontally id=\"id307_7\" dir=\"ato\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id307_7',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute

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
                "text" => "This is @horizontally id=\"id313_54\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" style=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" class=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" class=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" title=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" lang=\"sample text\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" lang=\"\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" dir=\"rtl\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @horizontally id=\"id313_54\" dir=\"lr\" sample@ text.",
                "decoration" => "horizontally",
                "params" => [
                    "id" => 'id313_54',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute

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
