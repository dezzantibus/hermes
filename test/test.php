<?php

function encode(){

	$file = file_get_contents('test.txt');

	$key = md5($file);

	$output = $key;

	while (strlen($file) >= 32){
		$output .= substr($file, 0, 32) ^ $key;
		$file = substr($file, 32);
	}

	if(strlen($file) > 0){
		for($i=0;$i<strlen($file);$i++){
			$output .= chr(ord($file[$i]) ^ 128);
		}
	}

   file_put_contents('encoded.znt', $output);

}

function decode(){

	$file = file_get_contents('encoded.znt');

	$key = substr($file, 0, 32);
	$file = substr($file, 32);

	$output = '';

	while (strlen($file) >= 32){
		$output .= substr($file, 0, 32) ^ $key;
		$file = substr($file, 32);
	}

	if(strlen($file) > 0){
		for($i=0;$i<strlen($file);$i++){
			$output .= chr(ord($file[$i]) ^ 128);
		}
	}

	file_put_contents('out.txt', $output);

}

$roba = md5('ciucciami la fava');

$numero = hexdec( $roba );
print "$roba-$numero<br>";

$roba = substr($roba, 0, 16);
$numero = hexdec( $roba );
print "$roba-$numero<br>";

$roba = substr($roba, 0, 8);
$numero = hexdec( $roba );
print "$roba-$numero<br>";