<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandArea extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area alt="test"',
                "params" => [
                    "alt" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area shape="rect"',
                "params" => [
                    "shape" => 'rect',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area shape="defoult"',
                "params" => [
                    "shape" => 'defoult',    // SHAPE
                ],
                "result" => "[Validate Error] shape : defoult" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area shape="circle" coords="100,100,50"',
                "params" => [
                    "shape" => 'circle',
                    "coords" => '100,100,50',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area shape="rect" coords="100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area href="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area target="_top"',
                "params" => [
                    "target" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // -- Custom Attribute
            // nohref OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area nohref="on"',
                "params" => [
                    "nohref" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nohref",
            ],
            // nohref NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area nohref="om"',
                "params" => [
                    "nohref" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] nohref : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nohref",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, array $params, string $result, string $description)
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
                "text" => '#area style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area alt="sample text"',
                "params" => [
                    "alt" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area shape="poly"',
                "params" => [
                    "shape" => 'poly',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area shape="carcle"',
                "params" => [
                    "shape" => 'carcle',    // SHAPE
                ],
                "result" => "[Validate Error] shape : carcle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area shape="rect" coords="100,100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,100,200,200',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area shape="rect" coords="100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area href="../script/sample.js"',
                "params" => [
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // -- Custom Attribute
            // nohref OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area nohref="on"',
                "params" => [
                    "nohref" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nohref",
            ],
            // nohref NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area nohref="om"',
                "params" => [
                    "nohref" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] nohref : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nohref",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, array $params, string $result, string $description)
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
                "text" => '#area style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area alt="テスト"',
                "params" => [
                    "alt" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area shape="circle"',
                "params" => [
                    "shape" => 'circle',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area shape="defoult"',
                "params" => [
                    "shape" => 'defoult',    // SHAPE
                ],
                "result" => "[Validate Error] shape : defoult" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area shape="circle" coords="100,100,50"',
                "params" => [
                    "shape" => 'circle',
                    "coords" => '100,100,50',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area shape="rect" coords="100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area href="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area target="_top"',
                "params" => [
                    "target" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // -- Custom Attribute
            // nohref OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area nohref="off"',
                "params" => [
                    "nohref" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] nohref",
            ],
            // nohref NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area nohref="of"',
                "params" => [
                    "nohref" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] nohref : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] nohref",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, array $params, string $result, string $description)
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
                "text" => '#area style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area alt="サンプル テキスト"',
                "params" => [
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area shape="rect"',
                "params" => [
                    "shape" => 'rect',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area shape="rct"',
                "params" => [
                    "shape" => 'rct',    // SHAPE
                ],
                "result" => "[Validate Error] shape : rct" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area shape="circle" coords="100,100,50"',
                "params" => [
                    "shape" => 'circle',
                    "coords" => '100,100,50',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area shape="rect" coords="100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area href="../script/sample.js"',
                "params" => [
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area target="_blank"',
                "params" => [
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, array $params, string $result, string $description)
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
                "text" => '#area style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area alt="テスト"',
                "params" => [
                    "alt" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area shape="rect"',
                "params" => [
                    "shape" => 'rect',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area shape="rct"',
                "params" => [
                    "shape" => 'rct',    // SHAPE
                ],
                "result" => "[Validate Error] shape : rct" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area shape="poly" coords="400,50,450,150,350,150"',
                "params" => [
                    "shape" => 'poly',
                    "coords" => '400,50,450,150,350,150',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area shape="circle" coords="100,100"',
                "params" => [
                    "shape" => 'circle',
                    "coords" => '100,100',
                ],
                "result" => "[Validate Error] coords : 100,100" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area href="../script/sample.js"',
                "params" => [
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, array $params, string $result, string $description)
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
                "text" => '#area style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area alt="sample text"',
                "params" => [
                    "alt" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area shape="circle"',
                "params" => [
                    "shape" => 'circle',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area shape="defoult"',
                "params" => [
                    "shape" => 'defoult',    // SHAPE
                ],
                "result" => "[Validate Error] shape : defoult" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area shape="poly" coords="400,50,450,150,350,150"',
                "params" => [
                    "shape" => 'poly',
                    "coords" => '400,50,450,150,350,150',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area shape="rect" coords="100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area href="../script/sample.js"',
                "params" => [
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area target="_blank"',
                "params" => [
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, array $params, string $result, string $description)
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
                "text" => '#area style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area alt="test"',
                "params" => [
                    "alt" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area shape="poly"',
                "params" => [
                    "shape" => 'poly',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area shape="rct"',
                "params" => [
                    "shape" => 'rct',    // SHAPE
                ],
                "result" => "[Validate Error] shape : rct" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area shape="circle" coords="100,100,50"',
                "params" => [
                    "shape" => 'circle',
                    "coords" => '100,100,50',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area shape="rect" coords="100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area href="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, array $params, string $result, string $description)
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
                "text" => '#area style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area alt="テスト"',
                "params" => [
                    "alt" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area shape="default"',
                "params" => [
                    "shape" => 'default',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area shape="rct"',
                "params" => [
                    "shape" => 'rct',    // SHAPE
                ],
                "result" => "[Validate Error] shape : rct" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area shape="poly" coords="400,50,450,150,350,150"',
                "params" => [
                    "shape" => 'poly',
                    "coords" => '400,50,450,150,350,150',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area shape="circle" coords="100,100"',
                "params" => [
                    "shape" => 'circle',
                    "coords" => '100,100',
                ],
                "result" => "[Validate Error] coords : 100,100" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area href="../script/sample.js"',
                "params" => [
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // hreflang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area hreflang="ja-JP"',
                "params" => [
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area hreflang="ja-"',
                "params" => [
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area type="../script/sample.js"',
                "params" => [
                    "type" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area type="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "type" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] type : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area rel="search"',
                "params" => [
                    "rel" => 'search',    // REL_TYPE_A
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area rel="nofollaw"',
                "params" => [
                    "rel" => 'nofollaw',    // REL_TYPE_A
                ],
                "result" => "[Validate Error] rel : nofollaw" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // download OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area download="testfile.jpg"',
                "params" => [
                    "download" => 'testfile.jpg',    // FILENAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // download NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area download=""',
                "params" => [
                    "download" => '',    // FILENAME
                ],
                "result" => "[Validate Error] download : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // target OK Case
            [
                "dtd" => "HTML5",
                "text" => '#area target="_blank"',
                "params" => [
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML5",
                "text" => '#area target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // -- Custom Attribute

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
                "text" => '#area style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area class="test"',
                "params" => [
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // alt OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area alt="sample text"',
                "params" => [
                    "alt" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => "[Validate Error] alt : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // shape OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area shape="rect"',
                "params" => [
                    "shape" => 'rect',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area shape="carcle"',
                "params" => [
                    "shape" => 'carcle',    // SHAPE
                ],
                "result" => "[Validate Error] shape : carcle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area shape="poly" coords="400,50,450,150,350,150"',
                "params" => [
                    "shape" => 'poly',
                    "coords" => '400,50,450,150,350,150',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area shape="rect" coords="100,200,200"',
                "params" => [
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // href OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area href="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area href="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // hreflang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area hreflang="ja-JP"',
                "params" => [
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area hreflang="ja-"',
                "params" => [
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area type="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "type" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area type="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "type" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] type : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area rel="help"',
                "params" => [
                    "rel" => 'help',    // REL_TYPE_A
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area rel="altenate"',
                "params" => [
                    "rel" => 'altenate',    // REL_TYPE_A
                ],
                "result" => "[Validate Error] rel : altenate" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // download OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area download="testfile.jpg"',
                "params" => [
                    "download" => 'testfile.jpg',    // FILENAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // download NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area download=""',
                "params" => [
                    "download" => '',    // FILENAME
                ],
                "result" => "[Validate Error] download : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // target OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area target="_top"',
                "params" => [
                    "target" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#area target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // -- Custom Attribute

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
