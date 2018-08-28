<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationProgress extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" style=\"sample text\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" style=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" class=\"テスト\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" class=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" title=\"sample text\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" title=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" lang=\"test\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" lang=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" dir=\"ltr\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" dir=\"rl\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" value=\"123.45\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "value" => '123.45',    // US_FLT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" value=\"-123.45\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "value" => '-123.45',    // US_FLT
                ],
                "result" => "[Validate Error] value : -123.45" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // max OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" max=\"123.45\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "max" => '123.45',    // US_FLT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] max",
            ],
            // max NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @progress id=\"id223_35\" max=\"-123.45\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id223_35',
                    "max" => '-123.45',    // US_FLT
                ],
                "result" => "[Validate Error] max : -123.45" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] max",
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
                "text" => "This is @progress id=\"id605_1\" style=\"sample text\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" style=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" class=\"テスト\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" class=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" title=\"test\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" title=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" lang=\"テスト\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" lang=\"\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" dir=\"ltr\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" dir=\"ato\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // value OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" value=\"123.45\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "value" => '123.45',    // US_FLT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" value=\"-0.25\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "value" => '-0.25',    // US_FLT
                ],
                "result" => "[Validate Error] value : -0.25" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // max OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" max=\"0.25\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "max" => '0.25',    // US_FLT
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] max",
            ],
            // max NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @progress id=\"id605_1\" max=\"-123.45\" sample@ text.",
                "decoration" => "progress",
                "params" => [
                    "id" => 'id605_1',
                    "max" => '-123.45',    // US_FLT
                ],
                "result" => "[Validate Error] max : -123.45" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] max",
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
