<?php
class Admin_Journalist extends Journalist
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
			<input type="text" name="fname" value="%s">

			<label>%s</label>
			<input type="text" name="lname" value="%s">

			<label>%s</label>
			<input type="text" name="email" value="%s">

		';

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
			Albanian::FORM_JOURNALIST, $journalistOptions,
			Albanian::FORM_FNAME,      $this->getData('fname'),
			Albanian::FORM_LNAME,      $this->getData('lname'),
			Albanian::FORM_EMAIL,      $this->getData('email')
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

		$return = $return && Validate::required(Albanian::MEX_MANAGER, $post['manager_id']);
		$return = $return && Validate::number(Albanian::MEX_MANAGER, $post['manager_id']);

		$return = $return && Validate::required(Albanian::MEX_FNAME, $post['fname']);
		$return = $return && Validate::maxLength(Albanian::MEX_FNAME, $post['fname'], 45);

		$return = $return && Validate::required(Albanian::MEX_LNAME, $post['lname']);
		$return = $return && Validate::maxLength(Albanian::MEX_LNAME, $post['lname'], 45);

		$return = $return && Validate::required(Albanian::MEX_EMAIL, $post['email']);
		$return = $return && Validate::maxLength(Albanian::MEX_EMAIL, $post['email'], 45);
		$return = $return && Validate::email(Albanian::MEX_EMAIL, $post['email']);

		return $return;

	}

}