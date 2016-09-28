<?php

if (!current_user_can('manage_options')) {
	wp_die(__('You do not have sufficient permissions to access this page.'));
}
?>

<div class="content-wrap">
	
	<div class="container logo-grad">
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
							<a class="nav-buttons current" href="?page=clixplit/clixplit-global-campaigns.php"><span class="nav-text">global campaigns</span></a>
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
			<div class="col-xs-12">
				<div class="col-xs-12">
					<ul class="new-campaigns-menu">
						<li class="campaign-item">
							<a class="nav-campaign-buttons" href="#">+ New Global Campaign</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-12">
					<div class="table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th><input id="clixplit-check-all" class="item-checkbox" type="checkbox" value=""></th>
									<th>Keyword</th>
									<th>Created</th>
									<th>#Pr | #Sc</th>
									<th>Tot | Unq</th>
									<th>Instances</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input class="item-checkbox" type="checkbox" value=""></td>
									<td>Anna</td>
									<td>Pitt</td>
									<td>35</td>
									<td>New York</td>
									<td>New York</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end content-wrap -->
<div class="mymodal">
	<div class="container-fluid clixplit-panel mymodal-box">
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-12 vertical-space text-center">
					<label>Global Campaign Editor</label>
				</div>
				<div class="col-xs-12 col-md-6">
						<div class="form-group">
							<form>
								<label for="keyword-input">input desired keyword</label>
								<input type="text" class="form-control" id="keyword-input" placeholder="Keyword...">
							</form>
						</div>
					<div class="control-group" id="primary-url">
						<label class="control-label" for="primary1">input primary url (new page/tab)</label>
						<div class="controls">
							<form id="primary-url-form" role="form" autocomplete="off">
								<div class="entry input-group col-xs-12 bottom-form-space">
									<input type="text" class="form-control url-input" name="primary[]" placeholder="url...">
									<span class="input-group-btn">
										<button class="btn btn-success btn-add clixplit-btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button></span>
									</div>
								</form>
							</div>
						</div>
						<div class="vertical-space">
							<form action="">
								<label id="primary-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="switch-position">off</span>
							</form>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="form-group empty-form-group">
							<form action="">
								<div class="col-xs-6 vertical-space">
									<label id="posts-switch" class="clixplit-labels">posts:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="switch-position">off</span>
								</div>
								<div class="col-xs-6 vertical-space">
									<label id="pages-switch" class="clixplit-labels">pages:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="switch-position">off</span>
								</div>
							</form>
						</div>
						<div class="control-group" id="secondary-url">
						<label class="control-label" for="secondary1">input secondary url (page redirect)</label>
						<div class="controls">
							<form id="secondary-url-form" role="form" autocomplete="off">
								<div class="entry input-group col-xs-12 bottom-form-space">
									<input type="text" class="form-control url-input" name="secondary[]" placeholder="url...">
									<span class="input-group-btn">
										<button class="btn btn-success btn-add clixplit-btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button></span>
									</div>
								</form>
							</div>
						</div>
							<div class="vertical-space">
								<form action="">
									<label id="secondary-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="switch-position">off</span>
								</form>
							</div>
						</div>
					</div>
					<div class="col-xs-12 text-center">
						<div class="hr-width"><hr /></div>
						<form action="">
							<label id="mobile-switch" class="clixplit-labels">enable for mobile:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="switch-position">off</span>
						</form>
						<div class="hr-width"><hr /></div>
					</div>
					<div class="col-xs-12 text-center vertical-space">

						<button type="button" class="btn btn-default clixplit-save-btn">save</button>
						<button type="button" class="btn btn-default clixplit-cancel-btn">cancel</button>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

	?>

