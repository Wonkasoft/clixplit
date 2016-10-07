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
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 text-center bottom-space">
				<div class="col-xs-12">
					<ul class="nav-menu">
						<li class="nav-item">
							<a class="nav-buttons current" href="?page=clixplit/clixplit-home.php"><span class="nav-text">home</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-buttons" href="?page=clixplit/clixplit-tutorials.php"><span class="nav-text">tutorials</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-buttons" href="?page=clixplit/clixplit-global-campaigns.php"><span class="nav-text">global campaigns</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-buttons" href="?page=clixplit/clixplit-resources.php"><span class="nav-text">resources</span></a>
						</li>
					</ul>                
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid clixplit-panel">
		<div class="row">
			<div class="col-xs-12 text-center">
				<div class="col-xs-12 col-md-4 vertical-space">
					<?php include('rss_class.php');
					$feed_url = 'http://clixplit.com/feed/';
					$category_pass = 'Updates';
					$feedlist_Updates = new rss($feed_url, $category_pass);
					echo $feedlist_Updates->display(6,"Updates From Clixplit"); ?>
				</div>
				<div class="col-xs-12 col-md-4 vertical-space">
					<?php
					$feed_url = 'http://clixplit.com/feed/';
					$category_pass = 'News';
					$feedlist_News = new rss($feed_url, $category_pass);
					echo $feedlist_News->display(6,"News From Clixplit"); ?>
				</div>
				<div class="col-xs-12 col-md-4 vertical-space">
					<?php
					$feed_url = 'http://clixplit.com/feed/';
					$category_pass = 'New Products';
					$feedlist_Products = new rss($feed_url, $category_pass);
					echo $feedlist_Products->display(6,"New Software Products"); ?>
				</div>
			</div>
		</div>
	</div>
</div> <!-- end content-wrap -->