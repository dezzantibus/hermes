<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_banner_edit extends handler
{

    public function run( $form_data=null )
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $this->login( $header, $footer, $sidebar );

        $categories = model_category::getFullList( 'name' );
        $positions  = new data_array( banner::getListOfPositions() );

        // Get article data
        if( empty( $form_data ) )
        {
            // get the article from somewhere.
            $form_data = model_banner::getById( $_GET['id'] );
        }

        // Render page
        $page = new layout_admin_banner_page( $header, $footer, $sidebar, $categories, $positions, $form_data );
        $page->render();

    }

}