<?php

class exchange
{

    private static $currencyFrom;

    private static $currencyTo;

    private static $amountFrom;

    private static $amountTo;

    private static $fullList;

    public static function load( $from, $to, $amount)
    {
        self::$currencyFrom = $from;
        self::$currencyTo   = $to;
        self::$amountFrom   = $amount;

        self::getFullList();

        self::convertCurrency();

    }

    private static function convertCurrency()
    {

        $conversion = self::$currencyFrom . '_' . self::$currencyTo;

        $rate = cache_apis::currency_retrieve( $conversion );

        if( empty( $rate ) )
        {
            $rate = json_decode( file_get_contents( 'https://free.currencyconverterapi.com/api/v5/convert?q=' . $conversion . '&compact=y' ), 1 );
            $rate = $rate[ $conversion ]['val'];
            cache_apis::currency_save( $conversion, $data );
        }

        $converted = self::$amountFrom * $rate;

        self::$amountTo =  number_format(round($converted, 3),2);

    }

    private static function getFullList()
    {

        $data = cache_apis::currency_retrieve( 'fullList' );

        if( empty( $data ) )
        {
            $data = json_decode( file_get_contents( 'https://free.currencyconverterapi.com/api/v5/currencies' ), 1 );
            $data = $data['results'];
            cache_apis::currency_save( 'fullList', $data, 86400 ); // once per day
        }

        self::$fullList = $data;

    }

    public static function returnCalculated()
    {
        return self::$amountTo;
    }

    public static function echoHtml()
    {

        echo
        '
        <script type="text/javascript">

            function currencyconv()
            {
                $.get( "/ajax/currencyconversion?from=" + $("#currencyFrom").value() + "&to=" + $("#currencyTo").value() + "&amount=" + $("#currencyAmount").value(), function( data ) {
                  $( "#currency-conversion-result span" ).html( data );
                });
            }

        </script>


        <div class="widget">
            <h3 class="widget-title">Currency Conversion</h3>

            <ul class="currency-conversion">
                <li>
                    <div class="text"><p>From</p></div>
                    <select id="currencyFrom">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
               </li>
                <li>
                    <div class="text"><p>To</p></div>
                    <select id="currencyTo">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                </li>
                <li>
                    <div class="text"><p>Value</p></div>
                    <input type="text" id="currencyAmount" value="1" />
                </li>
                <li><button type="button" onclick="currencyConv()">Calcola</button></li>
                <li id="currency-conversion-result">
                    <div>Result:<span>3000</span></div>
                </li>

            </ul>
        </div>';

    }

}


