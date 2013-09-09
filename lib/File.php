<?php

class File 
{

	/**
	 * Saves an uploaded file to the provided path and name
	 *
	 * @param $formField
	 * @param $saveAs
	 */
	static function saveUploaded($formField, $saveAs)
	{
		
		if ($_FILES[$formField]['size'] > 0)
		{

			self::checkPath($saveAs);
			
			move_uploaded_file($_FILES[$formField]['tmp_name'], $saveAs);

			chmod($saveAs, 0777);
			
		}
		
	}

	/**
	 * Deletes a file
	 *
	 * @param $fullPath
	 */
	static function delete($fullPath)
	{
		unlink($fullPath);
	}

	/**
	 * Checks the existence of a path and if non
	 * existing it creates
	 *
	 * @param $fullPath
	 */
	private static function checkPath($fullPath)
	{
		$array = explode('/', $fullPath);
		
		unset($array[count($array)-1]);
		
		$path = implode('/', $array);
		
		if (!file_exists($path))
		{
			mkdir($path, 0777, true);
		}
	 
	}

	/**
	 * Saves a string in a text file
	 *
	 * @param $content
	 * @param $saveAs
	 */
	static function saveText($content, $saveAs)
	{

		self::checkPath($saveAs);

		file_put_contents($saveAs, $content);

	}
	
}