<?php
		$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';

// Page Post Modal Meta-box
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

// Page Post Meta-box
if ((isset($_POST['mouseover-redirectopt'])) || (isset($_POST['exit-redirectopt'])) || (isset($_POST['secondary-redirectopt']))) {
		require_once( $file_path . 'wp-load.php' );
		global $wpdb;
		$table_redirect = $wpdb->prefix . 'clixplit_redirect';
		// Form data from submission
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
		// varibles for use
		$page_post_check = ''; $mou_count = ''; $pps_count = '';
		// Database Fetch
		$db_fetch = $wpdb->get_results('SELECT * FROM ' . $table_redirect);
		// Database structure for use
			for ($i=0; $i < count($db_fetch); $i++) {
				if ($db_fetch[$i]->page_post_id == $page_post_id) {
					$page_post_check = $db_fetch[$i]->page_post_id;
				} else {
					$page_post_check = "";
				}
				if (($db_fetch[$i]->mouseoverurl != '') && ($db_fetch[$i]->page_post_id == $page_post_id)) {
					$mou_count++;
				}
				if (($db_fetch[$i]->secondaryurl != '') && ($db_fetch[$i]->page_post_id == $page_post_id)) {
					$pps_count++;
				}
			};

			// Form reset clear table of page or post
		if (($page_post_check == $page_post_id) && ($mouseoveropt == "off") && ($secondaryopt == "off") && ($exitredirectopt == "off")) {
			$wpdb->delete($table_redirect, array(
					'page_post_id' => $page_post_id));
		};

		if ($page_post_check == "") {
			$wpdb->insert($table_redirect, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'mouseoveropt' => $mouseoveropt,
					'exitredirectopt' => $exitredirectopt,
					'exitredirecturl' => $exitredirecturl,
					'exitmessage' => $exitmessage,
					'secondaryopt' => $secondaryopt
					));
			for ($i=0; $i < $mouseover_count; $i++) { 
				$wpdb->insert($table_redirect, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'input_id' => $i,
					'mouseoverurl' => $mouseoverurl[$i]
					));
			};
			for ($i=0; $i < $secondary_count; $i++) { 
				$wpdb->insert($table_redirect, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'input_id' => $i,
					'secondaryurl' => $secondary_redirect[$i]
					));
			};	
		};
		if (($page_post_check == $page_post_id && $mouseoveropt == "on" && $secondaryopt == "on" && $exitredirectopt == "on")) {
			$wpdb->update($table_redirect, array(
				'created' => current_time('mysql'),
				'mouseoveropt' => $mouseoveropt,
				'exitredirectopt' => $exitredirectopt,
				'exitredirecturl' => $exitredirecturl,
				'exitmessage' => $exitmessage,
				'secondaryopt' => $secondaryopt
				), array('page_post_id' => $page_post_id, 'mouseoveropt' => "on"));
		}

		
		if (($page_post_check == $page_post_id && $mouseover_count == $mou_count && $secondary_count == $pps_count)) {
			for ($i=0; $i < $mouseover_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'mouseoverurl' => $mouseoverurl[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'secondaryurl' => ""));
			};
			for ($i=0; $i < $secondary_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'secondaryurl' => $secondary_redirect[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'mouseoverurl' => ""));
			};
		};

		// For form being cleared
		if (($page_post_check == $page_post_id && $mouseover_count == 1 && $mouseoverurl[0] == '')) {
			$wpdb->delete($table_redirect, array(
					'page_post_id' => $page_post_id, 'input_id' => '', 'mouseoverurl' => ''));
		};
		if (($page_post_check == $page_post_id) && ($secondary_count == 1) && ($secondary_redirect[0] == '')) {
			$wpdb->delete($table_redirect, array(
					'page_post_id' => $page_post_id, 'input_id' => '', 'secondaryurl' => ''));
		};

		// For deleting rows for deleted inputs
		if (($page_post_check == $page_post_id) && ($mou_count > $mouseover_count)) {
			$set = $mou_count-1;
			for ($i=$set; $i >= $mouseover_count; $i--) {
				$wpdb->delete($table_redirect, array(
					'page_post_id' => $page_post_id, 'input_id' => $i, 'secondaryurl' => ""));
			};
			for ($i=0; $i < $mouseover_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'mouseoverurl' => $mouseoverurl[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'secondaryurl' => ""));
			};
		};
		if (($page_post_check == $page_post_id) && ($pps_count > $secondary_count)) {
			$set = $pps_count-1;
			for ($i=$set; $i >= $secondary_count; $i--) {
				$wpdb->delete($table_redirect, array(
					'page_post_id' => $page_post_id, 'input_id' => $i, 'mouseoverurl' => ""));
			};
			for ($i=0; $i < $secondary_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'secondaryurl' => $secondary_redirect[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'mouseoverurl' => ""));
			};
		};

		// For adding rows for added inputs
		if (($page_post_check == $page_post_id) && ($mou_count < $mouseover_count) && ($mou_count != 0)) {
			for ($i=0; $i < $mouseover_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'mouseoverurl' => $mouseoverurl[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'secondaryurl' => ""));
			};
			$set = $mou_count;
			for ($i=$set; $i < $mouseover_count; $i++) {
				$wpdb->insert($table_redirect, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'input_id' => $i,
					'mouseoverurl' => $mouseoverurl[$i]
					));
			};
		};
		if (($page_post_check == $page_post_id) && ($mou_count < $mouseover_count) && ($mou_count == 0)) {
			for ($i=0; $i < $mouseover_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'mouseoverurl' => $mouseoverurl[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'secondaryurl' => ""));
			};
			$set = 0;
			for ($i=$set; $i < $mouseover_count; $i++) {
				$wpdb->insert($table_redirect, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'input_id' => $i,
					'mouseoverurl' => $mouseoverurl[$i]
					));
			};
		};

		if (($page_post_check == $page_post_id) && ($pps_count < $secondary_count) && ($pps_count != 0)) {
			for ($i=0; $i < $mouseover_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'secondaryurl' => $secondary_redirect[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'mouseoverurl' => ""));
			};
			$set = $pps_count;
			for ($i=$set; $i < $secondary_count; $i++) {
				$wpdb->insert($table_redirect, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'input_id' => $i,
					'secondaryurl' => $secondary_redirect[$i]
					));
			};
		};
		if (($page_post_check == $page_post_id) && ($pps_count < $secondary_count) && ($pps_count == 0)) {
			for ($i=0; $i < $mouseover_count; $i++) { 
				$wpdb->update($table_redirect, array(
					'created' => current_time('mysql'),
					'secondaryurl' => $secondary_redirect[$i]
					), array('page_post_id' => $page_post_id, 'input_id' => $i, 'mouseoverurl' => ""));
			};
			$set = 0;
			for ($i=$set; $i < $secondary_count; $i++) {
				$wpdb->insert($table_redirect, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'input_id' => $i,
					'secondaryurl' => $secondary_redirect[$i]
					));
			};
		};
}

// Delete campaigns
if (isset($_POST['enddata'])) {
	require_once( $file_path . 'wp-load.php' );
	global $wpdb;
	$table_name = $wpdb->prefix . 'clixplit_global_campaigns';
	$enddata = $_POST['enddata'];
	$enddatacount = count($enddata);

	if ($enddatacount >= 1) {
		for ($i = 0; $i < $enddatacount; $i++) {
			$wpdb->delete($table_name, array(
				'keyword' => $enddata[$i]
				));
		}
	}
}


print_r($_POST);



?>