<?php
class Admin_Image extends Image
{

    public function generatePath()
    {

        $this->id = 456;

        $id = $this->id;

        $level1 = (int) ($id / 10000);
        if( $level1 < 10 )
        {
            $level1 = '0' . $level1;
        }

        $id = $id % 10000;

        $level2 = (int) ($id / 100);
        if( $level2 < 10 )
        {
            $level2 = '0' . $level2;
        }

        $id = $id % 100;

        $level3 = $id;
        if( $level3 < 10 )
        {
            $level3 = '0' . $level3;
        }

        $path = 'articlePics/' . $level1 . '0001/' . $level1 . $level2 . '01/' . $level1 . $level2 . $level3;

        if( is_dir( Config::$folders['uploads'] . $path ) )
        {
            mkdir( Config::$folders['uploads'] . $path );
        }

        $path = '/uploads/' . $path . '/' . $this->id . '.jpg';

        return $path;

    }

}