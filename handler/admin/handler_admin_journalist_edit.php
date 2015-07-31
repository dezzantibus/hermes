<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_journalist_edit extends handler
{

    public function run( $form_data=null )
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        if( empty( $_SESSION['journalist'] ) )
        {
            $page = new layout_admin_login_page( $header, $footer, $sidebar );
            $page->render();
            die();
        }

        $categories = model_category::getFullList( 'name' );

        // Get journalist data
        if( empty( $form_data ) )
        {
            // get the journalist from somewhere.
            $form_data = new data_journalist();
        }

        // Render page
        $page = new layout_admin_journalist_page( $header, $footer, $sidebar, $categories, $form_data );
        $page->render();

    }

}