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
  add_menu_page ('clixplit', 
    'Clixplit',
    'manage_options',
    'clixplit',
    'clixplit_main',
    'dashicons-megaphone');
  
  add_submenu_page ('clixplit',
    'Clixplit',
    'Settings',
    'manage_options',
    'clixplit-settings',
    'clixplit_settings');
  add_submenu_page ('clixplit',
    'Clixplit',
    'integration',
    'manage_options',
    'clixplit-integration',
    'clixplit_integration');
}

function clixplit_main() {
  if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  echo '<style type="text/css">
    h1 {
      font-family: "Times New Roman", Times, serif;
      color: #737373;
    }

    hr {
      background-color:#5C5C5C;
      padding: 2px;
      width: 96%;
    }
    </style>
    <div class="content-wrap">
        <h1>Welcome to CliXplit <span class="dashicons dashicons-admin-plugins"></span></h1>
        <hr />
        <h1 align="center">CliXplit milks your traffic clicks for all they\'re worth while keeping it classy.</h1><br />
        <p align="center">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/A8YZB_T0t3U" frameborder="0" allowfullscreen></iframe>
        </p>
        <div class="menu-options text-center">
        <ul class="">
        <li class=""><a class="option-anchor" href="?page=clixplit-settings"><span class="option-label">Settings</span></a></li>
        <li class=""><a class="option-anchor" href="?page=clixplit-integration"><span class="option-label">Integration</span></a></li>
        <li class="">'. plugins_url( '/css/bootstrap.min.css', __FILE__ ) . '</li>
        </ul>
        </div>
        ';
}

function clixplit_settings() {
  if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  echo '<style type="text/css">
    h1 {
      font-family: "Times New Roman", Times, serif;
      color: #737373;
    }

    hr {
      background-color:#5C5C5C;
      padding: 2px;
      width: 100%;
    }

    input[type=checkbox] {
      visibility: hidden;
    }

    .slider {
      width: 80px;
      height: 26px;
      background: #737373;
      margin:0;

      -webkit-border-radius: 50px;
      -moz-border-radius: 50px;
      border-radius: 50px;
      position: relative;

      -webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
      -moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
      box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
    }

    .slider:after {
      content: "OFF";
      font: 12px/26px Arial, sans-serif;
      color: #000;
      position: absolute;
      right: 10px;
      z-index: 0;
      font-weight: bold;
      text-shadow: 1px 1px 0px rgba(255,255,255,.15);
    }

    .slider:before {
      content: "ON";
      font: 12px/26px Arial, sans-serif;
      color: #2C00D1;
      position: absolute;
      left: 10px;
      z-index: 0;
      font-weight: bold;
    }

    .slider label {
      display: block;
      width: 34px;
      height: 20px;

      -webkit-border-radius: 50px;
      -moz-border-radius: 50px;
      border-radius: 50px;

      -webkit-transition: all .4s ease;
      -moz-transition: all .4s ease;
      -o-transition: all .4s ease;
      -ms-transition: all .4s ease;
      transition: all .4s ease;
      cursor: pointer;
      position: absolute;
      top: 3px;
      left: 3px;
      z-index: 1;

      -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
      -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
      box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
      background: #fcfff4;

      background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
      background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
      background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
      background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
      background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#fcfff4", endColorstr="#b3bead",GradientType=0 );
    }

    .slider input[type=checkbox]:checked + label {
      left: 43px;
    }
    
    label {
      font-size: 22px;
    }

    #exit-url, #forward-url, input {
    padding: 6px;
    border-radius: 6px;
    font-size: 18px;
    }

    input[type=text] {
      width: 500px;
    }

    input[type=text]:focus {
      background: #E6E4E4;
    }


    .btn {
      padding-left: 20px;
      padding-right: 20px;
    }


    </style>
      <div class="content-wrap">
        <h1>Juicy Click Setup <span class="dashicons dashicons-admin-plugins"></span></h1>
        <hr />
        <form action="" method="POST">
        <p>
          <div class="slider">  
            <input type="checkbox" value="None" id="slider" name="check" />
            <label for="slider"></label>
          </div><br />
          <strong>Enable Mobile</strong>
        </p>
        <p>
          <label>Input Exit Link URL <small>(Required)</small>
          <input type="text" title="This is where the user is redirected on exit" id="exit-link" name="exit-link">
          </label>
        </p>
        <p>
          <label>Input Forward Link URL <small>(Required)</small>
          <input type="text" title="This is where the user is redirected on accepted click"id="forward-link" name="forward-link">
          </label>
        </p>
        <p>
          <label>CSS ID of Accepted Link/Button <small>(Required)</small>
          <input type="text" title="This is the CSS ID for your accepted link / button"id="acceptedcssid" name="acceptedcssid">
          </label>
        </p>
        <p>
          <input type="submit" class ="btn" id="submit" name="submit" value="Save">
          <input type="reset" class="btn" name="reset" value="Clear">
        </form>
        </p>';
  }

  function clixplit_integration() {
    if (!current_user_can('manage_options')) {
      wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    echo '<div class="wrap">';
    echo '<h1>Integration Menu</h1>';
    echo '</div>';
  }


  ?>