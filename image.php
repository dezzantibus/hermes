<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 11:49
 */

class image
{

    public static function retrieve( $file, $path, $width, $height )
    {

        $file_path = __DIR__ . "/../upload/article/$path/";

        $processed_filename = $file_path . $file . '_' . $width . '_' . $height . '.jpg';

        if( file_exists( $processed_filename ) )
        {
            $image = imagecreatefromjpeg( $processed_filename );
        }
        else
        {

            $original_filename = $file_path . $file . '.jpg';

            $image = imagecreatefromjpeg( $original_filename );

            $original_width  = imagesx( $image );
            $original_height = imagesy( $image );

            if( ( $original_width / $width ) < ( $original_height / $height ) )
            {
                $new_height = $height;
                $new_width  = $original_width * ( $height / $original_height );
            }
            else
            {
                $new_width  = $width;
                $new_height = $original_height * ( $width / $original_width );
            }

            $image = imagescale( $image, $new_width, $new_height );

            $cropping_array = array(
                'x'      => ( $new_width - $width ) / 2,
                'y'      => ( $new_height - $height ) / 2,
                'width'  => $width,
                'height' => $height,
            );

            $image = imagecrop( $image, $cropping_array );

            imagejpeg( $image, $processed_filename );

        }

        header('Content-Type: image/jpeg');
        imagejpeg( $image );

    }

}

if( $_GET['file'] == 'filler.jpg' )
{

    header('Content-Type: image/jpeg');

//    switch( rand(1, 13) )
//    {
//        case 1:  $category = '/cats/';      break;
//        case 2:  $category = '/abstract/';  break;
//        case 3:  $category = '/animals/';   break;
//        case 4:  $category = '/business/';  break;
//        case 5:  $category = '/city/';      break;
//        case 6:  $category = '/food/';      break;
//        case 7:  $category = '/nightlife/'; break;
//        case 8:  $category = '/fashion/';   break;
//        case 9:  $category = '/people/';    break;
//        case 10: $category = '/nature/';    break;
//        case 11: $category = '/sports/';    break;
//        case 12: $category = '/technics/';  break;
//        case 13: $category = '/transport/'; break;
//    }

//    switch( rand( 1,2 ) )
//    {
//        case 1: imagejpeg( imagecreatefromjpeg( '//lorempixel.com/' . $_GET['width'] . '/' . $_GET['height'] . $category  ) ); break;
//        case 2: imagejpeg( imagecreatefromjpeg( '//fillmurray.com/' . $_GET['width'] . '/' . $_GET['height'] ) ); break;
//        case 3: imagejpeg( imagecreatefromjpeg( '//nicenicejpg.com/' . $_GET['width'] . '/' . $_GET['height'] ) ); break;
//        case 3: imagejpeg( imagecreatefromjpeg( '//placecage.com/' . $_GET['width'] . '/' . $_GET['height'] ) ); break;
//        case 3: imagejpeg( imagecreatefromjpeg( '//placebear.com/' . $_GET['width'] . '/' . $_GET['height'] ) ); break;
//        case 3: imagejpeg( imagecreatefromjpeg( '//placekitten.com/' . $_GET['width'] . '/' . $_GET['height'] ) ); break;
//    }
    //imagejpeg( imagecreatefromjpeg( 'http://lorempixel.com/' . $_GET['width'] . '/' . $_GET['height'] . $category  ) );
    //imagejpeg( imagecreatefromjpeg( 'http://lorempixel.com/' . $_GET['width'] . '/' . $_GET['height'] . $category  ) );

    imagejpeg( imagecreatefromjpeg( 'http://placekitten.com/' . $_GET['width'] . '/' . $_GET['height']));
    die();
}

image::retrieve( $_GET['file'], $_GET['path'], $_GET['width'], $_GET['height'] );