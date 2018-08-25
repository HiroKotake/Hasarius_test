<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandPicture extends HasariusTest
{

    public function provideValidateHtml51()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // srcset OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture srcset="small.jpg 320w, medium.jpg 640w, large.jpg 1280w"',
                "params" => [
                    "srcset" => 'small.jpg 320w, medium.jpg 640w, large.jpg 1280w',    // SRCSET
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] srcset",
            ],
            // srcset NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture srcset="small.jpg x, medium.jpg 2x"',
                "params" => [
                    "srcset" => 'small.jpg x, medium.jpg 2x',    // SRCSET
                ],
                "result" => "[Validate Error] srcset : small.jpg x, medium.jpg 2x" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] srcset",
            ],
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture type="image/png"',
                "params" => [
                    "type" => 'image/png',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture type="imag/jpeg"',
                "params" => [
                    "type" => 'imag/jpeg',    // MIME
                ],
                "result" => "[Validate Error] type : imag/jpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // media OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture media="screen and (max-width: 500px) and (orientation: portrait)"',
                "params" => [
                    "media" => 'screen and (max-width: 500px) and (orientation: portrait)',    // MEDIA_QUERY
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] media",
            ],
            // media NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture media="screen ad (min-width: 640px)"',
                "params" => [
                    "media" => 'screen ad (min-width: 640px)',    // MEDIA_QUERY
                ],
                "result" => '',
                // "result" => "[Validate Error] media : screen ad (min-width: 640px)" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] media",
            ],
            // sizes OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture sizes="50vw"',
                "params" => [
                    "sizes" => '50vw',    // MEDIA_QUERY - Shorty
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // sizes NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture sizes="50"',
                "params" => [
                    "sizes" => '50',    // MEDIA_QUERY - Shorty
                ],
                "result" => '',
                // "result" => "[Validate Error] sizes : 50" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // sizes OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture sizes="(max-width: 420px) 100vw, (max-width: 800px) 70vw, 50vw"',
                "params" => [
                    "sizes" => '(max-width: 420px) 100vw, (max-width: 800px) 70vw, 50vw',    // MEDIA_QUERY - Shorty
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // sizes NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture sizes="(max-width: 420px) 100, (max-width: 800px) 70vw, 50vw"',
                "params" => [
                    "sizes" => '(max-width: 420px) 100, (max-width: 800px) 70vw, 50vw',    // MEDIA_QUERY - Shorty
                ],
                "result" => '',
                // "result" => "[Validate Error] sizes : (max-width: 420px) 100, (max-width: 800px) 70vw, 50vw" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // sizes OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture sizes="(max-width: 1280px) 100vw, 1280px"',
                "params" => [
                    "sizes" => '(max-width: 1280px) 100vw, 1280px',    // MEDIA_QUERY - Shorty
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // sizes NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#picture sizes="(max-width: 1280) 100vw, 1280px"',
                "params" => [
                    "sizes" => '(max-width: 1280) 100vw, 1280px',    // MEDIA_QUERY - Shorty
                ],
                "result" => '',
                // "result" => "[Validate Error] sizes : (max-width: 1280) 100vw, 1280px" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] sizes",
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
