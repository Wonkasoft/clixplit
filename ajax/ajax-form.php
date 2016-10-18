<?php
		$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
if (isset($_POST['selected-text'])) {

	if (!empty($_POST['selected-text'])) {
					require_once( $file_path . 'wp-load.php' );
					global $wpdb;
					$page_post_id = $_POST['activepost-modal']
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
						$table_name = $wpdb->prefix . 'clixplit_global_campaigns';
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
						$table_name = $wpdb->prefix . 'clixplit_global_campaigns';
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

if ((isset($_POST['mouseoverurl'])) || (isset($_POST['exit-pop'])) || (isset($_POST['secondary-redirect']))) {
	if ((!empty($_POST['mouseoverurl'])) || (!empty($_POST['exit-pop'])) || (!empty($_POST['secondary-redirect']))) {
					require_once( $file_path . 'wp-load.php' );
					global $wpdb;
					$page_post_id = $_POST['activepost']
					$mouseoveropt = $_POST['mouseover-redirectopt'];
					$mouseover_count = count($_POST['mouseoverurl']);
					$mouseoverurl = $_POST['mouseoverurl'];
					$secondaryopt = $_POST['secondary-redirectopt'];
					$secondary_count = count($_POST['secondary-redirect']);
					$secondary_redirect = $_POST['secondary-redirect'];
					$exitredirectopt = $_POST['exit-redirectopt'];
					$exitredirecturl = $_POST['exit-pop'];
					$exitmessage = $_POST['exit-message'];

					for ($i=0; $i < $mouseover_count; $i++) { 
						$mouseover_array = $mouseoverurl[$i];
						$table_name = $wpdb->prefix . 'clixplit_redirect';
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
						$secondary_array = $secondary[$i];
						$table_name = $wpdb->prefix . 'clixplit_redirect';
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
				};
}



?>