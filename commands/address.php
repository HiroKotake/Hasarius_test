<?php
namespace Hasarius\test\commands;

require("HasariusTest.php");
use Hasarius\test\HasariusTest;
use Hasarius\utils\HtmlValidation as HtmlValidation;

class TestCommandAddress extends HasariusTest
{

    public function provideValidate()
    {
        return [
            // HTML4_LOOSE
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#address id="authors"',
                "params" => [
                    "id" => "authors",
                ],
                "result" => ""
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#address dir="auto"',
                "params" => [
                    "dir" => "auto",
                ],
                "result" => ""
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#address title="タイトル"',
                "params" => [
                    "title" => "タイトル",
                ],
                "result" => ""
            ],
            [
                "dtd" => "HTML4_LOOSE",
                "text" => '#address dir="left"',
                "params" => [
                    "dir" => "left",
                ],
                "result" => "[Validate Error] dir : left" . PHP_EOL
            ],
            // HTML4_STRICT
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#address id="authors"',
                "params" => [
                    "id" => "authors",
                ],
                "result" => ""
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#address dir="auto"',
                "params" => [
                    "dir" => "auto",
                ],
                "result" => ""
            ],
            [
                "dtd" => "HTML4_STRICT",
                "text" => '#address dir="left"',
                "params" => [
                    "dir" => "left",
                ],
                "result" => "[Validate Error] dir : left" . PHP_EOL
            ],
            // XHTML1_LOOSE
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#address id="authors"',
                "params" => [
                    "id" => "authors",
                ],
                "result" => ""
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#address dir="auto"',
                "params" => [
                    "dir" => "auto",
                ],
                "result" => ""
            ],
            [
                "dtd" => "XHTML1_LOOSE",
                "text" => '#address dir="left"',
                "params" => [
                    "dir" => "left",
                ],
                "result" => "[Validate Error] dir : left" . PHP_EOL
            ],
            // XHTML1_1
            [
                "dtd" => "XHTML1_1",
                "text" => '#address id="authors"',
                "params" => [
                    "id" => "authors",
                ],
                "result" => ""
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#address dir="auto"',
                "params" => [
                    "dir" => "auto",
                ],
                "result" => ""
            ],
            [
                "dtd" => "XHTML1_1",
                "text" => '#address dir="left"',
                "params" => [
                    "dir" => "left",
                ],
                "result" => "[Validate Error] dir : left" . PHP_EOL
            ],
            // HTML5_1
            [
                "dtd" => "HTML5_1",
                "text" => '#address id="authors"',
                "params" => [
                    "id" => "authors",
                ],
                "result" => ""
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#address dir="auto"',
                "params" => [
                    "dir" => "auto",
                ],
                "result" => ""
            ],
            [
                "dtd" => "HTML5_1",
                "text" => '#address dir="left"',
                "params" => [
                    "dir" => "left",
                ],
                "result" => "[Validate Error] dir : left" . PHP_EOL
            ],
        ];
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
