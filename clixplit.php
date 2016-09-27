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

add_action('wp_after_admin_bar_render', 'clixplit_menu_mod');

function clixplit_menu_mod() {
  ?>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script type="text/javascript">
          $("#toplevel_page_clixplit-clixplit-home a.wp-first-item").html("Home");
        </script> 
        <style type="text/css">
        @font-face {
            font-family: 'Roboto-Regular';
            src: url('<?php echo plugins_url( '/fonts/Roboto-Regular.ttf', __FILE__ ); ?>');
        }

          .vertical-space, 
          .nav-item,
          .nav-buttons,
          .clixplit-panel,
          .nav-item.current,
          .new-campaigns-menu,
          .campaign-item,
          .nav-campaign-buttons,
          .mymodal,
          .mymodal-box {
            transition: all .4s ease-in-out;
          }

          .content-wrap {
            font-family: 'Roboto-Regular' !important;
          }

          .bottom-space {
            margin-bottom: 15px;
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

          .logo-grad {
            background: -webkit-radial-gradient(circle, #fff 15%, transparent 30%) !important;
            background: radial-gradient(circle, #fff 15%, transparent 30%) !important;
          }

          .nav-buttons.current {
            background-color: #ff6102;
          }

          .nav-item > a.current:after {
            content: " ";
            position: absolute;
            height: 0;
            width: 0;
            border: 16px solid transparent;
            border-bottom-color: #ff6102;
            pointer-events: none;
            bottom: -20px;
            left: 50%;
            margin: 0 -15px;
          }

          .nav-item {
            margin: 0 14px;
            display: inline-block;
          }

          .nav-buttons {
            padding: 6px 14px;
            background-color: #ffb502;
            border-radius: 2px;
          }

          .nav-buttons:hover {
            background-color: #ff8339;
          }

          .nav-buttons:active {
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
            display: inline-block;
          }

          .nav-campaign-buttons {
            padding: 6px 14px;
            background-color: #39d8cb;
            border-radius: 2px;
          }

          .nav-campaign-buttons:hover {
            background-color: #02ffa1;
          }

          .nav-campaign-buttons:active {
            background-color: #009f92;
          }

          .campaign-item > a {
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 1px;
          }

          input.item-checkbox {
            margin: 0;
          }

          .table-header {
            margin-left: 7px;
            vertical-align: middle;
          }

          tr > th:first-child,
          tr > td:first-child {
            width: 32px;
          }

          #url-addon {
            border: 1px dashed rgba( 0, 0, 0, .1);
            background-color: #fff;
          }

          .clixplit-panel:before {
            content: " ";
            display: block;
            height: 8px;
            background-color: #ff6102;
            margin: 0 -15px;
            box-shadow:  0 4px 6px 0 rgba( 0, 0, 0, .3);
          }

          .clixplit-panel {
            background-color: #ffffff;
            box-shadow:  0 4px 6px 0 rgba( 0, 0, 0, .3);
            margin: 0 4px;
            min-height: 430px;
          }

          .mymodal {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 10000;
            background-color: rgba( 0, 0, 0, .95);
            opacity: 0;
            visibility: hidden;
          }

          .mymodal-box {
            top: 25%;
            left: 20%;
            position: absolute;
          }

          @media only screen and (max-width: 784px) {
            .mymodal-box {
              top: 5%;
              left: 0;
            }
          }

        </style>

        <script type="text/javascript">
        $( document ).ready(function() {
          $("a.nav-campaign-buttons").click(function() {
            $(".mymodal").css({"visibility": "inherit", "opacity": "1"});
          })
          $(".btn-default").click(function () {
            var r = confirm("are you sure you would like to cancel this campaign? \n Your changes will not be saved.");
            if (r == true) {
              $(".mymodal").css({"visibility":"hidden", "opacity": "0"});
            }
          })
        })
        </script>
        <?php
}

  ?>