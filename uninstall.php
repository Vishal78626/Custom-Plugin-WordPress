<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// delete database table
global $wpdb;
$table_name = $wpdb->prefix .'student';
$wpdb->query("DROP TABLE IF EXISTS {$table_name}"); 