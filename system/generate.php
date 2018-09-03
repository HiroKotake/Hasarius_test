<?php
namespace Hasarius\test\system;

use jp\teleios\libs\StrUtils;
use Hasarius\system\Generate;
use Hasarius\system\Vessel;
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
        $generate = new Generate();
        $result = $generate->preprocess($source);

        $this->assertEquals($result, $lines);
    }

    public function provideAnalyze()
    {
        $params = [];
        // div要素でチェック
        $params[] = [
            "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_100.txt",
            "lines" => [
                [
                    "Command"  => "div",
                    "TagOpen"  => "<div id=\"id_1\" style=\"width:100%;\">",
                    "TagClose" => "</div>",
                    "Text" => "",
                ],
                [
                    "Command"  => "div",
                    "TagOpen"  => "<div id=\"id_2\" style=\"float:left;width:50%;\" align=\"center\">",
                    "TagClose" => "</div>",
                    "Text" => "",
                ],
                [
                    "Command"  => SYSTEM["TEXT_ONLY"],
                    "TagOpen"  => "",
                    "TagClose" => "",
                    "Text" => "左",
                ],
                [
                    "Command"  => SYSTEM["BLOCK_CLOSE"],
                    "TagOpen"  => "",
                    "TagClose" => "",
                    "Text" => "",
                ],
                [
                    "Command"  => "div",
                    "TagOpen"  => "<div id=\"id_5\" style=\"float:right;width:50%;\" align=\"center\">",
                    "TagClose" => "</div>",
                    "Text" => "",
                ],
                [
                    "Command"  => SYSTEM["TEXT_ONLY"],
                    "TagOpen"  => "",
                    "TagClose" => "",
                    "Text" => "右",
                ],
                [
                    "Command"  => SYSTEM["BLOCK_CLOSE"],
                    "TagOpen"  => "",
                    "TagClose" => "",
                    "Text" => "",
                ],
                [
                    "Command"  => SYSTEM["BLOCK_CLOSE"],
                    "TagOpen"  => "",
                    "TagClose" => "",
                    "Text" => "",
                ],
            ],
            "CloserStack" => [
                [
                    "TagClose" => "</div>",
                    "SubCommand" => [],
                    "Indent" => 2,
                ],
                [
                    "TagClose" => "</div>",
                    "SubCommand" => [],
                    "Indent" => 3,
                ],
                [
                    "TagClose" => "</div>",
                    "SubCommand" => [],
                    "Indent" => 3,
                ],
            ]
        ];

        return $params;
    }

    /** @dataProvider provideAnalyze */
    public function testAnalyze(string $source, array $lines, array $closerStack)
    {
        $generate = new Generate();
        $generate->initialize();
        $preprocessed = $generate->preprocess($source);
        $generate->analyze($preprocessed);
        $analyzed = $generate->getVesselContainer();

        $resultLines = [];
        foreach ($analyzed as $vessel) {
            $resultLines[] = [
                "Command"  => $vessel->getCommand(),
                "TagOpen"  => $vessel->getTagOpen(),
                "TagClose" => $vessel->getTagClose(),
                "Text"     => $vessel->getText(),
            ];
        }

        $this->assertEquals($resultLines, $lines);

        $generate->transform();
        $resultCloserStack = $generate->getCloserStack();
        $checkStack = [];
        foreach ($resultCloserStack as $stack) {
            $checkStack[] = [
                "TagClose"   => $stack->getCloseTag(),
                "SubCommand" => $stack->getSubCommand(),
                "Indent"     => $stack->getIndentNumber(),
            ];
        }

        $this->assertEquals($checkStack, $closerStack);
    }

    public function provideSubGenerateBody()
    {
        $params = [];
        // div要素でチェック
        $params[] = [
            "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_100.txt",
            "docs" => [
                StrUtils::indentRepeat(1) . "<body class=\"BodyClassName1\">",
                StrUtils::indentRepeat(2) . "<div id=\"id_1\" style=\"width:100%;\">",
                StrUtils::indentRepeat(3) . "<div id=\"id_2\" style=\"float:left;width:50%;\" align=\"center\">",
                StrUtils::indentRepeat(4) . "左",
                StrUtils::indentRepeat(3) . "</div>",
                StrUtils::indentRepeat(3) . "<div id=\"id_5\" style=\"float:right;width:50%;\" align=\"center\">",
                StrUtils::indentRepeat(4) . "右",
                StrUtils::indentRepeat(3) . "</div>",
                StrUtils::indentRepeat(2) . "</div>",
                StrUtils::indentRepeat(1) . "</body>",
                "</html>",
            ],
        ];

        return $params;
    }

    /** @dataProvider provideSubGenerateBody */
    public function testSubGenerateBody(string $source, array $docs)
    {
        $generate = new Generate();
        $generate->initialize();
        $preprocessed = $generate->preprocess($source);
        $generate->analyze($preprocessed);
        $generate->transform();
        $generate->subGenerateBody();
        $documentWork = $generate->getDocumentWork();

        $this->assertEquals($documentWork, $docs);
    }

    public function provideGenerateHtml()
    {
        $params = [
            // 平文 (html)
            [
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                "lines" => [
                ]
            ],
            // 平文 (head)
            [
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                "lines" => [
                ]
            ],
            // 平文 (html) + 変数あり
            [
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                "lines" => [
                ]
            ],
            // 平文 (head) + 変数あり
            [
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                "lines" => [
                ]
            ],
            // @include (html)
            [
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002.txt",
                "lines" => [
                ]
            ],
            // @include (head)
            [
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002.txt",
                "lines" => [
                ]
            ],
        ];
        return $params;
    }

    /** @dataProvider provideGenerateHtml */
    public function testGenerateHtml(string $source, array $lines)
    {
        $generate = new Generate();
        $result = $generate->preprocess($source);
        $generate->analyze($result);
        $generate->transform();
        $generate->generate();
        $html = $generate->getDocumentWork();

//        var_dump($html);
    }
}
