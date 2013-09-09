<?php
class Admin_Article extends Article
{

	public function validateFormData($post)
	{

		$return = true;

		$return = $return && Validate::required(Albanian::MEX_CATEGORY, $post['category_id']);
		$return = $return && Validate::number(Albanian::MEX_CATEGORY, $post['category_id']);

		$return = $return && Validate::required(Albanian::MEX_JOURNALIST, $post['journalist_id']);
		$return = $return && Validate::number(Albanian::MEX_JOURNALIST, $post['journalist_id']);

		$return = $return && Validate::required(Albanian::MEX_TITLE, $post['title']);
		$return = $return && Validate::maxLength(Albanian::MEX_TITLE, $post['title'], 100);

        $return = $return && Validate::required(Albanian::MEX_BRIEF, $post['brief']);

		$return = $return && Validate::maxLength(Albanian::MEX_SUBTITLE, $post['title'], 255);

		$return = $return && Validate::required(Albanian::MEX_TEXT, $post['text']);

		return $return;

	}

}