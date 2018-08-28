<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationLabel extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" style=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" class=\"テスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" lang=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" dir=\"auto\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" dir=\"rl\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" for=\"テスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "for" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @label id=\"id779_31\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id779_31',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
                "text" => "This is @label id=\"id453_41\" style=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" class=\"テスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" lang=\"テスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" dir=\"rtl\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" dir=\"rl\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" for=\"テスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "for" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @label id=\"id453_41\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id453_41',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
                "text" => "This is @label id=\"id433_92\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" title=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" lang=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" dir=\"auto\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" dir=\"ato\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" for=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "for" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @label id=\"id433_92\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id433_92',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
                "text" => "This is @label id=\"id189_51\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" class=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" title=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" lang=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" dir=\"auto\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" dir=\"ato\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" for=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "for" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @label id=\"id189_51\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id189_51',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
                "text" => "This is @label id=\"id738_52\" style=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" title=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" dir=\"ltr\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" dir=\"rl\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" for=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "for" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @label id=\"id738_52\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id738_52',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
                "text" => "This is @label id=\"id507_18\" style=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" class=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" title=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" lang=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" dir=\"ltr\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" dir=\"lr\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" for=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "for" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @label id=\"id507_18\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id507_18',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
                "text" => "This is @label id=\"id317_46\" style=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" class=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" title=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" dir=\"ltr\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" dir=\"ato\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" for=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "for" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @label id=\"id317_46\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id317_46',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
                "text" => "This is @label id=\"id511_73\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" class=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" title=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" lang=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" dir=\"ltr\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" dir=\"rl\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" for=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "for" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // form OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" form=\"テスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "form" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @label id=\"id511_73\" form=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id511_73',
                    "form" => '',    // STRING
                ],
                "result" => "[Validate Error] form : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
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
                "text" => "This is @label id=\"id297_3\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" style=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" class=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" class=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" title=\"テスト\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" title=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" lang=\"sample text\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" lang=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" dir=\"auto\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" dir=\"rl\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // for OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" for=\"test\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "for" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @label id=\"id297_3\" for=\"\" sample@ text.",
                "decoration" => "label",
                "params" => [
                    "id" => 'id297_3',
                    "for" => '',    // STRING
                ],
                "result" => "[Validate Error] for : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
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
