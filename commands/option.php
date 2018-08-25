<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandOption extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option value="サンプル テキスト"',
                "params" => [
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option label="サンプル テキスト"',
                "params" => [
                    "label" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // -- Custom Attribute
            // selected OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option selected="off"',
                "params" => [
                    "selected" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option selected="om"',
                "params" => [
                    "selected" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] selected : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option disabled="off"',
                "params" => [
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#option disabled="of"',
                "params" => [
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateHtml4Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option label="test"',
                "params" => [
                    "label" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // -- Custom Attribute
            // selected OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option selected="off"',
                "params" => [
                    "selected" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option selected="om"',
                "params" => [
                    "selected" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] selected : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#option disabled="of"',
                "params" => [
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option label="サンプル テキスト"',
                "params" => [
                    "label" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // -- Custom Attribute
            // selected OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option selected="off"',
                "params" => [
                    "selected" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option selected="om"',
                "params" => [
                    "selected" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] selected : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option disabled="off"',
                "params" => [
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#option disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml1Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option value="test"',
                "params" => [
                    "value" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option label="sample text"',
                "params" => [
                    "label" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // selected OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option selected="selected"',
                "params" => [
                    "selected" => 'selected',    // selected
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option selected="select"',
                "params" => [
                    "selected" => 'select',    // selected
                ],
                "result" => "[Validate Error] selected : select" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // disabled
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#option disabled="disable"',
                "params" => [
                    "disabled" => 'disable',    // disabled
                ],
                "result" => "[Validate Error] disabled : disable" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml1Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option value="サンプル テキスト"',
                "params" => [
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option label="test"',
                "params" => [
                    "label" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // selected OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option selected="selected"',
                "params" => [
                    "selected" => 'selected',    // selected
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option selected="select"',
                "params" => [
                    "selected" => 'select',    // selected
                ],
                "result" => "[Validate Error] selected : select" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // disabled
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#option disabled="disable"',
                "params" => [
                    "disabled" => 'disable',    // disabled
                ],
                "result" => "[Validate Error] disabled : disable" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option value="sample text"',
                "params" => [
                    "value" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option label="サンプル テキスト"',
                "params" => [
                    "label" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // selected OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option selected="selected"',
                "params" => [
                    "selected" => 'selected',    // selected
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option selected="select"',
                "params" => [
                    "selected" => 'select',    // selected
                ],
                "result" => "[Validate Error] selected : select" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // disabled
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#option disabled="disable"',
                "params" => [
                    "disabled" => 'disable',    // disabled
                ],
                "result" => "[Validate Error] disabled : disable" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateXhtml11()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option value="サンプル テキスト"',
                "params" => [
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option label="テスト"',
                "params" => [
                    "label" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // selected OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option selected="selected"',
                "params" => [
                    "selected" => 'selected',    // selected
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option selected="selecte"',
                "params" => [
                    "selected" => 'selecte',    // selected
                ],
                "result" => "[Validate Error] selected : selecte" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // disabled
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#option disabled="disabl"',
                "params" => [
                    "disabled" => 'disabl',    // disabled
                ],
                "result" => "[Validate Error] disabled : disabl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option value="test"',
                "params" => [
                    "value" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option label="テスト"',
                "params" => [
                    "label" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // -- Custom Attribute
            // selected OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option selected="off"',
                "params" => [
                    "selected" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option selected="of"',
                "params" => [
                    "selected" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] selected : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML5",
                "text" => '#option disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5",
                "text" => '#option disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml5 */
    public function testValidateHtml5(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateHtml51()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => "[Validate Error] value : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // label OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option label="test"',
                "params" => [
                    "label" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // -- Custom Attribute
            // selected OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option selected="off"',
                "params" => [
                    "selected" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // selected NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option selected="of"',
                "params" => [
                    "selected" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] selected : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] selected",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option disabled="off"',
                "params" => [
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#option disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] disabled : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml51 */
    public function testValidateHtml51(string $dtd, string $text, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }

}
