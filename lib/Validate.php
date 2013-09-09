<?php
class Validate
{

	/**
	 * Checks the validity of the email
	 *
	 * @param $name
	 * @param $value
	 * @return bool
	 */
	static function email($name, $value)
	{

		if(filter_var($value, FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		else
		{
			Message::addError(Albanian::ERROR_BOGUS_EMAIL, $name);
			return false;
		}

	}

	/**
	 * Checks if the provided variable is empty
	 *
	 * @param $name
	 * @param $value
	 * @return bool
	 */
	static function required($name, $value)
	{

		if( empty( $value ) )
		{
			Message::addError(Albanian::ERROR_REQUIRED_VALUE, $name);
			return false;
		}

		return true;

	}

	/**
	 * Checks if the provided value is a number
	 *
	 * @param $name
	 * @param $value
	 * @return bool
	 */
	static function number($name, $value)
	{

		if( !is_numeric( $value ) )
		{
			Message::addError(Albanian::ERROR_IS_NOT_NUMERIC, $name);
			return false;
		}

		return true;
	}

	/**
	 * Checks if the provided string is longer
	 * than the maximum length
	 *
	 * @param $name
	 * @param $value
	 * @param $max
	 * @return bool
	 */
	static function maxLength($name, $value, $max)
	{
		if(strlen($value) > $max){

			Message::addError(Albanian::ERROR_TOO_LONG, $name);
			return false;

		}

		return true;
	}

	/**
	 * Checks if the provided string is shorter
	 * than the minimum length
	 *
	 * @param $name
	 * @param $value
	 * @param $min
	 * @return bool
	 */
	static function minLength($name, $value, $min)
	{
		if(strlen($value) < $min){

			Message::addError(Albanian::ERROR_TOO_SHORT, $name);
			return false;

		}

		return true;
	}

	/**
	 * Checks if the provided number is higher
	 * than the maximum value
	 *
	 * @param $name
	 * @param $value
	 * @param $max
	 * @return bool
	 */
	static function maxNumber($name, $value, $max)
	{
		if($value > $max){

			Message::addError(Albanian::ERROR_TOO_LARGE, $name);
			return false;

		}

		return true;
	}

	/**
	 * Checks if the provided number is lower
	 * than the minimum value
	 *
	 * @param $name
	 * @param $value
	 * @param $min
	 * @return bool
	 */
	static function minNumber($name, $value, $min)
	{
		if($value < $min){

			Message::addError(Albanian::ERROR_TOO_SMALL, $name);
			return false;

		}

		return true;
	}

	/**
	 * Checks if the two values are equal
	 *
	 * @param $name1
	 * @param $value1
	 * @param $name2
	 * @param $value2
	 * @return bool
	 */
	static function equals($name1, $value1, $name2, $value2)
	{
		if($value < $min){

			Message::addError(Albanian::ERROR_NOT_EQUALS, $name1, $name2);
			return false;

		}

		return true;
	}

}