
		<section class="content">
			<input type="hidden" name="page" id="page" value="customers" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Import Customers</h2>
							</div>
							<div class="body">
								<?php echo form_open_multipart('admin/customers/customersimport_save', array('id' =>'customers_form','name'=>'customers_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-1"> File <span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="file" name="documentfile" id="documentfile" value="" placeholder="File">
											<label id="documentfile-error" class="error" for="documentfile"></label>
										</div>
										<label class="col-md-2"> Website </label>
										<div class="col-md-4">
											<?php echo form_dropdown('web_id',$ljp_website,'','class="form-control" id="web_id"') ?>
											<label id="web_id-error" class="error" for="web_id"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/customers/customersformat') ?>" class="btn btn-warning">Download Templates</a>
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
				$.validator.addMethod("regex",function(value, element, regexp) {
					if (regexp.constructor != RegExp)
						regexp = new RegExp(regexp);
					else if (regexp.global)
						regexp.lastIndex = 0;
					return this.optional(element) || regexp.test(value);
				},"Please check your input.");
				$("form[name='customers_form']").validate({
					rules: {
						documentfile: {
							required: true,
							extension: "csv",
						},
						web_id: {
							required: true,
						},
					},
					messages: {
						documentfile: {
							required: "Please upload CSV",
							extension: "Those file are allowed. Ex: csv"
						},
						web_id: {
							required: "Please select website"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('web_id', $('#web_id').val());
						if($('#documentfile')[0].files[0]!==''){
							formData.append('documentfile', $('#documentfile')[0].files[0]);
						}
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
                                        location.href = "<?php echo site_url('admin/customers') ?>";
                                    }, 5000);
								} else { 
									$('.error_msg').show();
									$('.error_msg').html(resD.message);
								}
							}
						});
					}
				});
			});
		</script>