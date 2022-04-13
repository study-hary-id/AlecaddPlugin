<?php
/**
 * @package SimplePlugin
 */
/**
 * Plugin Name:       Simple Plugin
 * Plugin URI:        https://github.com/study-hary-id/SimplePluginTemplate
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
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

if ( !defined( 'ABSPATH' ) ) {
    die('-1');
}

if ( !class_exists( 'SimplePlugin' ) ) {
    /**
     * Class SimplePlugin is a constructor for this plugin.
     */
    class SimplePlugin
    {
        private $plugin;

        function __construct()
        {
            $this->plugin = plugin_basename( __FILE__ );
            $this->create_post_type();
        }

        /**
         * Add/register new action or filter to each hooks.
         *
         * @return void
         */
        function register()
        {
            add_filter(
                "plugin_action_links_$this->plugin",
                array( $this, 'settings_link' )
            );

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

            add_action( 'admin_menu', array( $this, 'add_admin_pages' ));
        }

        /**
         * Listener uses when activate the plugin.
         */
        function activate()
        {
            flush_rewrite_rules();
        }

        /**
         * Listener uses when deactivate the plugin.
         */
        function deactivate()
        {
            flush_rewrite_rules();
        }


        /**
         * Add redirect link to the plugin's settings.
         *
         * @param array $links  List of necessary links.
         * @return array        Return list after added a new link element.
         */
        function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=simple_plugin">Settings</a>';
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
                'simpleplugin',
                plugins_url( '/assets/css/style.css', __FILE__ )
            );
            wp_enqueue_script(
                'simpleplugin',
                plugins_url( '/assets/js/script.js', __FILE__ )
            );
        }


        /**
         * Import the template of custom admin pages.
         *
         * @return void
         */
        function admin_views()
        {
            require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
        }

        /**
         * Add/register new menu on admin side-bar.
         *
         * @return void
         */
        function add_admin_pages()
        {
            add_menu_page(
                'Simple Plugin',
                'Plugin',
                'manage_options',
                'simple_plugin',
                array( $this, 'admin_views' ),
                'dashicons-store',
                110
            );
        }


        /**
         * Register new custom post type.
         *
         * This function behaves as a dependency before init create custom post type.
         *
         * @return void
         */
        function custom_post_type()
        {
            register_post_type(
                'book',
                [ 'public' => true, 'label' => 'Books' ]
            );
        }

        /**
         * Initialize custom post type by calling init hook.
         *
         * @return void
         */
        function create_post_type()
        {
            add_action( 'init', array( $this, 'custom_post_type' ) );
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
