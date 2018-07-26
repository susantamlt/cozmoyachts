        <!-- Bootstrap Core Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap/js/bootstrap.js"></script>
        <!-- Select Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/node-waves/waves.js"></script>
        <!-- Custom Js -->
        <script src="<?php echo config_item('assets_dir');?>js/admin.js"></script>
        <!-- Demo Js -->
        <script src="<?php echo config_item('assets_dir');?>js/demo.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-validation/jquery.validate.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-validation/additional-methods.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var pageId = $('#page').val();
                if(pageId!=undefined || pageId!=''){
                    $('.ourmenu').removeClass('active');
                    $('#'+pageId).addClass('active');
                }
            });
        </script>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        var userId = "<?php echo $_SESSION['admin_user_id']; ?>";
        var formData = new FormData();
        formData.append('user_id', userId);
        $.ajax({
            url: "<?php echo site_url('admin/todos/notification') ?>",
            type: "POST",
            async:false,
            cache:false,
            contentType:false,
            enctype:'multipart/form-data',
            processData:false,
            data: formData,
            success: function(res) {
                var resD = JSON.parse(res);
                if(resD.status > 0){
                    var totaldata = resD.datas;
                    var html = '<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="material-icons">notifications</i><span class="label-count">'+ totaldata.length +'</span></a><ul class="dropdown-menu"><li class="header">NOTIFICATIONS</li><li class="body"><ul class="menu">';
                    for (var i = 0; i < totaldata.length; i++) {
                        var url = "<?php echo base_url('admin/todos/view_edit/'); ?>"+totaldata[i].todo_id;
                        html +='<li><a href="'+url+'" onclick="return !window.open(this.href)"><div class="icon-circle bg-light-green"><i class="material-icons">person_add</i></div><div class="menu-info"><h4>'+ totaldata[i].msg +'</h4><p><i class="material-icons">access_time</i>'+ totaldata[i].notification_date +' '+ totaldata[i].todo_time +'</p></div></a></li>';
                    }
                    html +='</ul></li></ul>';
                    $('#notifications').html(html);
                } else {
                    var html = '<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="material-icons">notifications</i><span class="label-count">0</span></a>';
                    $('#notifications').html(html);
                }
            }
        });
    });
</script>