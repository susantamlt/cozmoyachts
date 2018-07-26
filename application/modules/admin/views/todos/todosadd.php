<section class="content">
			<input type="hidden" name="page" id="page" value="todo" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Todos</h2>
								<div id="massage"></div>
							</div>
							<div class="body">
								<?php echo form_open_multipart('admin/todos/todos_save', array('id' =>'todos_form','name'=>'todos_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
								<div class="form-group demo-masked-input">
										<label class="col-md-2">Notification Date: <span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="notification_date" id="notification_date" class="form-control date" value="" placeholder="mm/dd/yyyy	" autocomplete="off" />
											<label id="notification_date-error" class="error" for="notification_date"></label>
										</div>
										<label class="col-md-2"> Status: <span class="mandatory">*</span> </label>
										<div class="col-md-4">
											<select name="status" id="status" class="form-control">
												<option value="">--Select One--</option>
												<option value="0">Read</option>
												<option value="1">Unread</option>
											</select> 
											<label id="	status-error" class="error" for="	status"></label>
										</div>
									</div>
									<div class="form-group demo-masked-input">
										<label class="col-md-2">Time of todo:<span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="text" name="todo_time" id="todo_time" class="form-control time12" value="" placeholder="hh:mm" autocomplete="off" />
											<label id="todo_time-error" class="error" for="todo_time"></label>
										</div>
										</div>
										<div class="form-group">
										<label class="col-md-12"> Message details: <span class="mandatory">*</span></label>
										<div class="col-md-12">
											<textarea name="msg" id="msg" class="form-control" placeholder="Message details"></textarea>
											<label id="msg-error" class="error" for="msg"></label>
										</div>
									</div>
                                    <div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/todos/') ?>" class="btn btn-default">Cancel</a>
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
				$("form[name='todos_form']").validate({
					rules: {
						
						notification_date: {
							required: true,
						},
						status: {
							required: true,
						},
						msg: {
							required: true,
						},
						todo_time: {
							required: true,
						},
					},
					messages: {
						notification_date: {
							required: "Please enter notification date date .",
						},
						status: {
							required: "Please select notification status .",
						},
						msg: {
							required: "Please enter Message  details .",
						},
						todo_time: {
							required: "Please enter todo tome .",
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var date = $('#notification_date').val();
						var formData = new FormData();
						if(date !=''){
							var ndate1 = date.split('/');
							var ndate2 = ndate1[2]+'-'+ndate1[0]+'-'+ndate1[1];
							formData.append('notification_date', ndate2);
						} else {
							formData.append('notification_date', '');
						}
						var msg = CKEDITOR.instances.msg.getData();
						formData.append('status', $('#status').val());
						formData.append('todo_time', $('#todo_time').val());
						formData.append('msg', msg);
						formData.append('user_id', $('#user_id').val());
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
										location.href = "<?php echo site_url('admin/todos') ?>";
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
						url: "<?php echo base_url('admin/todos/indtype'); ?>",
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
		<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
		<script type="text/javascript">
			CKEDITOR.replace( 'msg' );
		</script>