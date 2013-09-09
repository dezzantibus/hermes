<?php
class Admin_Category extends Category
{

	/**
	 * Validates the data coming from the form
	 *
	 * @param $post
	 * @return bool
	 */
	public function validateFormData($post)
	{
		$return = true;

		$return = $return && Validate::required(Albanian::MEX_CATEGORY, $post['name']);
		$return = $return && Validate::maxLength(Albanian::MEX_CATEGORY, $post['name'], 45);

		return $return;
	}

}