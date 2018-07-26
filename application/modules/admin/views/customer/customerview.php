<section class="content">
			<input type="hidden" name="page" id="page" value="customers" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Customers Details</h2>
							</div>
							<div class="body">
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> User name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['user_name']; ?></div>
									<label class="col-md-2"> Email: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['email']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Primary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['phone']; ?></div>
									<label class="col-md-2"> Secondary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['phone2']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Address: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['address']; ?></div>
									<label class="col-md-2"> Image: </label>
									<div class="col-md-4">
										<?php if($ljp_Data[0]['image']!=''){ ?>
											<img src="<?php echo config_item('assets_dir').'users/'.$ljp_Data[0]['image']; ?>" alt="<?php echo $ljp_Data[0]['user_name']; ?>" width="50" />
										<?php } ?>
									</div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Country code: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['country_name']; ?></div>
									<label class="col-md-2"> Birthdate: </label>
									<div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['birthdate'])); ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Type: </label>
									<?php $typearray = array('0'=>'Super Admin','1'=>'Admin','2'=>'User'); ?>
									<div class="col-md-4"><?php echo $typearray[$ljp_Data[0]['type']]; ?></div>
									<label class="col-md-2"> Website </label>
									<div class="col-md-4"><?php echo '<a href="'.$ljp_Data[0]['web_url'].'" onclick="return !window.open(this.href)">'.$ljp_Data[0]['web_name'].'</a>'; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Created at: </label>
									<div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['created_at'])); ?></div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/customers/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>