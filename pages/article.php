<?php

Template::assign( 'upsell', Upsell::article() );

Template::assign( 'message', Message::getList() );

Template::display( 'article.tpl' );