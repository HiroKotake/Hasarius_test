<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationBreak extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" style=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" title=\"test\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // clear OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" clear=\"left\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "clear" => 'left',    // CLEAR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] clear",
            ],
            // clear NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @break id=\"id672_15\" clear=\"raght\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id672_15',
                    "clear" => 'raght',    // CLEAR_TYPE
                ],
                "result" => "[Validate Error] clear : raght" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] clear",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateHtml4Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" style=\"sample text\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" title=\"test\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // clear OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" clear=\"all\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "clear" => 'all',    // CLEAR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] clear",
            ],
            // clear NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @break id=\"id951_91\" clear=\"raght\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id951_91',
                    "clear" => 'raght',    // CLEAR_TYPE
                ],
                "result" => "[Validate Error] clear : raght" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] clear",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" style=\"sample text\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" class=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" title=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // clear OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" clear=\"none\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "clear" => 'none',    // CLEAR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] clear",
            ],
            // clear NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @break id=\"id450_49\" clear=\"non\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id450_49',
                    "clear" => 'non',    // CLEAR_TYPE
                ],
                "result" => "[Validate Error] clear : non" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] clear",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateXhtml1Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" class=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" title=\"test\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // clear OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" clear=\"right\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "clear" => 'right',    // CLEAR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] clear",
            ],
            // clear NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @break id=\"id140_53\" clear=\"lft\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id140_53',
                    "clear" => 'lft',    // CLEAR_TYPE
                ],
                "result" => "[Validate Error] clear : lft" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] clear",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateXhtml1Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @break id=\"id753_30\" style=\"sample text\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id753_30',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @break id=\"id753_30\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id753_30',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @break id=\"id753_30\" class=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id753_30',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @break id=\"id753_30\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id753_30',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @break id=\"id753_30\" title=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id753_30',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @break id=\"id753_30\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id753_30',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" class=\"test\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" title=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // clear OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" clear=\"all\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "clear" => 'all',    // CLEAR_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] clear",
            ],
            // clear NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @break id=\"id285_70\" clear=\"non\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id285_70',
                    "clear" => 'non',    // CLEAR_TYPE
                ],
                "result" => "[Validate Error] clear : non" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] clear",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateXhtml11()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @break id=\"id362_3\" style=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id362_3',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @break id=\"id362_3\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id362_3',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @break id=\"id362_3\" class=\"test\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id362_3',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @break id=\"id362_3\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id362_3',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @break id=\"id362_3\" title=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id362_3',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @break id=\"id362_3\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id362_3',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, string $decoration, array $params, string $result, string $description)
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

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @break id=\"id834_72\" style=\"test\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id834_72',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @break id=\"id834_72\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id834_72',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @break id=\"id834_72\" class=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id834_72',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @break id=\"id834_72\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id834_72',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @break id=\"id834_72\" title=\"テスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id834_72',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @break id=\"id834_72\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id834_72',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute

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
                "text" => "This is @break id=\"id589_74\" style=\"test\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id589_74',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @break id=\"id589_74\" style=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id589_74',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @break id=\"id589_74\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id589_74',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @break id=\"id589_74\" class=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id589_74',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @break id=\"id589_74\" title=\"sample text\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id589_74',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @break id=\"id589_74\" title=\"\" sample@ text.",
                "decoration" => "break",
                "params" => [
                    "id" => 'id589_74',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute

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
