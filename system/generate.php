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
                "DocumentType" => "HTML4_LOOSE",
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                "lines" => [
                    "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">",
                    "<html>",
                    "    <head lang=\"ja\">",
                    "        <title>Default Page Title</title>",
                    "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">",
                    "        <meta http-equiv=\"Pragma\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Cache-Control\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Expires\" content=\"86400\">",
                    "        <meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\">",
                    "        <meta http-equiv=\"Content-Style-Type\" content=\"text/css\">",
                    "        <meta http-equiv=\"Refresh\" content=\"300\">",
                    "        <meta http-equiv=\"Jump\" content=\"60;https://www.teleios.jp/sample/\">",
                    "        <meta name=\"keywords\" content=\"ホームページ,HTML,CSS,JavaScript\">",
                    "        <meta name=\"description\" content=\"文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。\">",
                    "        <meta name=\"ROBOTS\" content=\"ALL\">",
                    "        <meta name=\"author\" content=\"Takahiro Kotake\">",
                    "        <meta name=\"reply-to\" content=\"info_hasarius&#64;teleios.jp\">",
                    "        <meta name=\"copyright\" content=\"teleios\">",
                    "        <meta name=\"generator\" content=\"hasarius\">",
                    "        <meta name=\"date\" content=\"2018-08-31T12:00:00+09:00\">",
                    "        <script type=\"text/javascript\" src=\"script/sample.js\"></script>",
                    "        <script src=\"script/common.js\"></script>",
                    "        <link rel=\"stylesheet\" href=\"css/style.css\">",
                    "    </head>",
                    "    <body class=\"BodyClassName1\">",
                    "        Hasariusについて",
                    "        Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    "        基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",
                    "        また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    "    </body>",
                    "</html>",
                ]
            ],
            // 平文 (head)
            [
                "DocumentType" => "HTML4_LOOSE",
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                "lines" => [
                    "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">",
                    "<html>",
                    "    <head lang=\"ja\">",
                    "        <title>Default Page Title</title>",
                    "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">",
                    "        <meta http-equiv=\"Pragma\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Cache-Control\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Expires\" content=\"86400\">",
                    "        <meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\">",
                    "        <meta http-equiv=\"Content-Style-Type\" content=\"text/css\">",
                    "        <meta http-equiv=\"Refresh\" content=\"300\">",
                    "        <meta http-equiv=\"Jump\" content=\"60;https://www.teleios.jp/sample/\">",
                    "        <meta name=\"keywords\" content=\"ホームページ,HTML,CSS,JavaScript\">",
                    "        <meta name=\"description\" content=\"文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。\">",
                    "        <meta name=\"ROBOTS\" content=\"ALL\">",
                    "        <meta name=\"author\" content=\"Takahiro Kotake\">",
                    "        <meta name=\"reply-to\" content=\"info_hasarius&#64;teleios.jp\">",
                    "        <meta name=\"copyright\" content=\"teleios\">",
                    "        <meta name=\"generator\" content=\"hasarius\">",
                    "        <meta name=\"date\" content=\"2018-08-31T12:00:00+09:00\">",
                    "        <script type=\"text/javascript\" src=\"script/sample.js\"></script>",
                    "        <script src=\"script/common.js\"></script>",
                    "        <link rel=\"stylesheet\" href=\"css/style.css\">",
                    "    </head>",
                    "    <body class=\"BodyClassName1\">",
                    "        Hasariusについて",
                    "        Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    "        基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",
                    "        また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    "    </body>",
                    "</html>",
                ]
            ],
            // 平文 (html) + 変数あり
            [
                "DocumentType" => "XHTML1_1",
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                "lines" => [
                    "<?xml version=\"1.0\" encoding=\"utf-8\"?>" . PHP_EOL ."<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">",
                    "<html xmlns=\"http://www.w3.org/1999/xhtml\">",
                    "    <head xml:lang=\"ja\">",
                    "        <title>Default Page Title</title>",
                    "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">",
                    "        <meta http-equiv=\"Pragma\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Cache-Control\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Expires\" content=\"86400\">",
                    "        <meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\">",
                    "        <meta http-equiv=\"Content-Style-Type\" content=\"text/css\">",
                    "        <meta http-equiv=\"Refresh\" content=\"300\">",
                    "        <meta http-equiv=\"Jump\" content=\"60;https://www.teleios.jp/sample/\">",
                    "        <meta name=\"keywords\" content=\"ホームページ,HTML,CSS,JavaScript\">",
                    "        <meta name=\"description\" content=\"文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。\">",
                    "        <meta name=\"ROBOTS\" content=\"ALL\">",
                    "        <meta name=\"author\" content=\"Takahiro Kotake\">",
                    "        <meta name=\"reply-to\" content=\"info_hasarius&#64;teleios.jp\">",
                    "        <meta name=\"copyright\" content=\"teleios\">",
                    "        <meta name=\"generator\" content=\"hasarius\">",
                    "        <meta name=\"date\" content=\"2018-08-31T12:00:00+09:00\">",
                    "        <script type=\"text/javascript\" src=\"script/sample.js\"></script>",
                    "        <script src=\"script/common.js\"></script>",
                    "        <link rel=\"stylesheet\" href=\"css/style.css\">",
                    "    </head>",
                    "    <body class=\"BodyClassName1\">",
                    "        Hasariusについて",
                    "        Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    "        基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",
                    "        また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    "    </body>",
                    "</html>",
                ]
            ],
            // 平文 (head) + 変数あり
            [
                "DocumentType" => "XHTML1_1",
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                "lines" => [
                    "<?xml version=\"1.0\" encoding=\"utf-8\"?>" . PHP_EOL . "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">",
                    "<html xmlns=\"http://www.w3.org/1999/xhtml\">",
                    "    <head xml:lang=\"ja\">",
                    "        <title>Default Page Title</title>",
                    "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">",
                    "        <meta http-equiv=\"Pragma\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Cache-Control\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Expires\" content=\"86400\">",
                    "        <meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\">",
                    "        <meta http-equiv=\"Content-Style-Type\" content=\"text/css\">",
                    "        <meta http-equiv=\"Refresh\" content=\"300\">",
                    "        <meta http-equiv=\"Jump\" content=\"60;https://www.teleios.jp/sample/\">",
                    "        <meta name=\"keywords\" content=\"ホームページ,HTML,CSS,JavaScript\">",
                    "        <meta name=\"description\" content=\"文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。\">",
                    "        <meta name=\"ROBOTS\" content=\"ALL\">",
                    "        <meta name=\"author\" content=\"Takahiro Kotake\">",
                    "        <meta name=\"reply-to\" content=\"info_hasarius&#64;teleios.jp\">",
                    "        <meta name=\"copyright\" content=\"teleios\">",
                    "        <meta name=\"generator\" content=\"hasarius\">",
                    "        <meta name=\"date\" content=\"2018-08-31T12:00:00+09:00\">",
                    "        <script type=\"text/javascript\" src=\"script/sample.js\"></script>",
                    "        <script src=\"script/common.js\"></script>",
                    "        <link rel=\"stylesheet\" href=\"css/style.css\">",
                    "    </head>",
                    "    <body class=\"BodyClassName1\">",
                    "        Hasariusについて",
                    "        Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    "        基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",
                    "        また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    "    </body>",
                    "</html>",
                ]
            ],
            // @include (html)
            [
                "DocumentType" => "HTML5",
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002.txt",
                "lines" => [
                    "<!DOCTYPE html>",
                    "<html class=\"HtmlClassName\" prefix=\"og:http://ogp.me/ns#\" lang=\"ja\">",
                    "    <head>",
                    "        <title>Default Page Title</title>",
                    "        <meta charset=\"utf-8\">",
                    "        <meta http-equiv=\"Pragma\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Cache-Control\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Expires\" content=\"86400\">",
                    "        <meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\">",
                    "        <meta http-equiv=\"Content-Style-Type\" content=\"text/css\">",
                    "        <meta http-equiv=\"Refresh\" content=\"300\">",
                    "        <meta http-equiv=\"Jump\" content=\"60;https://www.teleios.jp/sample/\">",
                    "        <meta name=\"keywords\" content=\"ホームページ,HTML,CSS,JavaScript\">",
                    "        <meta name=\"description\" content=\"文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。\">",
                    "        <meta name=\"ROBOTS\" content=\"ALL\">",
                    "        <meta name=\"author\" content=\"Takahiro Kotake\">",
                    "        <meta name=\"reply-to\" content=\"info_hasarius&#64;teleios.jp\">",
                    "        <meta name=\"copyright\" content=\"teleios\">",
                    "        <meta name=\"generator\" content=\"hasarius\">",
                    "        <meta name=\"date\" content=\"2018-08-31T12:00:00+09:00\">",
                    "        <meta property=\"og:type\" content=\"article\">",
                    "        <meta property=\"og:title\" content=\"test\">",
                    "        <meta property=\"og:site_name\" content=\"sample page\">",
                    "        <meta property=\"og:url\" content=\"http://www.teleios.jp/index.html\">",
                    "        <script type=\"text/javascript\" src=\"script/sample.js\"></script>",
                    "        <script src=\"script/common.js\"></script>",
                    "        <link rel=\"stylesheet\" href=\"css/style.css\">",
                    "    </head>",
                    "    <body class=\"BodyClassName1\">",
                    "        Hasariusについて",
                    "        Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    "        基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",
                    "        また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    "    </body>",
                    "</html>",
                ]
            ],
            // @include (head)
            [
                "DocumentType" => "HTML5",
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002.txt",
                "lines" => [
                    "<!DOCTYPE html>",
                    "<html class=\"HtmlClassName\">",
                    "    <head prefix=\"og:http://ogp.me/ns#\" lang=\"ja\">",
                    "        <title>Default Page Title</title>",
                    "        <meta charset=\"utf-8\">",
                    "        <meta http-equiv=\"Pragma\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Cache-Control\" content=\"no-cache\">",
                    "        <meta http-equiv=\"Expires\" content=\"86400\">",
                    "        <meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\">",
                    "        <meta http-equiv=\"Content-Style-Type\" content=\"text/css\">",
                    "        <meta http-equiv=\"Refresh\" content=\"300\">",
                    "        <meta http-equiv=\"Jump\" content=\"60;https://www.teleios.jp/sample/\">",
                    "        <meta name=\"keywords\" content=\"ホームページ,HTML,CSS,JavaScript\">",
                    "        <meta name=\"description\" content=\"文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。\">",
                    "        <meta name=\"ROBOTS\" content=\"ALL\">",
                    "        <meta name=\"author\" content=\"Takahiro Kotake\">",
                    "        <meta name=\"reply-to\" content=\"info_hasarius&#64;teleios.jp\">",
                    "        <meta name=\"copyright\" content=\"teleios\">",
                    "        <meta name=\"generator\" content=\"hasarius\">",
                    "        <meta name=\"date\" content=\"2018-08-31T12:00:00+09:00\">",
                    "        <meta property=\"og:type\" content=\"article\">",
                    "        <meta property=\"og:title\" content=\"test\">",
                    "        <meta property=\"og:site_name\" content=\"sample page\">",
                    "        <meta property=\"og:url\" content=\"http://www.teleios.jp/index.html\">",
                    "        <script type=\"text/javascript\" src=\"script/sample.js\"></script>",
                    "        <script src=\"script/common.js\"></script>",
                    "        <link rel=\"stylesheet\" href=\"css/style.css\">",
                    "    </head>",
                    "    <body class=\"BodyClassName1\">",
                    "        Hasariusについて",
                    "        Hasariusは文書にHTML作成に必要な情報を付け足すことによりHTMLを生成するツールです。",
                    "        基本的にHTMLの属性を使用可能ですので、HTMLを作成したことのある方でしたHasariusの文法を知ることで、より簡単にHTML文書を生成することができるようになります。",
                    "        また、HasariusはHTMLファイいるでは出来ないような文書を含んだ複数のテキストファイルを一つにまとめてHTMLファイルを生成するといた分散作成、定数定義といったことも可能です。",
                    "    </body>",
                    "</html>",
                ]
            ],
        ];
        return $params;
    }

    /** @dataProvider provideGenerateHtml */
    public function testGenerateHtml(string $documentType, string $basePosition, string $source, array $lines)
    {
        $currentDocumentType = MAKE_DocumentType;
        $currentBasePosition = MAKE_BasePosition;
        uopz_redefine("MAKE_DocumentType", $documentType);
        uopz_redefine("MAKE_BasePosition", $basePosition);
        $generate = new Generate();
        $result = $generate->preprocess($source);
        $generate->analyze($result);
        $generate->transform();
        $generate->generate();
        $html = $generate->getDocumentWork();
        uopz_redefine("MAKE_BasePosition", $currentBasePosition);
        uopz_redefine("MAKE_DocumentType", $currentDocumentType);

        $this->assertEquals($html, $lines);
    }

    public function provideMake()
    {
        $params = [
            // 平文 (html)
            [
                "DocumentType" => "HTML4_LOOSE",
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                "saveFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "temp.html",
                "compareFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000" . DIRECTORY_SEPARATOR . "html4_loose_html.html",
            ],
            // 平文 (head)
            [
                "DocumentType" => "HTML4_LOOSE",
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000.txt",
                "saveFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "temp.html",
                "compareFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_000" . DIRECTORY_SEPARATOR . "html4_loose_head.html",
            ],
            // 平文 (html) + 変数あり
            [
                "DocumentType" => "XHTML1_1",
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                "saveFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "temp.html",
                "compareFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001" . DIRECTORY_SEPARATOR . "html1_1_html.html",
            ],
            // 平文 (head) + 変数あり
            [
                "DocumentType" => "XHTML1_1",
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001.txt",
                "saveFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "temp.html",
                "compareFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_001" . DIRECTORY_SEPARATOR . "xhtml1_1_head.html",
            ],
            // @include (html)
            [
                "DocumentType" => "HTML5",
                "BasePosition" => "html",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002.txt",
                "saveFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "temp.html",
                "compareFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002" . DIRECTORY_SEPARATOR . "html5_html.html",
            ],
            [
                "DocumentType" => "HTML5",
                "BasePosition" => "head",
                "source" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002.txt",
                "saveFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "temp.html",
                "compareFile" => HASARIUS_TEST_DIR . DIRECTORY_SEPARATOR . "testdocs" . DIRECTORY_SEPARATOR . "test_002" . DIRECTORY_SEPARATOR . "html5_head.html",
            ],
        ];

        return $params;
    }
    /** @dataProvider provideMake */
    public function testMake(string $documentType, string $basePosition, string $source, string $saveFile, string $compareFile)
    {
        $currentDocumentType = MAKE_DocumentType;
        $currentBasePosition = MAKE_BasePosition;
        uopz_redefine("MAKE_DocumentType", $documentType);
        uopz_redefine("MAKE_BasePosition", $basePosition);
        $generate = new Generate();
        $result = $generate->preprocess($source);
        $generate->analyze($result);
        $generate->transform();
        $generate->generate();
        $generate->saveHtml($saveFile);
        uopz_redefine("MAKE_BasePosition", $currentBasePosition);
        uopz_redefine("MAKE_DocumentType", $currentDocumentType);

        $this->assertFileEquals($saveFile, $compareFile);
    }
}
