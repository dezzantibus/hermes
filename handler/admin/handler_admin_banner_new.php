<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_banner_new extends handler
{

    public function run( $form_data=null )
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $this->login( $header, $footer, $sidebar );

        $categories = model_category::getFullList( 'name' );
        $positions  = new data_array( banner::getListOfPositions() );

        if( empty( $form_data ) )
        {
            $form_data = new data_banner();
        }

        // Render page
        $page = new layout_admin_banner_page( $header, $footer, $sidebar, $categories, $positions, $form_data );
        $page->render();

    }

}