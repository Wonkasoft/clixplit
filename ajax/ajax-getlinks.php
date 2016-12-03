<?php 

$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'clixplit_global_campaigns';

if (isset($_POST['get_global_links'])) {
 $db_primary = $wpdb->get_results('SELECT * FROM '.$table_name .'WHERE (primaryurl,totalclicks) IN (select primaryurl,min(totalclicks) from table group by keyword') );
 
}

 echo json_encode(array("p" => "primary variable", "s" => "secondary variable"));


if (isset($_POST['get_redirect_links']))

?>