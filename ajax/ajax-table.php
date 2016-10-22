 <?php
$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global  $wpdb;
$table_name = $wpdb ->prefix.'clixplit_global_campaigns';
$table_build = $wpdb ->get_results('SELECT * FROM '.$table_name);
$table_rows = $wpdb->num_rows;

$primaryurl_count = $wpdb ->get_var('SELECT SUM(numofprimary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
$secondaryurl_count = $wpdb ->get_var('SELECT SUM(numofsecondary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

/*while ( $row = $table_build) {
	echo '<tr>' .
		'<td><input class="item-checkbox" type="checkbox" value=""></td>' .
		'<td>'. $row['keyword'] .'</td>' .
		'<td>'. $row['created'] .'</td>' .
		'<td>'. $primaryurl_count . ' | ' . $secondaryurl_count .'</td>' .
		'<td>'. $totalclick_count . ' | ' . $key->unqclicks .'</td>' .
		'<td><input type="hidden" name="keyword-instance[]" value="' .$key->keyword .'" >'. $row['instances'] .'</td>' .
		'</tr>';
}*/

foreach ($table_build as $key) {
	if (($keyword_check == '') && ($key->globalopt == "Y")) {
		$keyword_check = $key->keyword;
		$first_keyword = $key->keyword;

		$primaryurl_count = $wpdb ->get_var('SELECT SUM(numofprimary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
		$secondaryurl_count = $wpdb ->get_var('SELECT SUM(numofsecondary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

		$totalclick_count = $wpdb ->get_var('SELECT SUM(totalclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

		$instance_count = $wpdb ->get_var('SELECT SUM(instances) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

		echo '<tr>' .
		'<td><input class="item-checkbox" type="checkbox" value=""></td>' .
		'<td>'. $first_keyword .'</td>' .
		'<td>'. $key->created .'</td>' .
		'<td>'. $primaryurl_count . ' | ' . $secondaryurl_count .'</td>' .
		'<td>'. $totalclick_count . ' | ' . $key->unqclicks .'</td>' .
		'<td><input type="hidden" name="keyword-instance[]" value="' .$key->keyword .'" >'. $instance_count .'</td>' .
		'</tr>';
	}

	if (($key->keyword != $keyword_check) && ($key->globalopt == "Y") && ($key->keyword != $first_keyword)) {
		$keyword_check = $key->keyword;

		$primaryurl_count = $wpdb ->get_var('SELECT SUM(numofprimary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
		$secondaryurl_count = $wpdb ->get_var('SELECT SUM(numofsecondary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

		$totalclick_count = $wpdb ->get_var('SELECT SUM(totalclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

		$instance_count = $wpdb ->get_var('SELECT SUM(instances) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

		echo '<tr>' .
		'<td><input class="item-checkbox" type="checkbox" value=""></td>' .
		'<td>'.$key->keyword .'</td>' .
		'<td>'. $key->created .'</td>' .
		'<td>'. $primaryurl_count . ' | ' . $secondaryurl_count .'</td>' .
		'<td>'. $totalclick_count . ' | ' . $key->unqclicks .'</td>' .
		'<td><input type="hidden" name="keyword-instance[]" value="' .$key->keyword .'" >'. $instance_count .'</td>' .
		'</tr>';
	}
}

?>