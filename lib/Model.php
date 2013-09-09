<?php

abstract class Model
{
	protected $id = null;
	
	protected $data = array();

	protected $orderBy = 'id';

	protected $orderDirection = 'ASC';

	protected $limit = '';

    protected $table = null;

	/**
	 * If an ID is given load that row from the database
	 * 
	 * @param int $id
	 */
	public function __construct($id=null)
	{

		if (!is_null($id))
		{
			$this->load($id);
		}
		else
		{
			$this->setFields();
		}

	}
	
	/**
	 * in the ID is null then save it as a new row, otherwise update the row 
	 * identified by the id
	 */
	public function save()
	{
		
		if (is_null($this->id))
		{
			$this->id = Database::insert($this->insertQuery());
		}
		else
		{
			Database::update($this->updateQuery());
		}

	}
	
	/**
	 * Builds the SQL string for inserting a new row
	 * 
	 * @return string
	 */
	private function insertQuery()
	{
		
		$fields = array();
		
		$values = array();
		
		foreach ($this->data as $key => $value)
		{
			if($key != 'created')
			{

				$fields[] = "`$key`";

				switch (true)
				{

                    case $value === 0:
                    case $value === '0':
						$values[] = "'0'";
						break;

					case is_null($value):
						$values[] = 'NULL';
						break;

					case empty($value):
						$values[] = "''";
                        break;

					default:
						$value = str_replace("'", "\'", $value);
						$values[] = "'$value'";
				}

			}
			
		}
		
		$fields = implode(', ', $fields);
		
		$values = implode(', ', $values);
		
		$sql = "
			INSERT INTO {$this->table}
				($fields)
			VALUES
				($values)
		";

		return $sql;
		
	}
	
	/**
	 * Builds the SQL string to update the row identified by the current ID
	 * 
	 * @return string
	 */
	private function updateQuery()
	{
		
		$values = array();
	
		foreach ($this->data as $key => $value)
		{
	
			switch (true)
			{

                case $value === 0:
                case $value === '0':
					$values[] = "`$key` = '0'";
					break;
	
				case is_null($value):
					$values[] = '`$key` = NULL';
					break;
	
				case empty($value):
					$values[] = "`$key` = ''";
	
				default:
					$value = str_replace("'", "\'", $value);
					$values[] = "`$key` = '$value'";
			}
	
		}
	
		$values = implode(', ', $values);
	
		$sql = "
			UPDATE `{$this->table}`
			SET $values
			WHERE id = {$this->id}
		";
	
		return $sql;
	
	}
	
	/**
	 * deletes the row identified by the current ID
	 */
	public function delete()
	{
		
		if (!is_null($this->id))
		{
			
			$sql = "
				DELETE FROM `{$this->table}`
				WHERE id = {$this->id}
			";
			Database::delete($sql);
			
			$this->id = null;
		
		}
			
	}
	
	/**
	 * Given an ID it loads into the object the relevant database row
	 * 
	 * @param int $id
	 * @return boolean
	 */
	public function load($id=null)
	{
		if (!is_null($id)) {
			
			$this->id = $id;
			
		}
		
		if (is_null($this->id)) {
			
			return false;
			
		}

		$sql = "
			SELECT *
			FROM `{$this->table}`
			WHERE id = {$this->id}
		";

		$this->data = Database::fetchAssoc($sql);

		unset($this->data['id']);

		return true;

	}
	
	/**
	 * Returns the data contained in the object
	 * 
	 * @param mixed $input
	 * @return multitype:
	 */
	public function getData($input=null)
	{

        $result = array();

		switch (true)
		{
	
			case is_null($input):
				$result = $this->data;
				$result['id'] = $this->id;
				break;
	
			case $input == 'id':
				$result = $this->id;
				break;
	
			case is_string($input):
				$result = $this->data[$input];
				break;
	
			case is_array($input):
				$result = array();
				foreach ($input as $field)
				{
					$result[$field] = $this->getData($field);
				}
				break;
	
		}
	
		return $result;
	}
	
	/**
	 * Sets the data in the object with the data in the array
	 * 
	 * @param array $input
	 */
	public function setData($input)
	{
	
		foreach ($input as $field => $value) {
			
			if ($field == 'id')
			{
				$this->id = $value;
			}
			else
			{
				$this->data[$field] = $value;
			}
				
		}

	}

	/**
	 * Return the full list of rows in the database
	 *
	 * @param bool $objects
	 * @return array
	 */
	public function getFullList ($objects=false)
	{

		$result = array();

		$sql = "
			SELECT *
			FROM `{$this->table}`
			ORDER BY `{$this->orderBy}` {$this->orderDirection}
		";

		if( !empty( $this->limit ) )
		{
			$sql .= " LIMIT {$this->limit}";
		}

		$class = get_class( $this );

		$recordset = Database::fetchResult( $sql );

		while ( $row = Database::fetchAssoc( $recordset ) )
		{

			if ( $objects )
			{
				$item = new $class;
				$item->setData( $row );
				$result[] = $item;
			}
			else
			{
				$result[] = $row;
			}

		}

		return $result;

	}
	/**
	 * Return the list of rows in the database
	 * according to the parameter array
	 *
	 * @param null $parameters
	 * @param bool $objects
	 * @return array
	 */
	public function getListBy ( $parameters=null, $objects=false )
	{

		if( empty( $parameters ) )
		{
			return $this->getFullList( $objects );
		}

		$result = array();

		$where = array();
		foreach( $parameters as $field => $value )
		{
			$where[] = " $field = '$value' ";
		}
		$where = implode( ',', $where );

		$sql = "
			SELECT *
			FROM `{$this->table}`
			WHERE $where
			ORDER BY `{$this->orderBy}` {$this->orderDirection}
		";

		if( !empty( $this->limit ) )
		{
			$sql .= " LIMIT {$this->limit}";
		}

		$class = get_class( $this );

		$recordset = Database::fetchResult( $sql );

		while ( $row = Database::fetchAssoc( $recordset ) )
		{

			if ( $objects ) {

				$item = new $class;

				$item->setData( $row );

				$result[] = $item;

			} else {

				$result[] = $row;

			}

		}

		return $result;

	}

	/**
	 * Counts the rows identified by the supplied parameters
	 *
	 * @param null $parameters
	 * @return mixed
	 */
	public function count ( $parameters=null )
	{

		if( empty( $parameters ) )
		{
		   $where = '';
		}
		else
		{

			$where = array();

			foreach( $parameters as $field => $value )
			{
				$where[] = " $field = '$value' ";
			}

			$where = implode( ',', $where );

			$where = ' WHERE ' . $where;

		}

		$result = array();

		$sql = "
			SELECT COUNT(id)
			FROM `{$this->table}`
			$where
		";

		$row = Database::fetchRow( $sql );

		return $row[0];

	}

	/**
	 * Sets the order for the queries
	 *
	 * @param string $by
	 * @param string $direction
	 */
	public function setOrder( $by='id', $direction='ASC' )
	{

		$this->orderBy		= $by;
		$this->orderDirection = $direction;

	}

	/**
	 * Sets the limit for the queries
	 *
	 * @param string $limit
	 */
	public function setLimit( $limit='' )
	{

		$this->limit = $limit;

	}

	/**
	 * Sets the data array with an associative array containing
	 * the correct field names and null values
	 */
	private function setFields()
	{
		$sql = "SHOW COLUMNS IN `{$this->table}`";

		$recordset = Database::fetchResult( $sql );

		while ( $row = Database::fetchAssoc( $recordset ) )
		{

			if($row['Field'] != 'id')
			{

				$this->data[$row['Field']] = null;

			}

		}

	}

	/**
	 * Populates the data array by reading the fields in the
	 * current data array and getting the relevant fields from
	 * the post array
	 *
	 * @param $post
	 */
	public function importFromForm($post)
	{

		$data = array();

		foreach($this->data as $field => $value)
		{

			if($field == 'password')
			{
				if(!empty($post[$field]))
				{
					$data[$field] = md5($post[$field]);
				}
			}
			else
			{
				$data[$field] = $post[$field];
			}

		}

		$this->setData($data);

	}

}

