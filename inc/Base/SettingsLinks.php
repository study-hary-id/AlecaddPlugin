<?php
/**
 * @package SimplePlugin
 */

class SettingsLinks extends BaseController
{
    /**
     * Register all actions and filters to WordPress hooks.
     *
     * @return void
     */
    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    /**
     * Add custom link to the plugin.
     *
     * @param array $links  List of global links.
     * @return array        Updated global links.
     */
    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=simple_plugin">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }
}