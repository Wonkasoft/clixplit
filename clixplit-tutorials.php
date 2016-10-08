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
							<a class="nav-buttons current" href="?page=clixplit/clixplit-tutorials.php"><span class="nav-text">tutorials</span></a>
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
			<div class="col-xs-12  vertical-space">
				<div class="col-xs-12 col-md-4">
					<label class="clixplit-labels">The Basics & Functionaity</label>
					<div class="panel panel-default clixplit-tutorial-panel">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/0XbrWUFp4-w?rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<label class="clixplit-pdf-label">>> Download PDF</label>
				</div>
				<div class="col-xs-12 col-md-4">
					<label class="clixplit-labels">Hyperlink Options</label>
					<div class="panel panel-default clixplit-tutorial-panel">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/0XbrWUFp4-w?rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<label class="clixplit-pdf-label">>> Download PDF</label>
				</div>
				<div class="col-xs-12 col-md-4">
					<label class="clixplit-labels">Page / Post Options</label>
					<div class="panel panel-default clixplit-tutorial-panel">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/0XbrWUFp4-w?rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<label class="clixplit-pdf-label">>> Download PDF</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-12 col-md-4">
					<label class="clixplit-labels">Global Campaigns</label>
					<div class="panel panel-default clixplit-tutorial-panel">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/0XbrWUFp4-w?rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<label class="clixplit-pdf-label">>> Download PDF</label>
				</div>
				<div class="col-xs-12 col-md-4">
					<label class="clixplit-labels">Advanced Hyperlink Options</label>
					<div class="panel panel-default clixplit-tutorial-panel">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/0XbrWUFp4-w?rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<label class="clixplit-pdf-label">>> Download PDF</label>
				</div>
				<div class="col-xs-12 col-md-4">
					<label class="clixplit-labels">Advanced User Mastermind</label>
					<div class="panel panel-default clixplit-tutorial-panel">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/0XbrWUFp4-w?rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<label class="clixplit-pdf-label">>> Download PDF</label>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end content-wrap -->

<?php

?>