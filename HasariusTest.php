<?php
namespace Hasarius\test;

use Hasarius\utils\Parser;
use Hasarius\system\Command;
use PHPUnit\Framework\TestCase;

abstract class HasariusTest extends TestCase
{
    /**
     * コマンド確認用サポートメソッド
     * @param  string $text 確認用文字列
     * @return Array        Vesselとコマンドのオブジェクトを返す
     */
    public function makeCommandCase(string $text): Array
    {
        $result = [
            "vessel" => null,
            "command" => null
        ];
        // パース
        $vessel = Parser::analyzeLine($text);
        // クラス生成
        $fileDir = HASARIUS_COMMANDS_DIR
                  . DIRECTORY_SEPARATOR
                  . $vessel->getCommand();
        $filename = $fileDir
                  . DIRECTORY_SEPARATOR
                  . $vessel->getCommand() . ".php";
        if (file_exists($filename)) {
            $command = "Hasarius\\commands\\Command" . $vessel->getCommand();
            $commandObject = new $command();
        } elseif (file_exists($fileDir)) {
            $commandObject = new Command($fileDir . DIRECTORY_SEPARATOR . 'define.json');
        } else {
            throw new \Exception("[ERROR] Command is not defined. (" . $vessel->getCommand() . ")");
        }

        $result["vessel"] = $vessel;
        $result["command"] = $commandObject;

        return $result;
    }

    /**
     * 修飾コマンド確認用サポートメソッド
     * @param  string $text 確認用文字列
     * @return Array        Vesselとコマンドのオブジェクトを返す
     */
    public function makeDecorationCase(string $text): Array
    {
        $result = [
            "vessel" => null,
            "command" => null
        ];
        // パース
        $data = Parser::analyzeModifier($text);
        // クラス生成
        $command = $data['command'];
        $fileDir = HASARIUS_DECORATION_DIR
                  . DIRECTORY_SEPARATOR
                  . $command;
        $filename = $fileDir
                  . DIRECTORY_SEPARATOR
                  . $command . ".php";
        if (file_exists($filename)) {
            $command = "Hasarius\\decorations\\Decorate" . $command;
            $commandObject = new $command();
        } elseif (file_exists($fileDir)) {
            $commandObject = new Command($fileDir . DIRECTORY_SEPARATOR . 'define.json');
        } else {
            throw new \Exception("[ERROR] Command is not defined. (" . $command . ")");
        }

        $result["data"] = $data;
        $result["command"] = $commandObject;

        return $result;
    }
}
