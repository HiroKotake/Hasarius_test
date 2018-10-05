<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationImage extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" style=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" class=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" lang=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" dir=\"ltr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" dir=\"lr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" src=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" alt=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "alt" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" longdesc=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "longdesc" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" longdesc=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" name=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" name=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // witdh OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" witdh=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "witdh" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" witdh=\"-50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "witdh" => '-50%',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : -50%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" height=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "height" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" height=\"-50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "height" => '-50%',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : -50%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" usemap=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" align=\"middle\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "align" => 'middle',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" align=\"tap\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "align" => 'tap',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : tap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" border=\"10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "border" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" border=\"-10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "border" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] border : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" hspace=\"4086\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "hspace" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" hspace=\"20.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "hspace" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] hspace : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" vspace=\"10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "vspace" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" vspace=\"-10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "vspace" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] vspace : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // -- Custom Attribute
            // ismap OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" ismap=\"on\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "ismap" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @image id=\"id102_92\" ismap=\"of\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id102_92',
                    "ismap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Loose */
    public function testValidateHtml4Loose(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @image id=\"id712_72\" style=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "class" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "title" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" lang=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" dir=\"auto\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" dir=\"ato\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" src=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" alt=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" longdesc=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" longdesc=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" name=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" name=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // witdh OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" witdh=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "witdh" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" witdh=\"0\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "witdh" => '0',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" height=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "height" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" height=\"-50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "height" => '-50%',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : -50%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" usemap=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" align=\"bottom\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "align" => 'bottom',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" align=\"lift\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "align" => 'lift',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : lift" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" border=\"256\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "border" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" border=\"20.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "border" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] border : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" hspace=\"256\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "hspace" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" hspace=\"256.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "hspace" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] hspace : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" vspace=\"256\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "vspace" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" vspace=\"256.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "vspace" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] vspace : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // -- Custom Attribute
            // ismap OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" ismap=\"on\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "ismap" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @image id=\"id712_72\" ismap=\"of\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id712_72',
                    "ismap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Strict */
    public function testValidateHtml4Strict(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @image id=\"id350_17\" style=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" class=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" title=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" lang=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" dir=\"auto\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" dir=\"lr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" src=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" alt=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "alt" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // longdesc OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" longdesc=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "longdesc" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" longdesc=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" name=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" name=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // witdh OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" witdh=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "witdh" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" witdh=\"50 %\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "witdh" => '50 %',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" height=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "height" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" height=\"50 %\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "height" => '50 %',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" usemap=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" align=\"middle\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "align" => 'middle',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" align=\"light\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "align" => 'light',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" border=\"256\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "border" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" border=\"256.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "border" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] border : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" hspace=\"4086\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "hspace" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" hspace=\"-4086\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "hspace" => '-4086',    // US_NZ
                ],
                "result" => ["[Validate Error] hspace : -4086" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" vspace=\"20\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "vspace" => '20',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" vspace=\"20.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "vspace" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] vspace : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // -- Custom Attribute
            // ismap OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" ismap=\"off\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "ismap" => 'off',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @image id=\"id350_17\" ismap=\"om\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id350_17',
                    "ismap" => 'om',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : om" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],

        ];
        return $params;
    }

    /** @dataProvider provideValidateHtml4Frame */
    public function testValidateHtml4Frame(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @image id=\"id731_62\" style=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "style" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" class=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" title=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" lang=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" dir=\"ltr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" dir=\"ato\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" src=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" alt=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // longdesc OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" longdesc=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "longdesc" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" longdesc=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" name=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" name=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // witdh OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" witdh=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "witdh" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" witdh=\"200.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "witdh" => '200.5',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : 200.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" height=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "height" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" height=\"0\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "height" => '0',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" usemap=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" align=\"middle\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "align" => 'middle',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" align=\"tap\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "align" => 'tap',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : tap" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" border=\"4086\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "border" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" border=\"20.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "border" => '20.5',    // US_NZ
                ],
                "result" => ["[Validate Error] border : 20.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" hspace=\"256\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "hspace" => '256',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" hspace=\"256.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "hspace" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] hspace : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" vspace=\"10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "vspace" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" vspace=\"-10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "vspace" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] vspace : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" ismap=\"ismap\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @image id=\"id731_62\" ismap=\"ismp\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_62',
                    "ismap" => 'ismp',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : ismp" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Loose */
    public function testValidateXhtml1Loose(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @image id=\"id426_92\" style=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "style" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" class=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" title=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" lang=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "lang" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" dir=\"auto\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "dir" => 'auto',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" dir=\"rl\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" src=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" alt=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "alt" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // longdesc OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" longdesc=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "longdesc" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" longdesc=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // witdh OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" witdh=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "witdh" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" witdh=\"200.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "witdh" => '200.5',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : 200.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" height=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "height" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" height=\"0\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "height" => '0',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" usemap=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" ismap=\"ismap\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @image id=\"id426_92\" ismap=\"map\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id426_92',
                    "ismap" => 'map',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : map" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Strict */
    public function testValidateXhtml1Strict(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @image id=\"id926_50\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" class=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "class" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" title=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "title" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" lang=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" dir=\"rtl\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "dir" => 'rtl',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" dir=\"rl\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "dir" => 'rl',
                ],
                "result" => ["[Validate Error] dir : rl" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" src=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" alt=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "alt" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // longdesc OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" longdesc=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" longdesc=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" name=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" name=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // witdh OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" witdh=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "witdh" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" witdh=\"50 %\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "witdh" => '50 %',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : 50 %" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" height=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "height" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" height=\"-50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "height" => '-50%',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : -50%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" usemap=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // align OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" align=\"bottom\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "align" => 'bottom',    // SIDE_ALL
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // align NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" align=\"light\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "align" => 'light',    // SIDE_ALL
                ],
                "result" => ["[Validate Error] align : light" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] align",
            ],
            // border OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" border=\"4086\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "border" => '4086',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // border NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" border=\"-10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "border" => '-10',    // US_NZ
                ],
                "result" => ["[Validate Error] border : -10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] border",
            ],
            // hspace OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" hspace=\"10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "hspace" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // hspace NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" hspace=\"256.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "hspace" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] hspace : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hspace",
            ],
            // vspace OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" vspace=\"10\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "vspace" => '10',    // US_NZ
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // vspace NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" vspace=\"256.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "vspace" => '256.5',    // US_NZ
                ],
                "result" => ["[Validate Error] vspace : 256.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] vspace",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" ismap=\"ismap\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @image id=\"id926_50\" ismap=\"on\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id926_50',
                    "ismap" => 'on',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : on" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml1Frame */
    public function testValidateXhtml1Frame(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @image id=\"id957_3\" style=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" class=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" title=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" lang=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" dir=\"ltr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" dir=\"lr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "dir" => 'lr',
                ],
                "result" => ["[Validate Error] dir : lr" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" src=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "src" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" alt=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // longdesc OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" longdesc=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "longdesc" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // longdesc NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" longdesc=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "longdesc" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] longdesc : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] longdesc",
            ],
            // witdh OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" witdh=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "witdh" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" witdh=\"0\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "witdh" => '0',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" height=\"200\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "height" => '200',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" height=\"0\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "height" => '0',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" usemap=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // ismap OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" ismap=\"ismap\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "ismap" => 'ismap',    // /^ismap$/i
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @image id=\"id957_3\" ismap=\"off\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id957_3',
                    "ismap" => 'off',    // /^ismap$/i
                ],
                "result" => ["[Validate Error] ismap : off" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidateXhtml11 */
    public function testValidateXhtml11(string $dtd, string $text, string $decoration, array $params, array $result, string $description)
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
                "text" => "This is @image id=\"id160_28\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "style" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" class=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "class" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" title=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "title" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" lang=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "lang" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" dir=\"ltr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" dir=\"ato\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" src=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" alt=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "alt" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // witdh OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" witdh=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "witdh" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" witdh=\"200.5\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "witdh" => '200.5',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : 200.5" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" height=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "height" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" height=\"-50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "height" => '-50%',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : -50%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" usemap=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "usemap" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // crossorigin OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" crossorigin=\"use-credentials\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "crossorigin" => 'use-credentials',    // USE_SIGNIN
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // crossorigin NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" crossorigin=\"use-credential\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "crossorigin" => 'use-credential',    // USE_SIGNIN
                ],
                "result" => ["[Validate Error] crossorigin : use-credential" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // srcset OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" srcset=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "srcset" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] srcset",
            ],
            // srcset NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" srcset=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "srcset" => '',    // STRING
                ],
                "result" => ["[Validate Error] srcset : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] srcset",
            ],
            // sizes OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" sizes=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "sizes" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // sizes NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" sizes=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "sizes" => '',    // STRING
                ],
                "result" => ["[Validate Error] sizes : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // -- Custom Attribute
            // ismap OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" ismap=\"on\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "ismap" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @image id=\"id160_28\" ismap=\"of\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id160_28',
                    "ismap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
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
                "text" => "This is @image id=\"id731_38\" style=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "style" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" style=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "style" => '',
                ],
                "result" => ["[Validate Error] style : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" class=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "class" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" class=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "class" => '',
                ],
                "result" => ["[Validate Error] class : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" title=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "title" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" title=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "title" => '',
                ],
                "result" => ["[Validate Error] title : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" lang=\"テスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "lang" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" lang=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "lang" => '',
                ],
                "result" => ["[Validate Error] lang : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" dir=\"ltr\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "dir" => 'ltr',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" dir=\"ato\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "dir" => 'ato',
                ],
                "result" => ["[Validate Error] dir : ato" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // src OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" src=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "src" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // src NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" src=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "src" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] src : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] src",
            ],
            // alt OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" alt=\"sample text\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "alt" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // alt NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" alt=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "alt" => '',    // STRING
                ],
                "result" => ["[Validate Error] alt : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] alt",
            ],
            // witdh OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" witdh=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "witdh" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // witdh NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" witdh=\"-50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "witdh" => '-50%',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] witdh : -50%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] witdh",
            ],
            // height OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" height=\"50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "height" => '50%',    // US_NZ_PCT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // height NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" height=\"-50%\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "height" => '-50%',    // US_NZ_PCT
                ],
                "result" => ["[Validate Error] height : -50%" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] height",
            ],
            // usemap OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" usemap=\"../script/sample.js\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "usemap" => '../script/sample.js',    // URI
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // usemap NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" usemap=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "usemap" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => ["[Validate Error] usemap : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] usemap",
            ],
            // crossorigin OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" crossorigin=\"use-credentials\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "crossorigin" => 'use-credentials',    // USE_SIGNIN
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // crossorigin NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" crossorigin=\"anonimous\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "crossorigin" => 'anonimous',    // USE_SIGNIN
                ],
                "result" => ["[Validate Error] crossorigin : anonimous" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] crossorigin",
            ],
            // srcset OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" srcset=\"サンプル テキスト\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "srcset" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] srcset",
            ],
            // srcset NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" srcset=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "srcset" => '',    // STRING
                ],
                "result" => ["[Validate Error] srcset : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] srcset",
            ],
            // sizes OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" sizes=\"test\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "sizes" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // sizes NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" sizes=\"\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "sizes" => '',    // STRING
                ],
                "result" => ["[Validate Error] sizes : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] sizes",
            ],
            // -- Custom Attribute
            // ismap OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" ismap=\"on\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "ismap" => 'on',    // ON_OFF
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] ismap",
            ],
            // ismap NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @image id=\"id731_38\" ismap=\"of\" sample@ text.",
                "decoration" => "image",
                "params" => [
                    "id" => 'id731_38',
                    "ismap" => 'of',    // ON_OFF
                ],
                "result" => ["[Validate Error] ismap : of" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] ismap",
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
