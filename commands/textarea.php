<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandTextarea extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea cols="256"',
                "params" => [
                    "cols" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea cols="-4086"',
                "params" => [
                    "cols" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea rows="4086"',
                "params" => [
                    "rows" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea rows="-10"',
                "params" => [
                    "rows" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea disabled="of"',
                "params" => [
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea readonly="off"',
                "params" => [
                    "readonly" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#textarea readonly="om"',
                "params" => [
                    "readonly" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea cols="10"',
                "params" => [
                    "cols" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea cols="-4086"',
                "params" => [
                    "cols" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea rows="256"',
                "params" => [
                    "rows" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea rows="-4086"',
                "params" => [
                    "rows" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea disabled="off"',
                "params" => [
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea readonly="on"',
                "params" => [
                    "readonly" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#textarea readonly="om"',
                "params" => [
                    "readonly" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea cols="256"',
                "params" => [
                    "cols" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea cols="-10"',
                "params" => [
                    "cols" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea rows="256"',
                "params" => [
                    "rows" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea rows="-10"',
                "params" => [
                    "rows" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea readonly="on"',
                "params" => [
                    "readonly" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#textarea readonly="of"',
                "params" => [
                    "readonly" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea cols="20"',
                "params" => [
                    "cols" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea cols="20.5"',
                "params" => [
                    "cols" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea rows="10"',
                "params" => [
                    "rows" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea rows="-4086"',
                "params" => [
                    "rows" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea disabled="disable"',
                "params" => [
                    "disabled" => 'disable',    // /^disabled$/
                ],
                "result" => ["[Validate Error] disabled : disable" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#textarea readonly="readonl"',
                "params" => [
                    "readonly" => 'readonl',    // /^readonly$/
                ],
                "result" => ["[Validate Error] readonly : readonl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea cols="10"',
                "params" => [
                    "cols" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea cols="-4086"',
                "params" => [
                    "cols" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea rows="256"',
                "params" => [
                    "rows" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea rows="20.5"',
                "params" => [
                    "rows" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea disabled="diabled"',
                "params" => [
                    "disabled" => 'diabled',    // /^disabled$/
                ],
                "result" => ["[Validate Error] disabled : diabled" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#textarea readonly="readoly"',
                "params" => [
                    "readonly" => 'readoly',    // /^readonly$/
                ],
                "result" => ["[Validate Error] readonly : readoly" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea cols="10"',
                "params" => [
                    "cols" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea cols="256.5"',
                "params" => [
                    "cols" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea rows="256"',
                "params" => [
                    "rows" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea rows="-4086"',
                "params" => [
                    "rows" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea disabled="disable"',
                "params" => [
                    "disabled" => 'disable',    // /^disabled$/
                ],
                "result" => ["[Validate Error] disabled : disable" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#textarea readonly="redonly"',
                "params" => [
                    "readonly" => 'redonly',    // /^readonly$/
                ],
                "result" => ["[Validate Error] readonly : redonly" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea cols="10"',
                "params" => [
                    "cols" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea cols="-4086"',
                "params" => [
                    "cols" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea rows="10"',
                "params" => [
                    "rows" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea rows="256.5"',
                "params" => [
                    "rows" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea disabled="isabled"',
                "params" => [
                    "disabled" => 'isabled',    // /^disabled$/
                ],
                "result" => ["[Validate Error] disabled : isabled" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#textarea readonly="readonl"',
                "params" => [
                    "readonly" => 'readonl',    // /^readonly$/
                ],
                "result" => ["[Validate Error] readonly : readonl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea cols="4086"',
                "params" => [
                    "cols" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea cols="-10"',
                "params" => [
                    "cols" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea rows="4086"',
                "params" => [
                    "rows" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea rows="256.5"',
                "params" => [
                    "rows" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // maxlength OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea maxlength="10"',
                "params" => [
                    "maxlength" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea maxlength="-10"',
                "params" => [
                    "maxlength" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // minlength OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea minlength="4086"',
                "params" => [
                    "minlength" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] minlength",
            ],
            // minlength NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea minlength="20.5"',
                "params" => [
                    "minlength" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] minlength : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] minlength",
            ],
            // wrap OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea wrap="soft"',
                "params" => [
                    "wrap" => 'soft',    // /^(soft|hard)$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] wrap",
            ],
            // wrap NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea wrap="sott"',
                "params" => [
                    "wrap" => 'sott',    // /^(soft|hard)$/i
                ],
                "result" => ["[Validate Error] wrap : sott" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] wrap",
            ],
            // form OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea form="テスト"',
                "params" => [
                    "form" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea form=""',
                "params" => [
                    "form" => '',    // STRING
                ],
                "result" => ["[Validate Error] form : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // autocomplete OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea autocomplete="off"',
                "params" => [
                    "autocomplete" => 'off',    // /^(on|off)$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // autocomplete NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea autocomplete="of"',
                "params" => [
                    "autocomplete" => 'of',    // /^(on|off)$/i
                ],
                "result" => ["[Validate Error] autocomplete : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // placeholder OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea placeholder="sample text"',
                "params" => [
                    "placeholder" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] placeholder",
            ],
            // placeholder NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea placeholder=""',
                "params" => [
                    "placeholder" => '',    // STRING
                ],
                "result" => ["[Validate Error] placeholder : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] placeholder",
            ],
            // dirname OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea dirname="サンプル テキスト"',
                "params" => [
                    "dirname" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dirname",
            ],
            // dirname NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea dirname=""',
                "params" => [
                    "dirname" => '',    // STRING
                ],
                "result" => ["[Validate Error] dirname : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dirname",
            ],
            // inputmode OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea inputmode="email"',
                "params" => [
                    "inputmode" => 'email',    // TYPEMODE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] inputmode",
            ],
            // inputmode NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea inputmode="katakan"',
                "params" => [
                    "inputmode" => 'katakan',    // TYPEMODE
                ],
                "result" => ["[Validate Error] inputmode : katakan" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] inputmode",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea disabled="off"',
                "params" => [
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea disabled="of"',
                "params" => [
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea readonly="on"',
                "params" => [
                    "readonly" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea readonly="of"',
                "params" => [
                    "readonly" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // required OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea required="on"',
                "params" => [
                    "required" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] required",
            ],
            // required NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea required="of"',
                "params" => [
                    "required" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] required : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] required",
            ],
            // autofocus OK Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea autofocus="on"',
                "params" => [
                    "autofocus" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // autofocus NG Case
            [
                "dtd" => "HTML5",
                "text" => '#textarea autofocus="of"',
                "params" => [
                    "autofocus" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] autofocus : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml5 */
    public function testValidateHtml5(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#textarea style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // cols OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea cols="10"',
                "params" => [
                    "cols" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea cols="20.5"',
                "params" => [
                    "cols" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] cols : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea rows="4086"',
                "params" => [
                    "rows" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea rows="20.5"',
                "params" => [
                    "rows" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rows : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // maxlength OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea maxlength="20"',
                "params" => [
                    "maxlength" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea maxlength="256.5"',
                "params" => [
                    "maxlength" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // minlength OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea minlength="4086"',
                "params" => [
                    "minlength" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] minlength",
            ],
            // minlength NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea minlength="20.5"',
                "params" => [
                    "minlength" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] minlength : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] minlength",
            ],
            // wrap OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea wrap="hard"',
                "params" => [
                    "wrap" => 'hard',    // /^(soft|hard)$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] wrap",
            ],
            // wrap NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea wrap="hrad"',
                "params" => [
                    "wrap" => 'hrad',    // /^(soft|hard)$/i
                ],
                "result" => ["[Validate Error] wrap : hrad" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] wrap",
            ],
            // form OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea form="sample text"',
                "params" => [
                    "form" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea form=""',
                "params" => [
                    "form" => '',    // STRING
                ],
                "result" => ["[Validate Error] form : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // autocomplete OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea autocomplete="on"',
                "params" => [
                    "autocomplete" => 'on',    // /^(on|off)$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // autocomplete NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea autocomplete="om"',
                "params" => [
                    "autocomplete" => 'om',    // /^(on|off)$/i
                ],
                "result" => ["[Validate Error] autocomplete : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // placeholder OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea placeholder="sample text"',
                "params" => [
                    "placeholder" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] placeholder",
            ],
            // placeholder NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea placeholder=""',
                "params" => [
                    "placeholder" => '',    // STRING
                ],
                "result" => ["[Validate Error] placeholder : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] placeholder",
            ],
            // dirname OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea dirname="テスト"',
                "params" => [
                    "dirname" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dirname",
            ],
            // dirname NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea dirname=""',
                "params" => [
                    "dirname" => '',    // STRING
                ],
                "result" => ["[Validate Error] dirname : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dirname",
            ],
            // inputmode OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea inputmode="katakana"',
                "params" => [
                    "inputmode" => 'katakana',    // TYPEMODE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] inputmode",
            ],
            // inputmode NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea inputmode="kan"',
                "params" => [
                    "inputmode" => 'kan',    // TYPEMODE
                ],
                "result" => ["[Validate Error] inputmode : kan" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] inputmode",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea disabled="of"',
                "params" => [
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea readonly="off"',
                "params" => [
                    "readonly" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea readonly="of"',
                "params" => [
                    "readonly" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // required OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea required="on"',
                "params" => [
                    "required" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] required",
            ],
            // required NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea required="of"',
                "params" => [
                    "required" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] required : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] required",
            ],
            // autofocus OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea autofocus="on"',
                "params" => [
                    "autofocus" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // autofocus NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#textarea autofocus="om"',
                "params" => [
                    "autofocus" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] autofocus : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml51 */
    public function testValidateHtml51(string $dtd, string $text, array $params, array $result, string $description)
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
