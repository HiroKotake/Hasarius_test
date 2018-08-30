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
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                "lines" => [
                    [
                        "filename" => "test_000.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                        "lineNumber" => 1,
                        "lineText" => "Hasariusについて",
                    ],
                    [
                        "filename" => "test_000.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                        "lineNumber" => 2,
                        "lineText" => "Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    ],
                    [
                        "filename" => "test_000.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                        "lineNumber" => 3,
                        "lineText" => "基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",

                    ],
                    [
                        "filename" => "test_000.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                        "lineNumber" => 4,
                        "lineText" => "また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    ],
                ]
            ],
            // 平文 + 変数あり
            [
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                "lines" => [
                    [
                        "filename" => "test_001.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                        "lineNumber" => 3,
                        "lineText" => "Hasariusについて",
                    ],
                    [
                        "filename" => "test_001.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                        "lineNumber" => 4,
                        "lineText" => "Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    ],
                    [
                        "filename" => "test_001.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                        "lineNumber" => 5,
                        "lineText" => "基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",

                    ],
                    [
                        "filename" => "test_001.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                        "lineNumber" => 6,
                        "lineText" => "また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    ],
                ]
            ],
            // @include
            [
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002.txt",
                "lines" => [
                    [
                        "filename" => "test_002_2.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002_2.txt",
                        "lineNumber" => 1,
                        "lineText" => "Hasariusについて",
                    ],
                    [
                        "filename" => "test_002_2.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002_2.txt",
                        "lineNumber" => 2,
                        "lineText" => "Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    ],
                    [
                        "filename" => "test_002_2.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002_2.txt",
                        "lineNumber" => 3,
                        "lineText" => "基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",

                    ],
                    [
                        "filename" => "test_002_2.txt",
                        "filefullpath" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002_2.txt",
                        "lineNumber" => 4,
                        "lineText" => "また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    ],
                ]
            ],
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

    public function provideAnalyze()
    {
        $params = [
            // div要素でチェック
            [
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_100.txt",
                "lines" => []
            ],
        ];

        return $params;
    }

    /** @dataProvider provideAnalyze */
    public function testAnalyze(string $source, array $lines)
    {
        $genarate = new Generate();
        $genarate->initialize();
        $preprocessed = $genarate->preprocess($source);
        $genarate->analyze($preprocessed);
        /*
        $analyzed = $genarate->getVesselContainer;
echo PHP_EOL;
echo '[DEBUG] PREPROCESS :' . PHP_EOL;
var_dump($preprocessed);
echo PHP_EOL;
        */
    }
}
