<section class="content">
			<input type="hidden" name="page" id="page" value="customers" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Edit customer</h2>
								<div id="massage"></div>
							</div>
							<div class="body">
								<?php echo form_open_multipart('admin/customers/customers_save', array('id' =>'costomers_form','name'=>'costomers_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> User Name<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $ljp_Data[0]['user_name']; ?>" placeholder="User name" />
											<label id="user_name-error" class="error" for="user_name"></label>
										</div>
										<label class="col-md-2">E-mail <span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="text" name="email" id="email" class="form-control" value="<?php echo $ljp_Data[0]['email']; ?>" placeholder="E-mail" />
											<label id="email-error" class="error" for="email"></label>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2"> Primary Phone: <span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $ljp_Data[0]['phone']; ?>" placeholder="Phone Number " />
											<label id="phone-error" class="error" for="phone"></label>
										</div>
										<label class="col-md-2"> Secondary Phone  </label>
										<div class="col-md-4">
											<input type="text" name="phone2" id="phone2" class="form-control" value="<?php echo $ljp_Data[0]['phone2']; ?>" placeholder="Secondary Phone " />
											<label id="phone2-error" class="error" for="phone2"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Address:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="address" id="address" class="form-control" value="<?php echo $ljp_Data[0]['address']; ?>" placeholder="Address" />
											<label id="address-error" class="error" for="address"></label>
										</div>
										<label class="col-md-2"> Country code:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
										    <?php echo form_dropdown('country_code',$ljp_country,$ljp_Data[0]['country_code'],'class="form-control" id="country_code"') ?>
											<label id="country_code-error" class="error" for="country_code"></label>
										</div>
									</div>
									<div class="form-group demo-masked-input" style="clear:both;">
										<label class="col-md-2"> Birthday:<span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="text" name="birthdate" id="birthdate" class="form-control date" value="<?php echo date('d/m/Y',strtotime($ljp_Data[0]['birthdate'])); ?>" placeholder="dd/mm/yyyy"  data-date-format="dd/mm/yyyy" />
											<label id="birthdate-error" class="error" for="birthdate"></label>
										</div>
										<label class="col-md-2"> Image </label>
										<div class="col-md-4">
											<input type="file" name="image" id="image" class="form-control" value=""  />
											<label id="image-error" class="error" for="image"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> User Type:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<select name="type" id="type" class="form-control">
												<option value="">--Select One--</option>
												<option value="0" <?php echo $ljp_Data[0]['type'] == '0' ? 'selected' : '' ?> >Super Admin</option>
												<option value="1" <?php echo $ljp_Data[0]['type'] == '1' ? 'selected' : '' ?>>Admin</option>
												<option value="2" <?php echo $ljp_Data[0]['type'] == '2' ? 'selected' : '' ?>>User</option>
											</select>
										</div>
										<label class="col-md-2"> Website: </label>
										<div class="col-md-4">
											<?php echo form_dropdown('web_id',$ljp_website,$ljp_Data[0]['web_id'],'class="form-control" id="web_id"') ?>
											<label id="web_id-error" class="error" for="web_id"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $ljp_Data[0]['user_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/customers/') ?>" class="btn btn-default">Cancel</a>
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
				$('.datepicker').datepicker({
					format: 'dd/mm/yyyy',
				});
				$.validator.addMethod("regex",function(value, element, regexp) {
					if (regexp.constructor != RegExp)
						regexp = new RegExp(regexp);
					else if (regexp.global)
						regexp.lastIndex = 0;
					return this.optional(element) || regexp.test(value);
				},"Please check your input.");
				
				$("form[name='costomers_form']").validate({
					rules: {
						user_name: {
							required: true,							
						},
						type: {
							required: true,							
						},
						phone: {
							required:true,
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						phone2: {
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						email: {
							required: true,
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
						},
						address: {
							required: true,
						},
						birthdate: {
							required: true,
						},
						web_id: {
							required: true,
						},
						image: {
							extension: "jpeg/jpg/png/gif",
						},
						country_code:{
							required: true,
						},
					},
					messages: {
						user_name: {
							required: "Please enter name",
						},						
						phone: {
							required: "Please enter a phone number.",
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						phone2: {
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						email: {
							required: "Please enter a email address.",
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						}, 
						password:{
							required: "Please enter Password.",
							minlength: "Your password must be at min 6 digits",
							maxlength: "Your password must be at max 15 digits"
						},
						confirmPassword:{
							required: "Please enter confirmPassword.",
						},
						address: {
							required: "Please enter a email address.",
						},
						birthdate: {
							required: "Please enter birthday",
						},
						web_id: {
							required: "Please select website",
						},
						image: {
							extension: "Those file are allowed. Ex: jpeg/jpg/png|gif"
						},
						type: {
							required: "Please select user type",							
						},
						country_code:{
							required: "Please select country code",
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						if($('#image')[0].files[0]!==''){
							formData.append('image', $('#image')[0].files[0]);
						}
						formData.append('user_name', $('#user_name').val());
						formData.append('email', $('#email').val());
						formData.append('phone', $('#phone').val());
						formData.append('phone2', $('#phone2').val());
						formData.append('address', $('#address').val());
						formData.append('country_code', $('#country_code').val());
						formData.append('birthdate', $('#birthdate').val());
						formData.append('type', $('#type').val());
						formData.append('user_id', $('#user_id').val());
						formData.append('web_id', $('#web_id').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> The value successfully update.</div>';
									$('#massage').html(html);
									$("html, body").animate({ scrollTop: 0 }, "slow");
									window.setTimeout(function () {
										location.href = "<?php echo site_url('admin/customers') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> This value already exists in the list.</div>';
									$('#massage').html(html);
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
							}
						});
					}
				});
			});
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('assets_dir');?>css/bootstrap-datepicker.css" />
		<script type="text/javascript" src="<?php echo config_item('assets_dir');?>js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
			$(function () {
				$('#birthdate1').datepicker({
					format: 'dd/mm/yyyy',
					autoclose:true,
				});
			});
		</script>
		 <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
        </script>