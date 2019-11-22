<?php

/*
Plugin Name: Pineal Glossary
Plugin URI: 
Description: RSS plugin 
Version: 1.0
Author: Kanat Konyrbayev
*/

if(!defined('ABSPATH')){
	die;
}

/**
 * 
 */




function activate_glossary(){
	global $wpdb;

	$table_name = $wpdb->prefix . 'glossary';

	if($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name) {
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
			`id_glossary` int(11) NOT NULL AUTO_INCREMENT,
			`english` text NOT NULL,
			`arabic` text NOT NULL,
			`czech` text NOT NULL,
			`italian` text NOT NULL,
			`polish` text NOT NULL,
			`portuguese` text NOT NULL,
			`russian` text NOT NULL,
			`slovak` text NOT NULL,
			`spanish` text NOT NULL,
			`vietnamese` text NOT NULL,
			PRIMARY KEY (`id_glossary`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

	$wpdb->query($sql);
	};

}

function deactivate_glossary(){

}

function uninstall_glossary(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'glossary';
	$sql = "DROP TABLe IF EXISTS $table_name";
	$wpdb->query($sql);
}

// activation
register_activation_hook(__FILE__, 'activate_glossary');

// deactivate
register_deactivation_hook(__FILE__,'deactivate_glossary');


register_uninstall_hook(__FILE__, 'uninstall_glossary');

function glossary_admin_menu(){
add_menu_page('Glossary', 'Glossary', 8, 'glossary', 'glossary_editor');
}

add_action('admin_menu', 'glossary_admin_menu');

function glossary_editor(){
		switch ($_GET['c']) {
		case 'add':
			$action = 'add';
			break;
		case 'edit':
			$action = 'edit';
			break;
		case 'delete':
			$action = 'delete';
			break;
		default:
			$action = 'all';
			break;
	}
	include_once("includes/$action.php");
}

function glossary_shortcode($name_glossary){
	ob_start();
	include_once("includes/intro.php");
	wp_register_style( 'glossary-style-1', plugin_dir_url( __FILE__ ) .'assets/glossary.css' );
	wp_enqueue_style( 'glossary-style-1' );
	return ob_get_clean();
	//return reset($name_glossary[0]);
}

add_shortcode('glossary','glossary_shortcode');


function glossary_enqueue_script() {   
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'assets/glossary.js' );
}
add_action('wp_enqueue_scripts', 'glossary_enqueue_script');
