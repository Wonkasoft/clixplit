<?php 
/**
* Plugin Name: Clixplit
* Plugin URI: http://clixplit.com
* Description: Clixplit milks your traffic clicks for all they're worth while keeping it classy.
* Author: EpicWin Solutions, Wonkasoft
* Version: 1.0
* Author URI: http://epicwinsolutions.com, http://wonkasoft.com
*/
add_action( 'wp_enqueue_scripts', 'plugin_enqueues');
add_action( 'admin_enqueue_scripts', 'plugin_enqueues');

function plugin_enqueues() {
  wp_deregister_script(jquery);
  wp_register_script(jquery, 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
  wp_enqueue_script(jquery, 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
  wp_register_style('clixplit-bootstrap', plugins_url( '/css/bootstrap.min.css', __FILE__ ) , array(), '3.3.7', 'all');
  wp_register_script('clixplit-bootstrapjs', plugins_url( '/js/bootstrap.min.js', __FILE__ ) , array('jquery'), '3.3.7');
  wp_register_style('clixplit', plugins_url( '/css/clixplit.css', __FILE__ ) , array(), '', 'all');
  wp_register_script('clixplitjs', plugins_url( '/js/clixplitjs.js', __FILE__ ) , array('jquery'), '1.0.0');
  wp_enqueue_style('clixplit-bootstrap', plugins_url( '/css/bootstrap.min.css', __FILE__ ) , array(), '3.3.7', 'all');
  wp_enqueue_script('clixplit-bootstrapjs', plugins_url( '/js/bootstrap.min.js', __FILE__ ) , array('jquery'), '3.3.7');
  wp_enqueue_style('clixplit', plugins_url( '/css/clixplit.css', __FILE__ ) , array(), '', 'all');
  wp_enqueue_script('clixplitjs', plugins_url( '/js/clixplitjs.js', __FILE__ ) , array('jquery'), '1.0.0', true);
}

add_action ('admin_menu', 'clixplit_register_custom_menu');

function clixplit_register_custom_menu() {
  add_menu_page (
    'Home', 
    'cliXplit',
    'manage_options',
    'clixplit/clixplit-home.php',
    '',
    plugins_url("/img/clixplit-logo-icon-bw20px.svg", __FILE__));
 add_submenu_page ('clixplit/clixplit-home.php',
    'clixplit-tutorials',
    'Tutorials',
    'manage_options',
    'clixplit/clixplit-tutorials.php',
    '');
 add_submenu_page ('clixplit/clixplit-home.php',
    'clixplit-global-campaigns',
    'Global Campaigns',
    'manage_options',
    'clixplit/clixplit-global-campaigns.php',
    '');
 add_submenu_page ('clixplit/clixplit-home.php',
    'clixplit-resources',
    'Resources',
    'manage_options',
    'clixplit/clixplit-resources.php',
    '');
}

  ?>