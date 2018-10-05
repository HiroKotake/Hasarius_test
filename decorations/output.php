<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationOutput extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" style=\"sample text\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" style=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" class=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" title=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" lang=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" dir=\"auto\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" dir=\"rl\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" name=\"test\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" name=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // for OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" for=\"test\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "for" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" for=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "for" => '',    // STRING
                ],
                "result" => ["[Validate Error] for : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // form OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" form=\"サンプル テキスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "form" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @output id=\"id143_14\" form=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id143_14',
                    "form" => '',    // STRING
                ],
                "result" => ["[Validate Error] form : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
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
                "text" => "This is @output id=\"id6_92\" style=\"テスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" style=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" class=\"sample text\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" class=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" title=\"test\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" title=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" lang=\"sample text\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" lang=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" dir=\"rtl\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" dir=\"rl\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" name=\"テスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" name=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // for OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" for=\"テスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "for" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // for NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" for=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "for" => '',    // STRING
                ],
                "result" => ["[Validate Error] for : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] for",
            ],
            // form OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" form=\"テスト\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "form" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] form",
            ],
            // form NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @output id=\"id6_92\" form=\"\" sample@ text.",
                "decoration" => "output",
                "params" => [
                    "id" => 'id6_92',
                    "form" => '',    // STRING
                ],
                "result" => ["[Validate Error] form : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] form",
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
