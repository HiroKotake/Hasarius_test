<?php
namespace Hasarius\test\system;

use Hasarius\system\MakeConst;
use PHPUnit\Framework\TestCase;

class TestMakeConst extends TestCase
{

    public function testLoad()
    {
        MakeConst::load();

        $script = [
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
        ];
        $scriptFile = "ScriptFile";
        $cssFile = "CssFile";
        $globalAttributes = [
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

        ];
        $tagAttributes = [
            "id" => [
                "Alias" => "id",
                "CompareType" => "DEFINED",
                "Value" => "STRING"
            ]
        ];
        $cssAttributes = [
            "width" => [
                "Alias" => "w",
                "CompareType" => "DEFINED",
                "Value" => "NUMERIC",
                "postFix" => ["numeric", "px", "percent"]
            ]
        ];

        $this->assertEquals(SCRIPT, $script);
        $this->assertEquals(SCRIPT_FILE, $scriptFile);
        $this->assertEquals(CSS_FILE, $cssFile);
        $this->assertEquals(GLOBAL_ATTRIBUTES, $globalAttributes);
        $this->assertEquals(TAG_ATTRIBUTES, $tagAttributes);
        $this->assertEquals(CSS_ATTRIBUTES, $cssAttributes);
    }
}
