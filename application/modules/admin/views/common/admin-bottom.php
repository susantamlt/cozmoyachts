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