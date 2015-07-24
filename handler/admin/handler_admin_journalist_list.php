<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_journalist_list extends handler
{

    public function run()
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

        // Get list of journalists

        // Render page
        $page = new layout_admin_journalist_list_page( $header, $footer, $sidebar, $categories );
        $page->render();

    }

}