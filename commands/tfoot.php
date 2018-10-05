<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandTfoot extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot align="justify"',
                "params" => [
                    "align" => 'justify',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot align="midle"',
                "params" => [
                    "align" => 'midle',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tfoot charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
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
                "text" => '#tfoot style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot valign="top"',
                "params" => [
                    "valign" => 'top',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot char="sample text"',
                "params" => [
                    "char" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tfoot charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
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
                "text" => '#tfoot style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot align="let"',
                "params" => [
                    "align" => 'let',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : let" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot valign="too"',
                "params" => [
                    "valign" => 'too',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : too" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot char="サンプル テキスト"',
                "params" => [
                    "char" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tfoot charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
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
                "text" => '#tfoot style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot valign="top"',
                "params" => [
                    "valign" => 'top',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot valign="baserine"',
                "params" => [
                    "valign" => 'baserine',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : baserine" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tfoot charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
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
                "text" => '#tfoot style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot char="sample text"',
                "params" => [
                    "char" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tfoot charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
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
                "text" => '#tfoot style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot valign="botom"',
                "params" => [
                    "valign" => 'botom',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : botom" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot char="サンプル テキスト"',
                "params" => [
                    "char" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tfoot charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
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
                "text" => '#tfoot style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tfoot charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
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
                "text" => '#tfoot style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tfoot dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
                "text" => '#tfoot style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tfoot dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
