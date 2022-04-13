<?php
/**
 * @package SimplePlugin
 */
namespace Inc;

final class Init
{
    /**
     * Initialize a class.
     *
     * @param class  $class     Class from the services array.
     * @return class instance   New instance of a given class.
     */
    private static function instantiate($class)
    {
        $service = new $class;
        return $service;
    }

    /**
     * Return all available services.
     *
     * @return array Array containing a list of services.
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
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