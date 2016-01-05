<?php

class layout_admin_listcell_twoButtons extends layout
{

    private $link1;

    private $link2;

    private $label;

    public function __construct( $link1, $link2, $label )
    {
        $this->link1 = $link1;
        $this->link2 = $link2;
        $this->label = $label;
    }

    public function render()
    {
        echo
        '<div>',
            '<h4>', $this->label, '</h4>',
                '<a class="btn btn-small btn-red" href="', $this->link1, '">', constant::$text['approve'], '</a>',
                '<a class="btn btn-small btn-red" href="', $this->link2, '">', constant::$text['hide'], '</a>',
            '<hr>',
        '</div>';
    }

}