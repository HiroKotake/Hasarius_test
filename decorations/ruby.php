<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationRuby extends HasariusTest
{

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" style=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" class=\"sample text\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" class=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" title=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" lang=\"test\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" lang=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" dir=\"ltr\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @ruby id=\"id677_19\" dir=\"lr\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id677_19',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
                "text" => "This is @ruby id=\"id378_4\" style=\"テスト\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" style=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" class=\"テスト\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" class=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" title=\"sample text\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" title=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" lang=\"sample text\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" lang=\"\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" dir=\"auto\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @ruby id=\"id378_4\" dir=\"lr\" sample@ text.",
                "decoration" => "ruby",
                "params" => [
                    "id" => 'id378_4',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute

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
