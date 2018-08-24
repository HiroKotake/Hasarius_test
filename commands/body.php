<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandBody extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // background OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body background="../script/sample.js"',
                "params" => [
                    "background" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // background NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body background="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "background" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] background : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body bgcolor="#FF7F00"',
                "params" => [
                    "bgcolor" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body bgcolor="yellaw"',
                "params" => [
                    "bgcolor" => 'yellaw',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : yellaw" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // text OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body text="#FF0000"',
                "params" => [
                    "text" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // text NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body text="#FG0000"',
                "params" => [
                    "text" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] text : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // link OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body link="yellow"',
                "params" => [
                    "link" => 'yellow',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // link NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body link="#FF7F0"',
                "params" => [
                    "link" => '#FF7F0',    // COLOR
                ],
                "result" => "[Validate Error] link : #FF7F0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // vlink OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body vlink="#FF0000"',
                "params" => [
                    "vlink" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // vlink NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body vlink="rad"',
                "params" => [
                    "vlink" => 'rad',    // COLOR
                ],
                "result" => "[Validate Error] vlink : rad" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // alink OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body alink="#FF7F00"',
                "params" => [
                    "alink" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alink",
            ],
            // alink NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#body alink="#00F10"',
                "params" => [
                    "alink" => '#00F10',    // COLOR
                ],
                "result" => "[Validate Error] alink : #00F10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alink",
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
                "text" => '#body style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#body dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
                "text" => '#body style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // background OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body background="../script/sample.js"',
                "params" => [
                    "background" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // background NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body background="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "background" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] background : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // bgcolor OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body bgcolor="yellow"',
                "params" => [
                    "bgcolor" => 'yellow',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body bgcolor="#FG0000"',
                "params" => [
                    "bgcolor" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // text OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body text="#FF7F00"',
                "params" => [
                    "text" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // text NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body text="rad"',
                "params" => [
                    "text" => 'rad',    // COLOR
                ],
                "result" => "[Validate Error] text : rad" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // link OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body link="#00FF10"',
                "params" => [
                    "link" => '#00FF10',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // link NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body link="#FF7F0"',
                "params" => [
                    "link" => '#FF7F0',    // COLOR
                ],
                "result" => "[Validate Error] link : #FF7F0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // vlink OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body vlink="#FF7F00"',
                "params" => [
                    "vlink" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // vlink NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body vlink="#FG0000"',
                "params" => [
                    "vlink" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] vlink : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // alink OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body alink="#00FF10"',
                "params" => [
                    "alink" => '#00FF10',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alink",
            ],
            // alink NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#body alink="#FG0000"',
                "params" => [
                    "alink" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] alink : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alink",
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
                "text" => '#body style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // background OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body background="../script/sample.js"',
                "params" => [
                    "background" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // background NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body background="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "background" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] background : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body bgcolor="#FF7F00"',
                "params" => [
                    "bgcolor" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body bgcolor="#FG0000"',
                "params" => [
                    "bgcolor" => '#FG0000',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : #FG0000" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // text OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body text="#FF0000"',
                "params" => [
                    "text" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // text NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body text="#00F10"',
                "params" => [
                    "text" => '#00F10',    // COLOR
                ],
                "result" => "[Validate Error] text : #00F10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // link OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body link="#FF0000"',
                "params" => [
                    "link" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // link NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body link="rad"',
                "params" => [
                    "link" => 'rad',    // COLOR
                ],
                "result" => "[Validate Error] link : rad" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // vlink OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body vlink="#00FF10"',
                "params" => [
                    "vlink" => '#00FF10',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // vlink NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body vlink="#00F10"',
                "params" => [
                    "vlink" => '#00F10',    // COLOR
                ],
                "result" => "[Validate Error] vlink : #00F10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // alink OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body alink="#FF0000"',
                "params" => [
                    "alink" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alink",
            ],
            // alink NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#body alink="rad"',
                "params" => [
                    "alink" => 'rad',    // COLOR
                ],
                "result" => "[Validate Error] alink : rad" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alink",
            ],

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
                "text" => '#body style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#body dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
                "text" => '#body style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // background OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body background="../script/sample.js"',
                "params" => [
                    "background" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // background NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body background="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "background" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] background : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] background",
            ],
            // bgcolor OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body bgcolor="yellow"',
                "params" => [
                    "bgcolor" => 'yellow',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // bgcolor NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body bgcolor="rad"',
                "params" => [
                    "bgcolor" => 'rad',    // COLOR
                ],
                "result" => "[Validate Error] bgcolor : rad" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] bgcolor",
            ],
            // text OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body text="yellow"',
                "params" => [
                    "text" => 'yellow',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // text NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body text="rad"',
                "params" => [
                    "text" => 'rad',    // COLOR
                ],
                "result" => "[Validate Error] text : rad" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] text",
            ],
            // link OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body link="#FF7F00"',
                "params" => [
                    "link" => '#FF7F00',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // link NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body link="yellaw"',
                "params" => [
                    "link" => 'yellaw',    // COLOR
                ],
                "result" => "[Validate Error] link : yellaw" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] link",
            ],
            // vlink OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body vlink="yellow"',
                "params" => [
                    "vlink" => 'yellow',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // vlink NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body vlink="#00F10"',
                "params" => [
                    "vlink" => '#00F10',    // COLOR
                ],
                "result" => "[Validate Error] vlink : #00F10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vlink",
            ],
            // alink OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body alink="#FF0000"',
                "params" => [
                    "alink" => '#FF0000',    // COLOR
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alink",
            ],
            // alink NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#body alink="rad"',
                "params" => [
                    "alink" => 'rad',    // COLOR
                ],
                "result" => "[Validate Error] alink : rad" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alink",
            ],

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
                "text" => '#body style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#body dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
                "text" => '#body style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#body class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#body id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#body title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#body lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#body dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#body dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
                "text" => '#body style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#body dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
