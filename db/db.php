<?php

class db
{

    /** @var $connection PDO  */
    static protected $connection = null;

    const HOST = '127.0.0.1';

    public static $schema; // = 'hermes2';

    const USER = 'root';

    const PASS = 'antani75';

    public static function connect()
    {
        if( is_null( self::$connection ) )
        {
            self::$connection = new PDO( 'mysql:host=' . self::HOST . ';dbname=' . self::$schema, self::USER, self::PASS );
        }
    }

    public static function beginTransaction()
    {
        self::connect();
        self::$connection->beginTransaction();
    }

    public static function commit()
    {
        self::connect();
        if( ! self::$connection->commit() )
        {
            self::$connection->rollBack();
            message::addError(
                'Database error, please contact support',
                'Roll back - ' . var_export( static::$connection, 1 )
            );
        }
    }

    public static function prepare( $sql )
    {
        self::connect();
        $result = self::$connection->prepare( $sql );
        return new db_statement( $result );
    }

    public static function lastInsertId()
    {
        return self::$connection->lastInsertId();
    }

}