<?php
namespace Hasarius\test\decorations;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestDecorationAnker extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" title=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" lang=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" dir=\"ltr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" dir=\"ato\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" href=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" name=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // charset OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" charset=\"ISO-2022-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "charset" => 'ISO-2022-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // charset NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" charset=\"UTF8\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "charset" => 'UTF8',    // ENCODE
                ],
                "result" => "[Validate Error] charset : UTF8" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // hreflang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" type=\"text/plain\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "type" => 'text/plain',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" type=\"text/plin\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "type" => 'text/plin',    // MIME
                ],
                "result" => "[Validate Error] type : text/plin" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" rel=\"chapter\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "rel" => 'chapter',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" rel=\"appendx\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "rel" => 'appendx',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : appendx" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" rev=\"start\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "rev" => 'start',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" rev=\"alternaoe\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "rev" => 'alternaoe',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : alternaoe" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // shape OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" shape=\"circle\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "shape" => 'circle',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" shape=\"rct\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "shape" => 'rct',    // SHAPE
                ],
                "result" => "[Validate Error] shape : rct" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" shape=\"rect\" coords=\"100,100,200,200\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "shape" => 'rect',
                    "coords" => '100,100,200,200',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" shape=\"circle\" coords=\"100,100\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "shape" => 'circle',
                    "coords" => '100,100',
                ],
                "result" => "[Validate Error] coords : 100,100" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" target=\"_self\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "target" => '_self',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => "This is @anker id=\"id633_71\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id633_71',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
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
                "text" => "This is @anker id=\"id811_66\" style=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" class=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" title=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" dir=\"rtl\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" dir=\"lr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" href=\"../script/sample.js\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" name=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // charset OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" charset=\"ISO-2022-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "charset" => 'ISO-2022-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // charset NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" charset=\"ISO-2022JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "charset" => 'ISO-2022JP',    // ENCODE
                ],
                "result" => "[Validate Error] charset : ISO-2022JP" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // hreflang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" type=\"text/plain\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "type" => 'text/plain',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" type=\"imag/jpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "type" => 'imag/jpeg',    // MIME
                ],
                "result" => "[Validate Error] type : imag/jpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" rel=\"stylesheet\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "rel" => 'stylesheet',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" rel=\"appendx\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "rel" => 'appendx',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : appendx" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" rev=\"alternate\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "rev" => 'alternate',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" rev=\"alternaoe\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "rev" => 'alternaoe',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : alternaoe" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // shape OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" shape=\"poly\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "shape" => 'poly',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" shape=\"rct\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "shape" => 'rct',    // SHAPE
                ],
                "result" => "[Validate Error] shape : rct" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" shape=\"poly\" coords=\"400,50,450,150,350,150\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "shape" => 'poly',
                    "coords" => '400,50,450,150,350,150',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" shape=\"circle\" coords=\"100,100\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "shape" => 'circle',
                    "coords" => '100,100',
                ],
                "result" => "[Validate Error] coords : 100,100" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" target=\"_blank\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => "This is @anker id=\"id811_66\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id811_66',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
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
                "text" => "This is @anker id=\"id61_37\" style=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" class=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" lang=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" dir=\"ltr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" dir=\"ato\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" href=\"../script/sample.js\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" name=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // charset OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" charset=\"EUC-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "charset" => 'EUC-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // charset NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" charset=\"UTF8\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "charset" => 'UTF8',    // ENCODE
                ],
                "result" => "[Validate Error] charset : UTF8" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // hreflang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" type=\"text/plain\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "type" => 'text/plain',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" type=\"text/plin\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "type" => 'text/plin',    // MIME
                ],
                "result" => "[Validate Error] type : text/plin" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" rel=\"index\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "rel" => 'index',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" rel=\"appendx\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "rel" => 'appendx',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : appendx" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" rev=\"contents\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "rev" => 'contents',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" rev=\"chaptar\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "rev" => 'chaptar',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : chaptar" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // shape OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" shape=\"circle\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "shape" => 'circle',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" shape=\"defoult\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "shape" => 'defoult',    // SHAPE
                ],
                "result" => "[Validate Error] shape : defoult" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" shape=\"circle\" coords=\"100,100,50\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "shape" => 'circle',
                    "coords" => '100,100,50',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" shape=\"rect\" coords=\"100,200,200\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" target=\"_parent\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "target" => '_parent',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => "This is @anker id=\"id61_37\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id61_37',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
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
                "text" => "This is @anker id=\"id433_41\" style=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" class=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" title=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" lang=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" dir=\"auto\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" dir=\"ato\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" href=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" name=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // charset OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" charset=\"ISO-2022-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "charset" => 'ISO-2022-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // charset NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" charset=\"ShiftJIS\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "charset" => 'ShiftJIS',    // ENCODE
                ],
                "result" => "[Validate Error] charset : ShiftJIS" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // hreflang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" type=\"application/pdf\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "type" => 'application/pdf',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" type=\"text/plin\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "type" => 'text/plin',    // MIME
                ],
                "result" => "[Validate Error] type : text/plin" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" rel=\"start\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "rel" => 'start',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" rel=\"sction\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "rel" => 'sction',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : sction" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" rev=\"help\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "rev" => 'help',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" rev=\"chaptar\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "rev" => 'chaptar',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : chaptar" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" shape=\"default\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "shape" => 'default',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" shape=\"defoult\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "shape" => 'defoult',    // SHAPE
                ],
                "result" => "[Validate Error] shape : defoult" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" shape=\"poly\" coords=\"400,50,450,150,350,150\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "shape" => 'poly',
                    "coords" => '400,50,450,150,350,150',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" shape=\"rect\" coords=\"100,200,200\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" target=\"sub_window\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "target" => 'sub_window',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => "This is @anker id=\"id433_41\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id433_41',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
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
                "text" => "This is @anker id=\"id161_62\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" class=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" title=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" lang=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" dir=\"ltr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" dir=\"rl\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" href=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" name=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // charset OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" charset=\"ISO-2022-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "charset" => 'ISO-2022-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // charset NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" charset=\"ISO-2022JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "charset" => 'ISO-2022JP',    // ENCODE
                ],
                "result" => "[Validate Error] charset : ISO-2022JP" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // hreflang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" type=\"image/jpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "type" => 'image/jpeg',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" type=\"aplication/pdf\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "type" => 'aplication/pdf',    // MIME
                ],
                "result" => "[Validate Error] type : aplication/pdf" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" rel=\"glossary\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "rel" => 'glossary',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" rel=\"appendx\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "rel" => 'appendx',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : appendx" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" rev=\"bookmark\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "rev" => 'bookmark',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" rev=\"appendx\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "rev" => 'appendx',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : appendx" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" shape=\"poly\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "shape" => 'poly',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" shape=\"carcle\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "shape" => 'carcle',    // SHAPE
                ],
                "result" => "[Validate Error] shape : carcle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" shape=\"circle\" coords=\"100,100,50\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "shape" => 'circle',
                    "coords" => '100,100,50',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" shape=\"circle\" coords=\"100,100\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "shape" => 'circle',
                    "coords" => '100,100',
                ],
                "result" => "[Validate Error] coords : 100,100" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" target=\"_blank\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => "This is @anker id=\"id161_62\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id161_62',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],

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
                "text" => "This is @anker id=\"id75_28\" style=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" class=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" title=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" lang=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" dir=\"rtl\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" dir=\"lr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" href=\"../script/sample.js\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" name=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // charset OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" charset=\"EUC-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "charset" => 'EUC-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // charset NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" charset=\"ShiftJIS\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "charset" => 'ShiftJIS',    // ENCODE
                ],
                "result" => "[Validate Error] charset : ShiftJIS" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // hreflang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" type=\"image/jpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "type" => 'image/jpeg',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" type=\"img/png\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "type" => 'img/png',    // MIME
                ],
                "result" => "[Validate Error] type : img/png" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" rel=\"chapter\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "rel" => 'chapter',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" rel=\"sction\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "rel" => 'sction',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : sction" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" rev=\"chapter\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "rev" => 'chapter',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" rev=\"chaptar\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "rev" => 'chaptar',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : chaptar" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" shape=\"poly\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "shape" => 'poly',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" shape=\"carcle\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "shape" => 'carcle',    // SHAPE
                ],
                "result" => "[Validate Error] shape : carcle" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" shape=\"rect\" coords=\"100,100,200,200\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "shape" => 'rect',
                    "coords" => '100,100,200,200',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" shape=\"rect\" coords=\"100,200,200\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "shape" => 'rect',
                    "coords" => '100,200,200',
                ],
                "result" => "[Validate Error] coords : 100,200,200" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" target=\"_top\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "target" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => "This is @anker id=\"id75_28\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id75_28',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
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
                "text" => "This is @anker id=\"id187_75\" style=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" class=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" title=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" lang=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" dir=\"auto\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" dir=\"lr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" href=\"https://www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "href" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" name=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // charset OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" charset=\"EUC-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "charset" => 'EUC-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // charset NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" charset=\"EUCJP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "charset" => 'EUCJP',    // ENCODE
                ],
                "result" => "[Validate Error] charset : EUCJP" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] charset",
            ],
            // hreflang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" type=\"image/jpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "type" => 'image/jpeg',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" type=\"vide/mpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "type" => 'vide/mpeg',    // MIME
                ],
                "result" => "[Validate Error] type : vide/mpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" rel=\"glossary\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "rel" => 'glossary',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" rel=\"appendx\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "rel" => 'appendx',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : appendx" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" rev=\"bookmark\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "rev" => 'bookmark',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" rev=\"alternaoe\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "rev" => 'alternaoe',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : alternaoe" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // shape OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" shape=\"poly\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "shape" => 'poly',    // SHAPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // shape NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" shape=\"pory\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "shape" => 'pory',    // SHAPE
                ],
                "result" => "[Validate Error] shape : pory" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] shape",
            ],
            // coords OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" shape=\"poly\" coords=\"400,50,450,150,350,150\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "shape" => 'poly',
                    "coords" => '400,50,450,150,350,150',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // coords NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" shape=\"circle\" coords=\"100,100\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "shape" => 'circle',
                    "coords" => '100,100',
                ],
                "result" => "[Validate Error] coords : 100,100" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] coords",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" target=\"_parent\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "target" => '_parent',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => "This is @anker id=\"id187_75\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id187_75',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],

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
                "text" => "This is @anker id=\"id157_9\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" class=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" title=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" lang=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" dir=\"ltr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" dir=\"ato\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" href=\"../script/sample.js\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" name=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "name" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // hreflang OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" type=\"image/png\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "type" => 'image/png',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" type=\"vide/mpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "type" => 'vide/mpeg',    // MIME
                ],
                "result" => "[Validate Error] type : vide/mpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" rel=\"subsection\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "rel" => 'subsection',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" rel=\"appendx\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "rel" => 'appendx',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : appendx" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" rev=\"alternate\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "rev" => 'alternate',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" rev=\"capyright\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "rev" => 'capyright',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : capyright" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // download OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" download=\"testfile.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "download" => 'testfile.jpg',    // FILENAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // download NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" download=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "download" => '',    // FILENAME
                ],
                "result" => "[Validate Error] download : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // target OK Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" target=\"_top\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "target" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML5",
                "text" => "This is @anker id=\"id157_9\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id157_9',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
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
                "text" => "This is @anker id=\"id52_30\" style=\"サンプル テキスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" style=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" class=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "class" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" class=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" title=\"テスト\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" title=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" lang=\"sample text\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" lang=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" dir=\"rtl\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" dir=\"lr\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // href OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" href=\"../script/sample.js\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "href" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // href NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" href=\"https://80:www.teleios.jp/img/sample.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "href" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] href : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] href",
            ],
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" name=\"test\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "name" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" name=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // hreflang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" hreflang=\"ja-JP\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "hreflang" => 'ja-JP',    // LANG
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // hreflang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" hreflang=\"ja-\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "hreflang" => 'ja-',    // LANG
                ],
                "result" => "[Validate Error] hreflang : ja-" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] hreflang",
            ],
            // type OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" type=\"image/jpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "type" => 'image/jpeg',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" type=\"imag/jpeg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "type" => 'imag/jpeg',    // MIME
                ],
                "result" => "[Validate Error] type : imag/jpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // rel OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" rel=\"alternate\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "rel" => 'alternate',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rel NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" rel=\"capyright\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "rel" => 'capyright',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rel : capyright" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rel",
            ],
            // rev OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" rev=\"alternate\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "rev" => 'alternate',    // LINE_TYPE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // rev NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" rev=\"sction\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "rev" => 'sction',    // LINE_TYPE
                ],
                "result" => "[Validate Error] rev : sction" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] rev",
            ],
            // download OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" download=\"testfile.jpg\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "download" => 'testfile.jpg',    // FILENAME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // download NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" download=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "download" => '',    // FILENAME
                ],
                "result" => "[Validate Error] download : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] download",
            ],
            // target OK Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" target=\"_blank\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML5_1",
                "text" => "This is @anker id=\"id52_30\" target=\"\" sample@ text.",
                "decoration" => "anker",
                "params" => [
                    "id" => 'id52_30',
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
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
