 <?php
$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global  $wpdb;
$table_name = $wpdb ->prefix.'clixplit_global_campaigns';
$table_build = $wpdb ->get_results('SELECT * FROM ' . $table_name);
$pagepost_id = $_POST['activepost'];
$keyword_check ='';

if ($pagepost_id == '') {
	foreach ($table_build as $key) {
		if (($key->keyword != $keyword_check) && ($key->globalopt == "Y")) {
			$keyword_check = $key->keyword;

			$primaryurl_count = $wpdb ->get_var('SELECT SUM(numofprimary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');
			$secondaryurl_count = $wpdb ->get_var('SELECT SUM(numofsecondary) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			$totalclick_count = $wpdb ->get_var('SELECT SUM(totalclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			$unqclicks_count = $wpdb ->get_var('SELECT SUM(unqclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			$instance_count = $wpdb ->get_var('SELECT SUM(instances) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			echo '<tr>' .
			'<td><input class="item-checkbox" type="checkbox" value="" name="'.$keyword_check.'"></td>' .
			'<td>'. $keyword_check .'</td>' .
			'<td>'. $key->created .'</td>' .
			'<td>'. $primaryurl_count . ' | ' . $secondaryurl_count .'</td>' .
			'<td>'. $totalclick_count . ' | ' . $unqclicks_count .'</td>' .
			'<td>'. $instance_count .'</td>' .
			'</tr>';
		}
	}
}

	foreach ($table_build as $key) {
		if (($key->keyword != $keyword_check) && ($key->pagepostcreated == "Y") && ($key->page_post_id == $pagepost_id)) {
			$keyword_check = $key->keyword;

			$totalclick_count = $wpdb ->get_var('SELECT SUM(totalclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			$unqclicks_count = $wpdb ->get_var('SELECT SUM(unqclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			echo '<tr>' .
						'<td></td>' .
						'<td>'. $key->keyword .'</td>' .
						'<td>'. $key->created .'</td>' .
						'<td>'. $totalclick_count . ' | ' . $unqclicks_count .'</td>' .
						'<td>'. $key->globalopt .'</td>' .
						'</tr>';
		}
	}

?>