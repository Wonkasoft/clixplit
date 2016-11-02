<?php 
$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'clixplit_global_campaigns';

$url_clicked = $_POST['url'];
$unique = $_POST['uniqueclick'];
$uniqueclicks = 0;
$keyword = $_POST['keyword'];
$url_totalclicks ="";
if (isset($_POST['url'])) {
  $url_clickedrm = rtrim($url_clicked,"/");
  if ($unique == "Y") {
    $url_totalclicks = $wpdb->get_var("SELECT totalclicks FROM $table_name WHERE primaryurl LIKE '%%$url_clickedrm%%'");
    $unqclicks = $wpdb->get_var("SELECT unqclicks FROM $table_name WHERE primaryurl LIKE '%%$url_clickedrm%%'");
    if ($unqclicks !="") {
      $url_totalclicks++;
      $unqclicks++;
      $wpdb->update($table_name, array('totalclicks'=>$url_totalclicks,'unqclicks'=>$unqclicks),array('primaryurl'=>$url_clickedrm),array(),array('LIKE'=>'%s'));
    } 
  } else {
    $url_totalclicks = $wpdb->get_var("SELECT totalclicks FROM $table_name WHERE primaryurl LIKE '%%$url_clickedrm%%'");
    if ($url_totalclicks !="") {
      $url_totalclicks++;
      $wpdb->update($table_name, array('totalclicks'=>$url_totalclicks),array('primaryurl'=>$url_clickedrm),array(),array('LIKE'=>'%s'));
    }
  }
}
?>