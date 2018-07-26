<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
        <title>Sign In</title>
        <!-- Favicon-->
        <link rel="icon" href="<?php echo config_item('assets_dir');?>favicon.ico" type="image/x-icon" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Core Css -->
        <link href="<?php echo config_item('assets_dir');?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />
        <!-- Waves Effect Css -->
        <link href="<?php echo config_item('assets_dir');?>plugins/node-waves/waves.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="<?php echo config_item('assets_dir');?>plugins/animate-css/animate.css" rel="stylesheet" />
        <!-- Custom Css -->
        <link href="<?php echo config_item('assets_dir');?>css/style.css" rel="stylesheet" />
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);"><b>Cozmo Yachts</b></a>
                <small>Cozmo Yachts Portal</small>
            </div>
            <div class="card">
                <div class="body">
                    <form method="POST" name="sign_in" id="sign_in" action="<?php echo config_item('base_url');?>login/userlogin/">
                        <div class="msg">Sign in to start your session</div>
                        <input type="hidden" name="type" value="<?php echo $type; ?>" >
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="emailid" id="emailid" placeholder="email" />
                            </div>
                            <label id="emailid-error" class="error" for="emailid" style="display:none;"></label>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                            </div>
                            <label id="password-error" class="error" for="password" style="display:none;"></label>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                <!-- <a href="<?php echo config_item('base_url');?>login/register/">Register Now!</a> -->
                            </div>
                            <div class="col-xs-6 align-right">
                                <a href="<?php echo config_item('base_url');?>login/forgot_password/">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Jquery Core Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap/js/bootstrap.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/node-waves/waves.js"></script>
        <!-- Validation Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-validation/jquery.validate.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-validation/additional-methods.js"></script>
        <script type="text/javascript">
            $(function() {
                $.validator.addMethod("regex",function(value, element, regexp) {
                    if (regexp.constructor != RegExp)
                        regexp = new RegExp(regexp);
                    else if (regexp.global)
                        regexp.lastIndex = 0;
                    return this.optional(element) || regexp.test(value);
                },"Please check your input.");
            $("form[name='sign_in']").validate({
                rules: {
                    password: {
                        required: true,
                    },
                    emailid: {
                        required: true,
                        email: true,
                        regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
                    },
                },
                messages: {
                    password: {
                        required: "Please enter password",
                    },
                    emailid: {
                        required:"Please enter email address.",
                        email:"Please enter a valid email address.",
                        regex: 'Please enter a valid email without spacial chars, ie, Example@gmail.com'
                    },
                },                        
                onfocusout: function(element) {
                    this.element(element);
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            var res = JSON.parse(response);
                            if(res.status==1){
                                var urlnew = "<?php echo config_item('base_url');?>" + res.go_to;
                                window.location.href = urlnew;
                            }
                        }
                    });
                }
            });
          });
        </script>
    </body>
</html>