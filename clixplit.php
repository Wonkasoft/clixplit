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
  wp_register_style('clixplit-bootstrap', plugins_url( '/css/bootstrap.min.css', __FILE__ ) , array(), '3.3.7', 'all');
  wp_register_script('clixplit-bootstrapjs', plugins_url( '/js/bootstrap.min.js', __FILE__ ) , array('jquery'), '3.3.7');
  wp_enqueue_style('clixplit-bootstrap', plugins_url( '/css/bootstrap.min.css', __FILE__ ) , array(), '3.3.7', 'all');
  wp_enqueue_script('clixplit-bootstrapjs', plugins_url( '/js/bootstrap.min.js', __FILE__ ) , array('jquery'), '3.3.7');
}

add_action ('admin_menu', 'clixplit_register_custom_menu');

function clixplit_register_custom_menu() {
  add_menu_page ('Home', 
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

add_action('wp_after_admin_bar_render', 'clixplit_menu_mod');

function clixplit_menu_mod() {
  ?>
        <script type="text/javascript">
          jQuery("#toplevel_page_clixplit-clixplit-home a.wp-first-item").html("Home");
        </script> 
        <style type="text/css">
        @font-face {
            font-family: 'Roboto-Regular';
            src: url('<?php echo plugins_url( '/fonts/Roboto-Regular.ttf', __FILE__ ); ?>');
        }

          .vertical-space, 
          .nav-item,
          .clixplit-panel,
          .nav-item.current,
          .new-campaigns-menu,
          .campaign-item {
            transition: all .4s ease-in-out;
          }

          .content-wrap {
            font-family: 'Roboto-Regular' !important;
          }

          .bottom-space {
            margin-bottom: 10px;
          }

          .clixplit-clixplit-home-php,
          .clixplit-clixplit-tutorials-php,
          .clixplit-clixplit-global-campaigns-php,
          .clixplit-clixplit-resources-php  {
            background-color: #efefef;
          }

          .vertical-space {
            margin-top: 25px;
            margin-bottom: 25px;
          }

          .nav-item.current {
            background-color: #ff6102;
          }

          .nav-item.current > a:after {
            content: " ";
            position: absolute;
            height: 0;
            width: 0;
            border: 16px solid transparent;
            border-bottom-color: #ff6102;
            pointer-events: none;
            bottom: -29px;
            left: 50%;
            margin: 0 -15px;
          }

          .nav-item {
            display: inline-block;
            margin: 0 1em;
            padding: 8px 2em;
            background-color: #ffb502;
            border-radius: 3px;
          }

          .nav-item:hover {
            background-color: #ff8339;
          }

          .nav-item:active {
            background-color: #ff6102;
          }

          .nav-item > a {
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 1px;
            text-decoration: none;
            position: relative;
          }

          .new-campaigns-menu {
            margin-top: 2em;
          }

          .campaign-item {
            margin: 0 1em;
            padding: 8px 1em;
            background-color: #39d8cb;
            display: inline-block;
            border-radius: 3px;
          }

          .campaign-item:hover {
            background-color: #02ffa1;
          }

          .campaign-item:active {
            background-color: #009f92;
          }

          .campaign-item > a {
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 1px;
          }

          .clixplit-panel:before {
            content: " ";
            display: block;
            height: 6px;
            margin: 0 -15px;
            background-color: #ff6102;
            box-shadow:  0 4px 6px 0 rgba( 0, 0, 0, .3);
          }

          .clixplit-panel {
            background-color: #ffffff;
            box-shadow:  0 4px 6px 0 rgba( 0, 0, 0, .3);
            margin: 0 4px;
            min-height: 350px;
          }

        </style>
        <?php
}

  ?>