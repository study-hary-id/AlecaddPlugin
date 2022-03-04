<?php
/**
 * @package AlecaddPluginCustom
 */

class Enqueue extends BaseController {
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_plugin'));
    }

    public function enqueue_plugin() {
        wp_enqueue_style('pluginstyle', $this->plugin_url . '/assets/css/style.css');
        wp_enqueue_script('pluginstyle', $this->plugin_url . '/assets/js/script.js');
    }
}