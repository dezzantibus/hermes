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

        $sql = '
            INSERT INTO article
                (
                category_id, journalist_id, routing,
                title, subtitle, brief,
                text, hero, homepage, pinned,
                image_1, image_2, image_3, image_4
                )
            VALUES
                (
                :category_id, :journalist_id, :routing,
                :title, :subtitle, :brief,
                :text, :hero, :homepage, :pinned,
                :image_1, :image_2, :image_3, :image_4
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
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_article $data )
    {

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
                hero          = :hero,
                homepage      = :homepage,
                pinned        = :pinned
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
            ->bindInt   ( ':hero',          $data->hero )
            ->bindInt   ( ':homepage',      $data->homepage )
            ->bindInt   ( ':pinned',        $data->pinned )
            ->bindInt   ( ':id',            $data->id )
            ->execute();

    }

    static public function delete( $id )
    {

        $sql = 'DELETE FROM article WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

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

        return $result;

    }

    static public function getHero()
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

        return $result;

    }

    static public function getAdminPage( $page=1 )
    {

        if( $_SESSION['journalist']->id == 1 )
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
            ->bindInt( ':start',       ( $page - 1 ) * constant::ADMIN_ARTICLES_PER_PAGE )
            ->bindInt( ':number',      constant::ADMIN_ARTICLES_PER_PAGE )
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

        if( empty( $category_id ) )
        {
            $sql = '
                SELECT article.*, count(hit.id) AS hits
                FROM article
                    INNER JOIN hit
                        ON hit.article_id = article.id
                WHERE hit.created > NOW() - INTERVAL :days DAY
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

        return $result;

    }

}