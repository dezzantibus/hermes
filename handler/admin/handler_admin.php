<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin extends handler
{

    public function run( $form_data=null )
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $this->login( $header, $footer, $sidebar );

        $categories = model_category::getFullList( 'name' );

        // Get article data

        // Render page
        $page = new layout_admin_page( $header, $footer, $sidebar );
        $page->render();

    }

}
