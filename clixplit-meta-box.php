<?php 

?>

<div class="box-wrap"> 
	<div class="container mb-container">
		<div class="row">
			<form></form>
			<form id="form-meta-box" role="form1" autocomplete="off">
				<div class="col-xs-12">
					<div class="col-xs-12 vertical-space text-center">
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="control-group" id="mouseover-url">
						<div class="bottom-space">
								<label id="mouseover-url-label" class="clixplit-labels">mosueover redirect:</label><span class="clixplit-primary-switch-off"><span class="clixplit-primary-switch-center-off"></span></span><span class="clixplit-primary-switch-text-off">off</span>
							</div>
							<div id="mouseover-url-controls" class="controls">
								<div class="entry input-group col-xs-12 bottom-form-space">
									<input type="text" class="form-control url-input" name="mouseoverurl[]" placeholder="url...">
									<span class="input-group-btn">
										<button class="btn btn-add clixplit-primary-add" type="button" disabled="true"><span class="glyphicon glyphicon-plus"></span></button></span>
									</div>
								</div>
							</div>
							<div class="vertical-space">
								<label id="mouseover-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-primary-switch-off"><span class="clixplit-primary-switch-center-off"></span></span><span class="clixplit-primary-switch-text-off">off</span>
							</div>
						</div>
						<div class="col-xs-12 col-md-4 side-borders">
						<div class="control-group" id="exit-redirect">
						<div class="bottom-space">
						<label id="exit-redirect-switch" class="clixplit-labels">exit pop redirect:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="clixplit-switch-text-off">off</span>
						</div>
						<div id="exit-redirect-controls" class="controls">
							<div class="entry input-group col-xs-12 bottom-form-space">
							<input type="text" class="form-control url-input" name="exit-pop[]" placeholder="url...">
							</div>
							<div class="entry input-group col-xs-12 bottom-form-space">
							 <textarea class="form-control" rows="5" id="exit-redirect-alert" placeholder="Enter alert message..."></textarea>
							 </div>
						</div>
						</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="control-group" id="secondary-url">
							<div class="bottom-space">
								<label id="secondary-url-label" class="clixplit-labels">page / post title secondary url:</label><span class="clixplit-secondary-switch-off"><span class="clixplit-secondary-switch-center-off"></span></span><span class="clixplit-secondary-switch-text-off">off</span>
								</div>
								<div id="secondary-url-controls" class="controls">
									<div class="entry input-group col-xs-12 bottom-form-space">
										<input type="text" class="form-control url-input" name="secondary[]" placeholder="url...">
										<span class="input-group-btn">
											<button class="btn btn-add clixplit-secondary-add" type="button" disabled="true"><span class="glyphicon glyphicon-plus"></span></button></span>
										</div>
									</div>
								</div>
								<div class="vertical-space">
									<label id="secondary-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-secondary-switch-off"><span class="clixplit-secondary-switch-center-off"></span></span><span class="clixplit-secondary-switch-text-off">off</span>
								</div>
							</div>
							<div class="col-xs-12 text-center vertical-space">
								<input type="submit" class="btn btn-default clixplit-save-btn" value="save">
								<button type="button" class="btn btn-default clixplit-cancel-btn">cancel</button>
							</div>
						</div>
					</form>
				</div>

				<!-- page-level clixplit stats -->
				<div class="row">
					<div class="col-xs-12">
					<div class="col-xs-12 clixplit-meta-box-title">
						page-level cliXplit stats
					</div>
					<div class="col-xs-12">
					<div class="table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th></th>
									<th>Keyword</th>
									<th>Created</th>
									<th>Tot | Unq</th>
									<th>Global</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>Secure Payment Via PayPal</td>
									<td>2015-11-13 13:05:16</td>
									<td>25 | 20</td>
									<td>Y</td>
								</tr>
							</tbody>
						</table>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End of page redirect feature -->


		<!-- Modal Code for mce button toolbar -->
		<div class="mymodal">
			<div class="container-fluid clixplit-panel-2 mymodal-box">
				<div class="row">
					<form id="modal-form-meta-box-modal" role="form2" autocomplete="off">
						<div class="col-xs-12">
							<div class="col-xs-12 vertical-space text-center">
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="control-group" id="modal-primary-url">
									<label class="control-label" for="modal-primary-url-controls">input primary url (new page/tab)</label>
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
									<div class="control-group" id="modal-secondary-url">
										<label class="control-label" for="modal-secondary-url-controls">input secondary url (page redirect)</label>
										<div id="modal-secondary-url-controls" class="controls">
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
									<div class="col-xs-12 text-center">
										<div class="hr-width"><hr /></div>
										<label id="mobile-switch" class="clixplit-labels">enable for mobile:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="clixplit-switch-text-off">off</span>
										<div class="hr-width"><hr /></div>
									</div>
									<div class="col-xs-12 text-center vertical-space">
										<input type="submit" class="btn btn-default clixplit-save-btn" value="save">
										<button type="button" class="btn btn-default clixplit-cancel-btn">cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

