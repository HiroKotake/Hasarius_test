<?php
/**
 * UnitTest向けコマンド・修飾コマンド用テストケース生成クラス
 *
 */
class CompareSample
{
    static private $samplePattern = [
        "BUTTON_TYPE" => [
            "OK" => ["submit","reset","button"],
            "NG" => ["submt","resat","botton"],
        ],
        "BLEAR_TYPE" => [
            "OK" => ["left","right","all","none"],
            "NG" => ["lft","raght","al","non"],
        ],
        "DIR_TYPE" => [
            "OK" => ["ltr","rtl","auto"],
            "NG" => ["lr","rl","ato"],
        ],
        "FILENAME" => [
            "OK" => ["testfile.jpg"],
            "NG" => [],
        ],
        "FONT" => [
            "OK" => ["MS-Gothic"],
            "NG" => [],
        ],
        "GET_POST" => [
            "OK" => ["get","post"],
            "NG" => ["got","past"],
        ],
        "LANG" => [
            "OK" => ["ja-JP",],
            "NG" => ["ja-",],
        ],
        "LINE_FRAME" => [
            "OK" => ["void","lhs","rhs","vsides","above","below","hsides","box","border"],
            "NG" => ["vid","ls","rh","vsids","abov","belw","hsids","boies","barder"],
        ],
        "LIST_NUM" => [
            "OK" => ["1","A","a","I","i"],
            "NG" => ["l", "2"],
        ],
        "LINE_RULES" => [
            "OK" => ["none","rows","cols","groups","all"],
            "NG" => ["non","row","col","group"],
        ],
        "LINE_TYPE" => [
            "OK" => ["alternate","stylesheet","start","next","prev","contents","index","glossary","copyright","chapter","section","subsection","appendix","help","bookmark"],
            "NG" => ["alternaoe","capyright","chaptar","sction","appendx"],
        ],
        "LIST_STYLE" => [
            "OK" => ["disc","circle","square","1","A","a","I","i"],
            "NG" => ["desc","carcle","squre"],
        ],
        "LIST_SYMBOL" => [
            "OK" => ["disc","circle","square"],
            "NG" => ["desc","carcle","squre"],
        ],
        "NZ_PCT" => [
            "OK" => ["200", "50%"],
            "NG" => ["200.05", "50 %"],
        ],
        "MEDIA_QUERY" => [
            "OK" => ['screen and (min-width: 640px)','screen and (min-width: 600px) and (max-width: 1000px)','screen and (max-width: 500px) and (orientation: portrait)'],
            "NG" => ['screen ad (min-width: 640px)','scren and (minwidth: 600px) and (max-width: 1000px)','screen and (max-width: 500px) and (orientation: portrat)'],
        ],
        "NZ_PCT_RLT" => [
            "OK" => ["200", "35%", "3*"],
            "NG" => ["0.2", "35.5%", "*3"],
        ],
        "ON_OFF" => [
            "OK" => ["on","off"],
            "NG" => ["om","of"],
        ],
        "ON_OFF_AUTO" => [
            "OK" => ["on","off","auto"],
            "NG" => ["om","of","suto"],
        ],
        "PCT" => [
            "OK" => ["40%"],
            "NG" => ["40"],
        ],
        "PRELOAD" => [
            "OK" => ["none","metadata","auto"],
            "NG" => ["non","metadeta","aut"],
        ],
        "REL_TYPE_A" => [
            "OK" => ["alternate","author","bookmark","help","license","next","nofollow","noreferrer","prefetch","prev","search","tag"],
            "NG" => ["altenate","auther","licence","nofollaw","noreferer","prefutch","sarch"],
        ],
        "REL_TYPE_L" => [
            "OK" => ["alternate","author","help","icon","license","next","prefetch","prev","search","stylesheet"],
            "NG" => ["alternat","auther","licence","profetch","styleheet"],
        ],
        "REPET_NC_PCT_ASTER" => [
            "OK" => ["100,*,100","150,*"],
            "NG" => ["100,*100",",*150"],
        ],
        "RLT" => [
            "OK" => ["*", "2*"],
            "NG" => ["+", "2:"],
        ],
        "SANDBOX" => [
            "OK" => ["allow-same-origin","allow-top-navigation","allow-forms","allow-scripts","allow-pointer-lock","allow-popups"],
            "NG" => ["allowsame-origin","allow-topnavigation","allow-form","allow-script","allow-point-lock","allow-popup"],
        ],
        "SCOPE" => [
            "OK" => ["row","col","rowgroup","colgroup"],
            "NG" => ["rows","cols","rowgrup","cogroup"],
        ],
        "SIDE_ALL" => [
            "OK" => ["left","right","top","middle","bottom"],
            "NG" => ["lift","light","tap","midle","bttom"],
        ],
        "SIDE_TB" => [
            "OK" => ["top","bottom"],
            "NG" => ["tp","botom"],
        ],
        "SIDE_TMB" => [
            "OK" => ["top","middle","bottom"],
            "NG" => ["tap","midle","botom"],
        ],
        "SIDE_TMBBL" => [
            "OK" => ["top","middle","bottom","baseline"],
            "NG" => ["too","midle","botom","baserine"],
        ],
        "SIDE_TMB1BL" => [
            "OK" => ["top","middle","bottom","baseline"],
            "NG" => ["too","midle","botom","baserine"],
        ],
        "SIDE_LMR" => [
            "OK" => ["left","middle","right"],
            "NG" => ["lift","light","tap","midle","bttom"],
        ],
        "SIDE_LMRJ" => [
            "OK" => ["left","middle","right","justify"],
            "NG" => ["lft","midle","light","justfy"],
        ],
        "SIDE_LMRJC" => [
            "OK" => ["left","middle","right","justify","char"],
            "NG" => ["let","midle","light","justfy","chr"],
        ],
        "SIDE_TRBL" => [
            "OK" => ["top","right","bottom","left"],
            "NG" => ["op","rigt","botom","eft"],
        ],
        "SHAPE" => [
            "OK" => ["rect","circle","poly","default"],
            "NG" => ["rct","carcle","pory","defoult"],
        ],
        "SRCSET" => [
            "OK" => ["small.jpg 320w, medium.jpg 640w, large.jpg 1280w","small.jpg 1x, medium.jpg 2x"],
            "NG" => ["small.jpg 320, medium.jpg 640w, large.jpg 1280w","small.jpg x, medium.jpg 2x"],
        ],
        "TYPEMODE" => [
            "OK" => ["verbatim","latin","latin-name","latin-prose","full-width-latin","kana","kana-name","katakana","numeric","tel","email","url"],
            "NG" => ["verbtim","ltin","latin-nme","latin-prse","ful-width-latin","kan","kananame","katakan","numric"],
        ],
        "URI" => [
            "OK" => ["https://www.teleios.jp/img/sample.jpg", "../script/sample.js"],
            "NG" => ["https://80:www.teleios.jp/img/sample.jpg"],
        ],
        "USE_SIGNIN" => [
            "OK" => ["anonymous","use-credentials"],
            "NG" => ["anonimous","use-credential"],
        ],
        "ZERO_ONE" => [
            "OK" => ["0","1"],
            "NG" => ["2"],
        ],
        "DATETIME" => [
            "OK" => ["2005-09-22T23:15:30+09:00","2005-09-22T00:00:00+09:00"],
            "NG" => ["2005-0922T00:00:00+09:00"],
        ],
        "ENCODE" => [
            "OK" => ['ISO-2022-JP','UTF-8','Shift_JIS','EUC-JP'],
            "NG" => ['ISO-2022JP','UTF8','ShiftJIS','EUCJP'],
        ],
        "FLOAT" => [
            "OK" => ["123.45","0.25","-34.123"],
            "NG" => ["12345","25","-34123"],
        ],
        "MIME" => [
            "OK" => ["text/plain","image/jpeg","video/mpeg","application/pdf","image/png"],
            "NG" => ["text/plin","imag/jpeg","vide/mpeg","aplication/pdf","img/png"],
        ],
        "NC" => [
            "OK" => ["10","-20","4086","256"],
            "NG" => ["10.5","-20.5"],
        ],
        "NZ" => [
            "OK" => ["10","-20","4086","256"],
            "NG" => ["0","16.5"],
        ],
        "STRING" => [
            "OK" => ["test","テスト","sample text","サンプル テキスト"],
            "NG" => [],
        ],
        "US_FLT" => [
            "OK" => ["123.45","0.25"],
            "NG" => ["-123.45","-0.25"],
        ],
        "US_NC" => [
            "OK" => ["10","20","4086","256"],
            "NG" => ["-10","-20","-4086","-256"],
        ],
        "WINDOW" => [
            "OK" => ["_blank","_self","_parent","_top","sub_window"],
            "NG" => [],
        ],
        // 特殊タイプ
        "COORDS" => [
            "OK" => [
                        "rect" => "100,100,200,200",
                        "circle" => "100,100,50",
                        "poly" => "400,50,450,150,350,150",
                    ],
            "NG" => [
                        "rect" => "100,200,200",
                        "circle" => "100,100",
                    ],
        ],
        "INPUT_TYPE" => [
            "OK" => [
                        "OLD" => [
                            "text",             // テキスト入力欄 （初期値）
                            "password",         // パスワード入力欄
                            "radio",            // ラジオボタン
                            "checkbox",         // チェックボックス
                            "file",             // ファイル選択
                            "hidden",           // 隠しデータ
                            "submit",           // 送信ボタン
                            "reset",            // リセットボタン
                            "image",            // 画像による送信ボタン
                            "datetime",         // UTCによる日時入力
                            "datetime-lcoal",   // ローカル日時入力
                            "button",           // 汎用ボタン
                        ],
                        "HTML5" => [
                            "search", // 検索テキスト
                            "tel",    // 電話番号
                            "url",    // URL
                            "email",  // メールアドレス
                            "date",   // 日付
                            "month",  // 月
                            "week",   // 週
                            "time",   // 時間
                            "number", // 数値
                            "range",  // レンジ
                            "color",  // 色
                        ],
                    ],
            "NG" => ["taxt", "redio", "sabumit", "datatime"],
        ],
    ];

    static private $globalDefines = [
        "id" => "STRING",
        "title" => "STRING",
        "style" => "STRING",
        "class" => "STRING",
        "lang" => "STRING",
        "dir" => "DIR_TYPE",
    ];

    public static function getGlobalDefine(string $key): string
    {
        if (array_key_exists($key, self::$globalDefines)) {
            return self::$globalDefines[$key];
        }

        return "";
    }

    public static function getTestCaseData(string $key, string $dtd): array
    {
        $testCase = [
            "OK" => "",
            "NG" => "",
        ];

        if (!array_key_exists($key, self::$samplePattern)) {
            return [];
        }

        switch ($key) {
            case 'COORDS':
                // OK Case
                $subkeyList = array_keys(self::$samplePattern[$key]["OK"]);
                $subkey = $subkeyList[mt_rand(0, count($subkeyList) - 1)];
                $testCase["OK"] = [];
                $testCase["OK"]["key"] = $subkey;
                $testCase["OK"]["value"] = self::$samplePattern[$key]["OK"][$subkey];
                // NG Case
                $subkeyList = array_keys(self::$samplePattern[$key]["NG"]);
                $subkey = $subkeyList[mt_rand(0, count($subkeyList) - 1)];
                $testCase["NG"] = [];
                $testCase["NG"]["key"] = $subkey;
                $testCase["NG"]["value"] = self::$samplePattern[$key]["NG"][$subkey];
                break;
            case 'INPUT_TYPE':
                $data = self::$samplePattern[$key]["OK"]["OLD"];
                if (preg_match("/^HTML5_*\d*$/", $dtd) > 0) {
                    $data = array_merge($data, self::$samplePattern[$key]["OK"]["HTML5"]);
                }
                $testCase["OK"] = $data[mt_rand(0, count($data) - 1)];
                $testCase["NG"] = self::$samplePattern[$key]["NG"][mt_rand(0, count(self::$samplePattern[$key]["NG"]) - 1)];
                break;
            default:
                $testCase["OK"] = self::$samplePattern[$key]["OK"][mt_rand(0, count(self::$samplePattern[$key]["OK"]) - 1)];
                if (count(self::$samplePattern[$key]["NG"]) > 0) {
                    $testCase["NG"] = self::$samplePattern[$key]["NG"][mt_rand(0, count(self::$samplePattern[$key]["NG"]) - 1)];
                }
                break;
        }

        return $testCase;
    }

    public static function showSampleData()
    {
        var_dump(self::$samplePattern);
    }
}
