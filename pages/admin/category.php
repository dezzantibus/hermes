<?php

if( isset( $_POST['action'] ) )
{

    $cat = new Category();

    switch( $_POST['action'] )
    {
        case 'new':
            $data = array(
                'parent_id' => $_POST['parent_id'],
                'name'      => $_POST['name'],
            );
            $cat->setData( $data );
            $cat->save();
            break;

        case 'edit':
            $data = array(
                'name'      => $_POST['name'],
            );
            $cat->load( $_POST['id'] );
            $cat->setData( $data );
            $cat->save();
            break;

        case 'delete':
            $cat->load( $_POST['name'] );
            $cat->delete();
            break;
    }

}

Template::display( 'admin/category.tpl' );