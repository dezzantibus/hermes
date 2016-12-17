<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_article_edit extends handler
{

    public function run( $form_data=null )
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $this->login( $header, $footer, $sidebar );

        $categories = model_category::getFullList( 'name' );

        switch( constant::$text['site'] )
        {
            case 'athena':
                $journalists = new data_array();
                break;

            case 'hermes':
                $journalists = model_journalist::getFullList();
                break;
        }

        // Get article data
        if( empty( $form_data ) )
        {
            // get the article from somewhere.
            $form_data = model_article::getById( $_GET['id'] );
            $form_data->related = model_article::getRelated( $_GET['id'] );
        }

        // Render page
        $page = new layout_admin_article_page( $header, $footer, $sidebar, $categories, $form_data, $journalists );
        $page->render();

    }

}