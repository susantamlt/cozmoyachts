<section class="content">
			<input type="hidden" name="page" id="page" value="todo" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>todo Details</h2>
							</div>
							<div class="body">
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Notification Date: </label>
									<div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['notification_date'])); ?></div>
									<label class="col-md-2"> Todo Time: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['todo_time']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Create Date: </label>
									<div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_Data[0]['create_date'])); ?></div>
									<label class="col-md-2"> Message: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['msg']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/todos/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>