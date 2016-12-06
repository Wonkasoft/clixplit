 <?php
 $file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
 require_once( $file_path . 'wp-load.php' );
 global  $wpdb;
 $table_name = $wpdb ->prefix.'clixplit_global_campaigns';
 $dbfetch = $wpdb ->get_results('SELECT * FROM ' . $table_name);
 $pagepost_id = $_POST['activepost'];
 $keyword_check =''; $primaryurl_count = '';
 $secondaryurl_count = ''; $totalclick_count = '';
 $unqclicks_count = ''; $instance_count = '';

 if ($pagepost_id == '') {

 	for ( $i = 0; $i < count($dbfetch); $i++) {
 		if (($dbfetch[$i]->keyword != $keyword_check) && ($dbfetch[$i]->globalopt == "Y")) {
 			$keyword_check = $dbfetch[$i]->keyword;
 			$primaryurl_count = 0;
 			$secondaryurl_count = 0;
 			$totalclick_count = 0;
 			$unqclicks_count = 0;
 			$instance_count = 0;
 			for ($s = 0; $s < count($dbfetch); $s++) {
 				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->primaryurl != '')) {
 					$primaryurl_count++;
 				}
 				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->secondaryurl != '')) {
 					$secondaryurl_count++;
 				}
 				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->totalclicks != 0) && ($dbfetch[$s]->primaryurl != '' || $dbfetch[$s]->secondaryurl != '')) {
 					$totalclick_count += $dbfetch[$s]->totalclicks;
 				}
 				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->unqclicks != 0) && ($dbfetch[$s]->primaryurl != '' || $dbfetch[$s]->secondaryurl != '')) {
 					$unqclicks_count += $dbfetch[$s]->unqclicks;
 				}
 				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->instances != 0)) {
 					$instance_count += $dbfetch[$s]->instances;
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
 if ($pagepost_id) {
 	for ( $i = 0; $i < count($dbfetch); $i++) {
 		if (($dbfetch[$i]->keyword != $keyword_check) && ($dbfetch[$i]->pagepostcreated == "Y") && ($dbfetch[$i]->page_post_id == $pagepost_id)) {
 			$keyword_check = $dbfetch[$i]->keyword;
 			$totalclick_count = 0;
 			$unqclicks_count = 0;
 			for ($s = 0; $s < count($dbfetch); $s++) {
 				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->totalclicks != 0) && ($dbfetch[$s]->primaryurl != '' || $dbfetch[$s]->secondaryurl != '')) {
 					$totalclick_count += $dbfetch[$s]->totalclicks;
 				}
 				if (($keyword_check == $dbfetch[$s]->keyword) && ($dbfetch[$s]->unqclicks != 0) && ($dbfetch[$s]->primaryurl != '' || $dbfetch[$s]->secondaryurl != '')) {
 					$unqclicks_count += $dbfetch[$s]->unqclicks;
 				}
 			}

 			echo '<tr>' .
 			'<td><button class="btn btn-remove clixplit-remove" type="button"><span class="glyphicon glyphicon-minus glyphicon-clixplit"></span></button></td>' .
 			'<td>'. $dbfetch[$i]->keyword .'</td>' .
 			'<td>'. $dbfetch[$i]->created .'</td>' .
 			'<td>'. $totalclick_count . ' | ' . $unqclicks_count .'</td>' .
 			'<td>'. $dbfetch[$i]->globalopt .'</td>' .
 			'</tr>';
 		}
 	}
 }

 ?>