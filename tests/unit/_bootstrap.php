<?php
// Here you can initialize variables that will be available to your tests
// The following provides functionality necesary for testing Wordpress internals

define('WP_USE_THEMES', false);
require( dirname(dirname(dirname( __FILE__ ))) . '/wp-load.php' );
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
