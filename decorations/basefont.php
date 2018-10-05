<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationBasefont extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @basefont id=\"id198_93\" size=\"2\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id198_93',
                    "size" => '2',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @basefont id=\"id198_93\" size=\"10\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id198_93',
                    "size" => '10',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => ["[Validate Error] size : 10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @basefont id=\"id198_93\" color=\"#FF7F00\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id198_93',
                    "color" => '#FF7F00',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @basefont id=\"id198_93\" color=\"rad\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id198_93',
                    "color" => 'rad',    // COLOR
                ],
                "result" => ["[Validate Error] color : rad" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @basefont id=\"id198_93\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id198_93',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @basefont id=\"id198_93\" face=\"\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id198_93',
                    "face" => '',    // FONT
                ],
                "result" => [],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
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

    public function provideValidateHtml4Frame()
    {
        $params = [
            // -- Global
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @basefont id=\"id850_35\" size=\"-2\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id850_35',
                    "size" => '-2',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @basefont id=\"id850_35\" size=\"-11\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id850_35',
                    "size" => '-11',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => ["[Validate Error] size : -11" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @basefont id=\"id850_35\" color=\"#FF7F00\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id850_35',
                    "color" => '#FF7F00',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @basefont id=\"id850_35\" color=\"yellaw\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id850_35',
                    "color" => 'yellaw',    // COLOR
                ],
                "result" => ["[Validate Error] color : yellaw" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @basefont id=\"id850_35\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id850_35',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @basefont id=\"id850_35\" face=\"\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id850_35',
                    "face" => '',    // FONT
                ],
                "result" => [],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
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
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @basefont id=\"id545_71\" size=\"5\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id545_71',
                    "size" => '5',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @basefont id=\"id545_71\" size=\"0\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id545_71',
                    "size" => '0',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => ["[Validate Error] size : 0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @basefont id=\"id545_71\" color=\"#FF7F00\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id545_71',
                    "color" => '#FF7F00',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @basefont id=\"id545_71\" color=\"#00F10\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id545_71',
                    "color" => '#00F10',    // COLOR
                ],
                "result" => ["[Validate Error] color : #00F10" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @basefont id=\"id545_71\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id545_71',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @basefont id=\"id545_71\" face=\"\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id545_71',
                    "face" => '',    // FONT
                ],
                "result" => [],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
            ],

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

    public function provideValidateXhtml1Frame()
    {
        $params = [
            // -- Global
            // -- Tag Attribute
            // size OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @basefont id=\"id481_66\" size=\"+3\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id481_66',
                    "size" => '+3',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // size NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @basefont id=\"id481_66\" size=\"+9\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id481_66',
                    "size" => '+9',    // /(+|-)(1|2|3|4|5|6|7)/
                ],
                "result" => ["[Validate Error] size : +9" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] size",
            ],
            // color OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @basefont id=\"id481_66\" color=\"red\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id481_66',
                    "color" => 'red',    // COLOR
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // color NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @basefont id=\"id481_66\" color=\"#FF7F0\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id481_66',
                    "color" => '#FF7F0',    // COLOR
                ],
                "result" => ["[Validate Error] color : #FF7F0" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] color",
            ],
            // face OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @basefont id=\"id481_66\" face=\"MS-Gothic\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id481_66',
                    "face" => 'MS-Gothic',    // FONT
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] face",
            ],
            // face NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @basefont id=\"id481_66\" face=\"\" sample@ text.",
                "decoration" => "basefont",
                "params" => [
                    "id" => 'id481_66',
                    "face" => '',    // FONT
                ],
                "result" => [],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] face",
            ],

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

}
