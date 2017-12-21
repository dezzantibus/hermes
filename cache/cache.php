<?php

abstract class cache
{

    static private $available;

    static private $memcache;

    const HOST = '127.0.0.1';

    const PORT = 11211;

    static private function stampIndex( $index )
    {
        return constant::$text['site'] . static::$path . $index;
    }

    static public function activate()
    {

        if( empty( self::$available ) && self::$available !== false )
        {

            self::$memcache = new Memcached();

            self::$memcache->connect( self::HOST, self::PORT );

            $stats = self::$memcache->getExtendedStats();

            error_log( json_encode($stats) );

            self::$available = false;

            foreach( $stats as $server )
            {
                if( $server )
                {
                    self::$available = true;
                }
            }

        }

    }

    static public function save( $index, $data, $duration=600 )
    {

        self::activate();

        if( ! self::$available )
        {
            return false;
        }

        $index = self::stampIndex( $index );

        return self::$memcache->set( $index, $data, $duration);

    }

    static public function retrieve( $index )
    {

        self::activate();

        if( ! self::$available )
        {
            return false;
        }

        $index = self::stampIndex( $index );

        return self::$memcache->get( $index );

    }

    static public function clear( $index )
    {

        self::activate();

        if( ! self::$available )
        {
            return false;
        }

        $index = self::stampIndex( $index );

        return self::$memcache->delete( $index );

    }

    static public function flush()
    {
        self::$memcache->flush();
    }

}