<?php

class security
{

	static public function encrypt( $data )
	{
		return $data;
	}

	static public function decrypt( $data )
	{
		return $data;
	}

    static public function hash( $data )
    {
        return sha1( 'ZANTE-' . $data . '-ZANTE' );
    }

}