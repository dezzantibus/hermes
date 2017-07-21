<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_banner_list extends handler
{

    public function run( $message=null )
    {

        $header  = $this->getHeaderData( null );
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $this->login( $header, $footer, $sidebar, $message );

        // Get list of articles
        $page = $this->data['page'];
        if( empty( $page ) )
        {
            $page = 1;
        }
        $banners = model_banner::getAdminPage( $page );

        $pages = model_banner::getAdminPageNumber();

        // Render page
        $page = new layout_admin_banner_list_page( $header, $footer, $sidebar, $banners, $pages, $page );
        $page->render();

    }

}