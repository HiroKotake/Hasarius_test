<?php
namespace Hasarius\test;

use Hasarius\utils\Parser;
use Hasarius\system\Command;
use Hasarius\system\Decoration;
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
        $vessel = Parser::analyzeLine($text);
        $data = [];
        $modifires = $vessel->getModifiers();
        foreach ($modifires as $deco) {
            $codata = [
                "text" => $deco,
                "decorationName" => null,
                "params" => null,
                "decoration" => null,
            ];
            $work = Parser::analyzeModifier($deco);
            $codata["decorationName"] = $work["command"];
            $codata["params"] = $work["params"];
            // クラス生成
            $decoration = $work['command'];
            $fileDir = HASARIUS_DECORATION_DIR
                      . DIRECTORY_SEPARATOR
                      . $decoration;
            $filename = $fileDir
                      . DIRECTORY_SEPARATOR
                      . $decoration . ".php";
            if (file_exists($filename)) {
                $decortion = "Hasarius\\decorations\\Decorate" . $decoration;
                $decorationObject = new $decortion();
            } elseif (file_exists($fileDir)) {
                $decorationObject = new Decoration($fileDir . DIRECTORY_SEPARATOR . 'define.json');
            } else {
                throw new \Exception("[ERROR] Decoration is not defined. (" . $decoration. ")");
            }
            $codata["decoration"] = $decorationObject;
            $data[] = $codata;
        }

        $result["vessel"] = $vessel;
        $result["data"] = $data;

        return $result;
    }

    public function changeDtd(string $dtd = "HTML4_LOOSE")
    {
        uopz_redefine('CURRENT_DOCUMENT_DATA', $dtd);
        uopz_redefine('MAKE_DocumentType', $dtd);
    }
}
