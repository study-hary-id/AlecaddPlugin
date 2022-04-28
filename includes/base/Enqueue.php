<?php
/**
 * @package SimplePlugin
 */

class Enqueue extends BaseController
{
	/**
	 * Registering to WordPress hooks.
	 *
	 * @return void
	 */
    public function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_plugin' ) );
    }

    /**
     * Enqueue stylesheet and javascript files.
     *
     * @return void
     */
    public function enqueue_plugin()
    {
        wp_enqueue_style( 'simple_plugin_css', $this->plugin_url . '/assets/css/style.css' );
        wp_enqueue_script( 'simple_plugin_js', $this->plugin_url . '/assets/js/script.js' );
    }
}
