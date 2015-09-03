<?php

class layout_admin_comment_list_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar,
        data_array   $comments
    )
    {

        $this->addChild( new layout_header( $header ) );

        $params  = array( 'id' => 'section' );
        $section = $this->addChild( new layout_basic_section( $params ) );

        $params  = array( 'class' => 'inner-wrapper' );
        $wrapper = $section->addChild( new layout_basic_div( $params ) );

        $params = array(
            'id'    => 'main',
            'class' => 'left',
            'role'  => 'main',
        );
        $main = $wrapper->addChild( new layout_basic_div( $params ) );

        /** @var $comment data_comment */
        foreach( $comments->getData() as $comment )
        {
            $main->addChild( new layout_admin_listcell_twoButtons(
                '/admin/comment_approve.action?value=1&id=' . $comment->id,
                '/admin/comment_approve.action?value=-1&id=' . $comment->id,
                $comment->text
            ) );
        }

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}