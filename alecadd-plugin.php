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

require_once plugin_dir_path(__FILE__) . 'inc/Init.php';

if (class_exists('Init')) {
    Init::register_services();
}
