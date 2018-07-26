		    <section class="content">
            <input type="hidden" name="page" id="page" value="bookings" />
            <div class="container-fluid">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header" style="border-bottom:none;">
                              <h2 class="col-md-6" style="padding:0px;">Bookings List</h2>
                              <div class="col-md-6" style="padding:0px; text-align:right;">
                                <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="<?php echo site_url('admin/bookings/booking_add') ?>" data-toggle="tooltip" title="Add New Record" class="btn btn-success btn-background"><i class="glyphicon glyphicon-plus"></i></a>
                              </div>
                            </div>
                            <div class="body">
                              <div class="table-responsive">
                                <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
            											<thead>
            												<tr>
            													<th style="width:18px" class="sorting-disabled">
            														<input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
            														<label for="checkbox-1-0"></label>
            													</th>
                                      <th title="OrderId"> OrderId </th>
                                      <th title="Website Name"> Website Name </th>
                                      <th title="User Name"> User Name </th>
                                      <th title="Yacht"> Yacht </th>
                                      <th title="Total Amount"> Total Amount </th>
                                      <th title="Payment Status"> Payment Status </th>
                                      <th title="Booking Status"> Booking Status </th>
                                      <th title="Created Date"> Date </th>
                                      <th title="Action"> Action </th>
            												</tr>
            											</thead>
            											<tbody>
            												<tr>
            													<td colspan="9" class="text-center">
            														<img src="<?php echo config_item('assets_dir'); ?>images/small-loader.gif">
            													</td>
            												</tr>
            											</tbody>
            										</table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="paymentStatusModal" tabindex="-1" role="dialog" aria-labelledby="paymentStatusModal" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="paymentStatusModal">Payment Status</h4>
              </div>
              <?php echo form_open_multipart('admin/bookings/booking_status_save', array('id' =>'payment_status_form','name'=>'payment_status_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-md-2"> Status: </label>
                    <div class="col-md-4">
                      <select name="payment_status" id="payment_status" class="paymentStatus form-control" data-style="btn-danger" data-id=""><option value="">--Select One--</option><option value="1">Unpaid</option><option value="2">Pay 100%</option><option value="3">Pay 20%</option><option value="4">Refund</option></select>
                      <label id="payment_status-error" class="error" for="payment_status"></label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="modal fade" id="bookingStatusModal" tabindex="-1" role="dialog" aria-labelledby="bookingStatusModal" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="bookingStatusModal">Booking Status</h4>
              </div>
              <?php echo form_open_multipart('admin/bookings/booking_status_save', array('id' =>'booking_status_form','name'=>'booking_status_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-md-2"> Status: </label>
                    <div class="col-md-4">
                      <select name="booking_status" id="booking_status" class="bookingStatus form-control" data-style="btn-danger" data-id=""><option value="">--Select One--</option><option value="pending">Pending</option><option value="complete">Complete</option><option value="confirm">Confirm</option><option value="cancel">Cancel</option></select>
                      <label id="booking_status-error" class="error" for="booking_status"></label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
          $(function () {
            $('#dataManual').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('admin/bookings/bookings_list'); ?>",
              "sServerMethod": "POST",
              "sPaginationType": "full_numbers",
              "aoColumns": [
                {
                  "sName": "ID",
                  "bSearchable": false,
                  "bSortable": false,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Name",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                      return oObj;
                  }
                },
                {
                  "sName": "E-mail",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Action",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": false,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                }
              ],
              "responsive": true,
              "dom": 'lfBrtip',
              "buttons": [
                { extend: 'copy', className: 'copyButton', titleAttr: 'Export to Copy' },
                { extend: 'csv', className: 'csvButton', titleAttr: 'Export to CSV' },
                { extend: 'excel', className: 'excelButton', titleAttr: 'Export to Excel' },
                { extend: 'pdf', className: 'pdfButton', titleAttr: 'Export to PDF' },
                { extend: 'print', className: 'printButton', titleAttr: 'Export to Print' }
              ],
              "iDisplayLength": 25,
              "aLengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
              'aaSorting': [[1, 'desc']],
            })
          });
        </script>
        <script type="text/javascript">
            $(function() {
                $.validator.addMethod("regex",function(value, element, regexp) {
                    if (regexp.constructor != RegExp)
                        regexp = new RegExp(regexp);
                    else if (regexp.global)
                        regexp.lastIndex = 0;
                    return this.optional(element) || regexp.test(value);
                },"Please check your input.");
                $("form[name='payment_status_form']").validate({
                    rules: {
                        payment_status: {
                            required: true,
                        },
                    },
                    messages: {
                        payment_status: {
                            required: "Please select status",
                        },
                      },
                    onfocusout: function(element) {
                        this.element(element);
                    },
                    submitHandler: function(form,event){
                        event.preventDefault();// using this page stop being refreshing
                        var button = 'btn-danger';
                        var selected = 'Unpaid';
                        var nid = $('#payment_status').attr('data-id');
                        var nidText = $("#payment_status option:selected").text();
                        var nidValu = $('#payment_status').val();
                        var formData = new FormData();
                        formData.append('booking_id', nid);
                        formData.append('payment_status', nidValu);
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
                                if(nidValu=='2'){selected = 'Pay 100%';button='btn-success';} else if (nidValu=='3') {selected = 'Pay 20%';button='btn-warning';} else if (nidValu=='4') {selected = 'Refund';button='btn-danger';} else {selected = 'Unpaid';button='btn-danger';}
                                var classPS = "btn dropdown-toggle "+button+" paymentStatusb";
                                $('#paymentStatus-'+nid).html(nidText);
                                $('#paymentStatus-'+nid).removeAttr('class').attr('class',classPS);
                                $('#paymentStatusModal').modal('hide');
                              }
                            }
                        });
                    }
                });
                $("form[name='booking_status_form']").validate({
                    rules: {
                        booking_status: {
                            required: true,
                        },
                    },
                    messages: {
                        booking_status: {
                            required: "Please select status",
                        },
                      },
                    onfocusout: function(element) {
                        this.element(element);
                    },
                    submitHandler: function(form,event){
                        event.preventDefault();// using this page stop being refreshing
                        var button1 = 'btn-warning';
                        var selected1 = 'Pending';
                        var nid = $('#booking_status').attr('data-id');
                        var nidText = $("#booking_status option:selected").text();
                        var nidValu = $('#booking_status').val();
                        var formData = new FormData();
                        formData.append('booking_id', nid);
                        formData.append('booking_status', $('#booking_status').val());
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
                                if(nidValu=='complete'){selected1 = 'Complete';button1='btn-success';} else if (nidValu=='confirm') {selected1 = 'Confirm';button1='btn-info';} else if (nidValu=='cancel') {selected1 = 'Cancel';button1='btn-danger';} else {selected1 = 'Pending';button1='btn-warning';}
                                var classBS = "btn dropdown-toggle "+button1+" bookingStatusb";
                                $('#bookingStatus-'+nid).html(nidText);
                                $('#bookingStatus-'+nid).removeAttr('class').attr('class',classBS);
                                $('#bookingStatusModal').modal('hide');
                              }
                            }
                        });
                    }
                });
            });
        </script>
        <script type="text/javascript">
          $(document).on('click','.paymentStatusb',function(){
            var bid = $(this).attr('id');
            var id = $(this).attr('data-id');
            var vid = $(this).attr('data-bid');
            $('#payment_status').attr('data-id',id);
            $('#payment_status').val(vid);
            $('#paymentStatusModal').modal('show');
          });
          $(document).on('click','.bookingStatusb',function(){
            var bid = $(this).attr('id');
            var id = $(this).attr('data-id');
            var vid = $(this).attr('data-bid');
            $('#booking_status').attr('data-id',id);
            $('#booking_status').val(vid);
            $('#bookingStatusModal').modal('show');
          });
        </script>
        <style type="text/css">
          #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
          .dataTables_filter,.dataTables_paginate{float:right;}
        </style>