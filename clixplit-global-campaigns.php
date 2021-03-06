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
							<a class="nav-campaign-buttons" name="add-campaign" href="#">+ New Global Campaign</a>
						</li>
						<li class="campaign-item">
							<a class="nav-campaign-buttons" name="end-campaign" href="#">- End Campaign</a>
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
							<tbody id="global-table">
							</tbody>
						</table>
						<input type="hidden" name="directory" value="<?php echo plugins_url('ajax/ajax-table.php', __FILE__); ?>">
					</div>
				</div>
				<div class="col-xs-12 text-center">
					<span id="global-submission"></span>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end content-wrap -->

<div class="mymodal">
	<div class="container-fluid clixplit-panel-2 mymodal-box">
		<div class="row">
			<div class="col-xs-12">
				<form id="modal-form-campaigns" method="POST" action="<?php echo plugins_url("/ajax/ajax-form.php", __FILE__); ?>" role="form" autocomplete="off">
					<div class="row">
						<div class="col-xs-12 vertical-space text-center">
							<label>Global Campaign Editor</label>
						</div>
					</div>

					<div class="row clixplit-flex">
						<div class="col-xs-12 col-md-6">
							<input type="hidden" name="activepost" value="<?php echo get_the_ID(); ?>">
							<div class="form-group">
								<label for="keyword-input">input desired keyword</label>
								<input type="text" class="form-control" name="keyword-input" id="keyword-input" placeholder="Keyword...">
							</div>
						</div>

						<div class="col-xs-6 text-center vertical-middle">
							<div class="col-xs-6">
								<label id="posts-switch" class="clixplit-labels">posts:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span id="post-switch" class="clixplit-switch-text-off">off</span>
								<input type="hidden" name="post-value">
							</div>

							<div class="col-xs-6">
								<label id="pages-switch" class="clixplit-labels">pages:</label><span class="clixplit-switch-on"><span class="clixplit-switch-center-on"></span></span><span id="page-switch" class="clixplit-switch-text-on">on</span>
								<input type="hidden" name="page-value">
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
									<input type="button" class="btn btn-default clixplit-save-btn" value="save" name="global">
									<button type="button" class="btn btn-default clixplit-cancel-btn">cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
			
		?>		
