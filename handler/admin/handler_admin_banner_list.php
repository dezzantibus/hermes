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

        $banners = model_banner::getFullList();

        // Render page
        $page = new layout_admin_banner_list_page( $header, $footer, $sidebar, $banners );
        $page->render();

    }

}