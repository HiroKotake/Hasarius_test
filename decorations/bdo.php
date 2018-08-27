<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationBdo extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" style=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" class=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" title=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" dir=\"auto\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" dir=\"rtl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "dir" => 'rtl',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @bdo id=\"id437_5\" dir=\"rl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id437_5',
                    "dir" => 'rl',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id92_90\" style=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" class=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" title=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" dir=\"rtl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" dir=\"auto\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "dir" => 'auto',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @bdo id=\"id92_90\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id92_90',
                    "dir" => 'lr',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id103_39\" style=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" class=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" title=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" lang=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" dir=\"rtl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" dir=\"auto\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "dir" => 'auto',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @bdo id=\"id103_39\" dir=\"ato\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id103_39',
                    "dir" => 'ato',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id663_99\" style=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" class=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" title=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" lang=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" dir=\"auto\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" dir=\"ato\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" dir=\"ltr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "dir" => 'ltr',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @bdo id=\"id663_99\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id663_99',
                    "dir" => 'lr',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id729_51\" style=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" class=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" lang=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" dir=\"auto\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" dir=\"ltr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "dir" => 'ltr',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @bdo id=\"id729_51\" dir=\"ato\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id729_51',
                    "dir" => 'ato',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id908_27\" style=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" class=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" title=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" lang=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" dir=\"ltr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" dir=\"rl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" dir=\"ltr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "dir" => 'ltr',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @bdo id=\"id908_27\" dir=\"rl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id908_27',
                    "dir" => 'rl',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id955_49\" style=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" lang=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" dir=\"rtl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" dir=\"ltr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "dir" => 'ltr',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @bdo id=\"id955_49\" dir=\"ato\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id955_49',
                    "dir" => 'ato',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id509_74\" style=\"sample text\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" class=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" lang=\"テスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" dir=\"rtl\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" dir=\"ltr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "dir" => 'ltr',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdo id=\"id509_74\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id509_74',
                    "dir" => 'lr',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
                "text" => "This is @bdo id=\"id21_75\" style=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" style=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" class=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" title=\"test\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" title=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" lang=\"\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" dir=\"auto\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" dir=\"ltr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "dir" => 'ltr',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdo id=\"id21_75\" dir=\"lr\" sample@ text.",
                "decoration" => "bdo",
                "params" => [
                    "id" => 'id21_75',
                    "dir" => 'lr',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
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
