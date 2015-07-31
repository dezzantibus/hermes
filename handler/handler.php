<?php

abstract class handler
{

    protected $data;

    protected $category_list;

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

        if( empty( $this->category_list ) )
        {
            $this->category_list = model_category::getFullList();
        }

        $result->category_menu = $this->category_list;

        return $result;

    }

    protected function getFooterData()
    {

        $result = new data_footer();

        if( empty( $this->category_list ) )
        {
            $this->category_list = model_category::getFullList();
        }

        $result->categories = $this->category_list;

        return $result;

    }

    protected function getSidebarData()
    {

        $result = new data_sidebar();

        if( empty( $this->category_list ) )
        {
            $this->category_list = model_category::getFullList();
        }

        $result->categories = $this->category_list;

        return $result;

    }

}