<?php 

class Database 
{
	
	static private $connection = null;

	/**
	 * Connects to the database
	 */
	static function connect()
	{
		
		if (is_null(self::$connection))
		{
			self::$connection = new PDO('mysql:host='.Config::DBSERVER.';dbname='.Config::DBNAME.';', Config::DBUSER, Config::DBPASS);
		}
		
	}

	/**
	 * Closes the connection to the database
	 */
	static function disconnect()
	{
		self::$connection = null;
	}

	/**
	 * Returns the result of a select query
	 * as a PDOStatement object
	 *
	 * @param $sql
	 * @return mixed
	 */
	static function fetchResult($sql)
	{
		return self::$connection->query($sql);
	}

	/**
	 * Returns an array containing the rows from
	 * a select statement. Either a SQL string or
	 * a PDOStatement object can be supplied
	 *
	 * @param $input
	 * @return array|bool
	 */
	static function fetchResultArray($input)
	{
		
		if (is_string($input))
		{
			$input = self::fetchResult($input);
		}
		
		if (!($input instanceof PDOStatement))
		{
			return false;
		}
		
		$result = array();
		
		while ($row = self::fetchAssoc($input))
		{
			$result[] = $row;
		}
		
		return $result;
		
	}

	/**
	 * Returns the first single row from a select
	 * statement as an associative array. Either
	 * an SQL string or a PDOStatement object can
	 * be supplied
	 *
	 * @param $input
	 * @return bool|mixed
	 */
	static function fetchAssoc($input)
	{
		
		if (is_string($input))
		{
			$input = self::fetchResult($input);
		}
		 
		if (!($input instanceof PDOStatement))
		{
			return false;
		}
		
		return $input->fetch(PDO::FETCH_ASSOC);
		
	}

	/**
	 * Returns the first single row from a select
	 * statement as an indexed array. Either
	 * an SQL string or a PDOStatement object can
	 * be supplied
	 *
	 * @param $input
	 * @return bool|mixed
	 */
	static function fetchRow($input)
	{
		
		if (is_string($input))
		{
			$input = self::fetchResult($input);
		}
		 
		if (!($input instanceof PDOStatement))
		{
			return false;
		}
		
		return $input->fetch(PDO::FETCH_NUM);
		
	}

	/**
	 * Executes an insert statement
	 *
	 * @param $sql
	 * @return bool
	 */
	static function insert($sql)
	{
		
		if (self::$connection->exec($sql))
		{
			return self::$connection->lastInsertId();
		}
		else
		{
			return false;
		}
		
	}

	/**
	 * Executes an update statement
	 *
	 * @param $sql
	 * @return mixed
	 */
	static function update($sql)
	{
		return self::$connection->exec($sql);
	}

	/**
	 * Executes a delete statement
	 *
	 * @param $sql
	 * @return mixed
	 */
	static function delete($sql)
	{
		return self::update($sql);
	}
	
}
