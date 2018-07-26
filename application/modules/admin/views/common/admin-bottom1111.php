        <!-- Bootstrap Core Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap/js/bootstrap.js"></script>
        <!-- Select Plugin Js -->
        <!-- <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script> -->
        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- Bootstrap Colorpicker Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <!-- Dropzone Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/dropzone/dropzone.js"></script>
        <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <!-- Multi Select Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/multi-select/js/jquery.multi-select.js"></script>
        <!-- Jquery Spinner Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-spinner/js/jquery.spinner.js"></script>
        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/node-waves/waves.js"></script>
        <!-- Custom Js -->
        <script src="<?php echo config_item('assets_dir');?>js/admin.js"></script>
        <script src="<?php echo config_item('assets_dir');?>js/pages/forms/advanced-form-elements-new.js"></script>
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