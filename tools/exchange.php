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

        self::getFullList();

        echo
        '
        <script type="text/javascript">

            function currencyConv()
            {
            console.log("test");
                $.get( "/ajax/currencyconversion?from=" + $("#currencyFrom").val() + "&to=" + $("#currencyTo").val() + "&amount=" + $("#currencyAmount").val(), function( data ) {
                              console.log("/ajax/currencyconversion?from=" + $("#currencyFrom").val() + "&to=" + $("#currencyTo").val() + "&amount=" + $("#currencyAmount").val());
                              console.log(data);

                    $( "#currency-conversion-result span" ).html( data );
                    $( "#currency-conversion-result" ).css( "display", "block" );
                });
            }

        </script>


        <div class="widget">
            <h3 class="widget-title">Currency Conversion</h3>

            <ul class="currency-conversion">
                <li>
                    <div class="text"><p>From</p></div>
                    <select id="currencyFrom">';

                        foreach( self::$fullList as $currency )
                        {
                            echo '<option value="', $currency['id'], '">', $currency['currencyName'], ' (', $currency['currencySymbol'], ')</option>';
                        }

                    echo
                    '</select>
               </li>
                <li>
                    <div class="text"><p>To</p></div>
                    <select id="currencyTo">';

                        foreach( self::$fullList as $currency )
                        {
                            echo '<option value="', $currency['id'], '">', $currency['currencyName'], ' (', $currency['currencySymbol'], ')</option>';
                        }

                    echo
                    '</select>
                </li>
                <li>
                    <div class="text"><p>Value</p></div>
                    <input type="text" id="currencyAmount" value="1" />
                </li>
                <li><button type="button" onclick="currencyConv()">Calcola</button></li>
                <li id="currency-conversion-result">
                    <div>Result:&nbsp;&nbsp;<span></span></div>
                </li>

            </ul>
        </div>';

    }

}


