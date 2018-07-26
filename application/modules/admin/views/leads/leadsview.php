
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
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Client Name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['client_name']; ?></div>
									<label class="col-md-2"> Primary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['primary_phone']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Secondary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['secondarys_phone']; ?></div>
									<label class="col-md-2"> E-mail: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['email']; ?></div>
								</div>
								
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Date of Trip: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['date_of_trip']; ?></div>
									<label class="col-md-2"> Time of Trip: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['time_of_trip']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Package Name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['package_name']; ?></div>
									<label class="col-md-2"> No of pax: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['no_of_pax']; ?></div>
									</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Website </label>
									<div class="col-md-4"><?php echo '<a href="'.$ljp_Data[0]['web_url'].'" onclick="return !window.open(this.href)">'.$ljp_Data[0]['web_name'].'</a>'; ?></div>
									<label class="col-md-2"> Created Date: </label>
									<div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['created_at'])); ?></div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/leads/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>