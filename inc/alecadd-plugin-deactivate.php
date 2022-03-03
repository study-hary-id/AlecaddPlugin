<?php
/**
 * @package AlecaddPlugin
 */

class AlecaddPlugincDeactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}