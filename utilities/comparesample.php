<?php

class CompareSample
{
    static private $samplePattern = [
        "BUTTON_TYPE" => ["submit","reset","button"],
        "BLEAR_TYPE" => ["left","right","all","none"],
        "DIR_TYPE" => ["ltr","rtl","auto"],
        "FILENAME" => "testfile.jpg",
        "FONT" => "MS-Gothic",
        "GET_POST" => ["get","post"],
        "LANG" => "ja-JP",
        "LINE_FRAME" => ["void","lhs","rhs","vsides","above","below","hsides","box","border"],
        "LIST_NUM" => ["1","A","a","I","i"],
        "LINE_RULES" => ["none","rows","cols","groups","all"],
        "LINE_TYPE" => ["alternate","stylesheet","start","next","prev","contents","index","glossary","copyright","chapter","section","subsection","appendix","help","bookmark"],
        "LIST_STYLE" => ["disc","circle","square","1","A","a","I","i"],
        "LIST_SYMBOL" => ["disc","circle","square"],
        "NZ_PCT" => ["200", "50%"],
        "MEDIA_QUERY" => ['screen and (min-width: 640px)','screen and (min-width: 600px) and (max-width: 1000px)','screen and (max-width: 500px) and (orientation: portrait)'],
        "NZ_PCT_RLT" => ["200", "35%", "3*"],
        "ON_OFF_AUTO" => ["on","off","auto"],
        "PCT" => "40%",
        "PRELOAD" => ["none","metadata","auto"],
        "REL_TYPE_A" => ["alternate","author","bookmark","help","license","next","nofollow","noreferrer","prefetch","prev","search","tag"],
        "REL_TYPE_L" => ["alternate","author","help","icon","license","next","prefetch","prev","search","stylesheet"],
        "REPET_NC_PCT_ASTER" => ["100,*,100","150,*"],
        "RLT" => ["*", "2*"],
        "SANDBOX" => ["allow-same-origin","allow-top-navigation","allow-forms","allow-scripts","allow-pointer-lock","allow-popups"],
        "SCOPE" => ["row","col","rowgroup","colgroup"],
        "SIDE_ALL" => ["left","right","top","middle","bottom"],
        "SIDE_TB" => ["top","bottom"],
        "SIDE_TMB" => ["top","middle","bottom"],
        "SIDE_TMBBL" => ["top","middle","bottom","baseline"],
        "SIDE_TMB1BL" => ["top","middle","bottom","baseline"],
        "SIDE_LMR" => ["left","middle","right"],
        "SIDE_LMRJ" => ["left","middle","right","justify"],
        "SIDE_LMRJC" => ["left","middle","right","justify","char"],
        "SIDE_TRBL" => ["top","right","bottom","left"],
        "SHAPE" => ["rect","circle","poly","default"],
        "SRCSET" => ["small.jpg 320w, medium.jpg 640w, large.jpg 1280w","small.jpg 1x, medium.jpg 2x"],
        "TYPEMODE" => ["verbatim","latin","latin-name","latin-prose","full-width-latin","kana","kana-name","katakana","numeric","tel","email","url"],
        "URI" => ["https://www.teleios.jp/img/sample.jpg", "../script/sample.js"],
        "USE_SIGNIN" => ["anonymous","use-credentials"],
        "ZERO_ONE" => ["0","1"],
        "DATETIME" => ["2005-09-22T23:15:30+09:00","2005-09-22T00:00:00+09:00"],
        "ENCODE" => ['ISO-2022-JP','UTF-8','Shift_JIS','EUC-JP'],
        "FLOAT" => ["123.45","0.25","-34.123"],
        "MIME" => ["text/plain","image/jpeg","video/mpeg","application/pdf","image/png"],
        "NC" => ["10","-20","4086","256"],
        "NZ" => ["10","-20","4086","256"],
        "STRING" => ["test","テスト","sample text","サンプル テキスト"],
        "US_FLT" => ["123.45","0.25"],
        "US_NC" => ["10","20","4086","256"],
        "WINDOW" => ["_blank","_self","_parent","_top","sub_window"],
        // 特殊タイプ
        "COORDS" => [
            "rect" => "100,100,200,200",
            "circle" => "100,100,50",
            "poly" => "400,50,450,150,350,150",
        ],
        "INPUT_TYPE" => [
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
    ];

    public static function showSampleData()
    {
        var_dump(self::$samplePattern);
    }
}
