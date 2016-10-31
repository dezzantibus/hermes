<?php

class layout_admin_listcell_banner extends layout
{

    private $link;

    private $label;

    public function __construct( $link, $label )
    {
        $this->link  = $link;
        $this->label = $label;
    }

    public function render()
    {
        echo
        '<div>',
            '<h4>', $this->label, '</h4>',
            '<a class="btn btn-small btn-red" href="', $this->link, '">', constant::$text['Modify'], '</a>',
            '<hr>',
        '</div>';
    }

}