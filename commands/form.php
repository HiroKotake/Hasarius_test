<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandForm extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // style OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form style="sample text"',
                "params" => [
                    "style" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form method="post"',
                "params" => [
                    "method" => 'post',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form method="past"',
                "params" => [
                    "method" => 'past',    // GET_POST
                ],
                "result" => "[Validate Error] method : past" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form enctype="application/x-www-form-urlencoded"',
                "params" => [
                    "enctype" => 'application/x-www-form-urlencoded',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain)$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form enctype="application/x-www-f"',
                "params" => [
                    "enctype" => 'application/x-www-f',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain)$/
                ],
                "result" => "[Validate Error] enctype : application/x-www-f" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form accept-charset="UTF-8"',
                "params" => [
                    "accept-charset" => 'UTF-8',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form accept-charset="EUCJP"',
                "params" => [
                    "accept-charset" => 'EUCJP',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : EUCJP" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form accept="application/pdf"',
                "params" => [
                    "accept" => 'application/pdf',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form accept="aplication/pdf"',
                "params" => [
                    "accept" => 'aplication/pdf',    // MIME
                ],
                "result" => "[Validate Error] accept : aplication/pdf" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form target="_blank"',
                "params" => [
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#form target=""',
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
                "text" => '#form style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form lang="サンプル テキスト"',
                "params" => [
                    "lang" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form method="post"',
                "params" => [
                    "method" => 'post',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form method="past"',
                "params" => [
                    "method" => 'past',    // GET_POST
                ],
                "result" => "[Validate Error] method : past" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form enctype="multipart/form-data"',
                "params" => [
                    "enctype" => 'multipart/form-data',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form enctype="multipart/formdata"',
                "params" => [
                    "enctype" => 'multipart/formdata',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : multipart/formdata" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form accept-charset="EUC-JP"',
                "params" => [
                    "accept-charset" => 'EUC-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form accept-charset="EUCJP"',
                "params" => [
                    "accept-charset" => 'EUCJP',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : EUCJP" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form accept="image/jpeg"',
                "params" => [
                    "accept" => 'image/jpeg',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form accept="imag/jpeg"',
                "params" => [
                    "accept" => 'imag/jpeg',    // MIME
                ],
                "result" => "[Validate Error] accept : imag/jpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form target="_blank"',
                "params" => [
                    "target" => '_blank',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#form target=""',
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
                "text" => '#form style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form method="post"',
                "params" => [
                    "method" => 'post',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form method="got"',
                "params" => [
                    "method" => 'got',    // GET_POST
                ],
                "result" => "[Validate Error] method : got" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form enctype="text/plain"',
                "params" => [
                    "enctype" => 'text/plain',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form enctype="text/plan"',
                "params" => [
                    "enctype" => 'text/plan',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : text/plan" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form accept-charset="EUC-JP"',
                "params" => [
                    "accept-charset" => 'EUC-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form accept-charset="UTF8"',
                "params" => [
                    "accept-charset" => 'UTF8',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : UTF8" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form accept="application/pdf"',
                "params" => [
                    "accept" => 'application/pdf',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form accept="img/png"',
                "params" => [
                    "accept" => 'img/png',    // MIME
                ],
                "result" => "[Validate Error] accept : img/png" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // target OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form target="sub_window"',
                "params" => [
                    "target" => 'sub_window',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#form target=""',
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
                "text" => '#form style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form lang="test"',
                "params" => [
                    "lang" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form method="get"',
                "params" => [
                    "method" => 'get',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form method="past"',
                "params" => [
                    "method" => 'past',    // GET_POST
                ],
                "result" => "[Validate Error] method : past" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form enctype="multipart/form-data"',
                "params" => [
                    "enctype" => 'multipart/form-data',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form enctype="multipart/form"',
                "params" => [
                    "enctype" => 'multipart/form',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : multipart/form" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form accept-charset="UTF-8"',
                "params" => [
                    "accept-charset" => 'UTF-8',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form accept-charset="ISO-2022JP"',
                "params" => [
                    "accept-charset" => 'ISO-2022JP',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : ISO-2022JP" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form accept="application/pdf"',
                "params" => [
                    "accept" => 'application/pdf',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form accept="imag/jpeg"',
                "params" => [
                    "accept" => 'imag/jpeg',    // MIME
                ],
                "result" => "[Validate Error] accept : imag/jpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form target="_self"',
                "params" => [
                    "target" => '_self',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#form target=""',
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
                "text" => '#form style="test"',
                "params" => [
                    "style" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form class="sample text"',
                "params" => [
                    "class" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form title="sample text"',
                "params" => [
                    "title" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form method="post"',
                "params" => [
                    "method" => 'post',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form method="got"',
                "params" => [
                    "method" => 'got',    // GET_POST
                ],
                "result" => "[Validate Error] method : got" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form enctype="text/plain"',
                "params" => [
                    "enctype" => 'text/plain',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form enctype="application/x-w"',
                "params" => [
                    "enctype" => 'application/x-w',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : application/x-w" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form accept-charset="UTF-8"',
                "params" => [
                    "accept-charset" => 'UTF-8',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form accept-charset="ShiftJIS"',
                "params" => [
                    "accept-charset" => 'ShiftJIS',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : ShiftJIS" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form accept="application/pdf"',
                "params" => [
                    "accept" => 'application/pdf',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#form accept="vide/mpeg"',
                "params" => [
                    "accept" => 'vide/mpeg',    // MIME
                ],
                "result" => "[Validate Error] accept : vide/mpeg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
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
                "text" => '#form style="サンプル テキスト"',
                "params" => [
                    "style" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form title="サンプル テキスト"',
                "params" => [
                    "title" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form dir="auto"',
                "params" => [
                    "dir" => 'auto',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form dir="ato"',
                "params" => [
                    "dir" => 'ato',
                ],
                "result" => "[Validate Error] dir : ato" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form action="https://www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form method="get"',
                "params" => [
                    "method" => 'get',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form method="past"',
                "params" => [
                    "method" => 'past',    // GET_POST
                ],
                "result" => "[Validate Error] method : past" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form enctype="application/x-www-form-urlencoded"',
                "params" => [
                    "enctype" => 'application/x-www-form-urlencoded',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form enctype="application/x-www-form"',
                "params" => [
                    "enctype" => 'application/x-www-form',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : application/x-www-form" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form accept-charset="ISO-2022-JP"',
                "params" => [
                    "accept-charset" => 'ISO-2022-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form accept-charset="EUCJP"',
                "params" => [
                    "accept-charset" => 'EUCJP',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : EUCJP" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form accept="image/png"',
                "params" => [
                    "accept" => 'image/png',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form accept="aplication/pdf"',
                "params" => [
                    "accept" => 'aplication/pdf',    // MIME
                ],
                "result" => "[Validate Error] accept : aplication/pdf" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // target OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form target="_top"',
                "params" => [
                    "target" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#form target=""',
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
                "text" => '#form style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form class="サンプル テキスト"',
                "params" => [
                    "class" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form title="test"',
                "params" => [
                    "title" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form lang="sample text"',
                "params" => [
                    "lang" => 'sample text',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form dir="lr"',
                "params" => [
                    "dir" => 'lr',
                ],
                "result" => "[Validate Error] dir : lr" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form method="get"',
                "params" => [
                    "method" => 'get',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form method="past"',
                "params" => [
                    "method" => 'past',    // GET_POST
                ],
                "result" => "[Validate Error] method : past" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form enctype="multipart/form-data"',
                "params" => [
                    "enctype" => 'multipart/form-data',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form enctype="multipart/form"',
                "params" => [
                    "enctype" => 'multipart/form',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : multipart/form" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form accept-charset="ISO-2022-JP"',
                "params" => [
                    "accept-charset" => 'ISO-2022-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form accept-charset="UTF8"',
                "params" => [
                    "accept-charset" => 'UTF8',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : UTF8" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form accept="text/plain"',
                "params" => [
                    "accept" => 'text/plain',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#form accept="text/plin"',
                "params" => [
                    "accept" => 'text/plin',    // MIME
                ],
                "result" => "[Validate Error] accept : text/plin" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
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
                "text" => '#form style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form dir="ltr"',
                "params" => [
                    "dir" => 'ltr',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form method="post"',
                "params" => [
                    "method" => 'post',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form method="got"',
                "params" => [
                    "method" => 'got',    // GET_POST
                ],
                "result" => "[Validate Error] method : got" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form enctype="text/plain"',
                "params" => [
                    "enctype" => 'text/plain',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form enctype="text/plin"',
                "params" => [
                    "enctype" => 'text/plin',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : text/plin" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form accept-charset="EUC-JP"',
                "params" => [
                    "accept-charset" => 'EUC-JP',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form accept-charset="UTF8"',
                "params" => [
                    "accept-charset" => 'UTF8',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : UTF8" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form accept="image/png"',
                "params" => [
                    "accept" => 'image/png',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form accept="aplication/pdf"',
                "params" => [
                    "accept" => 'aplication/pdf',    // MIME
                ],
                "result" => "[Validate Error] accept : aplication/pdf" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // target OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form target="_top"',
                "params" => [
                    "target" => '_top',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // autocomplete OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form autocomplete="off"',
                "params" => [
                    "autocomplete" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // autocomplete NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form autocomplete="om"',
                "params" => [
                    "autocomplete" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] autocomplete : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // -- Custom Attribute
            // validate OK Case
            [
                "dtd" => "HTML5",
                "text" => '#form validate="off"',
                "params" => [
                    "validate" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] validate",
            ],
            // validate NG Case
            [
                "dtd" => "HTML5",
                "text" => '#form validate="of"',
                "params" => [
                    "validate" => 'of',    // ON_OFF
                ],
                "result" => "[Validate Error] validate : of" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] validate",
            ],

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
                "text" => '#form style="テスト"',
                "params" => [
                    "style" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // style NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form style=""',
                "params" => [
                    "style" => '',
                ],
                "result" => "[Validate Error] style : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] style",
            ],
            // class OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form class="テスト"',
                "params" => [
                    "class" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // class NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form class=""',
                "params" => [
                    "class" => '',
                ],
                "result" => "[Validate Error] class : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] class",
            ],
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => "[Validate Error] id : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // title OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form title="テスト"',
                "params" => [
                    "title" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // title NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form title=""',
                "params" => [
                    "title" => '',
                ],
                "result" => "[Validate Error] title : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] title",
            ],
            // lang OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form lang="テスト"',
                "params" => [
                    "lang" => 'テスト',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // lang NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form lang=""',
                "params" => [
                    "lang" => '',
                ],
                "result" => "[Validate Error] lang : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] lang",
            ],
            // dir OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form dir="rtl"',
                "params" => [
                    "dir" => 'rtl',
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // dir NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form dir="rl"',
                "params" => [
                    "dir" => 'rl',
                ],
                "result" => "[Validate Error] dir : rl" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] dir",
            ],
            // -- Tag Attribute
            // action OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form action="../script/sample.js"',
                "params" => [
                    "action" => '../script/sample.js',    // URI
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // action NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form action="https://80:www.teleios.jp/img/sample.jpg"',
                "params" => [
                    "action" => 'https://80:www.teleios.jp/img/sample.jpg',    // URI
                ],
                "result" => "[Validate Error] action : https://80:www.teleios.jp/img/sample.jpg" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] action",
            ],
            // method OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form method="get"',
                "params" => [
                    "method" => 'get',    // GET_POST
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // method NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form method="past"',
                "params" => [
                    "method" => 'past',    // GET_POST
                ],
                "result" => "[Validate Error] method : past" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] method",
            ],
            // enctype OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form enctype="application/x-www-form-urlencoded"',
                "params" => [
                    "enctype" => 'application/x-www-form-urlencoded',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // enctype NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form enctype="multipart/formdata"',
                "params" => [
                    "enctype" => 'multipart/formdata',    // /^(application/x-www-form-urlencoded|multipart/form-data|text/plain){0,1}$/
                ],
                "result" => "[Validate Error] enctype : multipart/formdata" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] enctype",
            ],
            // accept-charset OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form accept-charset="Shift_JIS"',
                "params" => [
                    "accept-charset" => 'Shift_JIS',    // ENCODE
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept-charset NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form accept-charset="UTF8"',
                "params" => [
                    "accept-charset" => 'UTF8',    // ENCODE
                ],
                "result" => "[Validate Error] accept-charset : UTF8" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept-charset",
            ],
            // accept OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form accept="video/mpeg"',
                "params" => [
                    "accept" => 'video/mpeg',    // MIME
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // accept NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form accept="aplication/pdf"',
                "params" => [
                    "accept" => 'aplication/pdf',    // MIME
                ],
                "result" => "[Validate Error] accept : aplication/pdf" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] accept",
            ],
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => "[Validate Error] name : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // target OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form target="_parent"',
                "params" => [
                    "target" => '_parent',    // WINDOW
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // target NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form target=""',
                "params" => [
                    "target" => '',    // WINDOW
                ],
                "result" => "[Validate Error] target : " . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] target",
            ],
            // autocomplete OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form autocomplete="off"',
                "params" => [
                    "autocomplete" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // autocomplete NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form autocomplete="om"',
                "params" => [
                    "autocomplete" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] autocomplete : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] autocomplete",
            ],
            // -- Custom Attribute
            // validate OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form validate="off"',
                "params" => [
                    "validate" => 'off',    // ON_OFF
                ],
                "result" => '',
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] validate",
            ],
            // validate NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#form validate="om"',
                "params" => [
                    "validate" => 'om',    // ON_OFF
                ],
                "result" => "[Validate Error] validate : om" . PHP_EOL,
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] validate",
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
