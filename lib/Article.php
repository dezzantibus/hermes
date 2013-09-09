<?php
class Article extends Model
{

	public $table = 'article';

	private $comments = null;

	private $images = null;

	private $youtube = null;

	/**
	 * Return the comments on the article.
	 *
	 * @return null
	 */
	public function getComments()
	{

		if( is_null( $this->comments ) )
		{
			$this->comments = $this->loadObjects ( 'Comment', 'created' );
		}

		return $this->comments;

	}

	/**
	 * Return the images for the article
	 *
	 * @return null
	 */
	public function getImages()
	{

		if( is_null( $this->images ) )
		{
			$this->images = $this->loadObjects ( 'Image', 'id' );
		}

		return $this->images;

	}

	/**
	 * Return Youtube clips for the article
	 *
	 * @return null
	 */
	public function getYoutube()
	{

		if( is_null( $this->youtube ) )
		{
			$this->youtube = $this->loadObjects ( 'Youtube', 'id' );
		}

		return $this->youtube;

	}

	/**
	 * This method loads an array of objects related
	 * to the current article
	 *
	 * @param $class
	 * @param $orderby
	 * @return mixed
	 */
	private function loadObjects($class, $orderby)
	{

		$item = new $class;
		$parameters = array( 'article_id' => $this->id );
		return $item->getListBy ( $parameters, $orderby, 'DESC', true );

	}

	/*
	 * Returns the latest 3 articles with the "highlight"
	 * flag but without the "hero" flag
	 *
	 * @return array
	 */
	public function getHighlighted()
	{

		$this->setLimit( 3 );
		$this->setOrder( 'id', 'DESC' );

		return $this->getListBy(
			array(
				'hero' => 0,
				'highlight' => 1
			)
		);

	}

	/**
	 * Returns the latest article flagged as "hero"
	 *
	 * @return array
	 */
	public function getHero()
	{
		$this->setLimit( 1 );
		$this->setOrder( 'id', 'DESC' );

		return $this->getListBy( array( 'hero' => 1 ) );
	}

	/**
	 * Returns the latest articles. If a category is supplied
	 * then the articles are selected from that category
	 *
	 * @param null $catid
	 * @param int $limit
	 * @return array
	 */
	public function getLatest( $catid=null, $limit=5 )
	{

		$this->setLimit( $limit );
		$this->setOrder( 'id', 'DESC' );

		if( is_null( $catid ) )
		{
			$out = $this->getFullList();
		}
		else
		{
			$out = $this->getListBy( array( 'category_id' => $catid ) );
		}

		return $out;

	}

	/**
	 * Generates the link to the current article
	 *
	 * @return string
	 */
	public function link()
	{
		$title = Functions::urlFriendly( $this->data['title'] );

		$date = Datetime::date( $this->getData( 'created' ) );
		$date = str_replace(' ', '-', $date);

		$out = "/{$this->id}/{$date}/{$title}.html";

		return $out;
	}

	/**
	 * Returns the list of most popular articles of the latest week
	 * If a category is provided the articles are selected from
	 * that category
	 *
	 * @param null $category_id
	 * @return array|bool
	 */
	public function getPopular($category_id=null)
	{
		$where = '';
		if(!is_null($category_id))
		{
			$where = "WHERE article.category_id = $category_id";
		}

		$sql = "
			SELECT article.*, COUNT(hit.id) AS hits
			FROM article
				INNER JOIN hit
					ON article.id = hit.article_id
						AND hit.created BETWEEN DATE_ADD(NOW(),INTERVAL -1 WEEK) AND NOW()
			$where
			ORDER BY hits DESC
			LIMIT 10
		";

		return Database::fetchResultArray($sql);

	}

	/**
	 * logs a view on an article
	 *
	 * @param int $user_id
	 */
	public function logHit($user_id = 0)
	{
		$data = array(
			'article_id' => $this->id,
			'user_id'    => $user_id,
			'ip'         => $_SERVER['REMOTE_ADDR'],
		);
	}

	/**
	 * Formats the date for display
	 *
	 * @return mixed
	 */
	public function getDate()
	{
		return Datetime::dateTime($this->getData('created'));
	}

}