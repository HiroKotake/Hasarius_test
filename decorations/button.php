<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationButton extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" style=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" class=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" title=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" lang=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" dir=\"rtl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" dir=\"ato\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" type=\"button\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "type" => 'button',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" type=\"resat\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "type" => 'resat',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : resat" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" name=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" value=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" disabled=\"on\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @button id=\"id553_49\" disabled=\"of\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id553_49',
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
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
                "text" => "This is @button id=\"id234_52\" style=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" class=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" title=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" lang=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" dir=\"auto\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" dir=\"lr\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" type=\"reset\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "type" => 'reset',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" type=\"submt\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "type" => 'submt',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : submt" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" name=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "name" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" value=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "value" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" disabled=\"off\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @button id=\"id234_52\" disabled=\"of\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id234_52',
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
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
                "text" => "This is @button id=\"id835_11\" style=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" class=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" title=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" lang=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" dir=\"rtl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" dir=\"ato\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" type=\"button\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "type" => 'button',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" type=\"submt\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "type" => 'submt',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : submt" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" name=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" value=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "value" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" disabled=\"on\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @button id=\"id835_11\" disabled=\"of\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id835_11',
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
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
                "text" => "This is @button id=\"id363_82\" style=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" title=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" dir=\"auto\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" dir=\"ato\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" type=\"submit\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "type" => 'submit',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" type=\"botton\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "type" => 'botton',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : botton" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" name=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" value=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "value" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" disabled=\"disabled\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @button id=\"id363_82\" disabled=\"disable\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id363_82',
                    "disabled" => 'disable',    // /^disabled$/i
                ],
                "result" => "[Validate Error] disabled : disable" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

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
                "text" => "This is @button id=\"id67_56\" style=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" title=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" lang=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" dir=\"ltr\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" dir=\"lr\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" type=\"reset\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "type" => 'reset',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" type=\"submt\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "type" => 'submt',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : submt" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" name=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" value=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" disabled=\"disabled\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @button id=\"id67_56\" disabled=\"disabl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id67_56',
                    "disabled" => 'disabl',    // /^disabled$/i
                ],
                "result" => "[Validate Error] disabled : disabl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

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
                "text" => "This is @button id=\"id557_62\" style=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" class=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" title=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" dir=\"rtl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" dir=\"rl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" type=\"submit\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "type" => 'submit',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" type=\"resat\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "type" => 'resat',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : resat" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" name=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" value=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" disabled=\"disabled\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @button id=\"id557_62\" disabled=\"dsabled\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id557_62',
                    "disabled" => 'dsabled',    // /^disabled$/i
                ],
                "result" => "[Validate Error] disabled : dsabled" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

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
                "text" => "This is @button id=\"id682_30\" style=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" class=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" title=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" dir=\"rtl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" dir=\"lr\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" type=\"submit\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "type" => 'submit',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" type=\"submt\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "type" => 'submt',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : submt" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" name=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" value=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "value" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" disabled=\"disabled\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @button id=\"id682_30\" disabled=\"isabled\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id682_30',
                    "disabled" => 'isabled',    // /^disabled$/i
                ],
                "result" => "[Validate Error] disabled : isabled" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

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
                "text" => "This is @button id=\"id616_69\" style=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" class=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" title=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" dir=\"auto\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" dir=\"ato\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" type=\"reset\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "type" => 'reset',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" type=\"submt\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "type" => 'submt',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : submt" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" name=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" value=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "value" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // form OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" form=\"テスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "form" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" form=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "form" => '',    // STRING
                ],
                "result" => "[Validate Error] form : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // menu OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" menu=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "menu" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] menu",
            ],
            // menu NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" menu=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "menu" => '',    // STRING
                ],
                "result" => "[Validate Error] menu : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] menu",
            ],
            // formaction OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formaction=\"../script/sample.js\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formaction" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formaction",
            ],
            // formaction NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formaction=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formaction" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] formaction : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formaction",
            ],
            // formmethod OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formmethod=\"get\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formmethod" => 'get',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formmethod",
            ],
            // formmethod NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formmethod=\"pst\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formmethod" => 'pst',
                ],
                "result" => "[Validate Error] formmethod : pst" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formmethod",
            ],
            // formenctype OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formenctype=\"multipart/form-data\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formenctype" => 'multipart/form-data',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formenctype",
            ],
            // formenctype NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formenctype=\"form-data\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formenctype" => 'form-data',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain)$/
                ],
                "result" => "[Validate Error] formenctype : form-data" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formenctype",
            ],
            // formtarget OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formtarget=\"_top\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formtarget" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formtarget",
            ],
            // formtarget NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formtarget=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formtarget" => '',    // WINDOW
                ],
                "result" => "[Validate Error] formtarget : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formtarget",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" disabled=\"off\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" disabled=\"of\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // autofocus OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" autofocus=\"off\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "autofocus" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // autofocus NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" autofocus=\"of\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "autofocus" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] autofocus : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // formnovalidate OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formnovalidate=\"on\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formnovalidate" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formnovalidate",
            ],
            // formnovalidate NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @button id=\"id616_69\" formnovalidate=\"of\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id616_69',
                    "formnovalidate" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] formnovalidate : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formnovalidate",
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
                "text" => "This is @button id=\"id370_76\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" style=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" class=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" class=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" title=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" title=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" lang=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" lang=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" dir=\"rtl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" dir=\"rl\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" type=\"button\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "type" => 'button',    // BUTTON_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" type=\"submt\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "type" => 'submt',    // BUTTON_TYPE
                ],
                "result" => "[Validate Error] type : submt" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" name=\"サンプル テキスト\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" name=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" value=\"sample text\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "value" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" value=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // form OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" form=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "form" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" form=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "form" => '',    // STRING
                ],
                "result" => "[Validate Error] form : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // menu OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" menu=\"test\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "menu" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] menu",
            ],
            // menu NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" menu=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "menu" => '',    // STRING
                ],
                "result" => "[Validate Error] menu : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] menu",
            ],
            // formaction OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formaction=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formaction" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formaction",
            ],
            // formaction NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formaction=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formaction" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] formaction : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formaction",
            ],
            // formmethod OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formmethod=\"post\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formmethod" => 'post',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formmethod",
            ],
            // formmethod NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formmethod=\"gat\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formmethod" => 'gat',
                ],
                "result" => "[Validate Error] formmethod : gat" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formmethod",
            ],
            // formenctype OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formenctype=\"text/plain\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formenctype" => 'text/plain',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formenctype",
            ],
            // formenctype NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formenctype=\"text/plan\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formenctype" => 'text/plan',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain)$/
                ],
                "result" => "[Validate Error] formenctype : text/plan" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formenctype",
            ],
            // formtarget OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formtarget=\"_blank\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formtarget" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formtarget",
            ],
            // formtarget NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formtarget=\"\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formtarget" => '',    // WINDOW
                ],
                "result" => "[Validate Error] formtarget : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formtarget",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" disabled=\"off\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" disabled=\"om\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // autofocus OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" autofocus=\"on\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "autofocus" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // autofocus NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" autofocus=\"of\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "autofocus" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] autofocus : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // formnovalidate OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formnovalidate=\"on\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formnovalidate" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] formnovalidate",
            ],
            // formnovalidate NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @button id=\"id370_76\" formnovalidate=\"om\" sample@ text.",
                "decoration" => "button",
                "params" => [
                    "id" => 'id370_76',
                    "formnovalidate" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] formnovalidate : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] formnovalidate",
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
