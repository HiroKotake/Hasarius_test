<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandAudio extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio src="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // preload OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio preload="none"',
                "params" => [
                    "preload" => 'none',    // PRELOAD
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // preload NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio preload="metadeta"',
                "params" => [
                    "preload" => 'metadeta',    // PRELOAD
                ],
                "result" => "[Validate Error] preload : metadeta" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // mediagroup OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio mediagroup="サンプル テキスト"',
                "params" => [
                    "mediagroup" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] mediagroup",
            ],
            // mediagroup NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio mediagroup=""',
                "params" => [
                    "mediagroup" => '',    // STRING
                ],
                "result" => "[Validate Error] mediagroup : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] mediagroup",
            ],
            // crossorigin OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio crossorigin="anonymous"',
                "params" => [
                    "crossorigin" => 'anonymous',    // USE_SIGNIN
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // crossorigin NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio crossorigin="anonimous"',
                "params" => [
                    "crossorigin" => 'anonimous',    // USE_SIGNIN
                ],
                "result" => "[Validate Error] crossorigin : anonimous" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // -- Custom Attribute
            // autoplay OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio autoplay="off"',
                "params" => [
                    "autoplay" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // autoplay NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio autoplay="of"',
                "params" => [
                    "autoplay" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] autoplay : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // loop OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio loop="off"',
                "params" => [
                    "loop" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // loop NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio loop="om"',
                "params" => [
                    "loop" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] loop : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // muted OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio muted="on"',
                "params" => [
                    "muted" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // muted NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio muted="of"',
                "params" => [
                    "muted" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] muted : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // controls OK Case
            [
                "dtd" => "HTML5",
                "text" => '#audio controls="on"',
                "params" => [
                    "controls" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] controls",
            ],
            // controls NG Case
            [
                "dtd" => "HTML5",
                "text" => '#audio controls="om"',
                "params" => [
                    "controls" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] controls : om" . PHP_EOL,
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
                "text" => '#audio style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // preload OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio preload="auto"',
                "params" => [
                    "preload" => 'auto',    // PRELOAD
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // preload NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio preload="aut"',
                "params" => [
                    "preload" => 'aut',    // PRELOAD
                ],
                "result" => "[Validate Error] preload : aut" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] preload",
            ],
            // crossorigin OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio crossorigin="anonymous"',
                "params" => [
                    "crossorigin" => 'anonymous',    // USE_SIGNIN
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // crossorigin NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio crossorigin="anonimous"',
                "params" => [
                    "crossorigin" => 'anonimous',    // USE_SIGNIN
                ],
                "result" => "[Validate Error] crossorigin : anonimous" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // -- Custom Attribute
            // autoplay OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio autoplay="on"',
                "params" => [
                    "autoplay" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // autoplay NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio autoplay="of"',
                "params" => [
                    "autoplay" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] autoplay : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autoplay",
            ],
            // loop OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio loop="off"',
                "params" => [
                    "loop" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // loop NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio loop="of"',
                "params" => [
                    "loop" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] loop : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] loop",
            ],
            // muted OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio muted="on"',
                "params" => [
                    "muted" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // muted NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio muted="om"',
                "params" => [
                    "muted" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] muted : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] muted",
            ],
            // controls OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio controls="on"',
                "params" => [
                    "controls" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] controls",
            ],
            // controls NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#audio controls="om"',
                "params" => [
                    "controls" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] controls : om" . PHP_EOL,
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
