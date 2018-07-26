        <section class="content">
            <input type="hidden" name="page" id="page" value="booking" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <div id="massage">
                                    <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> <?php echo $status; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function(){
                window.setTimeout(function () {
                    location.href = "<?php echo site_url('admin/bookings') ?>";
                }, 5000);
            });
        </script>