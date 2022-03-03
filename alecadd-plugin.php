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

class AlecaddPlugin {
    function __construct() {
        add_action('init', array($this, 'custom_post_type'));
    }

    function activate() {
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate() {
        flush_rewrite_rules();
    }

    function custom_post_type() {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
}

if (class_exists('AlecaddPlugin')) {
    $alecaddPlugin = new AlecaddPlugin;
}

register_activation_hook(__FILE__, array($alecaddPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($alecaddPlugin, 'deactivate'));
