<?php
namespace Hasarius\test\commands;

require_once("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandParam extends HasariusTest
{

    public function provideValidateHtml4Loose()
    {
        $params = [
            // -- Global
            // id OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // valuetype OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param valuetype="object"',
                "params" => [
                    "valuetype" => 'object',    // /^(data|ref|object)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // valuetype NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param valuetype="obect"',
                "params" => [
                    "valuetype" => 'obect',    // /^(data|ref|object)$/
                ],
                "result" => ["[Validate Error] valuetype : obect" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param type="application/pdf"',
                "params" => [
                    "type" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#param type="aplication/pdf"',
                "params" => [
                    "type" => 'aplication/pdf',    // MIME
                ],
                "result" => ["[Validate Error] type : aplication/pdf" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
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
            // id OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // valuetype OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param valuetype="data"',
                "params" => [
                    "valuetype" => 'data',    // /^(data|ref|object)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // valuetype NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param valuetype="date"',
                "params" => [
                    "valuetype" => 'date',    // /^(data|ref|object)$/
                ],
                "result" => ["[Validate Error] valuetype : date" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param type="application/pdf"',
                "params" => [
                    "type" => 'application/pdf',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#param type="img/png"',
                "params" => [
                    "type" => 'img/png',    // MIME
                ],
                "result" => ["[Validate Error] type : img/png" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
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
            // id OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param id="sample text"',
                "params" => [
                    "id" => 'sample text',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // valuetype OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param valuetype="data"',
                "params" => [
                    "valuetype" => 'data',    // /^(data|ref|object)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // valuetype NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param valuetype="date"',
                "params" => [
                    "valuetype" => 'date',    // /^(data|ref|object)$/
                ],
                "result" => ["[Validate Error] valuetype : date" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // type OK Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param type="image/png"',
                "params" => [
                    "type" => 'image/png',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "HTML4_FRAME",
                "text" => '#param type="img/png"',
                "params" => [
                    "type" => 'img/png',    // MIME
                ],
                "result" => ["[Validate Error] type : img/png" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
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
            // id OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param id="サンプル テキスト"',
                "params" => [
                    "id" => 'サンプル テキスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // valuetype OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param valuetype="ref"',
                "params" => [
                    "valuetype" => 'ref',    // /^(data|ref|object)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // valuetype NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param valuetype="raf"',
                "params" => [
                    "valuetype" => 'raf',    // /^(data|ref|object)$/
                ],
                "result" => ["[Validate Error] valuetype : raf" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param type="text/plain"',
                "params" => [
                    "type" => 'text/plain',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#param type="imag/jpeg"',
                "params" => [
                    "type" => 'imag/jpeg',    // MIME
                ],
                "result" => ["[Validate Error] type : imag/jpeg" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],

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
            // id OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param name="test"',
                "params" => [
                    "name" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param value="サンプル テキスト"',
                "params" => [
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // valuetype OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param valuetype="object"',
                "params" => [
                    "valuetype" => 'object',    // /^(data|ref|object)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // valuetype NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param valuetype="ofject"',
                "params" => [
                    "valuetype" => 'ofject',    // /^(data|ref|object)$/
                ],
                "result" => ["[Validate Error] valuetype : ofject" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param type="image/jpeg"',
                "params" => [
                    "type" => 'image/jpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_STRICT",
                "text" => '#param type="aplication/pdf"',
                "params" => [
                    "type" => 'aplication/pdf',    // MIME
                ],
                "result" => ["[Validate Error] type : aplication/pdf" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],

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
            // id OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param name="テスト"',
                "params" => [
                    "name" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // valuetype OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param valuetype="data"',
                "params" => [
                    "valuetype" => 'data',    // /^(data|ref|object)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // valuetype NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param valuetype="date"',
                "params" => [
                    "valuetype" => 'date',    // /^(data|ref|object)$/
                ],
                "result" => ["[Validate Error] valuetype : date" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param type="video/mpeg"',
                "params" => [
                    "type" => 'video/mpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_FRAME",
                "text" => '#param type="aplication/pdf"',
                "params" => [
                    "type" => 'aplication/pdf',    // MIME
                ],
                "result" => ["[Validate Error] type : aplication/pdf" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
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

    public function provideValidateXhtml11()
    {
        $params = [
            // -- Global
            // id OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param name="サンプル テキスト"',
                "params" => [
                    "name" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param value="test"',
                "params" => [
                    "value" => 'test',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // valuetype OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param valuetype="ref"',
                "params" => [
                    "valuetype" => 'ref',    // /^(data|ref|object)$/
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // valuetype NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param valuetype="raf"',
                "params" => [
                    "valuetype" => 'raf',    // /^(data|ref|object)$/
                ],
                "result" => ["[Validate Error] valuetype : raf" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] valuetype",
            ],
            // type OK Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param type="image/jpeg"',
                "params" => [
                    "type" => 'image/jpeg',    // MIME
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] type",
            ],
            // type NG Case
            [
                "dtd" => "XHTML1_1",
                "text" => '#param type="img/png"',
                "params" => [
                    "type" => 'img/png',    // MIME
                ],
                "result" => ["[Validate Error] type : img/png" . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] type",
            ],

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
            // id OK Case
            [
                "dtd" => "HTML5",
                "text" => '#param id="test"',
                "params" => [
                    "id" => 'test',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML5",
                "text" => '#param name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML5",
                "text" => '#param value="サンプル テキスト"',
                "params" => [
                    "value" => 'サンプル テキスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
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
            // id OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#param id="テスト"',
                "params" => [
                    "id" => 'テスト',
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // id NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#param id=""',
                "params" => [
                    "id" => '',
                ],
                "result" => ["[Validate Error] id : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] id",
            ],
            // -- Tag Attribute
            // name OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#param name="sample text"',
                "params" => [
                    "name" => 'sample text',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // name NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#param name=""',
                "params" => [
                    "name" => '',    // STRING
                ],
                "result" => ["[Validate Error] name : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] name",
            ],
            // value OK Case
            [
                "dtd" => "HTML5_1",
                "text" => '#param value="テスト"',
                "params" => [
                    "value" => 'テスト',    // STRING
                ],
                "result" => [],
                "description" => "OK CHECK PROCESS[" . __LINE__ . "] value",
            ],
            // value NG Case
            [
                "dtd" => "HTML5_1",
                "text" => '#param value=""',
                "params" => [
                    "value" => '',    // STRING
                ],
                "result" => ["[Validate Error] value : " . PHP_EOL],
                "description" => "NG CHECK PROCESS[" . __LINE__ . "] value",
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
