<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandObject extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object data="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object type="application/pdf"',
                "params" => [
                    "type" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object type="text/plin"',
                "params" => [
                    "type" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] type : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // classid OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object classid="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // classid NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object classid="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] classid : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // codetype OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object codetype="application/pdf"',
                "params" => [
                    "codetype" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // codetype NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object codetype="aplication/pdf"',
                "params" => [
                    "codetype" => 'aplication/pdf',    // MIME
                ],
                "result" => ["[Validate Error] codetype : aplication/pdf" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // archive OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object archive="../script/sample.js"',
                "params" => [
                    "archive" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // archive NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object archive="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "archive" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] archive : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // codebase OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object codebase="../script/sample.js"',
                "params" => [
                    "codebase" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // codebase NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object codebase="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] codebase : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object height="50%"',
                "params" => [
                    "height" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // standby OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object standby="test"',
                "params" => [
                    "standby" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // standby NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object standby=""',
                "params" => [
                    "standby" => '',    // STRING
                ],
                "result" => ["[Validate Error] standby : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object align="bottom"',
                "params" => [
                    "align" => 'bottom',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object align="lift"',
                "params" => [
                    "align" => 'lift',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : lift" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object border="-20"',
                "params" => [
                    "border" => '-20',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object border="-20.5"',
                "params" => [
                    "border" => '-20.5',    // NC
                ],
                "result" => ["[Validate Error] border : -20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object hspace="10"',
                "params" => [
                    "hspace" => '10',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object hspace="10.5"',
                "params" => [
                    "hspace" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] hspace : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object vspace="4086"',
                "params" => [
                    "vspace" => '4086',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object vspace="10.5"',
                "params" => [
                    "vspace" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] vspace : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // -- Custom Attribute
            // declare OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object declare="off"',
                "params" => [
                    "declare" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] declare",
            ],
            // declare NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#object declare="om"',
                "params" => [
                    "declare" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] declare : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] declare",
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
                "text" => '#object style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object data="../script/sample.js"',
                "params" => [
                    "data" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object type="text/plain"',
                "params" => [
                    "type" => 'text/plain',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object type="vide/mpeg"',
                "params" => [
                    "type" => 'vide/mpeg',    // MIME
                ],
                "result" => ["[Validate Error] type : vide/mpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // classid OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object classid="../script/sample.js"',
                "params" => [
                    "classid" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // classid NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object classid="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] classid : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // codetype OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object codetype="text/plain"',
                "params" => [
                    "codetype" => 'text/plain',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // codetype NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object codetype="img/png"',
                "params" => [
                    "codetype" => 'img/png',    // MIME
                ],
                "result" => ["[Validate Error] codetype : img/png" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // archive OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object archive="../script/sample.js"',
                "params" => [
                    "archive" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // archive NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object archive="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "archive" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] archive : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // codebase OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object codebase="../script/sample.js"',
                "params" => [
                    "codebase" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // codebase NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object codebase="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] codebase : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object height="50%"',
                "params" => [
                    "height" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // standby OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object standby="テスト"',
                "params" => [
                    "standby" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // standby NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object standby=""',
                "params" => [
                    "standby" => '',    // STRING
                ],
                "result" => ["[Validate Error] standby : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // -- Custom Attribute
            // declare OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object declare="on"',
                "params" => [
                    "declare" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] declare",
            ],
            // declare NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#object declare="of"',
                "params" => [
                    "declare" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] declare : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] declare",
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
                "text" => '#object style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object data="../script/sample.js"',
                "params" => [
                    "data" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object type="image/jpeg"',
                "params" => [
                    "type" => 'image/jpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object type="imag/jpeg"',
                "params" => [
                    "type" => 'imag/jpeg',    // MIME
                ],
                "result" => ["[Validate Error] type : imag/jpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // classid OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object classid="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // classid NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object classid="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] classid : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // codetype OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object codetype="application/pdf"',
                "params" => [
                    "codetype" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // codetype NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object codetype="vide/mpeg"',
                "params" => [
                    "codetype" => 'vide/mpeg',    // MIME
                ],
                "result" => ["[Validate Error] codetype : vide/mpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // archive OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object archive="../script/sample.js"',
                "params" => [
                    "archive" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // archive NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object archive="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "archive" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] archive : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // codebase OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object codebase="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // codebase NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object codebase="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] codebase : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object height="50%"',
                "params" => [
                    "height" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // standby OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object standby="サンプル テキスト"',
                "params" => [
                    "standby" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // standby NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object standby=""',
                "params" => [
                    "standby" => '',    // STRING
                ],
                "result" => ["[Validate Error] standby : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object align="lift"',
                "params" => [
                    "align" => 'lift',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : lift" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object border="-20"',
                "params" => [
                    "border" => '-20',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object border="10.5"',
                "params" => [
                    "border" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] border : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object hspace="256"',
                "params" => [
                    "hspace" => '256',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object hspace="10.5"',
                "params" => [
                    "hspace" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] hspace : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object vspace="-20"',
                "params" => [
                    "vspace" => '-20',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object vspace="-20.5"',
                "params" => [
                    "vspace" => '-20.5',    // NC
                ],
                "result" => ["[Validate Error] vspace : -20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // -- Custom Attribute
            // declare OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object declare="off"',
                "params" => [
                    "declare" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] declare",
            ],
            // declare NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#object declare="om"',
                "params" => [
                    "declare" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] declare : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] declare",
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
                "text" => '#object style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object data="../script/sample.js"',
                "params" => [
                    "data" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object type="image/png"',
                "params" => [
                    "type" => 'image/png',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object type="text/plin"',
                "params" => [
                    "type" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] type : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // classid OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object classid="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // classid NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object classid="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] classid : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // codetype OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object codetype="image/png"',
                "params" => [
                    "codetype" => 'image/png',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // codetype NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object codetype="text/plin"',
                "params" => [
                    "codetype" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] codetype : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // archive OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object archive="../script/sample.js"',
                "params" => [
                    "archive" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // archive NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object archive="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "archive" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] archive : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // codebase OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object codebase="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // codebase NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object codebase="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] codebase : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // standby OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object standby="サンプル テキスト"',
                "params" => [
                    "standby" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // standby NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object standby=""',
                "params" => [
                    "standby" => '',    // STRING
                ],
                "result" => ["[Validate Error] standby : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object align="tap"',
                "params" => [
                    "align" => 'tap',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : tap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object border="256"',
                "params" => [
                    "border" => '256',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object border="10.5"',
                "params" => [
                    "border" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] border : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object hspace="256"',
                "params" => [
                    "hspace" => '256',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object hspace="10.5"',
                "params" => [
                    "hspace" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] hspace : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object vspace="10"',
                "params" => [
                    "vspace" => '10',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object vspace="10.5"',
                "params" => [
                    "vspace" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] vspace : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // declare OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object declare="declare"',
                "params" => [
                    "declare" => 'declare',    // /^declare$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] declare",
            ],
            // declare NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#object declare="declear"',
                "params" => [
                    "declare" => 'declear',    // /^declare$/
                ],
                "result" => ["[Validate Error] declare : declear" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] declare",
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
                "text" => '#object style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object data="../script/sample.js"',
                "params" => [
                    "data" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object type="video/mpeg"',
                "params" => [
                    "type" => 'video/mpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object type="imag/jpeg"',
                "params" => [
                    "type" => 'imag/jpeg',    // MIME
                ],
                "result" => ["[Validate Error] type : imag/jpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // classid OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object classid="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // classid NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object classid="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] classid : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // codetype OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object codetype="video/mpeg"',
                "params" => [
                    "codetype" => 'video/mpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // codetype NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object codetype="vide/mpeg"',
                "params" => [
                    "codetype" => 'vide/mpeg',    // MIME
                ],
                "result" => ["[Validate Error] codetype : vide/mpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // archive OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object archive="../script/sample.js"',
                "params" => [
                    "archive" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // archive NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object archive="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "archive" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] archive : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // codebase OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object codebase="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // codebase NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object codebase="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] codebase : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object height="200.05"',
                "params" => [
                    "height" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // standby OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object standby="テスト"',
                "params" => [
                    "standby" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // standby NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object standby=""',
                "params" => [
                    "standby" => '',    // STRING
                ],
                "result" => ["[Validate Error] standby : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // declare OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object declare="declare"',
                "params" => [
                    "declare" => 'declare',    // /^declare$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] declare",
            ],
            // declare NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#object declare="declear"',
                "params" => [
                    "declare" => 'declear',    // /^declare$/
                ],
                "result" => ["[Validate Error] declare : declear" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] declare",
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
                "text" => '#object style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object data="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object type="application/pdf"',
                "params" => [
                    "type" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object type="text/plin"',
                "params" => [
                    "type" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] type : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // classid OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object classid="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // classid NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object classid="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] classid : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // codetype OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object codetype="text/plain"',
                "params" => [
                    "codetype" => 'text/plain',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // codetype NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object codetype="text/plin"',
                "params" => [
                    "codetype" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] codetype : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // archive OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object archive="../script/sample.js"',
                "params" => [
                    "archive" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // archive NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object archive="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "archive" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] archive : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // codebase OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object codebase="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // codebase NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object codebase="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] codebase : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object height="50%"',
                "params" => [
                    "height" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object height="200.05"',
                "params" => [
                    "height" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // standby OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object standby="test"',
                "params" => [
                    "standby" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // standby NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object standby=""',
                "params" => [
                    "standby" => '',    // STRING
                ],
                "result" => ["[Validate Error] standby : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object align="midle"',
                "params" => [
                    "align" => 'midle',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : midle" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object border="10"',
                "params" => [
                    "border" => '10',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object border="-20.5"',
                "params" => [
                    "border" => '-20.5',    // NC
                ],
                "result" => ["[Validate Error] border : -20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object hspace="10"',
                "params" => [
                    "hspace" => '10',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object hspace="10.5"',
                "params" => [
                    "hspace" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] hspace : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object vspace="4086"',
                "params" => [
                    "vspace" => '4086',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object vspace="-20.5"',
                "params" => [
                    "vspace" => '-20.5',    // NC
                ],
                "result" => ["[Validate Error] vspace : -20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // declare OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object declare="declare"',
                "params" => [
                    "declare" => 'declare',    // /^declare$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] declare",
            ],
            // declare NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#object declare="declear"',
                "params" => [
                    "declare" => 'declear',    // /^declare$/
                ],
                "result" => ["[Validate Error] declare : declear" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] declare",
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
                "text" => '#object style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object data="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object type="image/png"',
                "params" => [
                    "type" => 'image/png',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object type="text/plin"',
                "params" => [
                    "type" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] type : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // classid OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object classid="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // classid NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object classid="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "classid" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] classid : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] classid",
            ],
            // codetype OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object codetype="video/mpeg"',
                "params" => [
                    "codetype" => 'video/mpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // codetype NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object codetype="text/plin"',
                "params" => [
                    "codetype" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] codetype : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codetype",
            ],
            // archive OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object archive="../script/sample.js"',
                "params" => [
                    "archive" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // archive NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object archive="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "archive" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] archive : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] archive",
            ],
            // codebase OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object codebase="../script/sample.js"',
                "params" => [
                    "codebase" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // codebase NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object codebase="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "codebase" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] codebase : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] codebase",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // standby OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object standby="サンプル テキスト"',
                "params" => [
                    "standby" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // standby NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object standby=""',
                "params" => [
                    "standby" => '',    // STRING
                ],
                "result" => ["[Validate Error] standby : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] standby",
            ],
            // declare OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object declare="declare"',
                "params" => [
                    "declare" => 'declare',    // /^declare$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] declare",
            ],
            // declare NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#object declare="declear"',
                "params" => [
                    "declare" => 'declear',    // /^declare$/
                ],
                "result" => ["[Validate Error] declare : declear" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] declare",
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
                "text" => '#object style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object data="../script/sample.js"',
                "params" => [
                    "data" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object type="text/plain"',
                "params" => [
                    "type" => 'text/plain',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object type="text/plin"',
                "params" => [
                    "type" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] type : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // width OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object usemap="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // form OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object form="サンプル テキスト"',
                "params" => [
                    "form" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object form=""',
                "params" => [
                    "form" => '',    // STRING
                ],
                "result" => ["[Validate Error] form : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // -- Custom Attribute
            // typemustmatch OK Case
            [
                "dtd" => "HTML5",
                "text" => '#object typemustmatch="off"',
                "params" => [
                    "typemustmatch" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] typemustmatch",
            ],
            // typemustmatch NG Case
            [
                "dtd" => "HTML5",
                "text" => '#object typemustmatch="of"',
                "params" => [
                    "typemustmatch" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] typemustmatch : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] typemustmatch",
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
                "text" => '#object style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // data OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object data="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // data NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object data="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "data" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] data : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] data",
            ],
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object type="application/pdf"',
                "params" => [
                    "type" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object type="text/plin"',
                "params" => [
                    "type" => 'text/plin',    // MIME
                ],
                "result" => ["[Validate Error] type : text/plin" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // width OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => ["[Validate Error] width : 200.05" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object height="50%"',
                "params" => [
                    "height" => '50%',    // NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object usemap="../script/sample.js"',
                "params" => [
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object usemap="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // form OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object form="サンプル テキスト"',
                "params" => [
                    "form" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object form=""',
                "params" => [
                    "form" => '',    // STRING
                ],
                "result" => ["[Validate Error] form : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // -- Custom Attribute
            // typemustmatch OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object typemustmatch="on"',
                "params" => [
                    "typemustmatch" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] typemustmatch",
            ],
            // typemustmatch NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#object typemustmatch="of"',
                "params" => [
                    "typemustmatch" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] typemustmatch : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] typemustmatch",
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
