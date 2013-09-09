<?php
class Admin_User extends User
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
			<input type="text" name="username" value="%s">

			<label>%s</label>
			<input type="password" name="password" value="">

			<label>%s</label>
			<input type="password" name="passwordConf" value="">

			<label>%s</label>
			<input type="text" name="fname" value="%s">

			<label>%s</label>
			<input type="text" name="lname" value="%s">

			<label>%s</label>
			<input type="text" name="email" value="%s">

		';

		$return = sprintf(
			$return,
			$this->id,
			Albanian::FORM_USERNAME,    $this->getData('username'),
			Albanian::FORM_PASSWORD,
			Albanian::FORM_PWD_CONFIRM,
			Albanian::FORM_FNAME,       $this->getData('fname'),
			Albanian::FORM_LNAME,       $this->getData('lname'),
			Albanian::FORM_EMAIL,       $this->getData('email')
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

		$return = $return && Validate::required(Albanian::MEX_USERNAME, $post['username']);
		$return = $return && Validate::maxLength(Albanian::MEX_USERNAME, $post['username'], 45);
		$return = $return && Validate::minLength(Albanian::MEX_USERNAME, $post['username'], 6);

		$return = $return && Validate::required(Albanian::MEX_PASSWORD, $post['password']);
		$return = $return && Validate::maxLength(Albanian::MEX_PASSWORD, $post['password'], 45);
		$return = $return && Validate::minLength(Albanian::MEX_PASSWORD, $post['password'], 6);

		if($post['password'] != $post['passwordConf'])
		{
			Message::addError(Albanian::ERROR_MISMATCH_PASS);
			$return = false;
		}

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