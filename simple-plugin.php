<?php
/**
 * @package SimplePlugin
 */
/**
 * Plugin Name:       Simple Plugin
 * Plugin URI:        https://github.com/study-hary-id/SimplePluginTemplate
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.1
 * Requires at least: 5.6
 * Requires PHP:      5.6
 * Author:            Muhammad Haryansyah
 * Author URI:        https://study-hary-id.github.io
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       simple-plugin
 */
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

if ( ! defined( 'ABSPATH' ) ) {
    die('-1');
}

if ( ! class_exists( 'SimplePlugin' ) ) {
    /**
     * Class SimplePlugin is a constructor for this plugin.
     */
    class SimplePlugin
    {
        private $plugin;

        function __construct()
        {
            $this->plugin = plugin_basename( __FILE__ );
        }

        /**
         * Add/register services to wordpress hooks.
         *
         * @return void
         */
        function register()
        {
            add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        }

        function activate()
        {
            flush_rewrite_rules();
        }

        function deactivate()
        {
            flush_rewrite_rules();
        }

        /**
         * Add custom link to the plugin list settings.
         *
         * @param array $links  Default global links.
         * @return array        Modified global links.
         */
        function settings_link( $links )
        {
            $settings_link = '<a href="plugins.php">Settings</a>';
            array_push( $links, $settings_link );
            return $links;
        }

        /**
         * Enqueue stylesheet and javascript files.
         *
         * @return void
         */
        function enqueue()
        {
            wp_enqueue_style(
                'simple_plugin_css',
                plugins_url( '/assets/css/style.css', __FILE__ )
            );
            wp_enqueue_script(
                'simple_plugin_js',
                plugins_url( '/assets/js/script.js', __FILE__ )
            );
        }
    }

    // Create an instance and register hooks.
    $simple_plugin = new SimplePlugin();
    $simple_plugin->register();

    // Register listener for activation of the plugin.
    register_activation_hook(
        __FILE__, array( $simple_plugin, 'activate' )
    );

    // Register listener for deactivation of the plugin.
    register_deactivation_hook(
        __FILE__, array( $simple_plugin, 'deactivate' )
    );
}
