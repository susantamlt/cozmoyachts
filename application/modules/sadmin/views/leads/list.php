		    <section class="content">
            <input type="hidden" name="page" id="page" value="leads" />
            <div class="container-fluid">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#manually" data-toggle="tab">MANUALLY</a></li>
                                    <li role="presentation"><a href="#auto" data-toggle="tab">AUTO</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="manually">
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                          <a href="<?php echo site_url('sales/leads/leads_add') ?>" data-toggle="tooltip" title="Add New Record" class="btn btn-success btn-background"><i class="glyphicon glyphicon-plus"></i></a>
                                        </div>
                                        <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                  											<thead>
                  												<tr>
                  													<th style="width:18px" class="sorting-disabled">
                  														<input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                  														<label for="checkbox-1-0"></label>
                  													</th>
                                            <th title="Name"> Name </th>
                                            <th title="Contact Name"> Contact Name </th>
                                            <th title="Industry"> Industry </th>
                                            <th title="Type"> Type </th>
                                            <th title="E-mail"> E-mail </th>
                                            <th title="Phone"> Phone </th>
                                            <th title="Address"> Address </th>
                                            <th title="Created Date"> Date </th>
                                            <th title="Action"> Action </th>
                  												</tr>
                  											</thead>
                  											<tbody>
                  												<tr>
                  													<td colspan="10" class="text-center">
                  														<img src="<?php echo config_item('root_dir');?>assets/images/small-loader.gif">
                  													</td>
                  												</tr>
                  											</tbody>
                  										</table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="auto">
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <table id="dataAuto" class="table table-bordered table-striped" style="width:100%;">
                    											<thead>
                    												<tr>
                    													<th style="width:18px" class="sorting-disabled">
                    														<input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                    														<label for="checkbox-1-0"></label>
                    													</th>
                    													<th title="Name"> Name </th>
                                              <th title="Contact Name"> Contact Name </th>
                                              <th title="Industry"> Industry </th>
                                              <th title="Type"> Type </th>
                                              <th title="E-mail"> E-mail </th>
                                              <th title="Phone"> Phone </th>
                                              <th title="Address"> Address </th>
                                              <th title="Created Date"> Date </th>
                                              <th title="Action"> Action </th>
                    												</tr>
                    											</thead>
                    											<tbody>
                    												<tr>
                    													<td colspan="10" class="text-center">
                    														<img src="<?php echo config_item('root_dir');?>assets/images/small-loader.gif">
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
            </div>
        </section>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script type="text/javascript">
  $(function () {
    $('#dataManual').DataTable({
      "bServerSide": true,
      "sAjaxSource": "<?php echo site_url('sales/leads/leads_list_m'); ?>",
      "sServerMethod": "POST",
      "sPaginationType": "full_numbers",
      "iDisplayLength": 10,
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
      ]
    });
  });
  $(function (){  	
    $('#dataAuto').DataTable({
      "bServerSide": true,
      "sAjaxSource": "<?php echo site_url('sales/leads/leads_list_a'); ?>",
      "sServerMethod": "POST",
      "sPaginationType": "full_numbers",
      "iDisplayLength": 10,
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
          "sName": "Actions",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": false,
          "fnRender": function (oObj) {
            return oObj;
          }
        }
      ]
    });
  });
</script>
<style type="text/css">
  #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
  #dataAuto > thead > tr > th {vertical-align:middle;padding:0px 10px;}
</style>