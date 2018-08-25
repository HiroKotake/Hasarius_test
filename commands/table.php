<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandTable extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // summary OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table summary="sample text"',
                "params" => [
                    "summary" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // summary NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table summary=""',
                "params" => [
                    "summary" => '',    // STRING
                ],
                "result" => "[Validate Error] summary : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table border="10"',
                "params" => [
                    "border" => '10',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table border="-20.5"',
                "params" => [
                    "border" => '-20.5',    // NC
                ],
                "result" => "[Validate Error] border : -20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // frame OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table frame="vsides"',
                "params" => [
                    "frame" => 'vsides',    // LINE_FRAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // frame NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table frame="vid"',
                "params" => [
                    "frame" => 'vid',    // LINE_FRAME
                ],
                "result" => "[Validate Error] frame : vid" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // rules OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table rules="groups"',
                "params" => [
                    "rules" => 'groups',    // LINE_RULES
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // rules NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table rules="group"',
                "params" => [
                    "rules" => 'group',    // LINE_RULES
                ],
                "result" => "[Validate Error] rules : group" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // cellspacing OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table cellspacing="50%"',
                "params" => [
                    "cellspacing" => '50%',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellspacing NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table cellspacing="50 %"',
                "params" => [
                    "cellspacing" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellspacing : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellpadding OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table cellpadding="200"',
                "params" => [
                    "cellpadding" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // cellpadding NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table cellpadding="50 %"',
                "params" => [
                    "cellpadding" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellpadding : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_LMR
                ],
                "result" => "[Validate Error] align : light" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table bgcolor="yellow"',
                "params" => [
                    "bgcolor" => 'yellow',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#table bgcolor="#FG0000"',
                "params" => [
                    "bgcolor" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // -- Custom Attribute

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
                "text" => '#table style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // summary OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table summary="サンプル テキスト"',
                "params" => [
                    "summary" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // summary NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table summary=""',
                "params" => [
                    "summary" => '',    // STRING
                ],
                "result" => "[Validate Error] summary : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table border="256"',
                "params" => [
                    "border" => '256',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table border="-20.5"',
                "params" => [
                    "border" => '-20.5',    // NC
                ],
                "result" => "[Validate Error] border : -20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // frame OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table frame="hsides"',
                "params" => [
                    "frame" => 'hsides',    // LINE_FRAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // frame NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table frame="hsids"',
                "params" => [
                    "frame" => 'hsids',    // LINE_FRAME
                ],
                "result" => "[Validate Error] frame : hsids" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // rules OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table rules="all"',
                "params" => [
                    "rules" => 'all',    // LINE_RULES
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // rules NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table rules="col"',
                "params" => [
                    "rules" => 'col',    // LINE_RULES
                ],
                "result" => "[Validate Error] rules : col" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // cellspacing OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table cellspacing="200"',
                "params" => [
                    "cellspacing" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellspacing NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table cellspacing="200.05"',
                "params" => [
                    "cellspacing" => '200.05',    // NC_PCT
                ],
                "result" => "[Validate Error] cellspacing : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellpadding OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table cellpadding="200"',
                "params" => [
                    "cellpadding" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // cellpadding NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table cellpadding="50 %"',
                "params" => [
                    "cellpadding" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellpadding : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_LMR
                ],
                "result" => "[Validate Error] align : light" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table bgcolor="#FF7F00"',
                "params" => [
                    "bgcolor" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#table bgcolor="yellaw"',
                "params" => [
                    "bgcolor" => 'yellaw',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : yellaw" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // -- Custom Attribute

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
                "text" => '#table style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // summary OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table summary="test"',
                "params" => [
                    "summary" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // summary NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table summary=""',
                "params" => [
                    "summary" => '',    // STRING
                ],
                "result" => "[Validate Error] summary : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table border="-20"',
                "params" => [
                    "border" => '-20',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table border="-20.5"',
                "params" => [
                    "border" => '-20.5',    // NC
                ],
                "result" => "[Validate Error] border : -20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // frame OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table frame="below"',
                "params" => [
                    "frame" => 'below',    // LINE_FRAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // frame NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table frame="boies"',
                "params" => [
                    "frame" => 'boies',    // LINE_FRAME
                ],
                "result" => "[Validate Error] frame : boies" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // rules OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table rules="groups"',
                "params" => [
                    "rules" => 'groups',    // LINE_RULES
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // rules NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table rules="group"',
                "params" => [
                    "rules" => 'group',    // LINE_RULES
                ],
                "result" => "[Validate Error] rules : group" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // cellspacing OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table cellspacing="50%"',
                "params" => [
                    "cellspacing" => '50%',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellspacing NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table cellspacing="200.05"',
                "params" => [
                    "cellspacing" => '200.05',    // NC_PCT
                ],
                "result" => "[Validate Error] cellspacing : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellpadding OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table cellpadding="200"',
                "params" => [
                    "cellpadding" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // cellpadding NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table cellpadding="200.05"',
                "params" => [
                    "cellpadding" => '200.05',    // NC_PCT
                ],
                "result" => "[Validate Error] cellpadding : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table align="lift"',
                "params" => [
                    "align" => 'lift',    // SIDE_LMR
                ],
                "result" => "[Validate Error] align : lift" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table bgcolor="#FF0000"',
                "params" => [
                    "bgcolor" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#table bgcolor="#FG0000"',
                "params" => [
                    "bgcolor" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // -- Custom Attribute

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
                "text" => '#table style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // summary OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table summary="テスト"',
                "params" => [
                    "summary" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // summary NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table summary=""',
                "params" => [
                    "summary" => '',    // STRING
                ],
                "result" => "[Validate Error] summary : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table border="4086"',
                "params" => [
                    "border" => '4086',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table border="-20.5"',
                "params" => [
                    "border" => '-20.5',    // NC
                ],
                "result" => "[Validate Error] border : -20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // frame OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table frame="border"',
                "params" => [
                    "frame" => 'border',    // LINE_FRAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // frame NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table frame="abov"',
                "params" => [
                    "frame" => 'abov',    // LINE_FRAME
                ],
                "result" => "[Validate Error] frame : abov" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // rules OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table rules="all"',
                "params" => [
                    "rules" => 'all',    // LINE_RULES
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // rules NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table rules="group"',
                "params" => [
                    "rules" => 'group',    // LINE_RULES
                ],
                "result" => "[Validate Error] rules : group" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // cellspacing OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table cellspacing="200"',
                "params" => [
                    "cellspacing" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellspacing NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table cellspacing="50 %"',
                "params" => [
                    "cellspacing" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellspacing : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellpadding OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table cellpadding="50%"',
                "params" => [
                    "cellpadding" => '50%',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // cellpadding NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table cellpadding="50 %"',
                "params" => [
                    "cellpadding" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellpadding : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table align="middle"',
                "params" => [
                    "align" => 'middle',    // SIDE_LMR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table align="bttom"',
                "params" => [
                    "align" => 'bttom',    // SIDE_LMR
                ],
                "result" => "[Validate Error] align : bttom" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table bgcolor="#FF7F00"',
                "params" => [
                    "bgcolor" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#table bgcolor="#FF7F0"',
                "params" => [
                    "bgcolor" => '#FF7F0',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : #FF7F0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
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
                "text" => '#table style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // summary OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table summary="テスト"',
                "params" => [
                    "summary" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // summary NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table summary=""',
                "params" => [
                    "summary" => '',    // STRING
                ],
                "result" => "[Validate Error] summary : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table border="-20"',
                "params" => [
                    "border" => '-20',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table border="10.5"',
                "params" => [
                    "border" => '10.5',    // NC
                ],
                "result" => "[Validate Error] border : 10.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // frame OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table frame="void"',
                "params" => [
                    "frame" => 'void',    // LINE_FRAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // frame NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table frame="vsids"',
                "params" => [
                    "frame" => 'vsids',    // LINE_FRAME
                ],
                "result" => "[Validate Error] frame : vsids" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // rules OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table rules="rows"',
                "params" => [
                    "rules" => 'rows',    // LINE_RULES
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // rules NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table rules="row"',
                "params" => [
                    "rules" => 'row',    // LINE_RULES
                ],
                "result" => "[Validate Error] rules : row" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // cellspacing OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table cellspacing="200"',
                "params" => [
                    "cellspacing" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellspacing NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table cellspacing="200.05"',
                "params" => [
                    "cellspacing" => '200.05',    // NC_PCT
                ],
                "result" => "[Validate Error] cellspacing : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellpadding OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table cellpadding="50%"',
                "params" => [
                    "cellpadding" => '50%',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // cellpadding NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#table cellpadding="50 %"',
                "params" => [
                    "cellpadding" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellpadding : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellpadding",
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
                "text" => '#table style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // summary OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table summary="サンプル テキスト"',
                "params" => [
                    "summary" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // summary NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table summary=""',
                "params" => [
                    "summary" => '',    // STRING
                ],
                "result" => "[Validate Error] summary : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table border="-20"',
                "params" => [
                    "border" => '-20',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table border="10.5"',
                "params" => [
                    "border" => '10.5',    // NC
                ],
                "result" => "[Validate Error] border : 10.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // frame OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table frame="border"',
                "params" => [
                    "frame" => 'border',    // LINE_FRAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // frame NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table frame="hsids"',
                "params" => [
                    "frame" => 'hsids',    // LINE_FRAME
                ],
                "result" => "[Validate Error] frame : hsids" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // rules OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table rules="none"',
                "params" => [
                    "rules" => 'none',    // LINE_RULES
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // rules NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table rules="group"',
                "params" => [
                    "rules" => 'group',    // LINE_RULES
                ],
                "result" => "[Validate Error] rules : group" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // cellspacing OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table cellspacing="200"',
                "params" => [
                    "cellspacing" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellspacing NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table cellspacing="50 %"',
                "params" => [
                    "cellspacing" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellspacing : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellpadding OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table cellpadding="50%"',
                "params" => [
                    "cellpadding" => '50%',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // cellpadding NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table cellpadding="200.05"',
                "params" => [
                    "cellpadding" => '200.05',    // NC_PCT
                ],
                "result" => "[Validate Error] cellpadding : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_LMR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table align="midle"',
                "params" => [
                    "align" => 'midle',    // SIDE_LMR
                ],
                "result" => "[Validate Error] align : midle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table bgcolor="#00FF10"',
                "params" => [
                    "bgcolor" => '#00FF10',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#table bgcolor="#FF7F0"',
                "params" => [
                    "bgcolor" => '#FF7F0',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : #FF7F0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
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
                "text" => '#table style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // summary OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table summary="テスト"',
                "params" => [
                    "summary" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // summary NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table summary=""',
                "params" => [
                    "summary" => '',    // STRING
                ],
                "result" => "[Validate Error] summary : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] summary",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table border="4086"',
                "params" => [
                    "border" => '4086',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table border="-20.5"',
                "params" => [
                    "border" => '-20.5',    // NC
                ],
                "result" => "[Validate Error] border : -20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // frame OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table frame="border"',
                "params" => [
                    "frame" => 'border',    // LINE_FRAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // frame NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table frame="ls"',
                "params" => [
                    "frame" => 'ls',    // LINE_FRAME
                ],
                "result" => "[Validate Error] frame : ls" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frame",
            ],
            // rules OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table rules="none"',
                "params" => [
                    "rules" => 'none',    // LINE_RULES
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // rules NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table rules="group"',
                "params" => [
                    "rules" => 'group',    // LINE_RULES
                ],
                "result" => "[Validate Error] rules : group" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rules",
            ],
            // cellspacing OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table cellspacing="200"',
                "params" => [
                    "cellspacing" => '200',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellspacing NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table cellspacing="200.05"',
                "params" => [
                    "cellspacing" => '200.05',    // NC_PCT
                ],
                "result" => "[Validate Error] cellspacing : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellspacing",
            ],
            // cellpadding OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table cellpadding="50%"',
                "params" => [
                    "cellpadding" => '50%',    // NC_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cellpadding",
            ],
            // cellpadding NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#table cellpadding="50 %"',
                "params" => [
                    "cellpadding" => '50 %',    // NC_PCT
                ],
                "result" => "[Validate Error] cellpadding : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cellpadding",
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
                "text" => '#table style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#table class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#table id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#table title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#table lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#table dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#table dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute
            // border OK Case
            [
                "dtd" => "HTML5",
                "text" => '#table border=""',
                "params" => [
                    "border" => '',    // ONE_NULL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML5",
                "text" => '#table border="2"',
                "params" => [
                    "border" => '2',    // ONE_NULL
                ],
                "result" => "[Validate Error] border : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
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
                "text" => '#table style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute
            // border OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table border=""',
                "params" => [
                    "border" => '',    // ONE_NULL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#table border="2"',
                "params" => [
                    "border" => '2',    // ONE_NULL
                ],
                "result" => "[Validate Error] border : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
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
