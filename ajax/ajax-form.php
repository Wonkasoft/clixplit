<?php
$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'clixplit_global_campaigns';
$table_redirect = $wpdb->prefix . 'clixplit_redirect';

// Page Post Modal Meta-box
if (isset($_POST['selected-text'])) {

	if (!empty($_POST['selected-text'])) {
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
				'input_id' => $i,
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
				'input_id' => $i,
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
		}
		if (($db_fetch[$i]->mouseoverurl != '') && ($db_fetch[$i]->page_post_id == $page_post_id)) {
			$mou_count++;
		}
		if (($db_fetch[$i]->secondaryurl != '') && ($db_fetch[$i]->page_post_id == $page_post_id)) {
			$pps_count++;
		}
	}

			// Form reset clear table of page or post
	if (($page_post_check == $page_post_id) && ($mouseoveropt == "off") && ($secondaryopt == "off") && ($exitredirectopt == "off")) {
		$wpdb->delete($table_redirect, array(
			'page_post_id' => $page_post_id));
	}
	else {
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

}

// Delete campaigns
if (isset($_POST['enddata'])) {
	$enddata = $_POST['enddata'];
	$enddatacount = count($enddata);
	$db_fetch = $wpdb->get_results('SELECT * FROM ' . $table_name);
	if ($enddatacount >= 1) {
		for ($i = 0; $i < $enddatacount; $i++) {
			$keyword = $enddata[$i];
			$posts = get_posts(); $postlinksDate = ""; $postlinksDates = []; $postlinksID = ""; $postlinksTitle = ""; $postlinksContent = ""; $postlinkspost = "";
			$pages = get_pages(); $pagelinksDate = ""; $pagelinksDates = []; $pagelinksID = ""; $pagelinksTitle = ""; $pagelinksContent = ""; $pagelinkspage = "";
			$linksprimary = "";
			$update_check = "";
			for ($s = 0; $s < count($db_fetch); $s++) {
				if ($keyword == $db_fetch[$s]->keyword && $db_fetch[$s]->primaryurl != "") {
					$linksprimary = $db_fetch[$s]->primaryurl;
					echo $linksprimary;
				}
			foreach ($posts as $post) {
				$postlinksDate = $post->post_date;
				if ($postlinksDate < strtotime( "today")) {
					$postlinksDate = strtotime("today");
					$postlinksDates['post_date'] = date( 'Y-m-d H:i:s', $postlinksDate);
					$postlinksDates['post_date_gmt'] = gmdate( 'Y-m-d H:i:s', $postlinksDate);
					$postlinksID = $post->ID; $postlinksTitle = $post->post_title; $postlinksContent = $post->post_content;
					$postlinksContent = str_replace('<a href="'. $linksprimary .'" class="global-links" onclick="clixplit_clicks_update(this,this.text)">' . $keyword . '</a>', $keyword, $postlinksContent);
					$postlinkspost = array(
						'ID' => $postlinksID,
						'post_title' => $postlinksTitle,
						'post_content' => $postlinksContent,
						'post_status' => 'publish',
						'post_date' => $postlinksDates['post_date'],
						'post_date_gmt' => $postlinksDates['post_date_gmt']
						);
					wp_update_post($postlinkspost);
				}
			}
			foreach ($pages as $page) {
				$pagelinksDate = $page->post_date;
				if ($pagelinksDate < strtotime("today")) {
					$pagelinksDate = strtotime("today");
					$pagelinksDates['post_date'] = date( 'Y-m-d H:i:s', $pagelinksDate);
					$pagelinksDates['post_date_gmt'] = gmdate( 'Y-m-d H:i:s', $pagelinksDate);
					$pagelinksID = $page->ID; $pagelinksTitle = $page->post_title; $pagelinksContent = $page->post_content;
					$pagelinksContent = str_replace('<a href="'. $linksprimary .'" class="global-links" onclick="clixplit_clicks_update(this,this.text)">' . $keyword . '</a>', $keyword, $pagelinksContent);
					$pagelinkspage = array(
						'ID' => $pagelinksID,
						'post_title' => $pagelinksTitle,
						'post_content' => $pagelinksContent,
						'post_status' => 'publish',
						'post_date' => $pagelinksDates['post_date'],
						'post_date_gmt' => $pagelinksDates['post_date_gmt']
						);
					wp_update_post($pagelinkspage);
				}
			}
			}
			$wpdb->delete($table_name, array(
				'keyword' => $enddata[$i]
				));
		}
	}
}


$page_post_id = $_POST['activepost'];
$primary_count = count($_POST['primary']);
$secondary_count = count($_POST['secondary']);
$primary = $_POST['primary'];
$secondary = $_POST['secondary'];
$postopt = $_POST['post-value'];
$pageopt = $_POST['page-value'];
$selected_text = $_POST['selected-text'];
$globalopt = $_POST['globalopt'];

if (isset($_POST['keyword-input'])) {
	$keyword = $_POST['keyword-input'];
	$update_check = "";
	$priCounter = 0;
	$secCounter = 0;
	$db_fetch = $wpdb->get_results('SELECT * FROM ' . $table_name);
	for ($i = 0; $i < count($db_fetch); $i++) {
		if (($keyword == $db_fetch[$i]->keyword) && ($db_fetch[$i]->input_id == '')) {
			$update_check = 'update';
		}
		if (($keyword == $db_fetch[$i]->keyword) && ($db_fetch[$i]->primaryurl != '')) {
			$priCounter++;
		}
		if (($keyword == $db_fetch[$i]->keyword) && ($db_fetch[$i]->secondaryurl != '')) {
			$secCounter++;
		}
	}
	if ($update_check == "") {
		echo 'fired for insert';
		for ($i=0; $i < $primary_count; $i++) { 
			$primary_array = $primary[$i];
			if ($primary_array != '') {
				$wpdb->insert($table_name, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'keyword' => $keyword,
					'input_id' =>$i,
					'primaryurl' => $primary_array,
					'numofprimary' => 1,
					'pageopt' => $pageopt,
					'postopt' => $postopt,
					'globalopt' => $globalopt,
					'active' => 1
					));
			}
		}
		for ($i=0; $i < $secondary_count; $i++) { 
			$secondary_array = $secondary[$i];
			if ($secondary_array != '') {
				$wpdb->insert($table_name, array(
					'created' => current_time('mysql'),
					'page_post_id' => $page_post_id,
					'keyword' => $keyword,
					'input_id' =>$i,
					'secondaryurl' => $secondary_array,
					'numofsecondary' => 1,
					'pageopt' => $pageopt,
					'postopt' => $postopt,
					'globalopt' => $globalopt,
					'active' => 1
					));
			}
		}
	} else {
		if (($update_check = 'update')) {
			echo 'entered update';
				if ($primary_count < $priCounter) {
			$set = $priCounter-1;
			for ($i=$set; $i >= $primary_count; $i--) { 
				$wpdb->delete($table_name, array(
					'input_id' => $i, 'secondaryurl' => ""
					));
			}
		}
		if ($secondary_count > $secCounter) {
			$set = $secCounter-1;
			for ($i=$set; $i >= $secondary_count; $i--) { 
				$wpdb->delete($table_name, array(
					'input_id' => $i, '$primaryurl' => ""
					));
			}
		}
		if ($primary_count > $priCounter) {
			$set = $priCounter;
			for ($i=$set; $i < $primary_count; $i++) { 
				$primary_array = $primary[$i];
				if ($primary_array != '') {
					$wpdb->insert($table_name, array(
						'created' => current_time('mysql'),
						'page_post_id' => $page_post_id,
						'keyword' => $keyword,
						'input_id' =>$i,
						'primaryurl' => $primary_array,
						'numofprimary' => 1,
						'pageopt' => $pageopt,
						'postopt' => $postopt,
						'globalopt' => $globalopt,
						'active' => 1
						));
				}
			}
		}
		if ($secondary_count > $secCounter) {
			$set = $secCounter;
			for ($i=$set; $i < $secondary_count; $i++) { 
				$secondary_array = $secondary[$i];
				if ($secondary_array != '') {
					$wpdb->insert($table_name, array(
						'created' => current_time('mysql'),
						'page_post_id' => $page_post_id,
						'keyword' => $keyword,
						'input_id' =>$i,
						'secondaryurl' => $secondary_array,
						'numofsecondary' => 1,
						'pageopt' => $pageopt,
						'postopt' => $postopt,
						'globalopt' => $globalopt,
						'active' => 1
						));
				}
			}
		}
			for ($i=0; $i < $primary_count; $i++) { 
				$primary_array = $primary[$i];
				if ($primary_array != '') {
					$wpdb->update($table_name, array(
						'created' => current_time('mysql'),
						'page_post_id' => $page_post_id,
						'keyword' => $keyword,
						'input_id' =>$i,
						'primaryurl' => $primary_array,
						'numofprimary' => 1,
						'pageopt' => $pageopt,
						'postopt' => $postopt,
						'globalopt' => $globalopt,
						'active' => 1
						), array('page_post_id' => $page_post_id, 'keyword' => $keyword, 'input_id' =>$i, 'secondaryurl' => ''));
				}
			}
			for ($i=0; $i < $secondary_count; $i++) { 
				$secondary_array = $secondary[$i];
				if ($secondary_array != '') {
					$wpdb->update($table_name, array(
						'created' => current_time('mysql'),
						'page_post_id' => $page_post_id,
						'keyword' => $keyword,
						'input_id' =>$i,
						'secondaryurl' => $secondary_array,
						'numofsecondary' => 1,
						'pageopt' => $pageopt,
						'postopt' => $postopt,
						'globalopt' => $globalopt,
						'active' => 1
						), array('page_post_id' => $page_post_id, 'keyword' => $keyword, 'input_id' =>$i, 'primaryurl' => ''));
				}
			}
		}
	}
};

if (isset($_POST['globalopt'])) {
	if ($_POST['globalopt'] == 'Y') {
		// Database Fetch
		$db_fetch = $wpdb->get_results('SELECT * FROM ' . $table_name);
		if (isset($_POST['selected-text'])) {
			$keyword = $selected_text;
			
		}
		$content_output = "";
		$posts = get_posts(); $postlinksDate = ""; $postlinksDates = []; $postlinksID = ""; $postlinksTitle = ""; $postlinksContent = ""; $postlinkspost = "";
		$pages = get_pages(); $pagelinksDate = ""; $pagelinksDates = []; $pagelinksID = ""; $pagelinksTitle = ""; $pagelinksContent = ""; $pagelinkspage = "";
		$linksprimary = "";
		$update_check = "";
		for ($i = 0; $i < count($db_fetch); $i++) {
			if (($keyword == $db_fetch[$i]->keyword) && ($db_fetch[$i]->primaryurl != "")) {
				$linksprimary = $db_fetch[$i]->primaryurl;
			}
			if (($keyword == $db_fetch[$i]->keyword) && ($db_fetch[$i]->input_id == '')) {
				$update_check = 'update';
			}
		}

		foreach ($posts as $post) {
			$post_content = apply_filters('the_content', $post->post_content);
			$content_output .= $post_content;
			if ($postopt == 'on' ) {
				$postlinksDate = $post->post_date;
				if ($postlinksDate < strtotime( "today")) {
					$postlinksDate = strtotime("today");
					$postlinksDates['post_date'] = date( 'Y-m-d H:i:s', $postlinksDate);
					$postlinksDates['post_date_gmt'] = gmdate( 'Y-m-d H:i:s', $postlinksDate);
					$postlinksID = $post->ID; $postlinksTitle = $post->post_title; $postlinksContent = $post->post_content;
					$postlinksContent = str_replace($keyword,'<a href="'. $linksprimary .'" class="global-links" onclick="clixplit_clicks_update(this,this.text)">' . $keyword . '</a>', $postlinksContent);
					$postlinkspost = array(
						'ID' => $postlinksID,
						'post_title' => $postlinksTitle,
						'post_content' => $postlinksContent,
						'post_status' => 'publish',
						'post_date' => $postlinksDates['post_date'],
						'post_date_gmt' => $postlinksDates['post_date_gmt']
						);
					wp_update_post($postlinkspost);
				}
			}
		}


		foreach ($pages as $page) {
			$page_content = apply_filters('the_content', $page->post_content);
			$content_output .= $page_content;
			if ($pageopt == 'on') {
				$pagelinksDate = $page->post_date;
				if ($pagelinksDate < strtotime("today")) {
					$pagelinksDate = strtotime("today");
					$pagelinksDates['post_date'] = date( 'Y-m-d H:i:s', $pagelinksDate);
					$pagelinksDates['post_date_gmt'] = gmdate( 'Y-m-d H:i:s', $pagelinksDate);
					$pagelinksID = $page->ID; $pagelinksTitle = $page->post_title; $pagelinksContent = $page->post_content;
					$pagelinksContent = str_replace($keyword,'<a href="'. $linksprimary .'" class="global-links" onclick="clixplit_clicks_update(this,this.text)">' . $keyword . '</a>', $pagelinksContent);
					$pagelinkspage = array(
						'ID' => $pagelinksID,
						'post_title' => $pagelinksTitle,
						'post_content' => $pagelinksContent,
						'post_status' => 'publish',
						'post_date' => $pagelinksDates['post_date'],
						'post_date_gmt' => $pagelinksDates['post_date_gmt']
						);
					wp_update_post($pagelinkspage);
				}
			}
		}

		$index_content = file_get_contents(get_home_url());
		$index_cleaned = strip_tags($index_content);
		$content_output .= trim($index_cleaned);
		$keyword_instance = trim($keyword);
		$keyword_instance = str_replace(' ', '',$keyword_instance);
		$content_output = str_replace(' ', '',$content_output);
		$instances = substr_count(strtoupper($content_output), strtoupper($keyword_instance));
		
		
		if ($update_check == 'update') {
			$wpdb->update($table_name, array(
				'created' => current_time('mysql'),
				'keyword' => $keyword,
				'instances' => $instances,
				'globalopt' => $globalopt,
				'active' => 1
				), array('page_post_id' => $page_post_id, 'input_id' => '', 'keyword' => $keyword));
		} else { 
			if (($update_check == "") && ($primary[0] != "" || $secondary[0] != "")) {
				$wpdb->insert($table_name, array(
					'created' => current_time('mysql'),
					'keyword' => $keyword,
					'instances' => $instances,
					'globalopt' => $globalopt,
					'active' => 1
					));
			}
		}
	}
}



?>