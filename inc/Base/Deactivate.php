<?php
/**
 * @package AlecaddPluginCustom
 */

class AlecaddPluginDeactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}