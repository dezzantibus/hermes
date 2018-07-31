<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_article extends model
{

    static public function create( data_article $data )
    {

        cache_article::insert();

        $sql = '
            INSERT INTO article
                (
                category_id, journalist_id, routing,
                title, subtitle, brief,
                text, hero, homepage, pinned,
                image_1, image_2, image_3, image_4,
                caption_1, caption_2, caption_3, caption_4,
                gallery
                )
            VALUES
                (
                :category_id, :journalist_id, :routing,
                :title, :subtitle, :brief,
                :text, :hero, :homepage, :pinned,
                :image_1, :image_2, :image_3, :image_4,
                :caption_1, :caption_2, :caption_3, :caption_4,
                :gallery
                )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':category_id',   $data->category_id )
            ->bindInt   ( ':journalist_id', $data->journalist_id )
            ->bindString( ':routing',       $data->routing )
            ->bindString( ':title',         self::clean_text( $data->title ) )
            ->bindString( ':subtitle',      self::clean_text( $data->subtitle ) )
            ->bindString( ':brief',         self::clean_text( $data->brief ) )
            ->bindString( ':text',          self::clean_text( $data->text ) )
            ->bindInt   ( ':hero',          $data->hero )
            ->bindInt   ( ':homepage',      $data->homepage )
            ->bindInt   ( ':pinned',        $data->pinned )
            ->bindString( ':image_1',       $data->image_1 )
            ->bindString( ':image_2',       $data->image_2 )
            ->bindString( ':image_3',       $data->image_3 )
            ->bindString( ':image_4',       $data->image_4 )
            ->bindString( ':caption_1',     $data->caption_1 )
            ->bindString( ':caption_2',     $data->caption_2 )
            ->bindString( ':caption_3',     $data->caption_3 )
            ->bindString( ':caption_4',     $data->caption_4 )
            ->bindString( ':gallery',       $data->gallery )
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_article $data )
    {

        cache_article::update();

        $sql = '
            UPDATE article
            SET category_id   = :category_id,
                journalist_id = :journalist_id,
                routing       = :routing,
                title         = :title,
                subtitle      = :subtitle,
                brief         = :brief,
                text          = :text,
                sent          = :sent,
                image_1       = :image_1,
                image_2       = :image_2,
                image_3       = :image_3,
                image_4       = :image_4,
                caption_1     = :caption_1,
                caption_2     = :caption_2,
                caption_3     = :caption_3,
                caption_4     = :caption_4,
                hero          = :hero,
                homepage      = :homepage,
                pinned        = :pinned,
                gallery       = :gallery
            WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':category_id',   $data->category_id )
            ->bindInt   ( ':journalist_id', $data->journalist_id )
            ->bindString( ':routing',       $data->routing )
            ->bindString( ':title',         self::clean_text( $data->title ) )
            ->bindString( ':subtitle',      self::clean_text( $data->subtitle ) )
            ->bindString( ':brief',         self::clean_text( $data->brief ) )
            ->bindString( ':text',          self::clean_text( $data->text ) )
            ->bindInt   ( ':sent',          $data->sent )
            ->bindString( ':image_1',       $data->image_1 )
            ->bindString( ':image_2',       $data->image_2 )
            ->bindString( ':image_3',       $data->image_3 )
            ->bindString( ':image_4',       $data->image_4 )
            ->bindString( ':caption_1',     $data->caption_1 )
            ->bindString( ':caption_2',     $data->caption_2 )
            ->bindString( ':caption_3',     $data->caption_3 )
            ->bindString( ':caption_4',     $data->caption_4 )
            ->bindInt   ( ':hero',          $data->hero )
            ->bindInt   ( ':homepage',      $data->homepage )
            ->bindInt   ( ':pinned',        $data->pinned )
            ->bindString( ':gallery',       $data->gallery )
            ->bindInt   ( ':id',            $data->id )
            ->execute();

    }

    static public function delete( $id, $category_id )
    {

        cache_article::delete();

        $sql = 'DELETE FROM article WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        self::sitemaps( $category_id );

    }

    static public function getById( $id )
    {

        $sql = 'SELECT * FROM article WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        $row = $query->fetch();

        return new data_article( $row );

    }

    static public function getLastNumber( $limit, $category=null )
    {

        $sql = 'SELECT * FROM article ORDER BY id DESC LIMIT :limit';

        $query = db::prepare( $sql );
        $query->bindInt( ':limit', $limit )->execute();

        $result = new data_array();
        while( $row = $query->fetch() )
        {
            $result->add( new data_article( $row ) );
        }

        return $result;

    }

    static public function getByRouting( $routing, $parent )
    {

        $category = model_category::getByRouting( $parent );

        $sql = '
            SELECT *
            FROM article
            WHERE routing = :routing
                AND category_id = :category_id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':routing',     $routing )
            ->bindInt   ( ':category_id', $category->id )
            ->execute();

        $row = $query->fetch();

        $journalist = model_journalist::getById( $row['id'] );

        return new data_article( $row, $category, $journalist );

    }

    static public function getHomeCategory( data_category $category, $number )
    {

        $result = cache_article::returnHomeCategory( $category->id, $number );

        if( empty( $result ) )
        {

            $sql = '
            SELECT *
            FROM article
            WHERE category_id = :category_id
                AND homepage = 1
                AND image_1 IS NOT NULL
            ORDER BY id DESC
            LIMIT :number
        ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':category_id', $category->id )
                ->bindInt( ':number',      $number )
                ->execute();

            $result = new data_array();
            while( $row = $query->fetch() )
            {
                $journalist = model_journalist::getById( $row['journalist_id'] );
                $result->add( new data_article( $row, $category, $journalist ) );
            }

            cache_article::saveHomeCategory( $result, $category->id, $number );

        }

        return $result;

    }

    static public function getHero()
    {

        $result = cache_article::returnHero();

        if( empty( $result ) )
        {


            $sql = '
                SELECT *
                FROM article
                WHERE hero > 0
                ORDER BY id DESC
                LIMIT 6
            ';

            $query = db::prepare( $sql )->execute();

            $result = new data_array();

            while( $row = $query->fetch() )
            {
                $category = model_category::getById( $row['category_id'] );
                $result->add( new data_article( $row, $category ) );
            }

            cache_article::saveHero( $result );

        }

        return $result;

    }

    static public function getAdminPage( $page=1 )
    {

        if( $_SESSION['journalist']->admin == 1 )
        {
            $sql = '
                SELECT *
                FROM article
                ORDER BY id DESC
                LIMIT :start, :number
            ';
            $query = db::prepare( $sql );
        }
        else
        {
            $sql = '
                SELECT *
                FROM article
                    WHERE journalist_id = :journalist_id
                ORDER BY id DESC
                LIMIT :start, :number
            ';
            $query = db::prepare( $sql );
            $query->bindInt( ':journalist_id', $_SESSION['journalist']->id );
        }

        $query
            ->bindInt( ':start',  ( $page - 1 ) * constant::ADMIN_ARTICLES_PER_PAGE )
            ->bindInt( ':number', constant::ADMIN_ARTICLES_PER_PAGE )
            ->execute();

        $result = new data_array();
        while( $row = $query->fetch() )
        {
            $category = model_category::getById( $row['category_id'] );
            $result->add( new data_article( $row, $category ) );
        }

        return $result;

    }

    static public function getAdminPageNumber()
    {

        $sql = 'SELECT COUNT( id ) AS num FROM article';

        $query = db::prepare( $sql )->execute();
        $row   = $query->fetch();

        return ceil( $row['num'] / constant::ADMIN_ARTICLES_PER_PAGE );

    }

    static public function getCategoryPage( data_category $category, $page=1 )
    {

        $result = cache_article::returnCategoryPage( $category->id, $page );

        if( empty( $result ) )
        {

            $sql = '
                SELECT *
                FROM article
                WHERE category_id = :category_id
                ORDER BY id DESC
                LIMIT :start, :number
            ';

            $query = db::prepare( $sql );
            $query
                ->bindInt( ':category_id', $category->id )
                ->bindInt( ':start',       ( $page - 1 ) * constant::ARTICLES_PER_PAGE )
                ->bindInt( ':number',      constant::ARTICLES_PER_PAGE )
                ->execute();

            $result = new data_array();
            while( $row = $query->fetch() )
            {
                $journalist = model_journalist::getById( $row['journalist_id'] );
                $result->add( new data_article( $row, $category, $journalist ) );
            }

            cache_article::saveCategoryPage( $result, $category->id, $page );

        }

        return $result;

    }

    static public function getCategoryPageNumber( data_category $category )
    {

        $sql = 'SELECT COUNT( id ) AS num FROM article WHERE category_id = :category_id';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':category_id', $category->id )
            ->execute();
        $row   = $query->fetch();

        return ceil( $row['num'] / constant::ARTICLES_PER_PAGE );

    }

    static public function getRecent( data_category $category=null, $limit=6 )
    {

        $result = cache_article::returnRecent( empty( $category ) ? '' : $category->id );

        if( empty( $result ) )
        {

            if( empty( $category ) )
            {
                $sql = '
                    SELECT *
                    FROM article
                    WHERE image_1 IS NOT NULL
                    ORDER BY id DESC
                    LIMIT :limit
                ';
            }
            else
            {
                $sql = '
                    SELECT *
                    FROM article
                    WHERE image_1 IS NOT NULL
                        AND category_id = :category_id
                    ORDER BY id DESC
                    LIMIT :limit
                ';
            }

            $query = db::prepare( $sql );
            $query->bindInt( ':limit', $limit );

            if( !empty( $category ) )
            {
                $query->bindInt( ':category_id', $category->id );
            }

            $query->execute();

            $result = new data_array();
            while( $row = $query->fetch() )
            {
                $category = model_category::getById( $row['category_id'] );
                $result->add( new data_article( $row, $category ) );
            }

            cache_article::saveRecent( $result, empty( $category ) ? '' : $category->id );

        }

        return $result;

    }

    static public function getCategoryPinned( data_category $category, $limit )
    {

        $sql = '
            SELECT *
            FROM article
            WHERE category_id = :category_id
                AND pinned = 1
            ORDER BY id DESC
            LIMIT :number
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':category_id', $category->id )
            ->bindInt( ':number',      $limit )
            ->execute();

        $result = new data_array();
        while( $row = $query->fetch() )
        {
            $result->add( new data_article( $row, $category ) );
        }

        return $result;

    }

    static public function getPopular( $category_id=null, $days=7, $limit=6 )
    {

        $result = cache_article::returnPopular( $category_id );

        if( empty( $result ) )
        {

            if( empty( $category_id ) )
            {
                $sql = '
                    SELECT article.*, count(hit.id) AS hits
                    FROM article
                        INNER JOIN hit
                            ON hit.article_id = article.id
                    WHERE hit.created > NOW() - INTERVAL :days DAY
                        AND article.created > NOW() - INTERVAL 21 day
                        AND hit.ignore = 0
                    GROUP BY hit.article_id
                    ORDER BY hits DESC
                    LIMIT :limit
                ';
            }
            else
            {
                $sql = '
                    SELECT article.*, count(hit.id) AS hits
                    FROM article
                        INNER JOIN hit
                            ON hit.article_id = article.id
                    WHERE hit.created > NOW() - INTERVAL :days DAY
                        AND article.category_id = :category_id
                        AND hit.ignore = 0
                    GROUP BY hit.article_id
                    ORDER BY hits DESC
                    LIMIT :limit
                ';
            }

            $query = db::prepare( $sql )
                ->bindInt( ':days',  $days )
                ->bindInt( ':limit', $limit );

            if( !empty( $category_id ) )
            {
                $query->bindInt( ':category_id',  $category_id );
            }

            $query->execute();

            $result = new data_array();
            while( $row = $query->fetch() )
            {
                $category = model_category::getById( $row['category_id'] );
                $result->add( new data_article( $row, $category ) );
            }

            cache_article::savePopular( $result, $category_id );

        }

        return $result;

    }

    static public function getRelated( $article_id )
    {

        $sql = '
            SELECT a.*
            FROM article a
                INNER JOIN related r
                    ON a.id = r.related_id
            WHERE r.article_id = :article_id
            ORDER BY a.created DESC
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':article_id', $article_id )
            ->execute();

        $result = new data_array();
        while( $row = $query->fetch() )
        {
            $category = model_category::getById( $row['category_id'] );
            $result->add( new data_article( $row , $category ) );
        }

        return $result;

    }

    static public function sitemaps( $category_id )
    {

        $category = model_category::getById( $category_id );

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $sql = '
            SELECT *
            FROM article
            WHERE category_id = :category_id
            ORDER BY created DESC
            LIMIT 1000
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':category_id', $category_id )
            ->execute();

        while( $row = $query->fetch() )
        {

            $xml .= '<url>';
            $xml .=     '<loc>http://' . $_SERVER['HTTP_HOST'] . '/' . $category->routing . '/' . $row['routing'] . '.html</loc>';
            $xml .=     '<lastmod>' . substr( $row['created'], 0, 10 ) . '</lastmod>';
            $xml .= '</url>';

        }

        $xml .= '</urlset>';

        $fp = fopen( __DIR__ . '/../sitemap/' . $category->routing . '.xml', 'w' );
        fwrite( $fp, utf8_encode( $xml ) );
        fclose( $fp );

    }

}