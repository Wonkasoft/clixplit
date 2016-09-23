<?php

if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}
?>

<style type="text/css">
.head-space {
    height: 25px;
  }
</style>

<div class="content-wrap">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="head-space">
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4">
        <img class="img-responsive" src="<?php echo plugins_url( '/img/clixplit-logo.png', __FILE__ ) ?>" />
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="col-xs-3">
          <a class="nav-buttons" href="?page=clixplit/clixplit-home.php">home</a>
        </div>
        <div class="col-xs-3">
          <a class="nav-buttons" href="?page=clixplit/clixplit-tutorials.php">tutorials</a>
        </div>
        <div class="col-xs-3">
          <a class="nav-buttons" href="?page=clixplit/clixplit-global-campaigns.php">global campaigns</a>
        </div>
        <div class="col-xs-3">
          <a class="nav-buttons" href="?page=clixplit/clixplit-resources.php">resources</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      </div>
    </div>
  </div>

</div> <!-- end content-wrap -->

<?php

?>