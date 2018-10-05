<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandTdata extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata dir="rl"',
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
                "text" => '#tdata align="char"',
                "params" => [
                    "align" => 'char',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata char="サンプル テキスト"',
                "params" => [
                    "char" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // colspan OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata colspan="20"',
                "params" => [
                    "colspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata colspan="20.5"',
                "params" => [
                    "colspan" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata rowspan="256"',
                "params" => [
                    "rowspan" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata rowspan="256.5"',
                "params" => [
                    "rowspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata headers="sample text"',
                "params" => [
                    "headers" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata scope="rowgroup"',
                "params" => [
                    "scope" => 'rowgroup',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata scope="rows"',
                "params" => [
                    "scope" => 'rows',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : rows" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata axis="テスト"',
                "params" => [
                    "axis" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata width="200"',
                "params" => [
                    "width" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata width="50 %"',
                "params" => [
                    "width" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata height="50%"',
                "params" => [
                    "height" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata height="200.05"',
                "params" => [
                    "height" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata bgcolor="#FF0000"',
                "params" => [
                    "bgcolor" => '#FF0000',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata bgcolor="rad"',
                "params" => [
                    "bgcolor" => 'rad',    // COLOR
                ],
                "result" => ["[Validate Error] bgcolor : rad" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // -- Custom Attribute
            // nowrap OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata nowrap="off"',
                "params" => [
                    "nowrap" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#tdata nowrap="om"',
                "params" => [
                    "nowrap" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] nowrap : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nowrap",
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
                "text" => '#tdata style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata align="let"',
                "params" => [
                    "align" => 'let',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : let" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata valign="middle"',
                "params" => [
                    "valign" => 'middle',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata char="テスト"',
                "params" => [
                    "char" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // colspan OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata colspan="20"',
                "params" => [
                    "colspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata colspan="-10"',
                "params" => [
                    "colspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata rowspan="20"',
                "params" => [
                    "rowspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata rowspan="-10"',
                "params" => [
                    "rowspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata abbr="sample text"',
                "params" => [
                    "abbr" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata headers="テスト"',
                "params" => [
                    "headers" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata scope="row"',
                "params" => [
                    "scope" => 'row',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata scope="cogroup"',
                "params" => [
                    "scope" => 'cogroup',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : cogroup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata axis="test"',
                "params" => [
                    "axis" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // -- Custom Attribute
            // nowrap OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata nowrap="off"',
                "params" => [
                    "nowrap" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#tdata nowrap="of"',
                "params" => [
                    "nowrap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] nowrap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nowrap",
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
                "text" => '#tdata style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata align="midle"',
                "params" => [
                    "align" => 'midle',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata valign="too"',
                "params" => [
                    "valign" => 'too',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : too" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata char="テスト"',
                "params" => [
                    "char" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // colspan OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata colspan="10"',
                "params" => [
                    "colspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata colspan="256.5"',
                "params" => [
                    "colspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata rowspan="256"',
                "params" => [
                    "rowspan" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata rowspan="256.5"',
                "params" => [
                    "rowspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata abbr="test"',
                "params" => [
                    "abbr" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata headers="テスト"',
                "params" => [
                    "headers" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata scope="rowgroup"',
                "params" => [
                    "scope" => 'rowgroup',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata scope="cols"',
                "params" => [
                    "scope" => 'cols',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : cols" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata axis="サンプル テキスト"',
                "params" => [
                    "axis" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata width="200"',
                "params" => [
                    "width" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata width="50 %"',
                "params" => [
                    "width" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata height="200"',
                "params" => [
                    "height" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata height="50 %"',
                "params" => [
                    "height" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata bgcolor="yellow"',
                "params" => [
                    "bgcolor" => 'yellow',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata bgcolor="#FF7F0"',
                "params" => [
                    "bgcolor" => '#FF7F0',    // COLOR
                ],
                "result" => ["[Validate Error] bgcolor : #FF7F0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // -- Custom Attribute
            // nowrap OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata nowrap="off"',
                "params" => [
                    "nowrap" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#tdata nowrap="of"',
                "params" => [
                    "nowrap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] nowrap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nowrap",
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
                "text" => '#tdata style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata dir="lr"',
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
                "text" => '#tdata align="justify"',
                "params" => [
                    "align" => 'justify',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata align="let"',
                "params" => [
                    "align" => 'let',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : let" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata valign="middle"',
                "params" => [
                    "valign" => 'middle',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata char="テスト"',
                "params" => [
                    "char" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // colspan OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata colspan="20"',
                "params" => [
                    "colspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata colspan="-4086"',
                "params" => [
                    "colspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata rowspan="4086"',
                "params" => [
                    "rowspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata rowspan="20.5"',
                "params" => [
                    "rowspan" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata abbr="test"',
                "params" => [
                    "abbr" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata headers="サンプル テキスト"',
                "params" => [
                    "headers" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata scope="col"',
                "params" => [
                    "scope" => 'col',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata scope="rows"',
                "params" => [
                    "scope" => 'rows',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : rows" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata axis="test"',
                "params" => [
                    "axis" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata width="200"',
                "params" => [
                    "width" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata width="200.05"',
                "params" => [
                    "width" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata height="50%"',
                "params" => [
                    "height" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata height="200.05"',
                "params" => [
                    "height" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata bgcolor="#FF0000"',
                "params" => [
                    "bgcolor" => '#FF0000',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata bgcolor="yellaw"',
                "params" => [
                    "bgcolor" => 'yellaw',    // COLOR
                ],
                "result" => ["[Validate Error] bgcolor : yellaw" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // nowrap OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata nowrap="nowrap"',
                "params" => [
                    "nowrap" => 'nowrap',    // /^nowrap$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#tdata nowrap="nowrp"',
                "params" => [
                    "nowrap" => 'nowrp',    // /^nowrap$/
                ],
                "result" => ["[Validate Error] nowrap : nowrp" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nowrap",
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
                "text" => '#tdata style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata align="justify"',
                "params" => [
                    "align" => 'justify',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata align="justfy"',
                "params" => [
                    "align" => 'justfy',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : justfy" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata valign="botom"',
                "params" => [
                    "valign" => 'botom',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : botom" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata char="テスト"',
                "params" => [
                    "char" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // colspan OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata colspan="20"',
                "params" => [
                    "colspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata colspan="256.5"',
                "params" => [
                    "colspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata rowspan="20"',
                "params" => [
                    "rowspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata rowspan="-4086"',
                "params" => [
                    "rowspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata abbr="test"',
                "params" => [
                    "abbr" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata headers="test"',
                "params" => [
                    "headers" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata scope="rowgroup"',
                "params" => [
                    "scope" => 'rowgroup',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata scope="rowgrup"',
                "params" => [
                    "scope" => 'rowgrup',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : rowgrup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata axis="サンプル テキスト"',
                "params" => [
                    "axis" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#tdata axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
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
                "text" => '#tdata style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata dir="lr"',
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
                "text" => '#tdata align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata align="let"',
                "params" => [
                    "align" => 'let',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : let" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata valign="too"',
                "params" => [
                    "valign" => 'too',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : too" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // colspan OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata colspan="10"',
                "params" => [
                    "colspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata colspan="256.5"',
                "params" => [
                    "colspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata rowspan="10"',
                "params" => [
                    "rowspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata rowspan="-4086"',
                "params" => [
                    "rowspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata abbr="test"',
                "params" => [
                    "abbr" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata headers="test"',
                "params" => [
                    "headers" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata scope="col"',
                "params" => [
                    "scope" => 'col',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata scope="rowgrup"',
                "params" => [
                    "scope" => 'rowgrup',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : rowgrup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata axis="サンプル テキスト"',
                "params" => [
                    "axis" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata width="50%"',
                "params" => [
                    "width" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata width="200.05"',
                "params" => [
                    "width" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata height="50%"',
                "params" => [
                    "height" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata height="200.05"',
                "params" => [
                    "height" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata bgcolor="#FF7F00"',
                "params" => [
                    "bgcolor" => '#FF7F00',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata bgcolor="#FF7F0"',
                "params" => [
                    "bgcolor" => '#FF7F0',    // COLOR
                ],
                "result" => ["[Validate Error] bgcolor : #FF7F0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // nowrap OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata nowrap="nowrap"',
                "params" => [
                    "nowrap" => 'nowrap',    // /^nowrap$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#tdata nowrap="noap"',
                "params" => [
                    "nowrap" => 'noap',    // /^nowrap$/
                ],
                "result" => ["[Validate Error] nowrap : noap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nowrap",
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
                "text" => '#tdata style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata dir="ato"',
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
                "text" => '#tdata align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata valign="top"',
                "params" => [
                    "valign" => 'top',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata valign="baserine"',
                "params" => [
                    "valign" => 'baserine',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : baserine" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata char="サンプル テキスト"',
                "params" => [
                    "char" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // colspan OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata colspan="20"',
                "params" => [
                    "colspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata colspan="-10"',
                "params" => [
                    "colspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata rowspan="4086"',
                "params" => [
                    "rowspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata rowspan="-4086"',
                "params" => [
                    "rowspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata abbr="テスト"',
                "params" => [
                    "abbr" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata headers="test"',
                "params" => [
                    "headers" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata scope="colgroup"',
                "params" => [
                    "scope" => 'colgroup',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata scope="rowgrup"',
                "params" => [
                    "scope" => 'rowgrup',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : rowgrup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata axis="sample text"',
                "params" => [
                    "axis" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#tdata axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
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
                "text" => '#tdata style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // colspan OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata colspan="4086"',
                "params" => [
                    "colspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata colspan="-10"',
                "params" => [
                    "colspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata rowspan="4086"',
                "params" => [
                    "rowspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata rowspan="-4086"',
                "params" => [
                    "rowspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // headers OK Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata headers="test"',
                "params" => [
                    "headers" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML5",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // -- Custom Attribute

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
                "text" => '#tdata style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // colspan OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata colspan="10"',
                "params" => [
                    "colspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // colspan NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata colspan="-4086"',
                "params" => [
                    "colspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] colspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] colspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata rowspan="10"',
                "params" => [
                    "rowspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata rowspan="20.5"',
                "params" => [
                    "rowspan" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // headers OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata headers="サンプル テキスト"',
                "params" => [
                    "headers" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#tdata headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // -- Custom Attribute

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
