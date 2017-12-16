<?php
/**
 * Created by PhpStorm.
 * User: andreapassante
 * Date: 16/12/17
 * Time: 16:35
 */

include 'tools/weather.php';
include 'cache/cache.php';



$weather = new weather();

$weather->load( 'Tirana' );
