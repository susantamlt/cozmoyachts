<section class="content">
			<input type="hidden" name="page" id="page" value="packages" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Packages Details</h2>
							</div>
							<div class="body">
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Website name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['web_name']; ?></div>
									<label class="col-md-2"> Package Name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['package_name']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Inclusion name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['inclusion']; ?></div>
									<label class="col-md-2"> Water sports: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['water_sports']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Price </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['price']; ?></div>
									<label class="col-md-2"> No of Pax: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['no_pax'].'PAK'; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Yacht Size: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['yacht_size'].'ft'; ?></div>
									<label class="col-md-2"> Cabins: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['cabins']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Created at: </label>
									<div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['created_at'])); ?></div>
									<label class="col-md-2"> Yacht Hour/Fixed: </label>
									<?php $typearray = array('H'=>'Hour','F'=>'Fixed'); ?>
									<div class="col-md-4"><?php echo $typearray[$ljp_Data[0]['yacht_per_h_f']]; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-12"> Package Details: </label>
									<div class="col-md-12"><?php echo $ljp_Data[0]['yacht_details']; ?></div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/packages/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>