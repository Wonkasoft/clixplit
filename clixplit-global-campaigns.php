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
	<div class="container-fluid clixplit-panel-2 mymodal-box">
		<div class="row">
			<div class="col-xs-12">
				<form id="modal-form-campaigns" method="POST" action="" role="form" autocomplete="off">
					<div class="row">
						<div class="col-xs-12 vertical-space text-center">
							<label>Global Campaign Editor</label>
						</div>
					</div>
					<div class="row clixplit-flex">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="keyword-input">input desired keyword</label>
								<input type="text" class="form-control" name="keyword-input" id="keyword-input" placeholder="Keyword...">
							</div>
						</div>
						<div class="col-xs-6 text-center vertical-middle">
							<div class="col-xs-6">
								<label id="posts-switch" class="clixplit-labels">posts:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span id="post-switch" class="clixplit-switch-text-off">off</span>
							</div>
							<div class="col-xs-6">
								<label id="pages-switch" class="clixplit-labels">pages:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span id="page-switch" class="clixplit-switch-text-off">off</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="control-group" id="modal-primary-url-campaigns">
								<label class="control-label" for="primary-url-controls">input primary url (new page/tab)</label>
								<div id="modal-primary-url-controls" class="controls">
									<div class="entry input-group col-xs-12 bottom-form-space">
										<input type="text" class="form-control url-input" name="primary[]" placeholder="url...">
										<span class="input-group-btn">
											<button class="btn btn-add clixplit-primary-add" type="button" disabled="true"><span class="glyphicon glyphicon-plus"></span></button></span>
										</div>
									</div>
								</div>
								<div class="vertical-space">
									<label id="modal-primary-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-primary-switch-off"><span class="clixplit-primary-switch-center-off"></span></span><span class="clixplit-primary-switch-text-off">off</span>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="control-group" id="modal-secondary-url-campaigns">
									<label class="control-label" for="modal-secondary-url-controls">input secondary url (page redirect)</label>
									<div id="modal-secondary-url-controls"  class="controls">
										<div class="entry input-group col-xs-12 bottom-form-space">
											<input type="text" class="form-control url-input" name="secondary[]" placeholder="url...">
											<span class="input-group-btn">
												<button class="btn btn-add clixplit-secondary-add" type="button" disabled="true"><span class="glyphicon glyphicon-plus"></span></button></span>
											</div>
										</div>
									</div>
									<div class="vertical-space">
										<label id="modal-secondary-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-secondary-switch-off"><span class="clixplit-secondary-switch-center-off"></span></span><span class="clixplit-secondary-switch-text-off">off</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 text-center">
									<div class="hr-width"><hr /></div>
									<label id="mobile-switch" class="clixplit-labels">enable for mobile:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="clixplit-switch-text-off">off</span>
									<div class="hr-width"><hr /></div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 text-center vertical-space">
									<input type="submit" class="btn btn-default clixplit-save-btn" value="save" name="save">
									<button type="button" class="btn btn-default clixplit-cancel-btn">cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
		
		if (!empty($_POST['save'])) {
			require_once( ABSPATH . 'wp-load.php' );
			global $wpdb;
			$primary_count = count($_POST['primary']);
			$secondary_count = count($_POST['secondary']);
			$primary_array = array();

			$keyword = $_POST['keyword-input'];
			$post_switch = '';
			$primary = $_POST['primary'];
			$secondary = $_POST['secondary'];
			
			for ($i=0; $i < $primary_count; $i++) { 
				if ($i == 0) {
					if ($_POST['primary'] ) {
						# code...
					}
					$primary_array = $primary[$i];
				}
				else {
					$primary_array .= ','. $primary[$i];
				}
			};	
			for ($i=0; $i < $secondary_count; $i++) { 
				if ($i == 0) {
					$secondary_array = $secondary[$i];
				}
				else {
					$secondary_array .= ','. $secondary[$i];
				}
			};
			

			$table_name = $wpdb->prefix . 'clixplit_global_campaigns';
			$wpdb->insert($table_name, array(
				'created' => current_time('mysql'),
				'keyword' => $keyword,
				'newtaburl' => $primary_array,
				'secondaryurl' => $secondary_array,
				));
		$wpdb->query($table_name, array(
			$primary_array = 'newtaburl',
			$secondary_array = 'secondaryurl'
			));
		echo $primary_array;
		echo $secondary_array;
		}

		?>

