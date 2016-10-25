<?php
		$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
if (isset($_POST['selected-text'])) {

	if (!empty($_POST['selected-text'])) {
					require_once( $file_path . 'wp-load.php' );
					global $wpdb;
					$table_name = $wpdb->prefix . 'clixplit_global_campaigns';
					$page_post_id = $_POST['activepost-modal'];
					$primary_count = count($_POST['primary']);
					$secondary_count = count($_POST['secondary']);
					$keyword = $_POST['selected-text'];
					$primary = $_POST['primary'];
					$secondary = $_POST['secondary'];
					$globalopt = $_POST['globalopt'];
					$mobileopt = $_POST['mobileopt'];
					$pagepostcreated = "Y";

					for ($i=0; $i < $primary_count; $i++) { 
						$primary_array = $primary[$i];
						$wpdb->insert($table_name, array(
							'created' => current_time('mysql'),
							'page_post_id' => $page_post_id,
							'keyword' => $keyword,
							'primaryurl' => $primary_array,
							'enablemobile' => $mobileopt,
							'numofprimary' => 1,
							'globalopt' => $globalopt,
							'pagepostcreated' => $pagepostcreated
							));
					};
					for ($i=0; $i < $secondary_count; $i++) { 
						$secondary_array = $secondary[$i];
						$wpdb->insert($table_name, array(
							'created' => current_time('mysql'),
							'page_post_id' => $page_post_id,
							'keyword' => $keyword,
							'secondaryurl' => $secondary_array,
							'enablemobile' => $mobileopt,
							'numofsecondary' => 1,
							'globalopt' => $globalopt,
							'pagepostcreated' => $pagepostcreated
							));
					};	
				};
}


if ((!empty($_POST['mouseoverurl'])) || (!empty($_POST['exit-pop'])) || (!empty($_POST['secondary-redirect']))) {
		require_once( $file_path . 'wp-load.php' );
		global $wpdb;
		$table_name = $wpdb->prefix . 'clixplit_redirect';
		$page_post_id = $_POST['activepost'];
		$mouseoveropt = $_POST['mouseover-redirectopt'];
		$mouseover_count = count($_POST['mouseoverurl']);
		$mouseoverurl = $_POST['mouseoverurl'];
		$secondaryopt = $_POST['secondary-redirectopt'];
		$secondary_count = count($_POST['secondary-redirect']);
		$secondary_redirect = $_POST['secondary-redirect'];
		$exitredirectopt = $_POST['exit-redirectopt'];
		$exitredirecturl = $_POST['exit-pop'];
		$exitmessage = $_POST['exit-message'];
		$page_post_check = $wpdb ->get_var('SELECT page_post_id FROM ' . $table_name . ' GROUP BY page_post_id="' . $page_post_id . '"');
		$record_updates = $wpdb ->get_results('SELECT * FROM ' . $table_name . ' WHERE page_post_id="' . $page_post_check . '"', OBJECT);
		$mou_count = $wpdb ->get_var('SELECT COUNT(mouseoverurl) FROM ' . $table_name . ' WHERE page_post_id="' . $page_post_check . '" AND mouseoverurl != ""');
		$pps_count = $wpdb ->get_var('SELECT COUNT(secondaryurl) FROM ' . $table_name . ' WHERE page_post_id="' . $page_post_check . '" AND  secondaryurl != ""');
		$mou_compute = ($mou_count - $mouseover_count);
		$pps_compute = ($pps_count - $secondary_count);

		if ($page_post_check == NULL) {
			for ($i=0; $i < $mouseover_count; $i++) { 
				$mouseover_array = $mouseoverurl[$i];
				$wpdb->insert($table_name, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'mouseoveropt' => $mouseoveropt,
					'mouseoverurl' => $mouseover_array,
					'exitredirectopt' => $exitredirectopt,
					'exitredirecturl' => $exitredirecturl,
					'exitmessage' => $exitmessage
					));
			};
			for ($i=0; $i < $secondary_count; $i++) { 
				$secondary_array = $secondary_redirect[$i];
				$wpdb->insert($table_name, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'secondaryopt' => $secondaryopt,
					'secondaryurl' => $secondary_array,
					'exitredirectopt' => $exitredirectopt,
					'exitredirecturl' => $exitredirecturl,
					'exitmessage' => $exitmessage
					));
			};	
		} 
		if (($page_post_check == $page_post_id) && ($primary_count == $mou_compute) && ($secondaryurl == $pps_count)) {
			for ($i=0; $i < $mouseover_count; $i++) { 
				$mouseover_array = $mouseoverurl[$i];
				$wpdb->update($table_name, array(
					'created' => current_time('mysql'),
					'mouseoveropt' => $mouseoveropt,
					'mouseoverurl' => $mouseover_array,
					'exitredirectopt' => $exitredirectopt,
					'exitredirecturl' => $exitredirecturl,
					'exitmessage' => $exitmessage
					), array('mouseoverurl' => $mouseover_array, 'secondaryurl' => ""));
			};
			for ($i=0; $i < $secondary_count; $i++) { 
				$secondary_array = $secondary_redirect[$i];
				$wpdb->update($table_name, array(
					'created' => current_time('mysql'),
					'secondaryopt' => $secondaryopt,
					'secondaryurl' => $secondary_array,
					'exitredirectopt' => $exitredirectopt,
					'exitredirecturl' => $exitredirecturl,
					'exitmessage' => $exitmessage
					), array('secondaryurl' => $secondary_array, 'mouseoverurl' => ""));
				};
		}
		if ($mou_count > $mouseover_count) {
			for ($i=$mou_count; $i > $mouseover_count; $i--) {
				$mouseover_array = $mouseoverurl[$i];
				$wpdb->delete($table_name, array(
					'mouseoverurl' => $mouseover_array));
			};
		}
		if ($mou_count < $mouseover_count) {
			for ($i=$mou_count; $i < $mouseover_count; $i++) {

			}
		}
		if ($pps_count < $secondary_count) {
			$pps_compute = ($secondary_count - $pps_count);
			for ($i=$pps_compute; $i > 0; $i--) {
				$id_array = $record_updates[$i]->id;
				$wpdb->delete($table_name, array(
					'id' => $id_array));
			};
		}
}


?>