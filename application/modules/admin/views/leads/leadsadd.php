
		<section class="content">
			<input type="hidden" name="page" id="page" value="leads" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Lead</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('admin/leads/leads_save', array('id' =>'leads_form','name'=>'leads_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2">Client Name:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="client_name" id="client_name" class="form-control" value="" placeholder="Client Name" autocomplete="off" />
											<label id="client_name-error" class="error" for="client_name"></label>
										</div>
										<label class="col-md-2">Primary Phone:<span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="text" name="primary_phone" id="primary_phone" class="form-control" value="" placeholder="Primary Phone"autocomplete="off" />
											<label id="primary_phone-error" class="error" for="primary_phone"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Secondary Phone:</label>
										<div class="col-md-4">
											<input type="text" name="secondarys_phone" id="secondarys_phone" class="form-control" value="" placeholder="Secondary Phone" autocomplete="off" />
											<label id="secondarys_phone-error" class="error" for="secondarys_phone"></label>
										</div>
										<label class="col-md-2">E-mail:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="email" id="email" class="form-control" value="" placeholder="E-mail" autocomplete="off" />
											<label id="email-error" class="error" for="email"></label>
										</div>
									</div>
									<div class="form-group demo-masked-input">
										<label class="col-md-2">Date of trip:<span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="text" name="date_of_trip" id="date_of_trip" class="form-control date" value="" placeholder="Date of trip" autocomplete="off" />
											<label id="date_of_trip-error" class="error" for="date_of_trip"></label>
										</div>
										<label class="col-md-2">Time of trip:<span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="text" name="time_of_trip" id="time_of_trip" class="form-control time12" value="" placeholder="Time of trip" autocomplete="off" />
											<label id="time_of_trip-error" class="error" for="time_of_trip"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Package:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<?php echo form_dropdown('pak_id',$ljp_package,'','class="form-control" id="pak_id"') ?>
											<label id="pak_id-error" class="error" for="pak_id"></label>
										</div>
										<label class="col-md-2">No of pax:<span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="text" name="no_of_pax" id="no_of_pax" class="form-control" value="" placeholder="No of pax" autocomplete="off" />
											<label id="no_of_pax-error" class="error" for="no_of_pax"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Website:<span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<?php echo form_dropdown('web_id',$ljp_website,'','class="form-control" id="web_id"') ?>
											<label id="web_id-error" class="error" for="web_id"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/leads/') ?>" class="btn btn-default">Cancel</a>
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
						client_name: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},
						primary_phone: {
							required: true,
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						secondarys_phone: {
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						email: {
							required: true,
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
						},
						pak_id: {
							required: true,
						},
						web_id: {
							required: true,
						},
						date_of_trip: {
							required: true,
						},
						time_of_trip: {
							required: true,
						},
						no_of_pax: {
							required: true,
							regex:/^[0-9]*$/,
						},
					},
					messages: {
						client_name: {
							required: "Please enter name",
							regex: "Special character and Number not allowed"
						},
						primary_phone: {
							required: "Please enter a phone number.",
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						secondarys_phone: {
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						email: {
							required: "Please enter a email address.",
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						},
						
						web_id: {
							required: "Please select website."
						},
						pak_id: {
							required:"Please select Package name "
						},
						date_of_trip:{
							required:"Please enter date of trip."
						},
						time_of_trip:{
							required:"Please enter time of trip."
						},
						no_of_pax: {
							required: "Please enter no of pax.",
							regex: "character  not allowed"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('client_name', $('#client_name').val());
						formData.append('primary_phone', $('#primary_phone').val());
						formData.append('secondarys_phone', $('#secondarys_phone').val());
						formData.append('email', $('#email').val());
						formData.append('date_of_trip', $('#date_of_trip').val());
						formData.append('time_of_trip', $('#time_of_trip').val());
						formData.append('no_of_pax', $('#no_of_pax').val());
						formData.append('pak_id', $('#pak_id').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> The value successfully insert.</div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('admin/leads') ?>";
									}, 5000);
								} else {
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> This value already exists in the list.</div>';
									$('#massage').html(html);
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
						url: "<?php echo base_url('admin/leads/indtype'); ?>",
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
		 <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
        </script>