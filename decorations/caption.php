<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationCaption extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" class=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" title=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" lang=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" dir=\"rtl\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" dir=\"lr\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" align=\"right\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "align" => 'right',    // SIDE_TRBL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @caption id=\"id505_37\" align=\"op\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id505_37',
                    "align" => 'op',    // SIDE_TRBL
                ],
                "result" => "[Validate Error] align : op" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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
                "text" => "This is @caption id=\"id81_63\" style=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" class=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" dir=\"ltr\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @caption id=\"id81_63\" dir=\"lr\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id81_63',
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
                "text" => "This is @caption id=\"id241_48\" style=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" class=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" title=\"test\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" lang=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" dir=\"auto\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" dir=\"lr\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" align=\"right\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "align" => 'right',    // SIDE_TRBL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @caption id=\"id241_48\" align=\"op\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id241_48',
                    "align" => 'op',    // SIDE_TRBL
                ],
                "result" => "[Validate Error] align : op" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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
                "text" => "This is @caption id=\"id626_3\" style=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" class=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" title=\"test\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" dir=\"auto\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" dir=\"ato\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" align=\"top\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "align" => 'top',    // SIDE_TRBL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @caption id=\"id626_3\" align=\"botom\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id626_3',
                    "align" => 'botom',    // SIDE_TRBL
                ],
                "result" => "[Validate Error] align : botom" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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
                "text" => "This is @caption id=\"id116_57\" style=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" class=\"test\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" title=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" lang=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" dir=\"auto\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @caption id=\"id116_57\" dir=\"ato\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id116_57',
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
                "text" => "This is @caption id=\"id729_45\" style=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" class=\"test\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" title=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" lang=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" dir=\"rtl\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" dir=\"ato\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" align=\"left\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "align" => 'left',    // SIDE_TRBL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @caption id=\"id729_45\" align=\"botom\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id729_45',
                    "align" => 'botom',    // SIDE_TRBL
                ],
                "result" => "[Validate Error] align : botom" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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
                "text" => "This is @caption id=\"id230_5\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" class=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" lang=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" dir=\"rtl\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @caption id=\"id230_5\" dir=\"ato\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id230_5',
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

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" style=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" class=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" title=\"test\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" lang=\"sample text\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" dir=\"rtl\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @caption id=\"id701_36\" dir=\"ato\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id701_36',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
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
                "text" => "This is @caption id=\"id991_45\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" style=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" class=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" class=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" title=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" lang=\"テスト\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" lang=\"\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" dir=\"rtl\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @caption id=\"id991_45\" dir=\"ato\" sample@ text.",
                "decoration" => "caption",
                "params" => [
                    "id" => 'id991_45',
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
