<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandVideo extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // poster OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video poster="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "poster" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] poster",
            ],
            // poster NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video poster="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "poster" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] poster : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] poster",
            ],
            // preload OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video preload="none"',
                "params" => [
                    "preload" => 'none',    // PRELOAD
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // preload NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video preload="aut"',
                "params" => [
                    "preload" => 'aut',    // PRELOAD
                ],
                "result" => "[Validate Error] preload : aut" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // mediagroup OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video mediagroup="sample text"',
                "params" => [
                    "mediagroup" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] mediagroup",
            ],
            // mediagroup NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video mediagroup=""',
                "params" => [
                    "mediagroup" => '',    // STRING
                ],
                "result" => "[Validate Error] mediagroup : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] mediagroup",
            ],
            // width OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video width="4086"',
                "params" => [
                    "width" => '4086',    // NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video width="16.5"',
                "params" => [
                    "width" => '16.5',    // NZ
                ],
                "result" => "[Validate Error] width : 16.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video height="256"',
                "params" => [
                    "height" => '256',    // NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video height="16.5"',
                "params" => [
                    "height" => '16.5',    // NZ
                ],
                "result" => "[Validate Error] height : 16.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // crossorigin OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video crossorigin="anonymous"',
                "params" => [
                    "crossorigin" => 'anonymous',    // USE_SIGNIN
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // crossorigin NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video crossorigin="use-credential"',
                "params" => [
                    "crossorigin" => 'use-credential',    // USE_SIGNIN
                ],
                "result" => "[Validate Error] crossorigin : use-credential" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // -- Custom Attribute
            // autoplay OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video autoplay="off"',
                "params" => [
                    "autoplay" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // autoplay NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video autoplay="om"',
                "params" => [
                    "autoplay" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] autoplay : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // loop OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video loop="off"',
                "params" => [
                    "loop" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // loop NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video loop="of"',
                "params" => [
                    "loop" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] loop : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // muted OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video muted="off"',
                "params" => [
                    "muted" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // muted NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video muted="of"',
                "params" => [
                    "muted" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] muted : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // controls OK Case
            [
                "dtd" => "HTML5",
                "text" => '#video controls="off"',
                "params" => [
                    "controls" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] controls",
            ],
            // controls NG Case
            [
                "dtd" => "HTML5",
                "text" => '#video controls="of"',
                "params" => [
                    "controls" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] controls : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] controls",
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
                "text" => '#video style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // poster OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video poster="../script/sample.js"',
                "params" => [
                    "poster" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] poster",
            ],
            // poster NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video poster="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "poster" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] poster : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] poster",
            ],
            // preload OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video preload="auto"',
                "params" => [
                    "preload" => 'auto',    // PRELOAD
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // preload NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video preload="aut"',
                "params" => [
                    "preload" => 'aut',    // PRELOAD
                ],
                "result" => "[Validate Error] preload : aut" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // width OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video width="4086"',
                "params" => [
                    "width" => '4086',    // NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video width="0"',
                "params" => [
                    "width" => '0',    // NZ
                ],
                "result" => "[Validate Error] width : 0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video height="256"',
                "params" => [
                    "height" => '256',    // NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video height="0"',
                "params" => [
                    "height" => '0',    // NZ
                ],
                "result" => "[Validate Error] height : 0" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // crossorigin OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video crossorigin="use-credentials"',
                "params" => [
                    "crossorigin" => 'use-credentials',    // USE_SIGNIN
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // crossorigin NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video crossorigin="use-credential"',
                "params" => [
                    "crossorigin" => 'use-credential',    // USE_SIGNIN
                ],
                "result" => "[Validate Error] crossorigin : use-credential" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // -- Custom Attribute
            // autoplay OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video autoplay="off"',
                "params" => [
                    "autoplay" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // autoplay NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video autoplay="of"',
                "params" => [
                    "autoplay" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] autoplay : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // loop OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video loop="off"',
                "params" => [
                    "loop" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // loop NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video loop="of"',
                "params" => [
                    "loop" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] loop : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // muted OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video muted="on"',
                "params" => [
                    "muted" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // muted NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video muted="om"',
                "params" => [
                    "muted" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] muted : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // controls OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video controls="on"',
                "params" => [
                    "controls" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] controls",
            ],
            // controls NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#video controls="of"',
                "params" => [
                    "controls" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] controls : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] controls",
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
