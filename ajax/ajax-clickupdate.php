<?php 
$file_path = realpath(dirname(__FILE__). '/../../../..'). '/';
require_once( $file_path . 'wp-load.php' );
global $wpdb;
$table_name = $wpdb->prefix . 'clixplit_global_campaigns';
$table_redirect = $wpdb->prefix . 'clixplit_redirect';

if (isset($_POST['url'])) {
$url_clicked = $_POST['url'];
$unique = $_POST['uniqueclick'];
$uniqueclicks = 0;
$keyword = $_POST['keyword'];
$url_totalclicks ="";

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

  if ($url_totalclicks == "") {
    $url_totalclicks = $wpdb->get_var("SELECT totalclicks FROM $table_name WHERE secondaryurl LIKE '%%$url_clickedrm%%'");
    if ($url_totalclicks !="") {
      $url_totalclicks++;
      $wpdb->update($table_name, array('totalclicks'=>$url_totalclicks),array('secondaryurl'=>$url_clickedrm),array(),array('LIKE'=>'%s'));
    }

  }

}

// For redirect settings
if (isset($_POST['mouseoverurl']) || isset($_POST['secondaryurl'])) {
  $mouseoverurl = $_POST['mouseoverurl'];
  $secondaryurl = $_POST['secondaryurl'];
  $page_post_id = $_POST['post_id'];
  $clicks_update = 0;
  $db_fetch = $wpdb->get_results('SELECT * FROM ' . $table_redirect);
  for ($i=0; $i < count($db_fetch); $i++) {
    if ($db_fetch[$i]->mouseoverurl == $mouseoverurl) {
      $clicks_update = $db_fetch[$i]->clicks;
      $clicks_update++;
      $wpdb->update($table_redirect, array('clicks'=>$clicks_update), array('mouseoverurl'=> $mouseoverurl, 'page_post_id'=> $page_post_id));
    }
  };
}

?>