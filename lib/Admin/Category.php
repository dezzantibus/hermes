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

    public function getPage( $page=1, $articlesPerPage=Config::ARTICLES_PER_PAGE )
    {

        $article = new Article();

        $start = $articlesPerPage * ($page - 1);

        $limit = $start . ', ' . $articlesPerPage;

        $article->setLimit( $limit );

        $article->setOrder( 'id', 'DESC' );

        $parameters = array(
            'category_id'   => $this->getData( 'id' ),
            'journalist_id' => $_SESSION['journalist']['id'],
        );

        return $article->getListBy( $parameters );

    }

}