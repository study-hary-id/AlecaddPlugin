<?php
/**
 * @package AlecaddPluginCustom
 */

class Enqueue {
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_plugin'));
    }

    public function enqueue_plugin() {
        wp_enqueue_style('pluginstyle', PLUGIN_URL . '/assets/css/style.css');
        wp_enqueue_script('pluginstyle', PLUGIN_URL . '/assets/js/script.js');
    }
}