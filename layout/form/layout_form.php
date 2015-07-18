<?php

class layout_form extends layout
{

    private $action;

    private $class;

    private $id;
	
	private $success_url;
	
	private $error_url;

	/** @var $form_text data_array */
	private $form_text;

    private $submit_message;

    private $error_message;

    private $ok_message;

    private $submit_label;
	
    function __construct( $action, $class, $id, $success_url, $error_url, $form_text=null, $submit_message='Sending...', $error_message='Error', $ok_message='Success', $submit_label='Submit' )
    {

        $this->action         = $action;
        $this->class          = $class;
        $this->id             = $id;
        $this->success_url    = $success_url;
        $this->error_url      = $error_url;
		$this->form_text	  = empty( $form_text ) ? new data_array() : $form_text;
        $this->submit_message = $submit_message;
        $this->error_message  = $error_message;
        $this->ok_message     = $ok_message;
        $this->submit_label   = $submit_label;

    }
	
    protected function renderTop()
    {

        echo
        '<form action="', $this->action, '" class="myform ', $this->class, '" method="post" novalidate id="', $this->id, '" enctype="multipart/form-data">',
            '<input type="hidden" name="success_url" value="', $this->success_url, '">',
            '<input type="hidden" name="error_url" value="', $this->error_url, '">';

    }

    protected function renderBottom()
    {
            echo
            '<p>',

                '<button name="submit" type="submit" class="btn btn-store btn-block" ',
                'data-error-message="', $this->error_message ,'" ',
                'data-sending-message="', $this->submit_message, '" ',
                'data-ok-message="', $this->ok_message,'">', $this->submit_label,'</button>',

            '</p>',
        '</form>';
    }

}

