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
							<a class="nav-buttons" href="?page=clixplit/clixplit-home.php"><span class="nav-text">home</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-buttons" href="?page=clixplit/clixplit-tutorials.php"><span class="nav-text">tutorials</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-buttons" href="?page=clixplit/clixplit-global-campaigns.php"><span class="nav-text">global campaigns</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-buttons current" href="?page=clixplit/clixplit-resources.php"><span class="nav-text">resources</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid clixplit-panel">
		<div class="row">
			<div class="col-xs-12 vertical-space">
				<div class="col-xs-12 col-md-4">
					<div class="text-center">
					<label class="clixplit-tut-panel-labels">Resources & Downloads</label>
					</div>
					<div class="col-xs-12 iframe-wrap"><iframe src="http://clixplit.com/mem-resources"><p>Your Browser Does Not Support This Function</p></iframe>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="text-center">
					<label class="clixplit-tut-panel-labels">Need Help? Get Support!</label>
					</div>
					<form action="mailto:support@wonkasoft.com" method="post" enctype="text/plain">
					  <div class="form-group">
					    <label for="name-input">Name:</label>
					    <input type="text" class="form-control" id="name-input" placeholder="Full Name...">
					  </div>
					  <div class="form-group">
					    <label for="email">Email:</label>
					    <input type="email" class="form-control" id="email" placeholder="Email Address...">
					  </div>
					  <div class="form-group">
					    <label for="subject">Subject:</label>
					    <input type="text" class="form-control" id="subject" placeholder="Subject Line...">
					  </div>
					  <div class="form-group">
					    <label for="comment-support">Message:</label>
					    <textarea class="form-control" rows="5" id="comment-support" placeholder="Enter your message..."></textarea>
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="text-center">
					<label class="clixplit-tut-panel-labels">Got an Idea? Let us know!</label>
					</div>
					<form action="mailto:support@wonkasoft.com" method="post" enctype="text/plain">
					  <div class="form-group">
					    <label for="name-input">Name:</label>
					    <input type="text" class="form-control" id="name-input" placeholder="Full Name...">
					  </div>
					  <div class="form-group">
					    <label for="email">Email:</label>
					    <input type="email" class="form-control" id="email" placeholder="Email Address...">
					  </div>
					  <div class="form-group">
					    <label for="subject">Subject:</label>
					    <input type="text" class="form-control" id="subject" placeholder="Subject Line...">
					  </div>
					  <div class="form-group">
					    <label for="comment-ideas">Message:</label>
					    <textarea class="form-control" rows="5" id="comment-ideas" placeholder="Enter your message..."></textarea>
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end content-wrap -->

<?php

?>