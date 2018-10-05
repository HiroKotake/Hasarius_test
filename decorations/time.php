<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationTime extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" style=\"sample text\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" style=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" class=\"テスト\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" class=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" title=\"sample text\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" title=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" lang=\"sample text\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" lang=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" dir=\"auto\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" dir=\"rl\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // datetime OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" datetime=\"2005-09-22T23:15:30+09:00\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "datetime" => '2005-09-22T23:15:30+09:00',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @time id=\"id746_89\" datetime=\"2005-09-22T23:15:30Z09:00\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id746_89',
                    "datetime" => '2005-09-22T23:15:30Z09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-09-22T23:15:30Z09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml5 */
    public function testValidateHtml5(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @time id=\"id234_79\" style=\"sample text\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" style=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" class=\"テスト\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" class=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" title=\"テスト\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" title=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" lang=\"sample text\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" lang=\"\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" dir=\"rtl\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" dir=\"rl\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // datetime OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" datetime=\"2005-09-22T00:00:00Z\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "datetime" => '2005-09-22T00:00:00Z',    // DATETIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] datetime",
            ],
            // datetime NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @time id=\"id234_79\" datetime=\"2005-0922T00:00:00+09:00\" sample@ text.",
                "decoration" => "time",
                "params" => [
                    "id" => 'id234_79',
                    "datetime" => '2005-0922T00:00:00+09:00',    // DATETIME
                ],
                "result" => ["[Validate Error] datetime : 2005-0922T00:00:00+09:00" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] datetime",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml51 */
    public function testValidateHtml51(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
