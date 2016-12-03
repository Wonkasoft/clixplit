<?php 

$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'clixplit_global_campaigns';

if (isset($_POST['keywords'])) {
	$priData = [];
	$keyCount = count($_POST['keywords']);
	$keywords = $_POST['keywords'];
	
	for ($i=0; $i < $keyCount; $i++) {
		if (!in_array($keywords[$i], $priData, true)) {
			$pri_clicks = $wpdb->get_var('SELECT MIN(totalclicks) AS clicks FROM ' . $table_name . ' WHERE primaryurl != "" AND keyword = "'. $keywords[$i] .'" group by keyword');
			$pri_fetch = $wpdb->get_row('SELECT keyword, primaryurl FROM ' . $table_name . ' WHERE primaryurl != "" AND keyword = "' . $keywords[$i] .'" AND totalclicks = "'. $pri_clicks .'" group by keyword');
			array_push($priData, $pri_fetch->keyword, $pri_fetch->primaryurl);
		}
	} 
	 	
	echo json_encode(array($priData));
}


?>