<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_article_new extends handler
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

        if( empty( $form_data ) )
        {
            $form_data = new data_article();
        }

        // Render page
        $page = new layout_admin_article_page( $header, $footer, $sidebar, $categories, $form_data, $journalists );
        $page->render();

    }

}