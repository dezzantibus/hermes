<?php
class Category extends Model
{

	protected $table = 'category';

	public $articles = null;

	/**
	 * Returns the list of articles for a provided
	 * page number. The default page number is 1
	 *
	 * @param int $page
	 * @return array
	 */
	public function getPage( $page=1, $articlesPerPage=Config::ARTICLES_PER_PAGE )
	{

		$article = new Article();

		$start = $articlesPerPage * ($page - 1);

		$limit = $start . ', ' . $articlesPerPage;

		$article->setLimit( $limit );

		$article->setOrder( 'id', 'DESC' );

		$parameters = array(
			'category_id'   => $this->getData( 'id' ),
		);

		return $article->getListBy( $parameters );

	}

	/**
	 * Generates the link to the category
	 *
	 * @param null $page
	 * @return string
	 */
	public function link( $page=null )
	{

		$name = Functions::urlFriendly( $this->data['name'] );

		if( is_null( $page ) )
		{
			$out = "/{$this->id}/$name.html";
		}
		else
		{
			$out = "/{$this->id}/{$page}/$name.html";
		}

		return $out;

	}

	/**
	 * Returns the array containing the links for
	 * paging of the articles
	 *
	 * @param null $pages
	 * @return array
	 */
	public function pagingLinkArray( $pages=null, $articlesPerPage=Config::ARTICLES_PER_PAGE )
	{

		if( is_null( $pages ) )
		{
			$pages = ceil($this->countArticles() / $articlesPerPage);
		}

		$out = array();

		for( $i=1; $i<=$pages; $i++)
		{
			$out[$i] = $this->link( $i );
		}

		return $out;

	}

	/**
	 * Returns the numbers of articles in
	 * a category
	 *
	 * @return mixed
	 */
	private function countArticles()
	{

		$article = new Article();

		$parameters = array('category_id' => $this->id);

		$out = $article->count( $parameters );

		return $out;

	}

    public static function getTree( $id=0 )
    {

        $sql = "
            SELECT *
            FROM category
            WHERE parent_id = $id
        ";

        $list = Database::fetchResultArray( $sql );

        if( empty( $list ) )
        {
            return null;
        }

        foreach($list as $key => $cat)
        {
            $list[$key]['children'] = self::getTree( $cat['id'] );
        }

        return $list;

    }

}