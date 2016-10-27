<?php 
  $file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
  require_once( $file_path . 'wp-load.php' );
  global $wpdb;
  $table_name = $wpdb->prefix . 'clixplit_global_campaigns';

  $url_clicked = $_POST['url'];

if (isset($url_clicked)) {
  $url_id = $wpdb->get_var('SELECT id FROM '.$table_name.' WHERE primaryurl="'.$url_clicked.'" OR secondaryurl="'.$url_clicked.'"');

  $url_totalclicks = $wpdb->get_var('SELECT totalclicks FROM '.$table_name.' WHERE id="'.$url_id.'"');
  $url_totalclicks++;

  $wpdb->update($table_name, array('totalclicks'=>$url_totalclicks),array('id'=>$url_id));
}
 

 ?>