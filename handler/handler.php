<?php

abstract class handler
{

    protected $data;

    function __construct()
    {
        $this->data = $_GET;
    }

    public function run()
    {

    }

    protected function getHeaderData()
    {

        $result = new data_header();

        $result->category_menu = model_category::getFullList();

        return $result;

    }

    protected function getFooterData()
    {

        $result = new data_footer();

        return $result;

    }

    protected function getSidebarData()
    {

        $result = new data_sidebar();

        return $result;

    }

}