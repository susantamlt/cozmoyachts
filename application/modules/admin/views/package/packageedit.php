<section class="content">
			<input type="hidden" name="page" id="page" value="packages" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Edit packages</h2>
								<div id="massage"></div>
							</div>
							<div class="body">
								<?php echo form_open_multipart('admin/packages/packages_save', array('id' =>'packages_form','name'=>'packages_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> Website name </label>
										<div class="col-md-4">
                                       <?php echo form_dropdown('web_id',$ljp_website,$ljp_Data[0]['web_id'],'class="form-control" id="web_id"') ?>
											<label id="web_id-error" class="error" for="web_id"></label>
										</div>
										<label class="col-md-2"> Package Name: </label>
										<div class="col-md-4">
											<input type="text" name="package_name" id="package_name" class="form-control" value="<?php echo $ljp_Data[0]['package_name']; ?>" placeholder="Package name" />
											<label id="package_name-error" class="error" for="package_name"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Status: </label>
										<div class="col-md-4">
											<select name="pak_status" id="pak_status" class="form-control">
												<option value="" <?php if($ljp_Data[0]['pak_status']==''){ echo 'selected="selected"'; } ?>>--Select One--</option>
												<option value="0" <?php if($ljp_Data[0]['pak_status']==0){ echo 'selected="selected"'; } ?>>No</option>
												<option value="1" <?php if($ljp_Data[0]['pak_status']==1){ echo 'selected="selected"'; } ?>>Yes</option>
											</select> 
											<label id="pak_status-error" class="error" for="pak_status"></label>
										</div>					
										<label class="col-md-2"> Water Sports: </label>
										<div class="col-md-4">
											<?php $war=explode(',', $ljp_Data[0]['water_sports']);
											echo form_dropdown('water_sports',$ljp_watersports,$war,'class="form-control" id="water_sports" multiple') ?>
                                        	<label id="water_sports-error" class="error" for="water_sports"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Inclusion: </label>
										<div class="col-md-4">
											<?php $inc=explode(',', $ljp_Data[0]['inclusion']);
											echo form_dropdown('inclusion',$ljp_inclusions,$inc,'class="form-control" id="inclusion" multiple') ?>
											<label id="inclusion-error" class="error" for="inclusion"></label>
										</div>
										<label class="col-md-2"> Price: </label>
										<div class="col-md-4">
											<input type="text" name="price" id="price" class="form-control" value="<?php echo $ljp_Data[0]['price']; ?>" placeholder="price" />
											<label id="price-error" class="error" for="price"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> No of Pax: </label>
										<div class="col-md-4">
											<input type="text" name="no_pax" id="no_pax" class="form-control" value="<?php echo $ljp_Data[0]['no_pax']; ?>" placeholder="No of Pax" />
											<label id="no_pax-error" class="error" for="no_pax"></label>
										</div>
										<label class="col-md-2"> Yacht Size: </label>
										<div class="col-md-4">
											<input type="text" name="yacht_size" id="yacht_size" class="form-control" value="<?php echo $ljp_Data[0]['yacht_size']; ?>" placeholder="Yacht Size" />
											<label id="yacht_size-error" class="error" for="yacht_size"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Cabins: </label>
										<div class="col-md-4">
											<input type="text" name="cabins" id="cabins" class="form-control" value="<?php echo $ljp_Data[0]['cabins']; ?>" placeholder="Cabins" />
											<label id="cabins-error" class="error" for="cabins"></label>
											</div>
										<label class="col-md-2">Yacht Hour/Fixed:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<select name="yacht_hour_fixed" id="yacht_hour_fixed" class="form-control">
												<option value="">--Select One--</option>
												<option value="H" <?php if($ljp_Data[0]['yacht_per_h_f']=='H'){ echo 'selected="selected"'; } ?>>Hour basis</option>
												<option value="F" <?php if($ljp_Data[0]['yacht_per_h_f']=='F'){ echo 'selected="selected"'; } ?>>Fixed</option>
											</select> 
											<label id="yacht_hour_fixed-error" class="error" for="yacht_hour_fixed"></label>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-md-12"> Package Details: </label>
										<div class="col-md-12">
											<textarea name="yacht_details" id="yacht_details" class="form-control"><?php echo $ljp_Data[0]['yacht_details']; ?></textarea>
											<label id="yacht_details-error" class="error" for="yacht_details"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="pak_id" id="pak_id" value="<?php echo $ljp_Data[0]['pak_id']; ?>">
											<input type="hidden" name="type" id="type" value="<?php echo $ljp_Data[0]['type']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/packages/') ?>" class="btn btn-default">Cancel</a>
										</div>
									</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			$(function() {
				$.validator.addMethod("regex",function(value, element, regexp) {
					if (regexp.constructor != RegExp)
						regexp = new RegExp(regexp);
					else if (regexp.global)
						regexp.lastIndex = 0;
					return this.optional(element) || regexp.test(value);
				},"Please check your input.");
				$("form[name='packages_form']").validate({
					rules: {
						web_id: {
							required: true,
                        },
						package_name: {
							required: true,	
                            regex:/^[a-zA-Z0-9 ]*$/,					
						},
                        inclusion: {
							required: true,
						},
						water_sports:{
                            required: true,
                        },
						yacht_details: {
							required: true,
						},
						price: {
							required: true,
							regex:/^\d+\.\d{0,2}$/,
						},
						yacht_hour_fixed: {
							required:  true,
						},
					},
					messages: {
						web_id: {
							required: "Please select website name",
                        },
                        inclusion: {
							required: "Please select inclusion name",
						},
						water_sports:{
                            required: "Please select a water sports .",
                        },
						address: {
							required: "Please enter a email address.",
						},
						package_name: {
							required:  "Please enter package name",	
							regex: "Special characters and numeric not allowed"
						},
						yacht_details: {
							required:  "Please enter yacht details",
						},
						price: {
							required:  "Please enter price",
							regex: "Only integer and two decimal point number is accepted"
						},
						yacht_hour_fixed: {
							required:  "Please select yacht hour or fixed",
						},
                      },
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var yacht_details = CKEDITOR.instances.yacht_details.getData();
						var formData = new FormData();
						formData.append('web_id', $('#web_id').val());
						formData.append('package_name', $('#package_name').val());
						formData.append('yacht_details',yacht_details);
						formData.append('inclusion', $('#inclusion').val());
						formData.append('water_sports', $('#water_sports').val());
						formData.append('price', $('#price').val());
						formData.append('no_pax', $('#no_pax').val());
						formData.append('yacht_size', $('#yacht_size').val());
						formData.append('cabins', $('#cabins').val());
						formData.append('yacht_per_h_f', $('#yacht_hour_fixed').val());
						formData.append('pak_status', $('#pak_status').val());
						formData.append('type', $('#type').val());
						formData.append('pak_id', $('#pak_id').val());
						$.ajax({
							url: form.action,
							type: form.method,
							async:false,
							cache:false,
							contentType:false,
							enctype:'multipart/form-data',
							processData:false,
							data: formData,
							success: function(res) {
								var resD = $.parseJSON(res);
								if(resD.status=='1'){
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> '+resD.msg+'.</div>';
									$('#massage').html(html);
									$("html, body").animate({ scrollTop: 0 }, "fast");
									window.setTimeout(function () {
										location.href = "<?php echo site_url('admin/packages') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> '+resD.msg+'.</div>';
									$('#massage').html(html);
									$("html, body").animate({ scrollTop: 0 }, "fast");
								}
							}
						});
					}
				});
			});
			$(document).on('change','#cat_id',function(){
				var cat_id = $(this).val();
				var formData = new FormData();
				formData.append('cat_id', cat_id);
				if(cat_id!=''){
					$.ajax({
						url: "<?php echo base_url('admin/packages/indtype'); ?>",
						type: "POST",
						async:false,
						cache:false,
						contentType:false,
						enctype:'multipart/form-data',
						processData:false,
						data: formData,
						success: function(res) {
							var resD = $.parseJSON(res);
							var htmlSelect = '<option value="">--Select One--</option>';
							if(resD.status=='1'){
								$.each(resD.indtype, function(k, v) {
									if(k!=''){
										htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
									}
								});
							}
							$("#type_id").html(htmlSelect);
						}
					});
				}
			});
		</script>
		<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
		<script type="text/javascript">
			CKEDITOR.replace( 'yacht_details' );
		</script>