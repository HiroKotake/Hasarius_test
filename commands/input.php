<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandInput extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input type="reset"',
                "params" => [
                    "type" => 'reset',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input type="sabumit"',
                "params" => [
                    "type" => 'sabumit',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : sabumit" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input value="test"',
                "params" => [
                    "value" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // size OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input size="10"',
                "params" => [
                    "size" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input size="16.5"',
                "params" => [
                    "size" => '16.5',    // US_NZ
                ],
                "result" => ["[Validate Error] size : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // maxlength OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input maxlength="20"',
                "params" => [
                    "maxlength" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input maxlength="0"',
                "params" => [
                    "maxlength" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // src OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input alt="テスト"',
                "params" => [
                    "alt" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input align="bottom"',
                "params" => [
                    "align" => 'bottom',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input align="lift"',
                "params" => [
                    "align" => 'lift',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : lift" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // -- Custom Attribute
            // checked OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input checked="off"',
                "params" => [
                    "checked" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input checked="om"',
                "params" => [
                    "checked" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] checked : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // ismap OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input ismap="off"',
                "params" => [
                    "ismap" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input ismap="of"',
                "params" => [
                    "ismap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input readonly="off"',
                "params" => [
                    "readonly" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#input readonly="of"',
                "params" => [
                    "readonly" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : of" . PHP_EOL],
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
                "text" => '#input style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input type="button"',
                "params" => [
                    "type" => 'button',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input type="redio"',
                "params" => [
                    "type" => 'redio',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : redio" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input value="sample text"',
                "params" => [
                    "value" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // size OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input size="4086"',
                "params" => [
                    "size" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input size="0"',
                "params" => [
                    "size" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] size : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // maxlength OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input maxlength="256"',
                "params" => [
                    "maxlength" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input maxlength="0"',
                "params" => [
                    "maxlength" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // src OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input alt="sample text"',
                "params" => [
                    "alt" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // -- Custom Attribute
            // checked OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input checked="off"',
                "params" => [
                    "checked" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input checked="of"',
                "params" => [
                    "checked" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] checked : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input disabled="off"',
                "params" => [
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // ismap OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input ismap="on"',
                "params" => [
                    "ismap" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input ismap="of"',
                "params" => [
                    "ismap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input readonly="on"',
                "params" => [
                    "readonly" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#input readonly="of"',
                "params" => [
                    "readonly" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : of" . PHP_EOL],
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
                "text" => '#input style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input type="checkbox"',
                "params" => [
                    "type" => 'checkbox',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input type="redio"',
                "params" => [
                    "type" => 'redio',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : redio" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // size OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input size="256"',
                "params" => [
                    "size" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input size="16.5"',
                "params" => [
                    "size" => '16.5',    // US_NZ
                ],
                "result" => ["[Validate Error] size : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // maxlength OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input maxlength="10"',
                "params" => [
                    "maxlength" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input maxlength="16.5"',
                "params" => [
                    "maxlength" => '16.5',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // src OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input alt="サンプル テキスト"',
                "params" => [
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input align="tap"',
                "params" => [
                    "align" => 'tap',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : tap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // -- Custom Attribute
            // checked OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input checked="on"',
                "params" => [
                    "checked" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input checked="of"',
                "params" => [
                    "checked" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] checked : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disabled OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input disabled="of"',
                "params" => [
                    "disabled" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // ismap OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input ismap="off"',
                "params" => [
                    "ismap" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input ismap="om"',
                "params" => [
                    "ismap" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // readonly OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input readonly="off"',
                "params" => [
                    "readonly" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#input readonly="om"',
                "params" => [
                    "readonly" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] readonly : om" . PHP_EOL],
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
                "text" => '#input style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // accept OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input accept="application/pdf"',
                "params" => [
                    "accept" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input accept="imag/jpeg"',
                "params" => [
                    "accept" => 'imag/jpeg',    // MIME
                ],
                "result" => ["[Validate Error] accept : imag/jpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input type="file"',
                "params" => [
                    "type" => 'file',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input type="redio"',
                "params" => [
                    "type" => 'redio',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : redio" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input value="sample text"',
                "params" => [
                    "value" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // size OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input size="20"',
                "params" => [
                    "size" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input size="16.5"',
                "params" => [
                    "size" => '16.5',    // US_NZ
                ],
                "result" => ["[Validate Error] size : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // maxlength OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input maxlength="4086"',
                "params" => [
                    "maxlength" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input maxlength="16.5"',
                "params" => [
                    "maxlength" => '16.5',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // src OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input alt="サンプル テキスト"',
                "params" => [
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input align="bottom"',
                "params" => [
                    "align" => 'bottom',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input align="tap"',
                "params" => [
                    "align" => 'tap',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : tap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // checked OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input checked="checked"',
                "params" => [
                    "checked" => 'checked',    // /^checked$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input checked="checkd"',
                "params" => [
                    "checked" => 'checkd',    // /^checked$/i
                ],
                "result" => ["[Validate Error] checked : checkd" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input disabled="diabled"',
                "params" => [
                    "disabled" => 'diabled',    // /^disabled$/i
                ],
                "result" => ["[Validate Error] disabled : diabled" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input ismap="ismap"',
                "params" => [
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input ismap="ismp"',
                "params" => [
                    "ismap" => 'ismp',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : ismp" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#input readonly="readnly"',
                "params" => [
                    "readonly" => 'readnly',    // /^readonly$/i
                ],
                "result" => ["[Validate Error] readonly : readnly" . PHP_EOL],
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
                "text" => '#input style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // accept OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input accept="text/plain"',
                "params" => [
                    "accept" => 'text/plain',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input accept="vide/mpeg"',
                "params" => [
                    "accept" => 'vide/mpeg',    // MIME
                ],
                "result" => ["[Validate Error] accept : vide/mpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input type="datetime-local"',
                "params" => [
                    "type" => 'datetime-local',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input type="redio"',
                "params" => [
                    "type" => 'redio',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : redio" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input value="サンプル テキスト"',
                "params" => [
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // size OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input size="256"',
                "params" => [
                    "size" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input size="0"',
                "params" => [
                    "size" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] size : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // maxlength OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input maxlength="10"',
                "params" => [
                    "maxlength" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input maxlength="0"',
                "params" => [
                    "maxlength" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // src OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input alt="サンプル テキスト"',
                "params" => [
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // checked OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input checked="checked"',
                "params" => [
                    "checked" => 'checked',    // /^checked$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input checked="checkd"',
                "params" => [
                    "checked" => 'checkd',    // /^checked$/i
                ],
                "result" => ["[Validate Error] checked : checkd" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input disabled="dsabled"',
                "params" => [
                    "disabled" => 'dsabled',    // /^disabled$/i
                ],
                "result" => ["[Validate Error] disabled : dsabled" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input ismap="ismap"',
                "params" => [
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input ismap="isnap"',
                "params" => [
                    "ismap" => 'isnap',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : isnap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#input readonly="redonly"',
                "params" => [
                    "readonly" => 'redonly',    // /^readonly$/i
                ],
                "result" => ["[Validate Error] readonly : redonly" . PHP_EOL],
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
                "text" => '#input style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // accept OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input accept="text/plain"',
                "params" => [
                    "accept" => 'text/plain',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input accept="aplication/pdf"',
                "params" => [
                    "accept" => 'aplication/pdf',    // MIME
                ],
                "result" => ["[Validate Error] accept : aplication/pdf" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input type="button"',
                "params" => [
                    "type" => 'button',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input type="taxt"',
                "params" => [
                    "type" => 'taxt',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : taxt" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // size OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input size="10"',
                "params" => [
                    "size" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input size="0"',
                "params" => [
                    "size" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] size : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // maxlength OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input maxlength="256"',
                "params" => [
                    "maxlength" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input maxlength="0"',
                "params" => [
                    "maxlength" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // src OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input alt="test"',
                "params" => [
                    "alt" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input align="bottom"',
                "params" => [
                    "align" => 'bottom',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // checked OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input checked="checked"',
                "params" => [
                    "checked" => 'checked',    // /^checked$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input checked="check"',
                "params" => [
                    "checked" => 'check',    // /^checked$/i
                ],
                "result" => ["[Validate Error] checked : check" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input disabled="disable"',
                "params" => [
                    "disabled" => 'disable',    // /^disabled$/i
                ],
                "result" => ["[Validate Error] disabled : disable" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input ismap="ismap"',
                "params" => [
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input ismap="ifmap"',
                "params" => [
                    "ismap" => 'ifmap',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : ifmap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#input readonly="readonl"',
                "params" => [
                    "readonly" => 'readonl',    // /^readonly$/i
                ],
                "result" => ["[Validate Error] readonly : readonl" . PHP_EOL],
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
                "text" => '#input style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // accept OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input accept="video/mpeg"',
                "params" => [
                    "accept" => 'video/mpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input accept="text/plin"',
                "params" => [
                    "accept" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] accept : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input type="file"',
                "params" => [
                    "type" => 'file',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input type="sabumit"',
                "params" => [
                    "type" => 'sabumit',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : sabumit" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input value="サンプル テキスト"',
                "params" => [
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // size OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input size="4086"',
                "params" => [
                    "size" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input size="0"',
                "params" => [
                    "size" => '0',    // US_NZ
                ],
                "result" => ["[Validate Error] size : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // maxlength OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input maxlength="256"',
                "params" => [
                    "maxlength" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // maxlength NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input maxlength="16.5"',
                "params" => [
                    "maxlength" => '16.5',    // US_NZ
                ],
                "result" => ["[Validate Error] maxlength : 16.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] maxlength",
            ],
            // src OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input alt="test"',
                "params" => [
                    "alt" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // checked OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input checked="checked"',
                "params" => [
                    "checked" => 'checked',    // /^checked$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input checked="check"',
                "params" => [
                    "checked" => 'check',    // /^checked$/i
                ],
                "result" => ["[Validate Error] checked : check" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disabled OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input disabled="disabled"',
                "params" => [
                    "disabled" => 'disabled',    // /^disabled$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input disabled="disable"',
                "params" => [
                    "disabled" => 'disable',    // /^disabled$/i
                ],
                "result" => ["[Validate Error] disabled : disable" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input ismap="ismap"',
                "params" => [
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input ismap="imap"',
                "params" => [
                    "ismap" => 'imap',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : imap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // readonly OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input readonly="readonly"',
                "params" => [
                    "readonly" => 'readonly',    // /^readonly$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] readonly",
            ],
            // readonly NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#input readonly="raedmap"',
                "params" => [
                    "readonly" => 'raedmap',    // /^readonly$/i
                ],
                "result" => ["[Validate Error] readonly : raedmap" . PHP_EOL],
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
                "text" => '#input style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input type="week"',
                "params" => [
                    "type" => 'week',    // INPUT_TYPE
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input type="redio"',
                "params" => [
                    "type" => 'redio',    // INPUT_TYPE
                ],
                "result" => ["[Validate Error] type : redio" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // form OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input form="test"',
                "params" => [
                    "form" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input form=""',
                "params" => [
                    "form" => '',    // STRING
                ],
                "result" => ["[Validate Error] form : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input disabled="on"',
                "params" => [
                    "disabled" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // autofocus OK Case
            [
                "dtd" => "HTML5",
                "text" => '#input autofocus="off"',
                "params" => [
                    "autofocus" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // autofocus NG Case
            [
                "dtd" => "HTML5",
                "text" => '#input autofocus="of"',
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
                "text" => '#input style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute
            // disabled OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input disabled="off"',
                "params" => [
                    "disabled" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // disabled NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input disabled="om"',
                "params" => [
                    "disabled" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] disabled : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disabled",
            ],
            // autofocus OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input autofocus="on"',
                "params" => [
                    "autofocus" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autofocus",
            ],
            // autofocus NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#input autofocus="of"',
                "params" => [
                    "autofocus" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] autofocus : of" . PHP_EOL],
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
