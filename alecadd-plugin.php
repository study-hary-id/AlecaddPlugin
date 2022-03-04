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

require_once PLUGIN_PATH . 'inc/Init.php';
require_once PLUGIN_PATH . 'inc/Base/Activation.php';
require_once PLUGIN_PATH . 'inc/Base/Deactivation.php';

function activate_alecadd_plugin() {
    Activation::activate();
}
register_activation_hook(__FILE__, 'activate_alecadd_plugin');

function deactivate_alecadd_plugin() {
    Deactivation::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_alecadd_plugin');

if (class_exists('Init')) {
    Init::register_services();
}
