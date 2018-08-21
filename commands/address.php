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
            [
                "text" => '#address id="authors"',
                "params" => [
                    "id" => "authors",
                ],
                "result" => ""
            ],
            [
                "text" => '#address dir="auto"',
                "params" => [
                    "dir" => "auto",
                ],
                "result" => ""
            ],
            [
                "text" => '#address dir="left"',
                "params" => [
                    "dir" => "left",
                ],
                "result" => "[Validate Error] dir : left" . PHP_EOL
            ]
        ];
    }

    /** @dataProvider provideValidate */
    public function testValidate(string $text, array $params, string $result)
    {
        $data = $this->makeCommandCase($text);
        $paramaters = $data['vessel']->getParamaters();
        // パラメータ存在チェック
        $this->assertEquals($params, $paramaters);
        // パラメータ記述確認チェック
        $validated = HtmlValidation::validate($data['command'], $paramaters);
        $this->assertEquals($result, $validated);
    }
}
