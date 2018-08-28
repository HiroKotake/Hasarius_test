<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationFont extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" style=\"テスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" style=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" class=\"sample text\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" class=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" title=\"test\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" title=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" lang=\"テスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" lang=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" dir=\"auto\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" dir=\"lr\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" size=\"+3\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "size" => '+3',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" size=\"9\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "size" => '9',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => "[Validate Error] size : 9" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" color=\"#FF0000\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "color" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" color=\"#FF7F0\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "color" => '#FF7F0',    // COLOR
                ],
                "result" => "[Validate Error] color : #FF7F0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @font id=\"id860_84\" face=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id860_84',
                    "face" => '',    // FONT
                ],
                "result" => '',
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
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

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" style=\"test\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" style=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" class=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" title=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" lang=\"test\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" lang=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" dir=\"auto\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" dir=\"rl\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" size=\"5\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "size" => '5',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" size=\"0\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "size" => '0',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => "[Validate Error] size : 0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" color=\"#FF0000\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "color" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" color=\"yellaw\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "color" => 'yellaw',    // COLOR
                ],
                "result" => "[Validate Error] color : yellaw" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @font id=\"id535_7\" face=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id535_7',
                    "face" => '',    // FONT
                ],
                "result" => '',
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
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
                "text" => "This is @font id=\"id527_41\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" style=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" class=\"sample text\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" class=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" title=\"テスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" title=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" lang=\"test\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" lang=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" dir=\"auto\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" dir=\"lr\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" size=\"-2\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "size" => '-2',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" size=\"0.5\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "size" => '0.5',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => "[Validate Error] size : 0.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" color=\"yellow\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "color" => 'yellow',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" color=\"#FG0000\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "color" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] color : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @font id=\"id527_41\" face=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id527_41',
                    "face" => '',    // FONT
                ],
                "result" => '',
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
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

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" style=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" class=\"sample text\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" class=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" title=\"test\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" title=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" lang=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" dir=\"rtl\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" dir=\"lr\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" size=\"5\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "size" => '5',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" size=\"x3\" sample@ text.",// ToDo UNDEFINED VALUE !!
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "size" => 'x3',    // /^(+|-)?(1|2|3|4|5|6|7)$/
                ],
                "result" => "[Validate Error] size : x3" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" color=\"#FF7F00\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "color" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" color=\"yellaw\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "color" => 'yellaw',    // COLOR
                ],
                "result" => "[Validate Error] color : yellaw" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @font id=\"id101_31\" face=\"\" sample@ text.",
                "decoration" => "font",
                "params" => [
                    "id" => 'id101_31',
                    "face" => '',    // FONT
                ],
                "result" => '',
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
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

}
