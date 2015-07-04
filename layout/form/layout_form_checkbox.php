<?php

class layout_form_checkbox extends layout
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
        $this->list        = $list;
        $this->value        = $value;
        $this->placeholder  = $placeholder;
        $this->class        = $class;
        $this->errorMessage = $errorMessage;
    }

    public function render()
    {
        echo
        '<div class="form-group">',
            '<label>', $this->label ,'</label>';

			foreach( $this->list->getData() as $item )
			{

				echo
				'<label>',
				
				'<input name="', $this->name, '"  type="checkbox" value="', $item['value'], '"';

				if( $this->value == $item['value'] )
				{
					echo ' checked="checked"';
				}

				echo
				'>', $item['label'], '</label>';

			}

        echo            
        '</div>';
    }

}
