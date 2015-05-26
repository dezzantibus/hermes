<?php

class layout_homepage_page extends layout_page
{

    public function __construct()
    {

        $this->addChild( new layout_header() );

    }

}