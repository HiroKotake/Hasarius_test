<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandTheader extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader valign="too"',
                "params" => [
                    "valign" => 'too',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : too" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader char="サンプル テキスト"',
                "params" => [
                    "char" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // callspan OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader callspan="10"',
                "params" => [
                    "callspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader callspan="256.5"',
                "params" => [
                    "callspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader rowspan="4086"',
                "params" => [
                    "rowspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader rowspan="256.5"',
                "params" => [
                    "rowspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader headers="サンプル テキスト"',
                "params" => [
                    "headers" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader scope="col"',
                "params" => [
                    "scope" => 'col',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader scope="cogroup"',
                "params" => [
                    "scope" => 'cogroup',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : cogroup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader axis="test"',
                "params" => [
                    "axis" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader width="200"',
                "params" => [
                    "width" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader width="50 %"',
                "params" => [
                    "width" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader height="50%"',
                "params" => [
                    "height" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader height="50 %"',
                "params" => [
                    "height" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader bgcolor="#FF7F00"',
                "params" => [
                    "bgcolor" => '#FF7F00',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader bgcolor="rad"',
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
                "text" => '#theader nowrap="on"',
                "params" => [
                    "nowrap" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#theader nowrap="om"',
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
                "text" => '#theader style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader dir="rl"',
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
                "text" => '#theader align="char"',
                "params" => [
                    "align" => 'char',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader valign="middle"',
                "params" => [
                    "valign" => 'middle',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader valign="baserine"',
                "params" => [
                    "valign" => 'baserine',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : baserine" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader char="sample text"',
                "params" => [
                    "char" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader charoff="200.05"',
                "params" => [
                    "charoff" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // callspan OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader callspan="10"',
                "params" => [
                    "callspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader callspan="-10"',
                "params" => [
                    "callspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader rowspan="20"',
                "params" => [
                    "rowspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader rowspan="256.5"',
                "params" => [
                    "rowspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader headers="テスト"',
                "params" => [
                    "headers" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader scope="rowgroup"',
                "params" => [
                    "scope" => 'rowgroup',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader scope="cols"',
                "params" => [
                    "scope" => 'cols',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : cols" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader axis="サンプル テキスト"',
                "params" => [
                    "axis" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader axis=""',
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
                "text" => '#theader nowrap="off"',
                "params" => [
                    "nowrap" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#theader nowrap="of"',
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
                "text" => '#theader style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader dir="lr"',
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
                "text" => '#theader align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader valign="top"',
                "params" => [
                    "valign" => 'top',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader valign="baserine"',
                "params" => [
                    "valign" => 'baserine',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : baserine" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // callspan OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader callspan="20"',
                "params" => [
                    "callspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader callspan="-4086"',
                "params" => [
                    "callspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader rowspan="4086"',
                "params" => [
                    "rowspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader rowspan="-10"',
                "params" => [
                    "rowspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader headers="テスト"',
                "params" => [
                    "headers" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader scope="col"',
                "params" => [
                    "scope" => 'col',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader scope="rowgrup"',
                "params" => [
                    "scope" => 'rowgrup',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : rowgrup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader axis="test"',
                "params" => [
                    "axis" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader width="200"',
                "params" => [
                    "width" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader width="50 %"',
                "params" => [
                    "width" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader height="50%"',
                "params" => [
                    "height" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader height="200.05"',
                "params" => [
                    "height" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader bgcolor="red"',
                "params" => [
                    "bgcolor" => 'red',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader bgcolor="#FG0000"',
                "params" => [
                    "bgcolor" => '#FG0000',    // COLOR
                ],
                "result" => ["[Validate Error] bgcolor : #FG0000" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // -- Custom Attribute
            // nowrap OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader nowrap="on"',
                "params" => [
                    "nowrap" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#theader nowrap="om"',
                "params" => [
                    "nowrap" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] nowrap : om" . PHP_EOL],
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
                "text" => '#theader style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader dir="lr"',
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
                "text" => '#theader align="justify"',
                "params" => [
                    "align" => 'justify',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader align="justfy"',
                "params" => [
                    "align" => 'justfy',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : justfy" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader valign="middle"',
                "params" => [
                    "valign" => 'middle',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader char="sample text"',
                "params" => [
                    "char" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader charoff="200"',
                "params" => [
                    "charoff" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // callspan OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader callspan="10"',
                "params" => [
                    "callspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader callspan="256.5"',
                "params" => [
                    "callspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader rowspan="10"',
                "params" => [
                    "rowspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader rowspan="256.5"',
                "params" => [
                    "rowspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader headers="sample text"',
                "params" => [
                    "headers" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader scope="col"',
                "params" => [
                    "scope" => 'col',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader scope="cols"',
                "params" => [
                    "scope" => 'cols',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : cols" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader axis="test"',
                "params" => [
                    "axis" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader width="200"',
                "params" => [
                    "width" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader width="50 %"',
                "params" => [
                    "width" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader height="200"',
                "params" => [
                    "height" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader height="50 %"',
                "params" => [
                    "height" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader bgcolor="red"',
                "params" => [
                    "bgcolor" => 'red',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader bgcolor="rad"',
                "params" => [
                    "bgcolor" => 'rad',    // COLOR
                ],
                "result" => ["[Validate Error] bgcolor : rad" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // nowrap OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader nowrap="nowrap"',
                "params" => [
                    "nowrap" => 'nowrap',    // /^nowrap$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#theader nowrap="nwrap"',
                "params" => [
                    "nowrap" => 'nwrap',    // /^nowrap$/
                ],
                "result" => ["[Validate Error] nowrap : nwrap" . PHP_EOL],
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
                "text" => '#theader style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader align="justfy"',
                "params" => [
                    "align" => 'justfy',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : justfy" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader char="sample text"',
                "params" => [
                    "char" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // callspan OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader callspan="10"',
                "params" => [
                    "callspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader callspan="-4086"',
                "params" => [
                    "callspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader rowspan="256"',
                "params" => [
                    "rowspan" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader rowspan="-10"',
                "params" => [
                    "rowspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader headers="テスト"',
                "params" => [
                    "headers" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader scope="row"',
                "params" => [
                    "scope" => 'row',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader scope="rows"',
                "params" => [
                    "scope" => 'rows',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : rows" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader axis="テスト"',
                "params" => [
                    "axis" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#theader axis=""',
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
                "text" => '#theader style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader align="chr"',
                "params" => [
                    "align" => 'chr',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : chr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader valign="baseline"',
                "params" => [
                    "valign" => 'baseline',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader valign="midle"',
                "params" => [
                    "valign" => 'midle',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader char="テスト"',
                "params" => [
                    "char" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // callspan OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader callspan="10"',
                "params" => [
                    "callspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader callspan="-10"',
                "params" => [
                    "callspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader rowspan="256"',
                "params" => [
                    "rowspan" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader rowspan="256.5"',
                "params" => [
                    "rowspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader headers="sample text"',
                "params" => [
                    "headers" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader scope="rowgroup"',
                "params" => [
                    "scope" => 'rowgroup',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader scope="cogroup"',
                "params" => [
                    "scope" => 'cogroup',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : cogroup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader axis="test"',
                "params" => [
                    "axis" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader axis=""',
                "params" => [
                    "axis" => '',    // STRING
                ],
                "result" => ["[Validate Error] axis : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader width="200"',
                "params" => [
                    "width" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader width="50 %"',
                "params" => [
                    "width" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader height="200"',
                "params" => [
                    "height" => '200',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader height="200.05"',
                "params" => [
                    "height" => '200.05',    // NC_PCT
                ],
                "result" => ["[Validate Error] height : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader bgcolor="red"',
                "params" => [
                    "bgcolor" => 'red',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader bgcolor="rad"',
                "params" => [
                    "bgcolor" => 'rad',    // COLOR
                ],
                "result" => ["[Validate Error] bgcolor : rad" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // nowrap OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader nowrap="nowrap"',
                "params" => [
                    "nowrap" => 'nowrap',    // /^nowrap$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nowrap",
            ],
            // nowrap NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#theader nowrap="nowap"',
                "params" => [
                    "nowrap" => 'nowap',    // /^nowrap$/
                ],
                "result" => ["[Validate Error] nowrap : nowap" . PHP_EOL],
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
                "text" => '#theader style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader dir="ato"',
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
                "text" => '#theader align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMRJC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_LMRJC
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // valign OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader valign="bottom"',
                "params" => [
                    "valign" => 'bottom',    // SIDE_TMB1BL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // valign NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader valign="too"',
                "params" => [
                    "valign" => 'too',    // SIDE_TMB1BL
                ],
                "result" => ["[Validate Error] valign : too" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valign",
            ],
            // char OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader char="test"',
                "params" => [
                    "char" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // char NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader char=""',
                "params" => [
                    "char" => '',    // STRING
                ],
                "result" => ["[Validate Error] char : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] char",
            ],
            // charoff OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader charoff="50%"',
                "params" => [
                    "charoff" => '50%',    // NC_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // charoff NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader charoff="50 %"',
                "params" => [
                    "charoff" => '50 %',    // NC_PCT
                ],
                "result" => ["[Validate Error] charoff : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charoff",
            ],
            // callspan OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader callspan="4086"',
                "params" => [
                    "callspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader callspan="-10"',
                "params" => [
                    "callspan" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader rowspan="20"',
                "params" => [
                    "rowspan" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader rowspan="20.5"',
                "params" => [
                    "rowspan" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader abbr="test"',
                "params" => [
                    "abbr" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader headers="test"',
                "params" => [
                    "headers" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scope OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader scope="col"',
                "params" => [
                    "scope" => 'col',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // scope NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader scope="cols"',
                "params" => [
                    "scope" => 'cols',    // SCOPE
                ],
                "result" => ["[Validate Error] scope : cols" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scope",
            ],
            // axis OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader axis="サンプル テキスト"',
                "params" => [
                    "axis" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] axis",
            ],
            // axis NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#theader axis=""',
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
                "text" => '#theader style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // callspan OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader callspan="10"',
                "params" => [
                    "callspan" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader callspan="20.5"',
                "params" => [
                    "callspan" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader rowspan="256"',
                "params" => [
                    "rowspan" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader rowspan="256.5"',
                "params" => [
                    "rowspan" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader headers="test"',
                "params" => [
                    "headers" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scoop OK Case
            [
                "dtd" => "HTML5",
                "text" => '#theader scoop="col"',
                "params" => [
                    "scoop" => 'col',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scoop",
            ],
            // scoop NG Case
            [
                "dtd" => "HTML5",
                "text" => '#theader scoop="rows"',
                "params" => [
                    "scoop" => 'rows',    // SCOPE
                ],
                "result" => ["[Validate Error] scoop : rows" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scoop",
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
                "text" => '#theader style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // callspan OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader callspan="4086"',
                "params" => [
                    "callspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // callspan NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader callspan="20.5"',
                "params" => [
                    "callspan" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] callspan : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] callspan",
            ],
            // rowspan OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader rowspan="4086"',
                "params" => [
                    "rowspan" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // rowspan NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader rowspan="-4086"',
                "params" => [
                    "rowspan" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] rowspan : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rowspan",
            ],
            // abbr OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader abbr="サンプル テキスト"',
                "params" => [
                    "abbr" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // abbr NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader abbr=""',
                "params" => [
                    "abbr" => '',    // STRING
                ],
                "result" => ["[Validate Error] abbr : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] abbr",
            ],
            // headers OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader headers="test"',
                "params" => [
                    "headers" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // headers NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader headers=""',
                "params" => [
                    "headers" => '',    // STRING
                ],
                "result" => ["[Validate Error] headers : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] headers",
            ],
            // scoop OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader scoop="row"',
                "params" => [
                    "scoop" => 'row',    // SCOPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scoop",
            ],
            // scoop NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#theader scoop="cogroup"',
                "params" => [
                    "scoop" => 'cogroup',    // SCOPE
                ],
                "result" => ["[Validate Error] scoop : cogroup" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scoop",
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
