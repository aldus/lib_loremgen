<?php

/**
 *	x_head
 *
 *	experimental!
 *
 */

class x_head
{
	/**
	 *	@var Private protected var for the currend version.
	 */
	protected $version = "0.1.0";

	/**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    private static $instance;

    public static function getInstance( &$aOptions=array() )
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }
    
    public static function check_head() {
	
		if ( (defined('LEPTON_GUID')) && (defined("LEPTON_PATH")) ) {
			 include( LEPTON_PATH . '/framework/class.secure.php' );
		} else {

			$root	= "../";
			$level	= 1;
			while ( ( $level++ < 11 ) && ( !file_exists( $root . '/framework/class.secure.php' ) ) ) {
					$root .= "../";
			}
			if ( file_exists( $root . '/framework/class.secure.php' ) ) {
				include( $root . '/framework/class.secure.php' );
			} else {
	
				// WB?
				if(!defined("WB_PATH")) {
					$root	= "../";
					$level	= 1;
					while ( ( $level++ < 11 ) && ( !file_exists( $root . '/config.php' ) ) ) {
						$root .= "../";
					}		
					if( file_exists( $root . '/config.php' ) ) {
						require( $root . '/config.php' );
					} else {
						die( "[0] (x-head) Can't include any needed file!" );
					}
				}
			}
		}
	}
}

?>