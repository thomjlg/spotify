<?php
/*
Plugin Name: spotify
Plugin URI: ftp://epiz_30540752@ftpupload.net/htdocs/wordpress/wp-content/plugins/spotify/spotify.php
Description: spotify
Author: jaulgey rouhalde
Version: 1.0
Author URI: ftp://epiz_30540752@ftpupload.net/htdocs/wordpress/wp-content/plugins/spotify/spotify.php
*/


require_once  plugin_dir_path(__FILE__) . 'includes/db-config.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-check.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-connect.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-create.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-delete.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-delete-all-rows.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-select.php';
require_once  plugin_dir_path(__FILE__) . 'includes/informations.php';
require_once  plugin_dir_path(__FILE__) . 'includes/panel-options.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-select-spotify.php';
require_once  plugin_dir_path(__FILE__) . 'includes/db-update.php';
require_once  plugin_dir_path(__FILE__) . 'includes/admin-page.php';
require_once  plugin_dir_path(__FILE__) . 'includes/sc-base-sqli.php';
