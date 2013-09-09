<?php
class Admin_Article extends Article
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

			<label>%s</label>
			<select name="%s">%s</select>

			<label>%s</label>
			<select name="%s">%s</select>

			<label>%s</label>
			<input type="text" name="title" value="%s">

			<label>%s</label>
			<input type="text" name="subtitle" value="%s">

			<label>%s</label>
			<textarea name="text">%s</textarea>

		';

		$categoryOptions = '';
		$category = new Category();
		$category->setOrder('name');
		foreach($category->getFullList() as $item)
		{
			$categoryOptions .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
		}

		$journalistOptions = '';
		$journalist = new Journalist();
		$journalist->setOrder('fname` ASC, `lname'); // the apices are a hack to order on two fields
		foreach($journalist->getFullList() as $item)
		{
			$journalistOptions .= '<option value="'.$item['id'].'">'.$item['fname'].' '.$item['lname'].'</option>';
		}

		$return = sprintf(
			$return,
			$this->id,
			Albanian::FORM_CATEGORY,   $categoryOptions,
			Albanian::FORM_JOURNALIST, $journalistOptions,
			Albanian::FORM_TITLE,      $this->getData('title'),
			Albanian::FORM_SUBTITLE,   $this->getData('subtitle'),
			Albanian::FORM_TEXT,       $this->getData('text')
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

		$return = $return && Validate::required(Albanian::MEX_CATEGORY, $post['category_id']);
		$return = $return && Validate::number(Albanian::MEX_CATEGORY, $post['category_id']);

		$return = $return && Validate::required(Albanian::MEX_JOURNALIST, $post['journalist_id']);
		$return = $return && Validate::number(Albanian::MEX_JOURNALIST, $post['journalist_id']);

		$return = $return && Validate::required(Albanian::MEX_TITLE, $post['title']);
		$return = $return && Validate::maxLength(Albanian::MEX_TITLE, $post['title'], 100);

		$return = $return && Validate::maxLength(Albanian::MEX_SUBTITLE, $post['title'], 255);

		$return = $return && Validate::required(Albanian::MEX_TEXT, $post['text']);

		return $return;

	}

}