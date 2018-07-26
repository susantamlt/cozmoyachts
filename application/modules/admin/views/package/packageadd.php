<section class="content">
			<input type="hidden" name="page" id="page" value="packages" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add packages</h2>
								<div id="massage"></div>
							</div>
							<div class="body">
								<?php echo form_open_multipart('admin/packages/packages_save', array('id' =>'packages_form','name'=>'packages_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> Website name:<span class="mandatory">*</span></label>
										<div class="col-md-4">
                                        <?php echo form_dropdown('web_id',$ljp_website,'','class="form-control" id="web_id"') ?>
											<label id="web_id-error" class="error" for="web_id"></label>
										</div>
										<label class="col-md-2"> Package Name:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="package_name" id="package_name" class="form-control" value="" placeholder="Package name" />
											<label id="package_name-error" class="error" for="package_name"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Status:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<select name="pak_status" id="pak_status" class="form-control">
												<option value="">--Select One--</option>
												<option value="0">No</option>
												<option value="1">Yes</option>
											</select> 
											<label id="pak_status-error" class="error" for="pak_status"></label>
										</div>
										<label class="col-md-2"> Water sports: <span class="mandatory">*</span> </label>
										<div class="col-md-4">
                                        <?php echo form_dropdown('water_sports',$ljp_watersports,'','class="form-control" id="water_sports" multiple="multiple') ?>
											<label id="water_sports-error" class="error" for="water_sports"></label>
										</div>										
									</div>
									<div class="form-group">
										<label class="col-md-2"> Inclusion: <span class="mandatory">*</span> </label>
										<div class="col-md-4">
                                        <?php echo form_dropdown('inclusion',$ljp_inclusions,'','class="form-control" id="inclusion" multiple="multiple') ?>
											<label id="inclusion-error" class="error" for="inclusion"></label>
										</div>
										<label class="col-md-2"> Price:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="price" id="price" class="form-control" value="" placeholder="Price / Hours" />
											<label id="price-error" class="error" for="price"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> No of Pax: <span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="no_pax" id="no_pax" class="form-control" value="" placeholder="No of Pax" />
											<label id="no_pax-error" class="error" for="no_pax"></label>
										</div>
										<label class="col-md-2"> Yacht Size:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="yacht_size" id="yacht_size" class="form-control" value="" placeholder="Yacht Size" />
											<label id="yacht_size-error" class="error" for="yacht_size"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Cabins:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="cabins" id="cabins" class="form-control" value="" placeholder="Cabins" />
											<label id="cabins-error" class="error" for="cabins"></label>
										</div>
										<label class="col-md-2">Yacht Hour/Fixed:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<select name="yacht_hour_fixed" id="yacht_hour_fixed" class="form-control">
												<option value="">--Select One--</option>
												<option value="H">Hour basis</option>
												<option value="F">Fixed</option>
											</select> 
											<label id="yacht_hour_fixed-error" class="error" for="yacht_hour_fixed"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12"> Package details:<span class="mandatory">*</span> </label>
										<div class="col-md-12">
											<textarea name="yacht_details" id="yacht_details" class="form-control" placeholder="Yacht details" required></textarea>
											<label id="yacht_details-error" class="error" for="yacht_details"></label>
										</div>
									</div>
                                    <div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="type" id="type" value="Package">
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
                        },
                        inclusion: {
							required: true,
						},
						water_sports:{
                            required: true,
                        },
						price: {
							required: true,
							regex:/^\d+\.\d{0,2}$/,
						},
						pak_status: {
							required: true,
						},
						no_pax: {
							required: true,
							regex:/^[0-9]*$/,
						},
						yacht_size: {
							required: true,
							regex:/^\d+\.\d{0,2}$/,
						},
						cabins: {
							required: true,
						},
						yacht_details: {
							required: true,
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
						},
						price: {
							required:  "Please enter price",
							regex: "Only integer and two decimal point number is accepted"
						},
						pak_status: {
							required: "Please select pak status",
						},
						no_pax: {
							required: "Please enter no of Pax",
							regex: "only accept numerical values",
						},
						yacht_size: {
							required: "Please enter yacht size",
							regex:"Only accept decimal value",
						},
						cabins: {
							required: "Please enter cabins",
						},
						yacht_details: {
							required:  "Please enter yacht details",
						},
						yacht_hour_fixed: {
							required:  "Please select yacht hour or fixed ",
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
						formData.append('pak_status', $('#pak_status').val());
						formData.append('price', $('#price').val());
						formData.append('no_pax', $('#no_pax').val());
						formData.append('yacht_per_h_f', $('#yacht_hour_fixed').val());
						formData.append('yacht_size', $('#yacht_size').val());
						formData.append('cabins', $('#cabins').val());
						formData.append('type', $('#type').val());
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