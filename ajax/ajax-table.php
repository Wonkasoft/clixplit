 <?php
$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global  $wpdb;
$table_name = $wpdb ->prefix.'clixplit_global_campaigns';
$dbfetch = $wpdb ->get_results('SELECT * FROM ' . $table_name);
$pagepost_id = $_POST['activepost'];
$keyword_check =''; $primaryurl_count = '';
$secondaryurl_count = ''; $totalclick_count = 0;
$unqclicks_count = ''; $instance_count = '';

if ($pagepost_id == '') {

	for ( $i = 0; $i < count($dbfetch); $i++) {
		if (($dbfetch[$i]->keyword != $keyword_check) && ($dbfetch[$i]->globalopt == "Y")) {
			$keyword_check = $dbfetch[$i]->keyword;
			$primaryurl_count = 0;
			$secondaryurl_count = 0;
			$totalclick_count = 0;
			for ($s = 0; $s < count($dbfetch); $s++) {
				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->primaryurl != '')) {
					$primaryurl_count++;
				}
				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->secondaryurl != '')) {
					$secondaryurl_count++;
				}
				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->primaryurl != '') || ($dbfetch[$s]->secondaryurl != '')) {
					$totalclick_count = $dbfetch[$s]->totalclicks;
				}
			};

			echo '<tr>' .
			'<td><input class="item-checkbox" type="checkbox" value="" name="'.$keyword_check.'"></td>' .
			'<td>'. $keyword_check .'</td>' .
			'<td>'. $dbfetch[$i]->created .'</td>' .
			'<td>'. $primaryurl_count . ' | ' . $secondaryurl_count .'</td>' .
			'<td>'. $totalclick_count . ' | ' . $unqclicks_count .'</td>' .
			'<td>'. $instance_count .'</td>' .
			'</tr>';
		}
	}
}
	for ( $i = 0; $i < count($dbfetch); $i++) {
		if (($dbfetch[$i]->keyword != $keyword_check) && ($dbfetch[$i]->pagepostcreated == "Y") && ($dbfetch[$i]->page_post_id == $pagepost_id)) {
			$keyword_check = $dbfetch[$i]->keyword;

			$totalclick_count = $wpdb ->get_var('SELECT SUM(totalclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			$unqclicks_count = $wpdb ->get_var('SELECT SUM(unqclicks) FROM '.$table_name.' WHERE keyword = "' .$keyword_check .'" ');

			echo '<tr>' .
						'<td></td>' .
						'<td>'. $dbfetch[$i]->keyword .'</td>' .
						'<td>'. $dbfetch[$i]->created .'</td>' .
						'<td>'. $totalclick_count . ' | ' . $unqclicks_count .'</td>' .
						'<td>'. $dbfetch[$i]->globalopt .'</td>' .
						'</tr>';
		}
	}
	
?>