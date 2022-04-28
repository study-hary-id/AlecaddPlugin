<?php
/**
 * @package SimplePlugin
 */

class SettingsLinks extends BaseController
{
    /**
     * Registering to WordPress hooks.
     *
     * @return void
     */
    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    /**
     * Add custom link to the plugin list settings.
     *
     * @param  array $links  Default global links.
     * @return array         Modified global links.
     */
    public function settings_link( $links )
    {
        $settings_link = '<a href="plugins.php">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }
}
