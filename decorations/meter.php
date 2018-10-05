<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationMeter extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" style=\"test\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" style=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" class=\"sample text\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" class=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" title=\"sample text\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" title=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" lang=\"テスト\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" lang=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" dir=\"rtl\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" dir=\"lr\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" value=\"10\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "value" => '10',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" value=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "value" => '',    // FLT
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // min OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" min=\"12.34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "min" => '12.34',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] min",
            ],
            // min NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" min=\"12..34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "min" => '12..34',    // FLT
                ],
                "result" => ["[Validate Error] min : 12..34" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] min",
            ],
            // max OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" max=\"0.1\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "max" => '0.1',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] max",
            ],
            // max NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" max=\"12..34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "max" => '12..34',    // FLT
                ],
                "result" => ["[Validate Error] max : 12..34" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] max",
            ],
            // low OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" low=\"12.34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "low" => '12.34',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] low",
            ],
            // low NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" low=\"12..34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "low" => '12..34',    // FLT
                ],
                "result" => ["[Validate Error] low : 12..34" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] low",
            ],
            // high OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" high=\"0.1\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "high" => '0.1',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] high",
            ],
            // high NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" high=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "high" => '',    // FLT
                ],
                "result" => ["[Validate Error] high : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] high",
            ],
            // optimum OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" optimum=\"12.34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "optimum" => '12.34',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] optimum",
            ],
            // optimum NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @meter id=\"id255_27\" optimum=\"test\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id255_27',
                    "optimum" => 'test',    // FLT
                ],
                "result" => ["[Validate Error] optimum : test" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] optimum",
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
                "text" => "This is @meter id=\"id43_97\" style=\"test\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" style=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" class=\"テスト\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" class=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" title=\"test\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" title=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" lang=\"テスト\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" lang=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" dir=\"rtl\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" dir=\"rl\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" value=\"12.34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "value" => '12.34',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" value=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "value" => '',    // FLT
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // min OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" min=\"12.34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "min" => '12.34',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] min",
            ],
            // min NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" min=\"12..34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "min" => '12..34',    // FLT
                ],
                "result" => ["[Validate Error] min : 12..34" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] min",
            ],
            // max OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" max=\"0.1\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "max" => '0.1',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] max",
            ],
            // max NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" max=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "max" => '',    // FLT
                ],
                "result" => ["[Validate Error] max : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] max",
            ],
            // low OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" low=\"0.1\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "low" => '0.1',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] low",
            ],
            // low NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" low=\"12..34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "low" => '12..34',    // FLT
                ],
                "result" => ["[Validate Error] low : 12..34" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] low",
            ],
            // high OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" high=\"10\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "high" => '10',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] high",
            ],
            // high NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" high=\"12..34\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "high" => '12..34',    // FLT
                ],
                "result" => ["[Validate Error] high : 12..34" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] high",
            ],
            // optimum OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" optimum=\"0.1\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "optimum" => '0.1',    // FLT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] optimum",
            ],
            // optimum NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @meter id=\"id43_97\" optimum=\"\" sample@ text.",
                "decoration" => "meter",
                "params" => [
                    "id" => 'id43_97',
                    "optimum" => '',    // FLT
                ],
                "result" => ["[Validate Error] optimum : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] optimum",
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
