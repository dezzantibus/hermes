<?php

Template::assign( 'upsell', Upsell::index() );

Template::assign( 'message', Message::getList() );

Template::display( 'index.tpl' );