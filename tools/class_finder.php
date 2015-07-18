<?php

class class_finder
{

    public static function getClassFile( $name )
    {

		$frags = explode( '_', $name );

        switch( $frags[0] )
        {
            case 'layout':   self::getLayoutClass( $name, $frags );  break;
            case 'handler':  self::getHandlerClass( $name, $frags ); break;
            case 'action':   self::getActionClass( $name, $frags );  break;
            case 'google':   require_once __DIR__ . '/google.php';   break;
            case 'constant': require_once __DIR__ . '/constant.php'; break;
            case 'message':  require_once __DIR__ . '/message.php';  break;
            case 'router':   require_once __DIR__ . '/router.php';   break;
            case 'security': require_once __DIR__ . '/security.php'; break;
            case 'file':     require_once __DIR__ . '/file.php';     break;
            default: require_once __DIR__ . '/../' . $frags[0] . '/' . $name . '.php';
        }

    }
	
	private static function getLayoutClass( $name, $frags )
	{
	
		if( isset( $frags[1] ) )
		{ 
			switch( $frags[1] )
			{
                case 'article':  require_once __DIR__ . '/../layout/article/' . $name . '.php';  break;
                case 'admin':    require_once __DIR__ . '/../layout/admin/' . $name . '.php';    break;
                case 'homepage': require_once __DIR__ . '/../layout/homepage/' . $name . '.php'; break;
                case 'category': require_once __DIR__ . '/../layout/category/' . $name . '.php'; break;
                case 'basic':    require_once __DIR__ . '/../layout/basic/' . $name . '.php';    break;
                case 'form':     require_once __DIR__ . '/../layout/form/' . $name . '.php';     break;
                default:         require_once __DIR__ . '/../layout/' . $name . '.php';
			}
		}
		else
		{
			require_once __DIR__ . '/../layout/layout.php';
		}
	
	}
	
	private static function getHandlerClass( $name, $frags )
	{
	
		if( isset( $frags[1] ) )
		{ 
			switch( $frags[1] )
			{
                case 'admin': require_once __DIR__ . '/../handler/admin/' . $name . '.php'; break;
				default:      require_once __DIR__ . '/../handler/' . $name . '.php';
			}
		}
		else
		{
			require_once __DIR__ . '/../handler/handler.php';
		}
	
	}

    private static function getActionClass( $name, $frags )
    {

        if( isset( $frags[1] ) )
        {
            switch( $frags[1] )
            {
                case 'admin': require_once __DIR__ . '/../action/admin/' . $name . '.php'; break;
                default:      require_once __DIR__ . '/../action/' . $name . '.php';
            }
        }
        else
        {
            require_once __DIR__ . '/../action/action.php';
        }

    }

}