<?php

class layout_admin_listcell extends layout_page
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
            '<a class="btn btn-small btn-red" href="', $this->link, '">Modifica</a>',
            '<hr>',
        '</div>';
    }

}