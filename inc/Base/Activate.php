<?php
/**
 * @package AlecaddPluginCustom
 */

class AlecaddPluginActivate {
    public static function activate() {
        flush_rewrite_rules();
    }
}