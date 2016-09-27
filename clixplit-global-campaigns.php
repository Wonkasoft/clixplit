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
	<div class="container">
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
									<th><input class="item-checkbox" type="checkbox" value=""></th>
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
					<form>
						<div class="form-group">
							<label for="keyword-input">input desired keyword</label>
							<input type="text" class="form-control" id="keyword-input" placeholder="Keyword...">
						</div>
						<div class="form-group">
							<label for="primary-url">input primary url (new page/tab)</label>
							<input type="text" class="form-control" id="primary-url" placeholder="primary-url...">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="url-addon" placeholder="" disabled="">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="url-addon" placeholder="">
						</div>
					</form>
				</div>
				<div class="col-xs-12 col-md-6">
					<form>
						<div class="form-group">
							<label for="keyword-input">input desired keyword</label>
							<input type="text" class="form-control" id="keyword-input" placeholder="Keyword...">
						</div>
						<div class="form-group">
							<label for="primary-url">input primary url (new page/tab)</label>
							<input type="text" class="form-control" id="primary-url" placeholder="primary-url...">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="url-addon" placeholder="" disabled="">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="url-addon" placeholder="">
						</div>
					</form>
				</div>
				<div class="col-xs-12">

				</div>
				<div class="col-xs-12 text-center">

					<button type="button" class="btn btn-primary">save</button>
					<button type="button" class="btn btn-default">cancel</button>

				</div>
			</div>
		</div>
	</div>
</div>

<?php

?>