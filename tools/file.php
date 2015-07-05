<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05/07/2015
 * Time: 21:40
 */

class file
{

    static public function saveFromPost( $input, $article_id )
    {

        if( !isset( $_FILES[ $input ] ) )
        {
            return false;
        }

        $path = self::imagePathFromArticleId( $article_id );

        move_uploaded_file( $_FILES[ $input ]['tmp_name'], $path['file'] . $_FILES[ $input ]['name'] );

        return $path['web'] . $_FILES[ $input ]['name'];

    }

    static public function imagePathFromArticleId( $id )
    {

        $level1  = floor( $id / 10000 );
        $level1 .= '0000';

        $level2 = floor( $id / 100 );
        $level2 .= '00';

        $level3 = $id;

        $path = array(
            'web'  => "/articles/$level1/$level2/$level3/",
            'file' => __DIR__ . "/../upload/articles/$level1/$level2/$level3/",
        );

        if( !is_dir( $path['file'] ) )
        {
            mkdir( $path['file'] );
        }

        return $path;

    }

}