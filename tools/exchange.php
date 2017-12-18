<?php

class exchange
{

    private static $currencyFrom;

    private static $currencyTo;

    private static $amountFrom;

    private static $amountTo;

    public static function load( $from, $to, $amount)
    {
        self::$currencyFrom = $from;
        self::$currencyTo   = $to;
        self::$amountFrom   = $amount;

        self::convertCurrency();

    }

    private static function convertCurrency()
    {
        $data = file_get_contents('https://www.google.com/finance/converter?a=' . self::$amountFrom .'&from=' . self::$currencyFrom . '$from&to=' . self::$currencyTo);

        preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);

        $converted = preg_replace("/[^0-9.]/", "", $converted[1]);

        self::$amountTo =  number_format(round($converted, 3),2);
    }

    public static function echoHtml()
    {



    }

}