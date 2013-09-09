<?php
class Upsell
{

	/**
	 * Returns the upsell data for the index page
	 *
	 * @return array
	 */
	static function index()
	{
		$result = array();

		$category = new Category();
		$category->setOrder( 'order', 'ASC' );
		$categories = $category->getFullList( true );

		$article = new Article();
		$article->setOrder( 'created', 'ASC' );
		$article->setLimit( '5' );

		foreach($categories as $category)
		{
			$result['latest'][$category->getData( 'name' )] = $article->getLatest( $category->getData( 'id' ) );
		}

		$result['highlight'] = $article->getHighlighted();

		$result['hero'] = $article->getHero();

		$result['popular'] = $article->getPopular();

		return $result;

	}

	/**
	 * Returns the upsell data for the category page
	 *
	 * @return array
	 */
	static function category($categoryid)
	{

		$result = array();

		$article = new Article();
		$result['popular'] = $article->getPopular($categoryid);

		return $result;

	}

	/**
	 * Returns the upsell data for the article page
	 *
	 * @param $articleid
	 * @return mixed
	 */
	static function article($articleid=null)
	{

		if(!is_numeric($articleid))
		{
			//header('Location: /');
		}

		$article = new Article($articleid);
		$result['popular'] = $article->getPopular($article->getData('category_id'));

		return $result;

	}

}