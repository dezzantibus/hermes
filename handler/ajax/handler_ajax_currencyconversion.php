<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 13:54
 */

class handler_ajax_currencyconversion extends handler
{

    public function run()
    {

        $from   = $_GET['from'];
        $to     = $_GET['to'];
        $amount = $_GET['amount'];

        exchange::load( $from, $to, $amount );

        echo exchange::returnCalculated();

    }

}