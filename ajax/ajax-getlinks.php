<?php 

$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'clixplit_global_campaigns';

if (isset($_POST['getlinks'])) {
  $linkObj = $wpdb->get_results('SELECT * FROM '.$table_name);
  echo json_encode($linkObj);
}

?>