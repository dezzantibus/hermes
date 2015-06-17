<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 11:49
 */

class image
{

    const PROCESSED_PATH = '../images/uploads/processed/';

    const ORIGINAL_PATH = '../images/uploads/original/';

    public static function retrieve( $file, $width, $height )
    {

        $processed_filename = self::PROCESSED_PATH . $file . '_' . $width . '_' . $height . '.jpg';

        if( file_exists( $processed_filename ) )
        {
            $image = imagecreatefromjpeg( $processed_filename );
        }
        else
        {

            $original_filename = self::ORIGINAL_PATH . $file . '.jpg';

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