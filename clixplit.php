<?php 
/**
* Plugin Name: Clixplit
* Plugin URI: http://clixplit.com
* Description: Clixplit increases visitor clicks by 300%+ while keeping your site classy.
* Author: EpicWin Solutions, Wonkasoft
* Version: 1.0
* Author URI: http://epicwinsolutions.com, http://wonkasoft.com
*/

add_action( 'wp_enqueue_scripts', 'plugin_locals');
function plugin_locals() {
wp_deregister_script(jquery);
wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',  array(), '1.12.4');
wp_enqueue_script('clixplit-clientside', plugins_url( '/js/clixplit-clientside.js', __FILE__ ) , array(), '1.0.0');
wp_localize_script('clixplit-clientside', 'CLIXPLIT_AJAX', array( 
'cliXplit_ajax' => plugins_url('/clixplit/ajax/')));
}

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
  wp_enqueue_script('clixplit-clixplitjs', plugins_url( '/js/clixplitjs.js', __FILE__ ) , array(), '1.0.0');
 
}

function clixplit_register_custom_menu() {
  add_menu_page (
    'cliXplit', 
    'cliXplit',
    'manage_options',
    'clixplit/clixplit-home.php',
    '',
    plugins_url("/img/clixplit-logo-icon-bw20px.svg", __FILE__));
  add_submenu_page ('clixplit/clixplit-home.php',
    'Home',
    'Home',
    'manage_options',
    'clixplit/clixplit-home.php',
    '');
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
 add_submenu_page ('clixplit/clixplit-home.php',
      'clixplit-resources',
      'Activation',
      'manage_options',
      'clixplit/clixplit-activation.php',
      '');
  } 
  
include_once('clixplit_validation_class.php');
$checkkey = new clixplit_validation();
$localhostdbkey = get_option('clixplit_license_key');
$activeoption = get_option('clixplit_license_active');

  function clixplit_register_activation_menu() {
   add_menu_page ('ClixplitRegistration',
      'cliXplit Activation',
      'manage_options',
      'clixplit/clixplit-activation.php',
      '',
      plugins_url("/img/clixplit-logo-icon-bw20px.svg", __FILE__));
    }

// Add New Page Button
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

// Check activation status and load menus
if (($activeoption =='active') && ($checkkey->clixplit_check($localhostdbkey)=='active')) {
add_action ('admin_menu', 'clixplit_register_custom_menu');
add_action( 'init', 'clixplit_buttons' );
add_action( "add_meta_boxes_page", "clixplit_meta_box" );
add_action( "add_meta_boxes_post", "clixplit_meta_box2" );
} else {
  add_action('admin_menu','clixplit_register_activation_menu');
}
// Register Your Meta box
function clixplit_meta_box( $post ) {
    add_meta_box( 
       'clixplit_meta_box', // This is HTML id
       'page redirect options', // This is the title
       'clixplit_meta_box_callback', // The callback function
       'page', // Register on post type = page
       'normal', // This is where the box is located : normal, side, advanced
       'high' // Set priority: low, high
    );
}

function clixplit_meta_box2( $post ) {
    add_meta_box( 
       'clixplit_meta_box', // This is HTML id
       'page redirect options', // This is the title
       'clixplit_meta_box_callback', // The callback function
       'post', // Register on post type = page
       'normal', // This is where the box is located : normal, side, advanced
       'low' // Set priority: low, high
    );
}

function clixplit_meta_box_callback() {
  require('clixplit-meta-box.php');
}

// Create database for Page Redirect Feature
global $clixplit_db_version;
$clixplit_db_version = '1.0';

function clixplit_redirect_install() {
  global $wpdb;
  global $clixplit_db_version;

  $table_name = $wpdb->prefix . 'clixplit_redirect';
  
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name ( 
    id INT(15) NOT NULL AUTO_INCREMENT,
    created DATETIME NOT NULL,
    page_post_id VARCHAR(850) NOT NULL,
    input_id VARCHAR(850) NOT NULL,
    mouseoveropt ENUM('','off','on') NOT NULL,
    mouseoverurl VARCHAR(850) NOT NULL,
    exitredirectopt ENUM('','off','on') NOT NULL,
    exitredirecturl VARCHAR(850) NOT NULL,
    exitmessage TEXT NOT NULL, 
    secondaryopt ENUM('','off','on') NOT NULL,
    secondaryurl VARCHAR(850) NOT NULL, 
    PRIMARY KEY (id)
    ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  add_option( 'clixplit_db_version', $clixplit_db_version );

  // Check for update version to update table structure
    $installed_ver = get_option( "clixplit_db_version" );

    if ( $installed_ver != $clixplit_db_version ) {

        $table_name = $wpdb->prefix . 'clixplit_redirect';
      
      $charset_collate = $wpdb->get_charset_collate();

      $sql = "CREATE TABLE $table_name ( 
        id INT(15) NOT NULL AUTO_INCREMENT,
        created DATETIME NOT NULL,
        page_post_id VARCHAR(850) NOT NULL,
        input_id VARCHAR(850) NOT NULL,
        mouseoveropt ENUM('','off','on') NOT NULL,
        mouseoverurl VARCHAR(850) NOT NULL,
        exitredirectopt ENUM('','off','on') NOT NULL,
        exitredirecturl VARCHAR(850) NOT NULL,
        exitmessage TEXT NOT NULL, 
        secondaryopt ENUM('','off','on') NOT NULL,
        secondaryurl VARCHAR(850) NOT NULL, 
        PRIMARY KEY (id)
        ) $charset_collate;";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );

      update_option( "clixplit_db_version", $clixplit_db_version );
  }
}

register_activation_hook( __FILE__, 'clixplit_redirect_install' );

// Create database for keyword crawl feature
function clixplit_global_campaigns() {
  global $wpdb;
  global $clixplit_db_version;

  $table_name = $wpdb->prefix . 'clixplit_global_campaigns';
  
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name ( 
    id INT(15) NOT NULL AUTO_INCREMENT,
    created DATETIME NOT NULL,
    page_post_id VARCHAR(850) NOT NULL,
    keyword TEXT(450) NOT NULL,
    primaryurl VARCHAR(850) NOT NULL,
    secondaryurl VARCHAR(850) NOT NULL,
    postopt BOOLEAN NOT NULL,
    pageopt BOOLEAN NOT NULL, 
    enablemobile ENUM('off','on') NOT NULL,
    numofprimary int(100) NOT NULL, 
    numofsecondary int(100) NOT NULL, 
    totalclicks int(250) NOT NULL, 
    unqclicks int(250) NOT NULL, 
    instances int(250) NOT NULL, 
    globalopt ENUM('N','Y')NOT NULL, 
    pagepostcreated ENUM('N','Y')NOT NULL, 
    active BOOLEAN NOT NULL, 
    PRIMARY KEY (id)
    ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  // Check for update version to update table structure
  $installed_ver = get_option( "clixplit_db_version" );

  if ( $installed_ver != $clixplit_db_version ) {

      $table_name = $wpdb->prefix . 'clixplit_global_campaigns';
    
      $charset_collate = $wpdb->get_charset_collate();

      $sql = "CREATE TABLE $table_name ( 
      id INT(15) NOT NULL AUTO_INCREMENT,
      created DATETIME NOT NULL,
      page_post_id VARCHAR(850) NOT NULL,
      keyword TEXT(450) NOT NULL,
      primaryurl VARCHAR(850) NOT NULL,
      secondaryurl VARCHAR(850) NOT NULL,
      postopt BOOLEAN NOT NULL,
      pageopt BOOLEAN NOT NULL, 
      enablemobile ENUM('off','on') NOT NULL,
      numofprimary int(100) NOT NULL, 
      numofsecondary int(100) NOT NULL, 
      totalclicks int(250) NOT NULL, 
      unqclicks int(250) NOT NULL, 
      instances int(250) NOT NULL, 
      globalopt ENUM('N','Y') NOT NULL, 
      pagepostcreated ENUM('N','Y') NOT NULL, 
      active BOOLEAN NOT NULL, 
      PRIMARY KEY (id)
      ) $charset_collate;";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );

      update_option( "clixplit_db_version", $clixplit_db_version );
  }
}

register_activation_hook( __FILE__, 'clixplit_global_campaigns' );


// Check for plugin update that requires new database structure 
function clixplit_update_db_check() {
    global $clixplit_db_version;
    if ( get_site_option( 'clixplit_db_version' ) != $clixplit_db_version ) {
        clixplit_redirect_install();
        clixplit_global_campaigns();
    }
}
add_action( 'plugins_loaded', 'clixplit_update_db_check' );
    

?>
