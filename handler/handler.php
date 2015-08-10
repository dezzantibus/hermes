<?php

abstract class handler
{

    protected $data;

    protected $category_list;

    protected $recent_articles;

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

    protected function getSidebarData( $category=null )
    {

        $result = new data_sidebar();

        if( empty( $this->category_list ) )
        {
            $this->category_list = model_category::getFullList();
        }
        $result->categories = $this->category_list;

        if( empty( $this->recent_articles ) )
        {
            $this->recent_articles = model_article::getRecent( $category );
        }
        $result->recent_articles = $this->recent_articles;

        return $result;

    }

    protected function login( $header, $footer, $sidebar )
    {

//        if( empty( $_SESSION['journalist'] ) )
//        {
//            $page = new layout_admin_login_page( $header, $footer, $sidebar );
//            $page->render();
//            die();
//        }

    }

}