<?php

if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
}
?>

<div class="content-wrap">
  <div class="container">
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4 vertical-space">
        <img class="img-responsive" src="<?php echo plugins_url( '/img/clixplit-logo.png', __FILE__ ) ?>" />
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
  <div class="col-xs-12 text-center bottom-space">
              <div class="col-xs-12">
                <ul class="nav-menu">
                  <li class="nav-item">
                      <a class="nav-buttons" href="?page=clixplit/clixplit-home.php">home</a>
                  </li>
                  <li class="nav-item current">
                      <a class="nav-buttons" href="?page=clixplit/clixplit-tutorials.php">tutorials</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-buttons" href="?page=clixplit/clixplit-global-campaigns.php">global campaigns</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-buttons" href="?page=clixplit/clixplit-resources.php">resources</a>
                  </li>
                </ul>
              </div>
      </div>
    </div>
  </div>
  <div class="container-fluid clixplit-panel">
    <div class="row">
      <div class="col-xs-12  text-center">
      </div>
    </div>
  </div>

</div> <!-- end content-wrap -->

<?php

?>