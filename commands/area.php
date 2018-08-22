<?php
namespace Hasarius\test\commands;

require("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandArea extends HasariusTest
{

    public function provideValidate()
    {
        $params = [
                        // HTML4_LOOSE
            // -- Global
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area  target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#area  nohref=""',
                "params" => [
                    "nohref" => '',    // ON_OFF
                ],
                "result" => '',
            ],
            // HTML4_STRICT
            // -- Global
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#area  nohref=""',
                "params" => [
                    "nohref" => '',    // ON_OFF
                ],
                "result" => '',
            ],
            // HTML4_FRAME
            // -- Global
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area  target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#area  nohref=""',
                "params" => [
                    "nohref" => '',    // ON_OFF
                ],
                "result" => '',
            ],
            // XHTML1_LOOSE
            // -- Global
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area xml:lang=""',
                "params" => [
                    "xml:lang" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#area  target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            // XHTML1_STRICT
            // -- Global
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area xml:lang=""',
                "params" => [
                    "xml:lang" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            // XHTML1_FRAME
            // -- Global
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area xml:lang=""',
                "params" => [
                    "xml:lang" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#area  target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            // XHTML1_1
            // -- Global
            [
                "dtd" => "XHTML1_1",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area xml:lang=""',
                "params" => [
                    "xml:lang" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "XHTML1_1",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            // HTML5
            // -- Global
            [
                "dtd" => "HTML5",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "HTML5",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  hreflang=""',
                "params" => [
                    "hreflang" => '',    // LANG
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  type=""',
                "params" => [
                    "type" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  rel=""',
                "params" => [
                    "rel" => '',    // REL_TYPE_A
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  download=""',
                "params" => [
                    "download" => '',    // FILENAME
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5",
                "text" => '#area  target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => '',
            ],
            // -- Custom Attribute
            // HTML5_1
            // -- Global
            [
                "dtd" => "HTML5_1",
                "text" => '#area style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area dir=""',
                "params" => [
                    "dir" => '',
                ],
                "result" => '',
            ],
            // -- Tag Attribute
            [
                "dtd" => "HTML5_1",
                "text" => '#area  alt=""',
                "params" => [
                    "alt" => '',    // STRING
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  shape=""',
                "params" => [
                    "shape" => '',    // SHAPE
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  coords=""',
                "params" => [
                    "coords" => '',    // COORDS
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  href=""',
                "params" => [
                    "href" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  hreflang=""',
                "params" => [
                    "hreflang" => '',    // LANG
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  type=""',
                "params" => [
                    "type" => '',    // URI
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  rel=""',
                "params" => [
                    "rel" => '',    // REL_TYPE_A
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  download=""',
                "params" => [
                    "download" => '',    // FILENAME
                ],
                "result" => '',
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#area  target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => '',
            ],
            // -- Custom Attribute

        ];
        return $params;
    }

    /** @dataProvider provideValidate */
    public function testValidate(string $dtd, string $text, array $params, string $result)
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
