<?php

class db
{

    /** @var $connection PDO  */
    static protected $connection = null;

    const HOST = 'database.hermesnews.al';

    public static $schema; // = 'hermes2';

    const USER = 'hermes';

    const PASS = 'h3rm35n1u5';

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