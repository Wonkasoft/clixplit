<?php 

$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'clixplit_global_campaigns';

if (isset($_POST['get_global_links'])) {
$primaryurl = $wpdb->get_row('SELECT keyword,primaryurl FROM '.$table_name . ' WHERE primaryurl != "" AND totalclicks == MIN(totalclicks) group by keyword');
$secondaryurl = $wpdb->get_row('SELECT keyword,secondaryurl,MIN(totalclicks) FROM '.$table_name . ' WHERE secondaryurl != "" group by keyword');

echo json_encode(array("pk" => $primaryurl->keyword, "p" => $primaryurl->primaryurl, "sk" => $secondaryurl->keyword, "s" => $secondaryurl->secondaryurl));
}


?>