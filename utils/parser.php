<?php
namespace Hasarius\test\utils;

use Hasarius\utils\Parser;
use Hasarius\system\Vessel;
use PHPUnit\Framework\TestCase;

class TestParser extends TestCase
{

    public function provideAnalyzeLine()
    {
        $command = [];
        // コマンド、属性、本文
        $command[] = [
            'source' => '#div id="test" class="block_left" name="div test" div is block tag.',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [],
                'text' => ' div is block tag.',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // 属性エスケープ確認：コマンド、属性、本文
        $command[] = [
            'source' => '#div id="test" class="block_left" name\="div test" div is block tag.',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                ],
                'modifiers' => [],
                'text' => ' name="div test" div is block tag.',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // 本文のみ
        $command[] = [
            'source' => 'div is block tag.',
            'expects' => [
                'command' => SYSTEM["TEXT_ONLY"],
                'paramaters' => [],
                'modifiers' => [],
                'text' => 'div is block tag.',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // 本文のみ：インラインコマンド付き閉じコマンドなし
        $command[] = [
            'source' => 'div is @b block tag.',
            'expects' => [
                'command' => SYSTEM["TEXT_ONLY"],
                'paramaters' => [],
                'modifiers' => [
                ],
                'text' => 'div is @b block tag.',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // 本文のみ：インラインコマンド付き
        $command[] = [
            'source' => 'div is @b block tag@.',
            'expects' => [
                'command' => SYSTEM["TEXT_ONLY"],
                'paramaters' => [],
                'modifiers' => [
                    '@b block tag@'
                ],
                'text' => 'div is @b block tag@.',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コマンド、属性、本文(インラインコマンド付き)
        $command[] = [
            'source' => '#div id="test" class="block_left" name="div test" div is @b block tag@.',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                    '@b block tag@'
                ],
                'text' => ' div is @b block tag@.',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コマンド、属性、本文(インラインコマンド付き)、コメント
        $command[] = [
            'source' => '#div id="test" class="block_left" name="div test" div is @b block tag@. // Test Case Comment',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                    '@b block tag@'
                ],
                'text' => ' div is @b block tag@.',
                'comment' => 'Test Case Comment',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コマンド、属性、本文(インラインコマンド付き)、コメント
        $command[] = [
            'source' => '#div id="test" class="block_left" name="div test" [@b style="color: red;" TEST@] div is @b block tag@. // Test Case Comment',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                    '@b style="color: red;" TEST@',
                    '@b block tag@'
                ],
                'text' => ' [@b style="color: red;" TEST@] div is @b block tag@.',
                'comment' => 'Test Case Comment',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コマンド、属性、本文(インラインコマンド付き(エスケープシーケンスで無効化))、コメント
        $command[] = [
            'source' => '#div id="test" class="block_left" name="div test" div is \@b block tag\@. // Test Case Comment',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                ],
                'text' => ' div is @b block tag@.',
                'comment' => 'Test Case Comment',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コマンド、属性、本文(インラインコマンド付き(エスケープシーケンスで無効化))、コメント
        $command[] = [
            'source' => '#div id="test" class="block_left" name="div test" div is \@b style="color: red;" block tag\@. // Test Case Comment',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                ],
                'text' => ' div is @b style="color: red;" block tag@.',
                'comment' => 'Test Case Comment',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コマンド、属性、本文(インラインコマンド付き、コメントエスケープを含む)、コメント
        $command[] = [
            'source' => '#div id="test" class="block_left" name="div test" \/\/ div is @b block tag@. // Test Case Comment',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                    '@b block tag@'
                ],
                'text' => ' // div is @b block tag@.',
                'comment' => 'Test Case Comment',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コマンド開始文字変更('#'->'&')：コマンド、属性、本文(インラインコマンド付き、コメントエスケープを含む)、コメント
        $command[] = [
            'source' => '&div id="test" class="block_left" name="div test" \/\/ div is @b block tag@. // Test Case Comment',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                    '@b block tag@'
                ],
                'text' => ' // div is @b block tag@.',
                'comment' => 'Test Case Comment',
            ],
            'subCommand' => [],
            'commandHead' => '&',
            'attributeDelime' => null,
        ];

        // コマンド開始文字変更('#'->'&')、属性区切り文字変更('='->':')：コマンド、属性、本文(インラインコマンド付き、コメントエスケープを含む)、コメント
        $command[] = [
            'source' => '&div id:"test" class:"block_left" name:"div test" \/\/ div is @b block tag@. // Test Case Comment',
            'expects' => [
                'command' => 'div',
                'paramaters' => [
                    'id' => 'test',
                    'class' => 'block_left',
                    'name' => 'div test'
                ],
                'modifiers' => [
                    '@b block tag@'
                ],
                'text' => ' // div is @b block tag@.',
                'comment' => 'Test Case Comment',
            ],
            'subCommand' => [],
            'commandHead' => '&',
            'attributeDelime' => ':',
        ];

        // ブロッククローズ
        $command[] = [
            'source' => '## // Block Close',
            'expects' => [
                'command' => SYSTEM["BLOCK_CLOSE"],
                'paramaters' => [],
                'modifiers' => [],
                'text' => '',
                'comment' => 'Block Close',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // コメント行
        $command[] = [
            'source' => ' // Block Close',
            'expects' => [
                'command' => SYSTEM["COMMENT_LINE"],
                'paramaters' => [],
                'modifiers' => [],
                'text' => '',
                'comment' => 'Block Close',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // 空白行 - 改行のみ
        $command[] = [
            'source' => '',
            'expects' => [
                'command' => SYSTEM["EMPTY_LINE"],
                'paramaters' => [],
                'modifiers' => [],
                'text' => '',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];

        // 空白行 - WhiteSpaceのみ
        $command[] = [
            'source' => "\t 　",
            'expects' => [
                'command' => SYSTEM["EMPTY_LINE"],
                'paramaters' => [],
                'modifiers' => [],
                'text' => '',
                'comment' => '',
            ],
            'subCommand' => [],
            'commandHead' => null,
            'attributeDelime' => null,
        ];


        return $command;
    }

    /** @dataProvider provideAnalyzeLine */
    public function testAnalyzeLine($source, $expects, $subCommand, $commandHead, $attributeDelime)
    {
        if (empty($subCommand) && empty($commandHead) && empty($attributeDelime)) {
            $vessel = Parser::analyzeLine(["lineText" => $source, "lineNumber" => 1]);
        } else if (!empty($subCommand) && empty($commandHead) && empty($attributeDelime)) {
            $vessel = Parser::analyzeLine(["lineText" => $source, "lineNumber" => 1], $subCommand);
        } else if (!empty($commandHead) && empty($attributeDelime)) {
            $vessel = Parser::analyzeLine(["lineText" => $source, "lineNumber" => 1], $subCommand, $commandHead);
        } else {
            $vessel = Parser::analyzeLine(["lineText" => $source, "lineNumber" => 1], $subCommand, $commandHead, $attributeDelime);
        }

        if (array_key_exists('command', $expects)) {
            $this->assertEquals($vessel->getCommand(), $expects['command']);
        }
        if (array_key_exists('paramaters', $expects)) {
            $this->assertEquals($vessel->getParamaters(), $expects['paramaters']);
        }
        if (array_key_exists('modifiers', $expects)) {
            $this->assertEquals($vessel->getModifiers(), $expects['modifiers']);
        }
        if (array_key_exists('text', $expects)) {
            $this->assertEquals($vessel->getText(), $expects['text']);
        }
        if (array_key_exists('comment', $expects)) {
            $this->assertEquals($vessel->getComment(), $expects['comment']);
        }
    }

    public function provideAnalyzeLineSubCommand()
    {
        $command = [];

        // サブコマンド
        $command[] = [
            'source' => "| test",
            'expects' => [
                'command' => "|",
                'text' => "test",
                'comment' => '',
            ],
            'subCommand' => [["Symbol" => "|", "Tag" => "td", "Description" => "カラム指定"]],
        ];

        // サブコマンド
        $command[] = [
            'source' => "| test",
            'expects' => [
                'command' => "|",
                'text' => "test",
                'comment' => '',
            ],
            'subCommand' => [
                ["Symbol" => "!", "Tag" => "th", "Description" => "見出しカラム指定"],
                ["Symbol" => "|", "Tag" => "td", "Description" => "カラム指定"]
            ],
        ];

        // サブコマンド
        $command[] = [
            'source' => "! test",
            'expects' => [
                'command' => "!",
                'text' => "test",
                'comment' => '',
            ],
            'subCommand' => [
                ["Symbol" => "+", "Tag" => "tr", "Description" => "行指定"],
                ["Symbol" => "!", "Tag" => "th", "Description" => "見出しカラム指定"],
                ["Symbol" => "|", "Tag" => "td", "Description" => "カラム指定"]
            ],
        ];

        return $command;
    }

    /** @dataProvider provideAnalyzeLineSubCommand */
    public function testAnalyzeLineSubCommand($source, $expects, $subCommand)
    {
        $result = Parser::analyzeLine(["lineText" => $source, "lineNumber" => 1], $subCommand);
        $this->assertEquals($result->isSubCommand(), true);
        $this->assertEquals($result->getCommand(), $expects["command"]);
        $this->assertEquals($result->getText(), $expects["text"]);
    }

    public function provideGetIncludeFile()
    {
        $params = [];

        // ファイルインクルードチェック：　ファイル名のみ
        $params[] = [
            'source' => '@include ' . __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'validater.php',
            'expects' => [
                'filename' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'validater.php',
                'comment' => null
            ]
        ];

        // ファイルインクルードチェック：　ファイル名のみ、コメント付き
        $params[] = [
            'source' => '@include ' . __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'validater.php // ホゲ',
            'expects' => [
                'filename' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'validater.php',
                'comment' => 'ホゲ'
            ]
        ];

        return $params;
    }

    /** @dataProvider provideGetIncludeFile */
    public function testGetIncludeFile($source, $expects)
    {
        $result = Parser::getIncludeFile($source);
        $this->assertEquals($result, $expects);
    }

    public function provideExceptionGetIncludeFile()
    {
        $params = [];

        // ファイルインクルード例外チェック：　ファイル名なし
        $params[] = [
            'source' => '@include // コメント',
            'errMsg' => 'File is not mention !!'
        ];

        // ファイルインクルードチェック：　ファイル名のみ、コメント付き
        $params[] = [
            'source' => '@include /dir/hoge/hoge.txt // ホゲ',
            'errMsg' => 'File not exists !! -> (/dir/hoge/hoge.txt)'
        ];

        return $params;
    }

    /** @dataProvider provideExceptionGetIncludeFile */
    public function testExceptionGetIncludeFile($source, $errMsg)
    {
        try {
            Parser::getIncludeFile($source);
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), $errMsg);
        }
    }

    public function provideGetValiable()
    {
        $params = [];

        // 変数定義チェック：　変数名、変数値
        $params[] = [
            'source' => '@var v=123',
            'expecs' => [
                "varName"  => "v",
                "varValue" => "123",
                "comment"  => null,
            ],
        ];

        // 変数定義チェック：　変数名、変数値
        $params[] = [
            'source' => '@var v = 123',
            'expecs' => [
                "varName"  => "v",
                "varValue" => "123",
                "comment"  => null,
            ],
        ];

        // 変数定義チェック：　変数名、変数値, コメント
        $params[] = [
            'source' => '@var v=123 // コメント',
            'expecs' => [
                "varName"  => "v",
                "varValue" => "123",
                "comment"  => "コメント",
            ],
        ];

        // 変数定義チェック：　変数名、変数値, コメント
        $params[] = [
            'source' => '@var v= 123 // コメント',
            'expecs' => [
                "varName"  => "v",
                "varValue" => "123",
                "comment"  => "コメント",
            ],
        ];

        // 変数定義チェック：　変数名、変数値, コメント
        $params[] = [
            'source' => '@var v =123 // コメント',
            'expecs' => [
                "varName"  => "v",
                "varValue" => "123",
                "comment"  => "コメント",
            ],
        ];

        // 変数定義チェック：　変数名、変数値(カッコで括り空白文字あり), コメント
        $params[] = [
            'source' => '@var v="test code" // コメント',
            'expecs' => [
                "varName"  => "v",
                "varValue" => "\"test code\"",
                "comment"  => "コメント",
            ],
        ];

        // 変数定義チェック：　変数名、変数値(カッコで括り空白文字あり), コメント
        $params[] = [
            'source' => "@var v='test=code' // コメント",
            'expecs' => [
                "varName"  => "v",
                "varValue" => "'test=code'",
                "comment"  => "コメント",
            ],
        ];

        return $params;
    }

    /** @dataProvider provideGetValiable */
    public function testGetValiable($source, $expects)
    {
        $result = Parser::getValiable($source);
        $this->assertEquals($result, $expects);
    }

    public function provideExceptionGetValiable()
    {
        $params = [];

        // 変数定義エラーチェック：　変数名、コメント
        $params[] = [
            'source' => "@var v // コメント",
            'errMsg' => "Valiable define error !! (Defined = '@var v // コメント')"
        ];

        // 変数定義エラーチェック：　変数名、コメント イコールあり
        $params[] = [
            'source' => "@var v = // コメント",
            'errMsg' => "Valiable define error !! (Defined = '@var v = // コメント')"
        ];

        // 変数定義エラーチェック：　変数名、コメント
        $params[] = [
            'source' => "@var // コメント",
            'errMsg' => "Valiable define error !! (Defined = '@var // コメント')"
        ];

        return $params;
    }

    /** @dataProvider provideExceptionGetValiable */
    public function testExceptionGetValiable($source, $errMsg)
    {
        try {
            Parser::getValiable($source);
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), $errMsg);
        }
    }
}
