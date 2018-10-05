<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandFrameset extends HasariusTest
{

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // cols OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset cols="100,*,100"',
                "params" => [
                    "cols" => '100,*,100',    // REPET_NC_PCT_ASTER
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset cols=",*150"',
                "params" => [
                    "cols" => ',*150',    // REPET_NC_PCT_ASTER
                ],
                "result" => ["[Validate Error] cols : ,*150" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset rows="100,*,100"',
                "params" => [
                    "rows" => '100,*,100',    // REPET_NC_PCT_ASTER
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset rows="100,*100"',
                "params" => [
                    "rows" => '100,*100',    // REPET_NC_PCT_ASTER
                ],
                "result" => ["[Validate Error] rows : 100,*100" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset border="1"',
                "params" => [
                    "border" => '1',    // /^(0|1)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#frameset border="2"',
                "params" => [
                    "border" => '2',    // /^(0|1)$/
                ],
                "result" => ["[Validate Error] border : 2" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
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

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // -- Tag Attribute
            // cols OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset cols="100,*,100"',
                "params" => [
                    "cols" => '100,*,100',    // REPET_NC_PCT_ASTER
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // cols NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset cols="100,*100"',
                "params" => [
                    "cols" => '100,*100',    // REPET_NC_PCT_ASTER
                ],
                "result" => ["[Validate Error] cols : 100,*100" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] cols",
            ],
            // rows OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset rows="150,*"',
                "params" => [
                    "rows" => '150,*',    // REPET_NC_PCT_ASTER
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rows",
            ],
            // rows NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#frameset rows=",*150"',
                "params" => [
                    "rows" => ',*150',    // REPET_NC_PCT_ASTER
                ],
                "result" => ["[Validate Error] rows : ,*150" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rows",
            ],

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

}
