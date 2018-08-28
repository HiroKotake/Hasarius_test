<?php
namespace Hasarius\test\libs;

use jp\teleios\libs\ArrayUtils;
use PHPUnit\Framework\TestCase;

class TestArraytils extends TestCase
{
    public function providerIsmap()
    {
        $params = [
            // OK Case
            [["apple" => 10, "blueberry" => 20, "cherry" => 30, "dorian" => 40], true, true],
            [["apple" => 10, 2 => 20, "cherry" => 30, "dorian" => 40], true, false],
            // NG Case
            [["apple", "blueberry", "cherry", "dorian"], false, true],
            [["apple" => 10, 2 => 20, "cherry" => 30, "dorian" => 40], false, true],
        ];
        return $params;
    }

    /** @dataProvider providerIsmap */
    public function testIsMap(array $cond, bool $result, bool $strict)
    {
        $checked = ArrayUtils::isMap($cond, $strict);
        $this->assertEquals($result, $checked);
    }
}
