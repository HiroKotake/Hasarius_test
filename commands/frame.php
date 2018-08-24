<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandFrame extends HasariusTest
{

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame title=""',
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
                "text" => '#frame src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame longdesc="../script/sample.js"',
                "params" => [
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // scrolling OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame scrolling="auto"',
                "params" => [
                    "scrolling" => 'auto',    // ON_OFF_AUTO
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // scrolling NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame scrolling="of"',
                "params" => [
                    "scrolling" => 'of',    // ON_OFF_AUTO
                ],
                "result" => "[Validate Error] scrolling : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // frameborder OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame frameborder="1"',
                "params" => [
                    "frameborder" => '1',    // ZERO_ONE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // frameborder NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame frameborder="2"',
                "params" => [
                    "frameborder" => '2',    // ZERO_ONE
                ],
                "result" => "[Validate Error] frameborder : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // marginwidth OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame marginwidth="10"',
                "params" => [
                    "marginwidth" => '10',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginwidth NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame marginwidth="10.5"',
                "params" => [
                    "marginwidth" => '10.5',    // NC
                ],
                "result" => "[Validate Error] marginwidth : 10.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginheight OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame marginheight="-20"',
                "params" => [
                    "marginheight" => '-20',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // marginheight NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame marginheight="-20.5"',
                "params" => [
                    "marginheight" => '-20.5',    // NC
                ],
                "result" => "[Validate Error] marginheight : -20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // -- Custom Attribute
            // noresize OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame noresize="on"',
                "params" => [
                    "noresize" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] noresize",
            ],
            // noresize NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frame noresize="of"',
                "params" => [
                    "noresize" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] noresize : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] noresize",
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

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame title=""',
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
                "text" => '#frame src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // longdesc OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame longdesc="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame longdesc="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // scrolling OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame scrolling="yes"',
                "params" => [
                    "scrolling" => 'yes',    // /^(yes|no|auto)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // scrolling NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame scrolling="ys"',
                "params" => [
                    "scrolling" => 'ys',    // /^(yes|no|auto)$/
                ],
                "result" => "[Validate Error] scrolling : ys" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] scrolling",
            ],
            // frameborder OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame frameborder="0"',// ToDo UNDEFINED VALUE !!
                "params" => [
                    "frameborder" => '0',    // /^(0|1)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // frameborder NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame frameborder="2"',
                "params" => [
                    "frameborder" => '2',    // /^(0|1)$/
                ],
                "result" => "[Validate Error] frameborder : 2" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] frameborder",
            ],
            // marginwidth OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame marginwidth="-20"',
                "params" => [
                    "marginwidth" => '-20',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginwidth NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame marginwidth="10.5"',
                "params" => [
                    "marginwidth" => '10.5',    // NC
                ],
                "result" => "[Validate Error] marginwidth : 10.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginwidth",
            ],
            // marginheight OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame marginheight="256"',
                "params" => [
                    "marginheight" => '256',    // NC
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // marginheight NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame marginheight="-20.5"',
                "params" => [
                    "marginheight" => '-20.5',    // NC
                ],
                "result" => "[Validate Error] marginheight : -20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] marginheight",
            ],
            // -- Custom Attribute
            // noresize OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame noresize="on"',
                "params" => [
                    "noresize" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] noresize",
            ],
            // noresize NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frame noresize="of"',
                "params" => [
                    "noresize" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] noresize : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] noresize",
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

}
