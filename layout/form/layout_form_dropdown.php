<?php

class layout_form_dropdown extends layout
{

    private $name;

    private $label;

    private $value;

    private $list;

    private $placeholder;

    private $class;

    private $errorMessage;

    function __construct( $name, $label, data_array $list, $value=null, $placeholder=null, $class=null, $errorMessage=null )
    {
        $this->name         = $name;
        $this->label        = $label;
        $this->list         = $list;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->class        = $class;
        $this->errorMessage = $errorMessage;
    }

    public function render()
    {
		
		 echo
        '<div class="form-group">',
            '<label>', $this->label ,'</label>',

            '<select name="', $this->name, '" class="', $this->class, '">';

                foreach( $this->list->getData() as $item )
                {
                    echo '<option value="' . $item['value'] . '"';
                    if( $item['value'] == $this->value ) echo ' selected="selected"';
                    echo '>' . $item['label'] . '</option>';
                }

            echo
            '</select>',

        '</div>';
	
    }

}
