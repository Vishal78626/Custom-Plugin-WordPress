<?php
/**
* Plugin Name: crud-operation
* Plugin URI: http://localhost/wordpress/
**/

register_activation_hook( __FILE__, 'crudOperationsTable');

function crudOperationsTable() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . 'student';
  $sql = "CREATE TABLE `$table_name` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  PRIMARY KEY(user_id)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
  ";
  if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
}


add_action('admin_menu', 'at_try_menu');

function at_try_menu() {
    //adding plugin in menu
    add_menu_page('listing', //page title
        'Listing', //menu title
        'manage_options', //capabilities
        'Listing', //menu slug
        'listing', //function
        'dashicons-database'
    );
    add_submenu_page('Listing',//parent page slug
        'insert',//page title
        'Insert',//menu titel
        'manage_options',//manage optios
        'Insert',//slug
        'insert' //function
    );
    add_submenu_page( null,//parent page slug
        'update',//$page_title
        'Update',// $menu_title
        'manage_options',// $capability
        'Update',// $menu_slug,
        'update'// $function
    );
    add_submenu_page( null,//parent page slug
        'delete',//$page_title
        'Delete',// $menu_title
        'manage_options',// $capability
        'Delete',// $menu_slug,
        'delete'// $function
    );
  }

define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'insert.php');
require_once(ROOTDIR. 'list.php');
require_once(ROOTDIR. 'update.php');
require_once(ROOTDIR. 'delete.php');
