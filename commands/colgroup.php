<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandColgroup extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup span="4086"',
                "params" => [
                    "span" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup span="20.5"',
                "params" => [
                    "span" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] span : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT_RLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup width="35.5%"',
                "params" => [
                    "width" => '35.5%',    // NZ_PCT_RLT
                ],
                "result" => ["[Validate Error] width : 35.5%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup align="let"',
                "params" => [
                    "align" => 'let',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : let" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#colgroup charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
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
                "text" => '#colgroup style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup span="256"',
                "params" => [
                    "span" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup span="20.5"',
                "params" => [
                    "span" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] span : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup width="3*"',
                "params" => [
                    "width" => '3*',    // NZ_PCT_RLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup width="0.2"',
                "params" => [
                    "width" => '0.2',    // NZ_PCT_RLT
                ],
                "result" => ["[Validate Error] width : 0.2" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup align="justfy"',
                "params" => [
                    "align" => 'justfy',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : justfy" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup valign="botom"',
                "params" => [
                    "valign" => 'botom',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : botom" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup char="sample text"',
                "params" => [
                    "char" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup charoff="200"',
                "params" => [
                    "charoff" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#colgroup charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
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
                "text" => '#colgroup style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup span="10"',
                "params" => [
                    "span" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup span="-4086"',
                "params" => [
                    "span" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] span : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup width="35%"',
                "params" => [
                    "width" => '35%',    // NZ_PCT_RLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup width="35.5%"',
                "params" => [
                    "width" => '35.5%',    // NZ_PCT_RLT
                ],
                "result" => ["[Validate Error] width : 35.5%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup align="justfy"',
                "params" => [
                    "align" => 'justfy',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : justfy" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup valign="botom"',
                "params" => [
                    "valign" => 'botom',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : botom" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#colgroup charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
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
                "text" => '#colgroup style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup span="256"',
                "params" => [
                    "span" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup span="-10"',
                "params" => [
                    "span" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] span : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup align="let"',
                "params" => [
                    "align" => 'let',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : let" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup valign="top"',
                "params" => [
                    "valign" => 'top',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup valign="too"',
                "params" => [
                    "valign" => 'too',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : too" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup width="3*"',
                "params" => [
                    "width" => '3*',    // NZ_PCT_RLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#colgroup width="*3"',
                "params" => [
                    "width" => '*3',    // NZ_PCT_RLT
                ],
                "result" => ["[Validate Error] width : *3" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],

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
                "text" => '#colgroup style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup span="10"',
                "params" => [
                    "span" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup span="256.5"',
                "params" => [
                    "span" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] span : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup align="char"',
                "params" => [
                    "align" => 'char',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup align="justfy"',
                "params" => [
                    "align" => 'justfy',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : justfy" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT_RLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#colgroup width="*3"',
                "params" => [
                    "width" => '*3',    // NZ_PCT_RLT
                ],
                "result" => ["[Validate Error] width : *3" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],

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
                "text" => '#colgroup style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup span="256"',
                "params" => [
                    "span" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup span="20.5"',
                "params" => [
                    "span" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] span : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup valign="top"',
                "params" => [
                    "valign" => 'top',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup valign="botom"',
                "params" => [
                    "valign" => 'botom',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : botom" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT_RLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#colgroup width="35.5%"',
                "params" => [
                    "width" => '35.5%',    // NZ_PCT_RLT
                ],
                "result" => ["[Validate Error] width : 35.5%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],

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
                "text" => '#colgroup style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup span="4086"',
                "params" => [
                    "span" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup span="256.5"',
                "params" => [
                    "span" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] span : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup align="let"',
                "params" => [
                    "align" => 'let',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : let" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup valign="middle"',
                "params" => [
                    "valign" => 'middle',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup width="3*"',
                "params" => [
                    "width" => '3*',    // NZ_PCT_RLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#colgroup width="35.5%"',
                "params" => [
                    "width" => '35.5%',    // NZ_PCT_RLT
                ],
                "result" => ["[Validate Error] width : 35.5%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],

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
                "text" => '#colgroup style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup span="20"',
                "params" => [
                    "span" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "HTML5",
                "text" => '#colgroup span="20.5"',
                "params" => [
                    "span" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] span : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
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
                "text" => '#colgroup style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // span OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup span="4086"',
                "params" => [
                    "span" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] span",
            ],
            // span NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#colgroup span="20.5"',
                "params" => [
                    "span" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] span : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] span",
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
