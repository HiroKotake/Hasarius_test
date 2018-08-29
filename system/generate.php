<?php
namespace Hasarius\test\system;

use Hasarius\system\Generate;
use PHPUnit\Framework\TestCase;

class TestGenerate extends TestCase
{

    public function providerPreprocess()
    {
        $params = [
            // 平文
            [
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test00.txt",
                "lines" => [
                    [
                        "filename" => "test00.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test00.txt",
                        "lineNumber" => 1,
                        "lineText" => "Hasariusについて",
                    ],
                    [
                        "filename" => "test00.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test00.txt",
                        "lineNumber" => 2,
                        "lineText" => "Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    ],
                    [
                        "filename" => "test00.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test00.txt",
                        "lineNumber" => 3,
                        "lineText" => "基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",

                    ],
                    [
                        "filename" => "test00.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test00.txt",
                        "lineNumber" => 4,
                        "lineText" => "また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    ],
                ]
            ],
            // 平文 + 変数あり
            [
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test01.txt",
                "lines" => [
                    [
                        "filename" => "test01.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test01.txt",
                        "lineNumber" => 3,
                        "lineText" => "Hasariusについて",
                    ],
                    [
                        "filename" => "test01.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test01.txt",
                        "lineNumber" => 4,
                        "lineText" => "Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    ],
                    [
                        "filename" => "test01.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test01.txt",
                        "lineNumber" => 5,
                        "lineText" => "基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",

                    ],
                    [
                        "filename" => "test01.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test01.txt",
                        "lineNumber" => 6,
                        "lineText" => "また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    ],
                ]
            ],
            // @include
        ];
        return $params;
    }

    /** @dataProvider providerPreprocess */
    public function testPreprocess(string $source, array $lines)
    {
        $genarate = new Generate();
        $result = $genarate->preprocess($source);

        $this->assertEquals($result, $lines);
    }
}