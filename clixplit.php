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
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',  array(), '1.12.4');
  wp_register_style('clixplit-bootstrap', plugins_url( '/css/bootstrap.min.css', __FILE__ ) , array(), '3.3.7', 'all');
  wp_register_style('clixplit-style', plugins_url( '/css/clixplit.css', __FILE__ ) , array(), '1.0.0', 'all');
  wp_register_script('clixplit-bootstrapjs', plugins_url( '/js/bootstrap.min.js', __FILE__ ) , array('jquery'), '3.3.7');
  wp_register_script('clixplit-clixplit.js', plugins_url( '/js/clixplitjs.js', __FILE__ ) , array(), '1.0.0', 'all');
  wp_enqueue_style('clixplit-bootstrap', plugins_url( '/css/bootstrap.min.css', __FILE__ ) , array(), '3.3.7', 'all');
  wp_enqueue_style('clixplit-style', plugins_url( '/css/clixplit.css', __FILE__ ) , array(), '1.0.0', 'all');
  wp_enqueue_script('clixplit-bootstrapjs', plugins_url( '/js/bootstrap.min.js', __FILE__ ) , array('jquery'), '3.3.7');
  wp_enqueue_script('clixplit-clixplit.js', plugins_url( '/js/clixplitjs.js', __FILE__ ) , array(), '1.0.0');
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

// Add New Page Button
add_action( 'init', 'clixplit_buttons' );
function clixplit_buttons() {
    add_filter( "mce_external_plugins", "clixplit_add_buttons" );
    add_filter( 'mce_buttons', 'clixplit_register_buttons' );
}
function clixplit_add_buttons( $plugin_array ) {
    $plugin_array['clixplit'] = plugins_url("/js/clixplit_button.js", __FILE__);
    return $plugin_array;
}
function clixplit_register_buttons( $buttons ) {
    array_push( $buttons, 'clixplit');
    return $buttons;
}

// Add new container in new page

add_action( "add_meta_boxes_page", "clixplit_meta_box" );

// Register Your Meta box
function clixplit_meta_box( $post ) {
    add_meta_box( 
       'clixplit_meta_box', // This is HTML id
       'Clixplit Plugin', // This is the title
       'clixplit_meta_box_callback', // The callback function
       'page', // Register on post type = page
       'advanced', // This is where the box is located : normal, side, advanced
       'high' // Set priority: low, high
    );
}

function clixplit_meta_box_callback() {
  require('clixplit-meta-box.php');
}

?>
