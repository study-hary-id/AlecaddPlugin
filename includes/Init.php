<?php
/**
 * @package SimplePlugin
 */

require_once PLUGIN_PATH . 'includes/base/BaseController.php';

final class Init
{
	/**
	 * Initialize a class.
	 *
	 * @param  $class
	 *
	 * @return mixed
	 */
    private static function instantiate($class)
    {
	    return new $class;
    }

    /**
     * Return all available services.
     *
     * @return array Array containing a list of services.
     */
    public static function get_services()
    {
        require_once PLUGIN_PATH . 'includes/base/Enqueue.php';
        require_once PLUGIN_PATH . 'includes/base/SettingsLinks.php';
        return [
            Enqueue::class,
            SettingsLinks::class
        ];
    }

    /**
     * Register all available services.
     *
     * Loop through the list of services, initialize them,
     * and call the register() method if it exists.
     *
     * @return void
     */
    public static function register_services()
    {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }
}
