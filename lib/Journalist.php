<?php
class Journalist extends Model
{

	protected $table = 'journalist';

	/**
	 * Recursively returns the journalists under the
	 * current journalist
	 *
	 * @return array
	 */
	public function getUnderlings()
	{

		/**
		 * Sorting criteria function
		 *
		 * @param Journalist $a
		 * @param Journalist $b
		 * @return int
		 */
		function journalistSort(Journalist $a, Journalist $b)
		{
			$aname = $a->getData('fname').' '.$a->getData('lname');
			$bname = $b->getData('fname').' '.$b->getData('lname');
			return strcmp($aname, $bname);
		}

		$parameters = array(
			'manager_id' => $this->getData('id'),
		);

		$forLoop = $list = $this->getListBy($parameters, true);

		foreach($forLoop as $underling)
		{
			$list = array_merge($list, $underling->getUnderlings());
		}

		usort($list, 'journalistSort');

		return $list;

	}

    public static function Login($email=null, $pass=null)
    {

        $pass = Functions::hash( $pass );

        $sql = "
            SELECT *
            FROM journalist
            WHERE email = '$email'
                AND pass = '$pass'
        ";

        if( $journalist = Database::fetchAssoc( $sql ) )
        {
            $_SESSION['journalist'] = $journalist;
        }

    }

}