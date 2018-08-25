<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandMenuitem extends HasariusTest
{

    public function provideValidateHtml51()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem type="command"',
                "params" => [
                    "type" => 'command',    // /^(command|radio|checkbox)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem type="commnd"',
                "params" => [
                    "type" => 'commnd',    // /^(command|radio|checkbox)$/
                ],
                "result" => "[Validate Error] type : commnd" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // label OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem label="sample text"',
                "params" => [
                    "label" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // label NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem label=""',
                "params" => [
                    "label" => '',    // STRING
                ],
                "result" => "[Validate Error] label : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] label",
            ],
            // icon OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem icon="../script/sample.js"',
                "params" => [
                    "icon" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] icon",
            ],
            // icon NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem icon="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "icon" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] icon : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] icon",
            ],
            // radiogroup OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem radiogroup="test"',
                "params" => [
                    "radiogroup" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] radiogroup",
            ],
            // radiogroup NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem radiogroup=""',
                "params" => [
                    "radiogroup" => '',    // STRING
                ],
                "result" => "[Validate Error] radiogroup : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] radiogroup",
            ],
            // -- Custom Attribute
            // checked OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem checked="on"',
                "params" => [
                    "checked" => 'on',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // checked NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem checked="om"',
                "params" => [
                    "checked" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] checked : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] checked",
            ],
            // disable OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem disable="off"',
                "params" => [
                    "disable" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] disable",
            ],
            // disable NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem disable="om"',
                "params" => [
                    "disable" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] disable : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] disable",
            ],
            // default OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem default="off"',
                "params" => [
                    "default" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] default",
            ],
            // default NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#menuitem default="om"',
                "params" => [
                    "default" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] default : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] default",
            ],

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
