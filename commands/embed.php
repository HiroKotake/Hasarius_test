<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandEmbed extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // type OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed type="application/pdf"',
                "params" => [
                    "type" => 'application/pdf',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed type="aplication/pdf"',
                "params" => [
                    "type" => 'aplication/pdf',    // MIME
                ],
                "result" => "[Validate Error] type : aplication/pdf" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // width OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed width="20"',
                "params" => [
                    "width" => '20',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed width="256.5"',
                "params" => [
                    "width" => '256.5',    // US_NZ
                ],
                "result" => "[Validate Error] width : 256.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5",
                "text" => '#embed height="4086"',
                "params" => [
                    "height" => '4086',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5",
                "text" => '#embed height="20.5"',
                "params" => [
                    "height" => '20.5',    // US_NZ
                ],
                "result" => "[Validate Error] height : 20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
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
                "text" => '#embed style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed dir="rl"',
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
                "text" => '#embed src="../script/sample.js"',
                "params" => [
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed src="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed type="image/png"',
                "params" => [
                    "type" => 'image/png',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed type="vide/mpeg"',
                "params" => [
                    "type" => 'vide/mpeg',    // MIME
                ],
                "result" => "[Validate Error] type : vide/mpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // width OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed width="10"',
                "params" => [
                    "width" => '10',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // width NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed width="256.5"',
                "params" => [
                    "width" => '256.5',    // US_NZ
                ],
                "result" => "[Validate Error] width : 256.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] width",
            ],
            // height OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed height="10"',
                "params" => [
                    "height" => '10',    // US_NZ
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#embed height="20.5"',
                "params" => [
                    "height" => '20.5',    // US_NZ
                ],
                "result" => "[Validate Error] height : 20.5" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
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
