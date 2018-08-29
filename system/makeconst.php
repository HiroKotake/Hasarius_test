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
                        "Date" => "2018-08-31T12:00:00+09:00"
                    ],
                    "MAKE_Script" => [
                        ["type" =>"", "src" =>""],
                        ["src" =>""]
                    ],
                    "MAKE_Link" => [
                        ["rel" =>"", "href" =>""]
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
}
