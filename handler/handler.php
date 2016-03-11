<?php

abstract class handler
{

    protected $data;

    protected $category_list;

    protected $recent_articles;

    function __construct()
    {

        $this->data = $_GET;

        model_banner::getActive();

    }

    public function run()
    {

    }

    protected function getHeaderData( $adData=null )
    {

        $result = new data_header();

        if( empty( $this->category_list ) )
        {
            $this->category_list = model_category::getFullList();
        }

        $result->category_menu = $this->category_list;

        switch( true )
        {

            case ( $adData instanceof data_category) :
                /** @var  $adData data_category */
                $position_id = banner::HEADER_CATEGORY;
                $category_id = $adData->id;
                break;

            case ( $adData instanceof data_article ) :
                /** @var $adData data_article */
                $position_id = banner::HEADER_ARTICLE;
                $category_id = $adData->category_id;
                break;

            default :
                $position_id = banner::HEADER_HOME;
                $category_id = 0;
                break;

        }

        $result->banner = banner::getForPosition( $position_id, $category_id );

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

    protected function getSidebarData( $category=null, $adData=null )
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

        $result->adData = $adData;

        return $result;

    }

    protected function login( $header, $footer, $sidebar, $message=null )
    {

        if( empty( $_SESSION['journalist'] ) )
        {
            $page = new layout_admin_login_page( $header, $footer, $sidebar, $message );
            $page->render();
            die();
        }

    }

}