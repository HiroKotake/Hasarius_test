<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandOrderlist extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist type="i"',
                "params" => [
                    "type" => 'i',    // LIST_NUM
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist type="2"',
                "params" => [
                    "type" => '2',    // LIST_NUM
                ],
                "result" => ["[Validate Error] type : 2" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // start OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist start="-20"',
                "params" => [
                    "start" => '-20',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // start NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist start="10.5"',
                "params" => [
                    "start" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] start : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // -- Custom Attribute
            // compact OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist compact="off"',
                "params" => [
                    "compact" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] compact",
            ],
            // compact NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#orderlist compact="of"',
                "params" => [
                    "compact" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] compact : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] compact",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, array $params, array $result, string $description)
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

    public function provideValidateHtml4Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist type="i"',
                "params" => [
                    "type" => 'i',    // LIST_NUM
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist type="l"',
                "params" => [
                    "type" => 'l',    // LIST_NUM
                ],
                "result" => ["[Validate Error] type : l" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // start OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist start="4086"',
                "params" => [
                    "start" => '4086',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // start NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist start="10.5"',
                "params" => [
                    "start" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] start : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // -- Custom Attribute
            // compact OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist compact="on"',
                "params" => [
                    "compact" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] compact",
            ],
            // compact NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#orderlist compact="om"',
                "params" => [
                    "compact" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] compact : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] compact",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, array $params, array $result, string $description)
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

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist type="A"',
                "params" => [
                    "type" => 'A',    // LIST_NUM
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist type="2"',
                "params" => [
                    "type" => '2',    // LIST_NUM
                ],
                "result" => ["[Validate Error] type : 2" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // start OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist start="10"',
                "params" => [
                    "start" => '10',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // start NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist start="-20.5"',
                "params" => [
                    "start" => '-20.5',    // NC
                ],
                "result" => ["[Validate Error] start : -20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // -- Custom Attribute
            // compact OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist compact="off"',
                "params" => [
                    "compact" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] compact",
            ],
            // compact NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#orderlist compact="of"',
                "params" => [
                    "compact" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] compact : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] compact",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, array $params, array $result, string $description)
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

    public function provideValidateXhtml1Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist type="A"',
                "params" => [
                    "type" => 'A',    // LIST_NUM
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist type="l"',
                "params" => [
                    "type" => 'l',    // LIST_NUM
                ],
                "result" => ["[Validate Error] type : l" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // start OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist start="4086"',
                "params" => [
                    "start" => '4086',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // start NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist start="-20.5"',
                "params" => [
                    "start" => '-20.5',    // NC
                ],
                "result" => ["[Validate Error] start : -20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // compact OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist compact="compact"',
                "params" => [
                    "compact" => 'compact',    // /^compact$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] compact",
            ],
            // compact NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#orderlist compact="conpact"',
                "params" => [
                    "compact" => 'conpact',    // /^compact$/
                ],
                "result" => ["[Validate Error] compact : conpact" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] compact",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, array $params, array $result, string $description)
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

    public function provideValidateXhtml1Strict()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#orderlist dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, array $params, array $result, string $description)
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

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist type="i"',
                "params" => [
                    "type" => 'i',    // LIST_NUM
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist type="2"',
                "params" => [
                    "type" => '2',    // LIST_NUM
                ],
                "result" => ["[Validate Error] type : 2" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // start OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist start="10"',
                "params" => [
                    "start" => '10',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // start NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist start="10.5"',
                "params" => [
                    "start" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] start : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // compact OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist compact="compact"',
                "params" => [
                    "compact" => 'compact',    // /^compact$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] compact",
            ],
            // compact NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#orderlist compact="conpact"',
                "params" => [
                    "compact" => 'conpact',    // /^compact$/
                ],
                "result" => ["[Validate Error] compact : conpact" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] compact",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, array $params, array $result, string $description)
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

    public function provideValidateXhtml11()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#orderlist dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, array $params, array $result, string $description)
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

    public function provideValidateHtml5()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist type="1"',
                "params" => [
                    "type" => '1',    // LIST_NUM
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist type="2"',
                "params" => [
                    "type" => '2',    // LIST_NUM
                ],
                "result" => ["[Validate Error] type : 2" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // start OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist start="4086"',
                "params" => [
                    "start" => '4086',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // start NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist start="10.5"',
                "params" => [
                    "start" => '10.5',    // NC
                ],
                "result" => ["[Validate Error] start : 10.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // -- Custom Attribute
            // reversed OK Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist reversed="on"',
                "params" => [
                    "reversed" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] reversed",
            ],
            // reversed NG Case
            [
                "dtd" => "HTML5",
                "text" => '#orderlist reversed="om"',
                "params" => [
                    "reversed" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] reversed : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] reversed",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml5 */
    public function testValidateHtml5(string $dtd, string $text, array $params, array $result, string $description)
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
                "text" => '#orderlist style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist type="i"',
                "params" => [
                    "type" => 'i',    // LIST_NUM
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist type="2"',
                "params" => [
                    "type" => '2',    // LIST_NUM
                ],
                "result" => ["[Validate Error] type : 2" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // start OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist start="256"',
                "params" => [
                    "start" => '256',    // NC
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // start NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist start="-20.5"',
                "params" => [
                    "start" => '-20.5',    // NC
                ],
                "result" => ["[Validate Error] start : -20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] start",
            ],
            // -- Custom Attribute
            // reversed OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist reversed="on"',
                "params" => [
                    "reversed" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] reversed",
            ],
            // reversed NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#orderlist reversed="om"',
                "params" => [
                    "reversed" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] reversed : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] reversed",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml51 */
    public function testValidateHtml51(string $dtd, string $text, array $params, array $result, string $description)
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
