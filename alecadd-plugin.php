<?php
/**
 * @package AlecaddPluginCustom
 */
/*
Plugin Name:    Alecadd Plugin Custom
Plugin URI:     https://study-hary-id.github.io
Description:    This is my first attempt on writing a custom plugin for this amazing tutorial series.
Version:        1.0.0
Author:         Muhammad Haryansyah
Author URI:     https://study-hary-id.github.io
License:        GPLv2 or later
Text Domain:    alecadd-plugin-custom
*/

if (!defined('ABSPATH')) {
    die('-1');
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

require_once PLUGIN_PATH . 'inc/Init.php';

if (class_exists('Init')) {
    Init::register_services();
}
