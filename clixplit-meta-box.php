<?php 

?>

<div class="box-wrap"> 
	<div class="container mb-container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<a href="#"><img class="img-responsive center-block" src="<?php echo plugins_url('/img/clixplit-icon-color25px.svg', __FILE__); ?>"></a>
			</div>
		</div>
	</div>
</div>
<div class="mymodal">
	<div class="container-fluid clixplit-panel-2 mymodal-box">
		<div class="row">
			<div class="col-xs-12">
				<form id="modal-form-meta-box" role="form" autocomplete="off">
					<div class="col-xs-12 vertical-space text-center">
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="control-group" id="primary-url">
							<label class="control-label" for="primary-url-controls">input primary url (new page/tab)</label>
							<div id="primary-url-controls" class="controls">
								<div class="entry input-group col-xs-12 bottom-form-space">
									<input type="text" class="form-control url-input" name="primary[]" placeholder="url...">
									<span class="input-group-btn">
										<button class="btn btn-success btn-add clixplit-primary-add" type="button"><span class="glyphicon glyphicon-plus"></span></button></span>
									</div>
								</div>
							</div>
							<div class="vertical-space">
								<label id="primary-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="clixplit-switch-text-off">off</span>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="control-group" id="secondary-url">
								<label class="control-label" for="secondary-url-controls">input secondary url (page redirect)</label>
								<div id="secondary-url-controls" class="controls">
									<div class="entry input-group col-xs-12 bottom-form-space">
										<input type="text" class="form-control url-input" name="secondary[]" placeholder="url...">
										<span class="input-group-btn">
											<button class="btn btn-success btn-add clixplit-secondary-add" type="button"><span class="glyphicon glyphicon-plus"></span></button></span>
										</div>
									</div>
								</div>
								<div class="vertical-space">
									<label id="secondary-url-switch" class="clixplit-labels">link rotation:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="clixplit-switch-text-off">off</span>
								</div>
							</div>
							<div class="col-xs-12 text-center">
								<div class="hr-width"><hr /></div>
								<label id="mobile-switch" class="clixplit-labels">enable for mobile:</label><span class="clixplit-switch-off"><span class="clixplit-switch-center-off"></span></span><span class="clixplit-switch-text-off">off</span>
								<div class="hr-width"><hr /></div>
							</div>
							<div class="col-xs-12 text-center vertical-space">
								<button type="button" class="btn btn-default clixplit-save-btn">save</button>
								<button type="button" class="btn btn-default clixplit-cancel-btn">cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

