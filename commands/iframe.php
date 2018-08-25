<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandIframe extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe longdesc="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe height="200.05"',
                "params" => [
                    "height" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] height : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // scrolling OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe scrolling="on"',
                "params" => [
                    "scrolling" => 'on',    // ON_OFF_AUTO
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // scrolling NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe scrolling="of"',
                "params" => [
                    "scrolling" => 'of',    // ON_OFF_AUTO
                ],
                "result" => "[Validate Error] scrolling : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // frameborder OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe frameborder="0"',
                "params" => [
                    "frameborder" => '0',    // ZERO_ONE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // frameborder NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe frameborder="2"',
                "params" => [
                    "frameborder" => '2',    // ZERO_ONE
                ],
                "result" => "[Validate Error] frameborder : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // marginwidth OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe marginwidth="4086"',
                "params" => [
                    "marginwidth" => '4086',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginwidth NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe marginwidth="20.5"',
                "params" => [
                    "marginwidth" => '20.5',    // US_NZ
                ],
                "result" => "[Validate Error] marginwidth : 20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginheight OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe marginheight="256"',
                "params" => [
                    "marginheight" => '256',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // marginheight NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe marginheight="256.5"',
                "params" => [
                    "marginheight" => '256.5',    // US_NZ
                ],
                "result" => "[Validate Error] marginheight : 256.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_ALL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#iframe align="light"',
                "params" => [
                    "align" => 'light',    // SIDE_ALL
                ],
                "result" => "[Validate Error] align : light" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe longdesc="../script/sample.js"',
                "params" => [
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // width OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] height : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // scrolling OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe scrolling="auto"',
                "params" => [
                    "scrolling" => 'auto',    // ON_OFF_AUTO
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // scrolling NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe scrolling="suto"',
                "params" => [
                    "scrolling" => 'suto',    // ON_OFF_AUTO
                ],
                "result" => "[Validate Error] scrolling : suto" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // frameborder OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe frameborder="0"',
                "params" => [
                    "frameborder" => '0',    // ZERO_ONE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // frameborder NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe frameborder="2"',
                "params" => [
                    "frameborder" => '2',    // ZERO_ONE
                ],
                "result" => "[Validate Error] frameborder : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // marginwidth OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe marginwidth="10"',
                "params" => [
                    "marginwidth" => '10',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginwidth NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe marginwidth="-10"',
                "params" => [
                    "marginwidth" => '-10',    // US_NZ
                ],
                "result" => "[Validate Error] marginwidth : -10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginheight OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe marginheight="20"',
                "params" => [
                    "marginheight" => '20',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // marginheight NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe marginheight="20.5"',
                "params" => [
                    "marginheight" => '20.5',    // US_NZ
                ],
                "result" => "[Validate Error] marginheight : 20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe align="top"',
                "params" => [
                    "align" => 'top',    // SIDE_ALL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#iframe align="midle"',
                "params" => [
                    "align" => 'midle',    // SIDE_ALL
                ],
                "result" => "[Validate Error] align : midle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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
                "text" => '#iframe style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe longdesc="../script/sample.js"',
                "params" => [
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe height="50%"',
                "params" => [
                    "height" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe height="200.05"',
                "params" => [
                    "height" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] height : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // scrolling OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe scrolling="off"',
                "params" => [
                    "scrolling" => 'off',    // ON_OFF_AUTO
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // scrolling NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe scrolling="suto"',
                "params" => [
                    "scrolling" => 'suto',    // ON_OFF_AUTO
                ],
                "result" => "[Validate Error] scrolling : suto" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // frameborder OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe frameborder="1"',
                "params" => [
                    "frameborder" => '1',    // ZERO_ONE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // frameborder NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe frameborder="2"',
                "params" => [
                    "frameborder" => '2',    // ZERO_ONE
                ],
                "result" => "[Validate Error] frameborder : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // marginwidth OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe marginwidth="256"',
                "params" => [
                    "marginwidth" => '256',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginwidth NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe marginwidth="-10"',
                "params" => [
                    "marginwidth" => '-10',    // US_NZ
                ],
                "result" => "[Validate Error] marginwidth : -10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginheight OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe marginheight="4086"',
                "params" => [
                    "marginheight" => '4086',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // marginheight NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe marginheight="256.5"',
                "params" => [
                    "marginheight" => '256.5',    // US_NZ
                ],
                "result" => "[Validate Error] marginheight : 256.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe align="right"',
                "params" => [
                    "align" => 'right',    // SIDE_ALL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#iframe align="midle"',
                "params" => [
                    "align" => 'midle',    // SIDE_ALL
                ],
                "result" => "[Validate Error] align : midle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe longdesc="../script/sample.js"',
                "params" => [
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // width OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe width="200.05"',
                "params" => [
                    "width" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe height="50%"',
                "params" => [
                    "height" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe height="50 %"',
                "params" => [
                    "height" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] height : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // scrolling OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe scrolling="auto"',
                "params" => [
                    "scrolling" => 'auto',    // ON_OFF_AUTO
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // scrolling NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe scrolling="suto"',
                "params" => [
                    "scrolling" => 'suto',    // ON_OFF_AUTO
                ],
                "result" => "[Validate Error] scrolling : suto" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // frameborder OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe frameborder="0"',
                "params" => [
                    "frameborder" => '0',    // ZERO_ONE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // frameborder NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe frameborder="2"',
                "params" => [
                    "frameborder" => '2',    // ZERO_ONE
                ],
                "result" => "[Validate Error] frameborder : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // marginwidth OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe marginwidth="4086"',
                "params" => [
                    "marginwidth" => '4086',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginwidth NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe marginwidth="-10"',
                "params" => [
                    "marginwidth" => '-10',    // US_NZ
                ],
                "result" => "[Validate Error] marginwidth : -10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginheight OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe marginheight="4086"',
                "params" => [
                    "marginheight" => '4086',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // marginheight NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe marginheight="-10"',
                "params" => [
                    "marginheight" => '-10',    // US_NZ
                ],
                "result" => "[Validate Error] marginheight : -10" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe align="left"',
                "params" => [
                    "align" => 'left',    // SIDE_ALL
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#iframe align="midle"',
                "params" => [
                    "align" => 'midle',    // SIDE_ALL
                ],
                "result" => "[Validate Error] align : midle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
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

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe longdesc="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // width OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe width="50%"',
                "params" => [
                    "width" => '50%',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe height="200.05"',
                "params" => [
                    "height" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] height : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // srcdoc OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe srcdoc="test"',
                "params" => [
                    "srcdoc" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] srcdoc",
            ],
            // srcdoc NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe srcdoc=""',
                "params" => [
                    "srcdoc" => '',    // STRING
                ],
                "result" => "[Validate Error] srcdoc : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] srcdoc",
            ],
            // sandbox OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe sandbox="allow-forms"',
                "params" => [
                    "sandbox" => 'allow-forms',    // SANDBOX
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] sandbox",
            ],
            // sandbox NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe sandbox="allowsame-origin"',
                "params" => [
                    "sandbox" => 'allowsame-origin',    // SANDBOX
                ],
                "result" => "[Validate Error] sandbox : allowsame-origin" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] sandbox",
            ],
            // -- Custom Attribute
            // allowfullscreen OK Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe allowfullscreen="off"',
                "params" => [
                    "allowfullscreen" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] allowfullscreen",
            ],
            // allowfullscreen NG Case
            [
                "dtd" => "HTML5",
                "text" => '#iframe allowfullscreen="of"',
                "params" => [
                    "allowfullscreen" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] allowfullscreen : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] allowfullscreen",
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
                "text" => '#iframe style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe longdesc="../script/sample.js"',
                "params" => [
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // width OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe width="200"',
                "params" => [
                    "width" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe width="50 %"',
                "params" => [
                    "width" => '50 %',    // NZ_PCT
                ],
                "result" => "[Validate Error] width : 50 %" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe height="200"',
                "params" => [
                    "height" => '200',    // NZ_PCT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe height="200.05"',
                "params" => [
                    "height" => '200.05',    // NZ_PCT
                ],
                "result" => "[Validate Error] height : 200.05" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // srcdoc OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe srcdoc="テスト"',
                "params" => [
                    "srcdoc" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] srcdoc",
            ],
            // srcdoc NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe srcdoc=""',
                "params" => [
                    "srcdoc" => '',    // STRING
                ],
                "result" => "[Validate Error] srcdoc : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] srcdoc",
            ],
            // sandbox OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe sandbox="allow-forms"',
                "params" => [
                    "sandbox" => 'allow-forms',    // SANDBOX
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] sandbox",
            ],
            // sandbox NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe sandbox="allow-popup"',
                "params" => [
                    "sandbox" => 'allow-popup',    // SANDBOX
                ],
                "result" => "[Validate Error] sandbox : allow-popup" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] sandbox",
            ],
            // -- Custom Attribute
            // allowfullscreen OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe allowfullscreen="off"',
                "params" => [
                    "allowfullscreen" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] allowfullscreen",
            ],
            // allowfullscreen NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#iframe allowfullscreen="om"',
                "params" => [
                    "allowfullscreen" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] allowfullscreen : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] allowfullscreen",
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
