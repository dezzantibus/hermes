<?php
class Sitemap
{

	const mapHead = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

	const mapFeet = '</urlset> ';

	const maxPerMap = 400;

	private static $priority = 0;

	/**
	 * Generates the sitemaps of all categories
	 */
	static function generate()
	{

		$category = new Category;

		foreach($category->getFullList() as $cat)
		{
			self::generateCategory($cat);
		}

	}

	/**
	 * Generates the sitemap for a category
	 *
	 * @param $category
	 */
	private static function generateCategory($category)
	{
		$cat = new Category($category['id']);

		$cat->setLimit(self::maxPerMap);
		$cat->setOrder('id', 'DESC');

		$articles = $cat->getFullList(true);

		self::$priority = 1;

		$map = self::mapHead;
		foreach($articles as $item)
		{
			$map .= self::generateArticleEntry($item);
		}
		$map .= self::mapFeet;

		$file = Config::$folders['sitemap'] . $cat->getData('name') . '.xml';

		File::saveText($map, $file);
	}

	/**
	 * Returns a single line on a sitemap
	 *
	 * @param $article
	 * @return string
	 */
	private static function generateArticleEntry($article)
	{

		$priority = self::$priority;

		self::$priority -= 1 / self::maxPerMap;

		if(self::$priority < (1 / self::maxPerMap))
		{
			$priority = 1 / self::maxPerMap;
		}

		return "
			<url>
				<loc>{$article->link()}</loc>
				<lastmod>{$article->getData('created')}</lastmod>
				<changefreq>daily</changefreq>
				<priority>{$priority}</priority>
			</url>
		";

	}

}