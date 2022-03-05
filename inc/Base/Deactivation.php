<?php
/**
 * @package AlecaddPluginCustom
 */

class Deactivation {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}