<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationBdi extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" style=\"test\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" style=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" class=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" title=\"テスト\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" title=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" lang=\"テスト\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" lang=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" dir=\"auto\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" dir=\"rl\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" dir=\"rtl\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "dir" => 'rtl',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @bdi id=\"id793_65\" dir=\"ato\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id793_65',
                    "dir" => 'ato',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml5 */
    public function testValidateHtml5(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

    public function provideValidateHtml51()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" style=\"テスト\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" style=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" class=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" title=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" lang=\"テスト\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" lang=\"\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" dir=\"auto\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" dir=\"lr\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" dir=\"auto\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "dir" => 'auto',    // DIR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @bdi id=\"id554_77\" dir=\"rl\" sample@ text.",
                "decoration" => "bdi",
                "params" => [
                    "id" => 'id554_77',
                    "dir" => 'rl',    // DIR_TYPE
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml51 */
    public function testValidateHtml51(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
    {
        $this->changeDtd($dtd);
        $data = $this->makeDecorationCase($text);
        if (empty($data["data"])) {
            echo PHP_EOL . '[ERROR] PARAMETER IS NOT NULL !!' . PHP_EOL;
            return;
        }
        $decoData = $data["data"][0];
        // パラメータ存在チェック
        $this->assertEquals($decoration, $decoData["decorationName"]);
        $this->assertEquals($params, $decoData["params"]);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($decoData['decoration'], $decoData["params"]);
        $this->assertEquals($result, $validated);
    }

}
