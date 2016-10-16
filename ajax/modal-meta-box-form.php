<?php
if (isset($_POST['selected-text'])) {

	if (!empty($_POST['selected-text'])) {
		$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
					require_once( $file_path . 'wp-load.php' );
					global $wpdb;
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



?>