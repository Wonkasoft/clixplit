<?php
$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global  $wpdb;
$table_name = $wpdb ->prefix.'clixplit_global_campaigns';
$table_build = $wpdb ->get_results ('SELECT * FROM '.$table_name);								
$keyword_check = '';

foreach ($table_build as $key) {
	if (($keyword_check == '') && ($key->globalopt == "Y")) {
		$keyword_check = $key->keyword;
		$primaryurl_count = $wpdb ->get_var('SELECT SUM(numofprimary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
		$secondaryurl_count = $wpdb ->get_var('SELECT SUM(numofsecondary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
		echo '<tr>' .
		'<td><input class="item-checkbox" type="checkbox" value=""></td>' .
		'<td>'. $key->keyword .'</td>' .
		'<td>'. $key->created .'</td>' .
		'<td>'. $primaryurl_count . ' | ' . $secondaryurl_count .'</td>' .
		'<td>'. $key->totalclicks . ' | ' . $key->unqclicks .'</td>' .
		'<td><input type="hidden" name="keyword-instance[]" value="' .$key->keyword .'" >'. $results .'</td>' .
		'</tr>';
	}
	if (($key->keyword != $keyword_check) && ($key->globalopt == "Y")) {
		$keyword_check = $key->keyword;
		$primaryurl_count = $wpdb ->get_var('SELECT SUM(numofprimary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
		$secondaryurl_count = $wpdb ->get_var('SELECT SUM(numofsecondary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
		echo '<tr>' .
		'<td><input class="item-checkbox" type="checkbox" value=""></td>' .
		'<td>'.$key->keyword .'</td>' .
		'<td>'. $key->created .'</td>' .
		'<td>'. $primaryurl_count . ' | ' . $secondaryurl_count .'</td>' .
		'<td>'. $key->totalclicks . ' | ' . $key->unqclicks .'</td>' .
		'<td><input type="hidden" name="keyword-instance[]" value="' .$key->keyword .'" >'. $results .'</td>' .
		'</tr>';
	}
}

?>