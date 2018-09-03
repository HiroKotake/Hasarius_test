<?php
namespace Hasarius\test\system;

use Hasarius\system\MakeConst;
use PHPUnit\Framework\TestCase;

class TestMakeConst extends TestCase
{

    public function provideLoad()
    {
        $param = [
            [
                "consts" => [
                    "SYSTEM" => [
                        "COMMENT_LINE" => 10000,
                        "EMPTY_LINE" => 10001,
                        "BLOCK_CLOSE" => 10002,
                        "TEXT_ONLY" => 10003,
                    ],
                    "HEAD_META" => [
                        "ContentType" => [
                            "attribute" => "http-equiv",
                            "origin" => "Content-Type"
                        ],
                        "Pragma" => [
                            "attribute" => "http-equiv",
                            "origin" => "Pragma"
                        ],
                        "CacheControl" => [
                            "attribute" => "http-equiv",
                            "origin" => "Cache-Control"
                        ],
                        "Expires" => [
                            "attribute" => "http-equiv",
                            "origin" => "Expires"
                        ],
                        "ContentScriptType" => [
                            "attribute" => "http-equiv",
                            "origin" => "Content-Script-Type"
                        ],
                        "ContentStyleType" => [
                            "attribute" => "http-equiv",
                            "origin" => "Content-Style-Type"
                        ],
                        "Refresh" => [
                            "attribute" => "http-equiv",
                            "origin" => "Refresh"
                        ],
                        "Jump" => [
                            "attribute" => "http-equiv",
                            "origin" => "Jump"
                        ],
                        "Keywords" => [
                            "attribute" => "name",
                            "origin" => "keywords"
                        ],
                        "Description" => [
                            "attribute" => "name",
                            "origin" => "description"
                        ],
                        "Robots" => [
                            "attribute" => "name",
                            "origin" => "ROBOTS"
                        ],
                        "Author" => [
                            "attribute" => "name",
                            "origin" => "author"
                        ],
                        "ReplyTo" => [
                            "attribute" => "name",
                            "origin" => "reply-to"
                        ],
                        "Copyright" => [
                            "attribute" => "name",
                            "origin" => "copyright"
                        ],
                        "Generator" => [
                            "attribute" => "name",
                            "origin" => "generator"
                        ],
                        "Date" => [
                            "attribute" => "name",
                            "origin" => "date"
                        ],
                        "Property" => [
                            "attribute" => "property",
                            "origin" => "property"
                        ]
                    ],
                    "SCRIPT" => [
                        "None" => [
                            "READY" => [
                                "Open" => "Windows.onLoad = function() {",
                                "Close" => "}"
                            ]
                        ],
                        "JQuery" => [
                            "READY" => [
                                "Open" => "$(function)(){",
                                "Close" => "});"
                            ]
                        ]
                    ],
                    "SCRIPT_FILE" => "ScriptFile",
                    "CSS_FILE" => "CssFile",
                    "GLOBAL_ATTRIBUTES" => [
                        "id" => [
                            "Alias" => "id",
                            "CompareType" => "DEFINED",
                            "Value" => "STRING"
                        ],
                        "title" => [
                            "Alias" => "title",
                            "CompareType" => "DEFINED",
                            "Value" => "STRING"
                        ],
                        "style" => [
                            "Alias" => "css",
                            "CompareType" => "DEFINED",
                            "Value" => "STRING"
                        ],
                        "class" => [
                            "Alias" => "class",
                            "CompareType" => "DEFINED",
                            "Value" => "STRING"
                        ],
                        "lang" => [
                            "Alias" => "lang",
                            "CompareType" => "DEFINED",
                            "Value" => "STRING"
                        ],
                        "dir" => [
                            "Alias" => "dir",
                            "CompareType" => "DEFINED",
                            "Value" => "DIR_TYPE"
                        ]
                    ],
                    "TAG_ATTRIBUTES" => [
                        "id" => [
                            "Alias" => "id",
                            "CompareType" => "DEFINED",
                            "Value" => "STRING"
                        ]
                    ],
                    "CSS_ATTRIBUTES" => [
                        "width" => [
                            "Alias" => "w",
                            "CompareType" => "DEFINED",
                            "Value" => "US_NZ_PX_PCT"
                        ],
                        "hight" => [
                            "Alias" => "h",
                            "CompareType" => "DEFINED",
                            "Value" => "US_NZ_PX_PCT"
                        ]
                    ],
                    "MAKE_DocumentType" => "HTML5",
                    "MAKE_BasePosittion" => "head",
                    "MAKE_Language" => "ja",
                    "MAKE_prefix" => [
                        ["og" => "http://ogp.me/ns#"]
                    ],
                    "MAKE_Chareset" => "utf-8",
                    "MAKE_Title" => "Default Page",
                    "MAKE_Meta" => [
                        "ContentType" => "text/html; charset=UTF-8",
                        "Pragma" => "no-cache",
                        "CacheControl" => "no-cache",
                        "Expires" => "86400",
                        "ContentScriptType" => "text/javascript",
                        "ContentStyleType" => "text/css",
                        "Refresh" => "300",
                        "Jump" => "60;https://www.teleios.jp/sample/",
                        "Keywords" => "ホームページ,HTML,CSS,JavaScript",
                        "Description" => "文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。",
                        "Robots" => "ALL",
                        "Author" => "Takahiro Kotake",
                        "ReplyTo" => "info_hasarius&#64;teleios.jp",
                        "Copyright" => "teleios",
                        "Generator" => "hasarius",
                        "Date" => "2018-08-31T12:00:00+09:00",
                        "Property" => [
                            "og:type" => "article",
                            "og:title" => "test",
                            "og:site_name" =>  "sample page",
                            "og:url" => "http://www.teleios.jp/index.html"
                        ]
                    ],
                    "MAKE_Script" => [
                        ["type" => "text/javascript", "src" => "script/sample.js"],
                        ["src" => "script/common.js"]
                    ],
                    "MAKE_Link" => [
                        ["rel" => "stylesheet", "href" => "css/style.css"]
                    ],
                    "MAKE_WriteTargetDir" => "/var/www/html/test",
                    "MAKE_UseHashFileName" => 0,
                    "MAKE_AutoHashFileName" => 0,
                    "MAKE_HashedFileName" => "",
                    "MAKE_AttributeValidate" => 1,
                    "MAKE_ValidateStop" => 0
                ]
            ]
        ];
        return $param;
    }

    /** @dataProvider provideLoad */
    public function testLoad(array $consts)
    {
        $defined = get_defined_constants(true);
        foreach ($consts as $key => $value) {
            if (array_key_exists($key, $defined["user"])) {
                $this->assertEquals($defined["user"][$key], $value);
            }
        }
    }

    public function provideGetDocumentType()
    {
        $params = [];
        $params[] = [
            "type" => "HTML4_LOOSE",
            "dtd" => "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">"
        ];
        $params[] = [
            "type" => "HTML4_STRICT",
            "dtd" => "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\">"
        ];
        $params[] = [
            "type" => "HTML4_FRAME",
            "dtd" => "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Frameset//EN\">"
        ];
        $params[] = [
            "type" => "XHTML1_LOOSE",
            "dtd" => "<?xml version=\"1.0\" encoding=\"" . MAKE_Charset . "\"?>" . PHP_EOL
                   . "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">"
        ];
        $params[] = [
            "type" => "XHTML1_STRICT",
            "dtd" => "<?xml version=\"1.0\" encoding=\"" . MAKE_Charset . "\"?>" . PHP_EOL
                   . "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">"
        ];
        $params[] = [
            "type" => "XHTML1_FRAME",
            "dtd" => "<?xml version=\"1.0\" encoding=\"" . MAKE_Charset . "\"?>" . PHP_EOL
                   . "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Frameset//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd\">"
        ];
        $params[] = [
            "type" => "XHTML1_1",
            "dtd" => "<?xml version=\"1.0\" encoding=\"" . MAKE_Charset . "\"?>" . PHP_EOL
                   . "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">"
        ];
        $params[] = [
            "type" => "HTML5",
            "dtd" => "<!DOCTYPE html>"
        ];
        $params[] = [
            "type" => "HTML5_1",
            "dtd" => "<!DOCTYPE html>"
        ];
        return $params;
    }
    /** @dataProvider provideGetDocumentType */
    public function testGetDocumentType($type, $dtd)
    {
        $currentType = MAKE_DocumentType;
        uopz_redefine('MAKE_DocumentType', $type);
        $makedDtd = MakeConst::getDocumentType();
        $this->assertEquals($dtd, $makedDtd);
        uopz_redefine('MAKE_DocumentType', $currentType);
    }

    public function provideMakeMetaParts()
    {
        $params = [];
        $params[] = [
            "type" => "HTML4_LOOSE",
            "list" => [
                '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">',
                '<meta http-equiv="Pragma" content="no-cache">',
                '<meta http-equiv="Cache-Control" content="no-cache">',
                '<meta http-equiv="Expires" content="86400">',
                '<meta http-equiv="Content-Script-Type" content="text/javascript">',
                '<meta http-equiv="Content-Style-Type" content="text/css">',
                '<meta http-equiv="Refresh" content="300">',
                '<meta http-equiv="Jump" content="60;https://www.teleios.jp/sample/">',
                '<meta name="keywords" content="ホームページ,HTML,CSS,JavaScript">',
                '<meta name="description" content="文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。">',
                '<meta name="ROBOTS" content="ALL">',
                '<meta name="author" content="Takahiro Kotake">',
                '<meta name="reply-to" content="info_hasarius&#64;teleios.jp">',
                '<meta name="copyright" content="teleios">',
                '<meta name="generator" content="hasarius">',
                '<meta name="date" content="2018-08-31T12:00:00+09:00">',
            ],
        ];
        $params[] = [
            "type" => "HTML5_1",
            "list" => [
                '<meta charset="utf-8">',
                '<meta http-equiv="Pragma" content="no-cache">',
                '<meta http-equiv="Cache-Control" content="no-cache">',
                '<meta http-equiv="Expires" content="86400">',
                '<meta http-equiv="Content-Script-Type" content="text/javascript">',
                '<meta http-equiv="Content-Style-Type" content="text/css">',
                '<meta http-equiv="Refresh" content="300">',
                '<meta http-equiv="Jump" content="60;https://www.teleios.jp/sample/">',
                '<meta name="keywords" content="ホームページ,HTML,CSS,JavaScript">',
                '<meta name="description" content="文書にHTML生成に必要なアイテムを追加し、HTMLを生成します。">',
                '<meta name="ROBOTS" content="ALL">',
                '<meta name="author" content="Takahiro Kotake">',
                '<meta name="reply-to" content="info_hasarius&#64;teleios.jp">',
                '<meta name="copyright" content="teleios">',
                '<meta name="generator" content="hasarius">',
                '<meta name="date" content="2018-08-31T12:00:00+09:00">',
                '<meta property="og:type" content="article">',
                '<meta property="og:title" content="test">',
                '<meta property="og:site_name" content="sample page">',
                '<meta property="og:url" content="http://www.teleios.jp/index.html">',
            ],
        ];
        return $params;
    }
    /** @dataProvider provideMakeMetaParts */
    public function testMakeMetaParts($type, $list)
    {
        $currentType = MAKE_DocumentType;
        uopz_redefine('MAKE_DocumentType', $type);
        $metaList = MakeConst::makeMetaParts();
        $this->assertEquals($list, $metaList);
        uopz_redefine('MAKE_DocumentType', $currentType);
    }

    public function provideMakeScriptParts()
    {
        $params = [];
        $params[] = [
            "list" => [
                '<script type="text/javascript" src="script/sample.js"></script>',
                '<script src="script/common.js"></script>',
            ]
        ];
        return $params;
    }
    /** @dataProvider provideMakeScriptParts */
    public function testMakeScriptParts($list)
    {
        $scriptList = MakeConst::makeScriptParts();
        $this->assertEquals($list, $scriptList);
    }

    public function provideMakeLinkParts()
    {
        $params = [];
        $params[] = [
            "list" => [
                '<link rel="stylesheet" href="css/style.css">',
            ]
        ];
        return $params;
    }
    /** @dataProvider provideMakeLinkParts */
    public function testMakeLinkParts($list)
    {
        $linkList = MakeConst::makeLinkParts();
        $this->assertEquals($list, $linkList);
    }

    public function provideGetTagHtml()
    {
        $params = [];
        // html
        $params[] = [
            "setting" => "html",
            "result" => "<html class=\"HtmlClassName\" prefix=\"og:http://ogp.me/ns#\" lang=\"ja\">"
        ];
        // head
        $params[] = [
            "setting" => "head",
            "result" => "<html class=\"HtmlClassName\">"
        ];
        return $params;
    }
    /** @dataProvider provideGetTagHtml */
    public function testGetTagHtml($setting, $result)
    {
        $basePosition = MAKE_BasePosition;
        uopz_redefine('MAKE_BasePosition', $setting);
        $tagHtml = MakeConst::getTagHtml();
        $this->assertEquals($tagHtml, $result);
        uopz_redefine('MAKE_BasePosition', $basePosition);
    }

    public function provideGetTagHead()
    {
        $params = [];
        // html
        $params[] = [
            "setting" => "html",
            "result" => "<head>"
        ];
        // head
        $params[] = [
            "setting" => "head",
            "result" => "<head prefix=\"og:http://ogp.me/ns#\" lang=\"ja\">"
        ];
        return $params;
    }
    /** @dataProvider provideGetTagHead */
    public function testGetTagHead($setting, $result)
    {
        $basePosition = MAKE_BasePosition;
        uopz_redefine('MAKE_BasePosition', $setting);
        $tagHtml = MakeConst::getTagHead();
        $this->assertEquals($tagHtml, $result);
        uopz_redefine('MAKE_BasePosition', $basePosition);
    }
}
