
		<section class="content">
			<input type="hidden" name="page" id="page" value="leads" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Lead Details</h2>
							</div>
							<div class="body">
								<div class="form-group">
									<label class="col-md-2"> Client Name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['contact_name']; ?></div>
									<label class="col-md-2"> Contact Name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['decision_maker_name']; ?></div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Industry: </label>									
									<div class="col-md-4"><?php echo $ljp_Data[0]['cat_id']; ?></div>
									<label class="col-md-2"> Type: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['prospect_type']; ?></div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Primary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['phone_1']; ?></div>
									<label class="col-md-2"> Primary E-mail: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['email_1']; ?></div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Secondary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['phone_2']; ?></div>
									<label class="col-md-2"> Secondary E-mail: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['email_2']; ?></div>
								</div>								
								<div class="form-group">
									<label class="col-md-2"> Department: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['department']; ?></div>
									<label class="col-md-2"> Fax: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['fax']; ?></div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Job Title: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['job_title']; ?></div>
									<label class="col-md-2"> Address: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['address']; ?></div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Skype Id: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['skype_id']; ?></div>
									<label class="col-md-2"> Twitter: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['twitter']; ?></div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Linkedin: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['linkedin']; ?></div>
									<label class="col-md-2"> Website: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['website']; ?></div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('sales/leads/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>