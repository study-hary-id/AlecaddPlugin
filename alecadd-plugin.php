<?php
/**
 * @package AlecaddPlugin
 */
/*
Plugin Name:    Alecadd Plugin
Plugin URI:     https://study-hary-id.github.io
Description:    This is my first attempt on writing a custom plugin for this amazing tutorial series.
Version:        1.0.0
Author:         Muhammad Haryansyah
Author URI:     https://study-hary-id.github.io
License:        GPLv2 or later
Text Domain:    alecadd-plugin
*/

if (!defined('ABSPATH')) {
    die('-1');
}

if (!class_exists('AlecaddPlugin')) {
    class AlecaddPlugin {
        public $plugin;

        function __construct() {
            $this->plugin = plugin_basename(__FILE__);
            $this->create_post_type();
        }

        function register() {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action('admin_menu', array($this, 'add_admin_pages'));

            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
        }

        function enqueue() {
            wp_enqueue_style('pluginstyle', plugins_url('/assets/css/style.css', __FILE__));
            wp_enqueue_script('pluginstyle', plugins_url('/assets/js/script.js', __FILE__));
        }

        function add_admin_pages() {
            add_menu_page(
                'Alecadd Plugin',
                'Alecadd',
                'manage_options',
                'alecadd_plugin',
                array($this, 'admin_index'),
                'dashicons-store',
                110
            );
        }

        function settings_link($links) {
            $settings_link = '<a href="admin.php?page=alecadd_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        function admin_index() {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        function custom_post_type() {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        protected function create_post_type() {
            add_action('init', array($this, 'custom_post_type'));
        }        
    }

    $alecaddPlugin = new AlecaddPlugin;
    $alecaddPlugin->register();


    // Activate the plugin.
    require_once plugin_dir_path(__FILE__) . 'inc/alecadd-plugin-activate.php';
    register_activation_hook(__FILE__, array('AlecaddPluginActivate', 'activate'));

    // Deactivate the plugin.
    require_once plugin_dir_path(__FILE__) . 'inc/alecadd-plugin-deactivate.php';
    register_deactivation_hook(__FILE__, array('AlecaddPluginDeactivate', 'deactivate'));
}
