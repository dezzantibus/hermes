<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_comment_list extends handler
{

    public function run( $message=null )
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $this->login( $header, $footer, $sidebar, $message );

        $comments = model_comment::getPending();

        // Render page
        $page = new layout_admin_comment_list_page( $header, $footer, $sidebar, $comments );
        $page->render();

    }

}