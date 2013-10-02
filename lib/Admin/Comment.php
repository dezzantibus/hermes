<?php
class Admin_Comment extends Comment
{

	/**
	 * Return the HTML for the form, populated with
	 * the data if the class contains data
	 *
	 * @return string
	 */
	public function generateForm()
	{

		$return = '

			<input type="hidden" name="id" value="%s">

			<input type="hidden" name="user_id" value="%s">

			<input type="hidden" name="article_id" value="%s">

			<label>%s</label>
			<textarea name="text">%s</textarea>

		';

		$return = sprintf(
			$return,
			$this->id,
			$this->user_id,
			$this->article_id,
			Albanian::FORM_TEXT, $this->getData('text')
		);

		return $return;

	}

	/**
	 * Validates the data coming from the form
	 *
	 * @param $post
	 * @return bool
	 */
	public function validateFormData($post)
	{

		$return = true;

		$return = $return && Validate::required(Albanian::MEX_USER, $post['user_id']);
		$return = $return && Validate::number(Albanian::MEX_USER, $post['user_id']);

		$return = $return && Validate::required(Albanian::MEX_ARTICLE, $post['article_id']);
		$return = $return && Validate::number(Albanian::MEX_ARTICLE, $post['article_id']);

		$return = $return && Validate::required(Albanian::MEX_TEXT, $post['text']);

		return $return;

	}

}