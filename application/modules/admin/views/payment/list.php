		    <section class="content">
            <input type="hidden" name="page" id="page" value="payments" />
            <div class="container-fluid">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header" style="border-bottom:none;">
                              <h2 class="col-md-6" style="padding:0px;">Payments List</h2>
                              <div class="col-md-6" style="padding:0px; text-align:right;">
                                <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="<?php echo site_url('admin/payments/payment_add') ?>" data-toggle="tooltip" title="Add New Record" class="btn btn-success btn-background"><i class="glyphicon glyphicon-plus"></i></a>
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
                											<th title="Name"> Name </th>
                											<th title="E-mail"> E-mail </th>
                											<th title="Phone"> Phone </th>
                											<th title="User Type"> Type </th>
                											<th title="Status"> Status </th>
                											<th title="Image"> Image </th>
                											<th title="Last Login Date"> Last Login Date </th>
                											<th title="Created Date"> Date </th>
                											<th title="Action"> Action </th>
                										</tr>
                									</thead>
                									<tbody>
                										<tr>
                											<td colspan="10" class="text-center">
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
              "sAjaxSource": "<?php echo site_url('admin/payments/payments_list'); ?>",
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
                  "sName": "State",
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
              "aLengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]]
            });
          });
        </script>
        <style type="text/css">
          #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
          .dataTables_filter,.dataTables_paginate{float:right;}
        </style>