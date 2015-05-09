<?php

class class_finder
{

    public static function getClassFile( $name )
    {

		$frags = explode( '_', $name );

        switch( $frags[0] )
        {
            case 'adwords':  require_once __DIR__ . '/adwords.php';  break;
            case 'constant': require_once __DIR__ . '/constant.php'; break;
            case 'message':  require_once __DIR__ . '/message.php';  break;
            case 'router':   require_once __DIR__ . '/router.php';   break;
            case 'security': require_once __DIR__ . '/security.php'; break;
            case 'layout':   self::getLayoutClass( $name, $frags );  break;			
            case 'handler':  self::getHandlerClass( $name, $frags ); break;			
            case 'action':   self::getActionClass( $name, $frags );  break;			
            default: require_once __DIR__ . '/../' . $frags[0] . '/' . $name . '.php';
        }

    }
	
	private static function getLayoutClass( $name, $frags )
	{
	
		if( isset( $frags[1] ) )
		{ 
			switch( $frags[1] )
			{
				case 'homepage': require_once __DIR__ . '/../layout/homepage/' . $name . '.php'; break;
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
				default:       require_once __DIR__ . '/../action/' . $name . '.php';
			}
		}
		else
		{
			require_once __DIR__ . '/../action/action.php';
		}
	
	}

}