
		<section class="content">
			<input type="hidden" name="page" id="page" value="leads" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Lead</h2>
							</div>
							<div class="body">
								<?php echo form_open_multipart('sales/leads/leads_save', array('id' =>'leads_form','name'=>'leads_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> Client Name </label>
										<div class="col-md-4">
											<input type="text" name="contact_name" id="contact_name" class="form-control" value="" placeholder="Client Name" />
											<label id="contact_name-error" class="error" for="contact_name"></label>
										</div>
										<label class="col-md-2"> Contact Name </label>
										<div class="col-md-4">
											<input type="text" name="decision_maker_name" id="decision_maker_name" class="form-control" value="" placeholder="Contact Name" />
											<label id="decision_maker_name-error" class="error" for="decision_maker_name"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Lead Type </label>
										<div class="col-md-10">
											<?php $count = 12/count($ljp_leadcat);
											foreach ($ljp_leadcat as $lk => $lv) { ?>
												<label class="col-md-<?php echo $count ?>"><input type="checkbox" name="cat_id[]" class="catCheckbox" id="cat_id-<?php echo $lk; ?>" value="<?php echo $lk; ?>" style="position: relative;opacity: 1;left: 0;" />&nbsp;<?php echo $lv; ?></label>
											<?php } ?>
											<label id="cat_id[]-error" class="error" for="cat_id[]"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Primary Phone </label>
										<div class="col-md-4">
											<input type="text" name="phone_1" id="phone_1" class="form-control" value="" placeholder="Phone One" />
											<label id="phone_1-error" class="error" for="phone_1"></label>
										</div>
										<label class="col-md-2"> Primary E-mail </label>
										<div class="col-md-4">
											<input type="text" name="email_1" id="email_1" class="form-control" value="" placeholder="E-mail One" />
											<label id="email_1-error" class="error" for="email_1"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Secondary Phone </label>
										<div class="col-md-4">
											<input type="text" name="phone_2" id="phone_2" class="form-control" value="" placeholder="Phone Two" />
											<label id="phone_2-error" class="error" for="phone_2"></label>
										</div>
										<label class="col-md-2"> Secondary E-mail </label>
										<div class="col-md-4">
											<input type="text" name="email_2" id="email_2" class="form-control" value="" placeholder="E-mail Two" />
											<label id="email_2-error" class="error" for="email_2"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Department </label>
										<div class="col-md-4">
											<input type="text" name="department" id="department" class="form-control" value="" placeholder="Department" />
											<label id="department-error" class="error" for="department"></label>
										</div>
										<label class="col-md-2"> Fax </label>
										<div class="col-md-4">
											<input type="text" name="fax" id="fax" class="form-control" value="" placeholder="Fax" />
											<label id="email_2-error" class="error" for="email_2"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Job Title </label>
										<div class="col-md-4">
											<input type="text" name="job_title" id="job_title" class="form-control" value="" placeholder="Job Title" />
											<label id="job_title-error" class="error" for="job_title"></label>
										</div>
										<label class="col-md-2"> Address </label>
										<div class="col-md-4">
											<textarea name="address" id="address" class="form-control" placeholder="street no, city, state, country, zip/postcode"></textarea>
											<label id="address-error" class="error" for="address"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Skype Id </label>
										<div class="col-md-4">
											<input type="text" name="skype_id" id="skype_id" class="form-control" value="" placeholder="Skype Id" />
											<label id="skype_id-error" class="error" for="skype_id"></label>
										</div>
										<label class="col-md-2"> Twitter </label>
										<div class="col-md-4">
											<input type="text" name="twitter" id="twitter" class="form-control" value="" placeholder="Twitter" />
											<label id="twitter-error" class="error" for="twitter"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Linkedin </label>
										<div class="col-md-4">
											<input type="text" name="linkedin" id="linkedin" class="form-control" value="" placeholder="Linkedin" />
											<label id="linkedin-error" class="error" for="linkedin"></label>
										</div>
										<label class="col-md-2"> Website </label>
										<div class="col-md-4">
											<input type="text" name="website" id="website" class="form-control" value="" placeholder="Website Url" />
											<label id="website-error" class="error" for="website"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('sales/leads/') ?>" class="btn btn-default">Cancel</a>
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
				$("form[name='leads_form']").validate({
					rules: {
						contact_name: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},
						decision_maker_name: {
							regex:/^[a-zA-Z ]*$/,
						},
						phone_1: {
							required: true,
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						"cat_id[]": {
							required: true,
						},
						phone_2: {
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						email_1: {
							required: true,
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
						}, 
						email_2: {
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
						},      
					},
					messages: {
						contact_name: {
							required: "Please enter name",
							regex: "Special character and Number not allowed"
						},
						decision_maker_name: {
							regex: "Special character and Number not allowed"
						},
						phone_1: {
							required: "Please enter a phone number.",
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						phone_2: {
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						email_1: {
							required: "Please enter a email address.",
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						}, 
						email_2: {
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						}, 
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var catIdNew = '';
						$("input.catCheckbox[type=checkbox]:checked").each(function() {
							if(catIdNew!=''){
								catIdNew = catIdNew+','+$(this).val();
							} else {
								catIdNew = $(this).val();
							}
						});
						var formData = new FormData();
						formData.append('contact_name', $('#contact_name').val());
						formData.append('decision_maker_name', $('#decision_maker_name').val());
						formData.append('phone_1', $('#phone_1').val());
						formData.append('phone_2', $('#phone_2').val());
						formData.append('email_1', $('#email_1').val());
						formData.append('email_2', $('#email_2').val());
						formData.append('department', $('#department').val());
						formData.append('fax', $('#fax').val());
						formData.append('job_title', $('#job_title').val());
						formData.append('address', $('#address').val());
						formData.append('skype_id', $('#skype_id').val());
						formData.append('twitter', $('#twitter').val());
						formData.append('linkedin', $('#linkedin').val());
						formData.append('website', $('#website').val());
						formData.append('cat_id', catIdNew);
						formData.append('user_id', $('#user_id').val());
						formData.append('org_id', $('#org_id').val());
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
									window.setTimeout(function () {
										location.href = "<?php echo site_url('sales/leads') ?>";
									}, 5000);
								} else { 
									$('.error_msg').show();
									$('.error_msg').html(res.message);
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
						url: "<?php echo base_url('sales/leads/indtype'); ?>",
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