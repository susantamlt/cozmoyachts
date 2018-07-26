<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Admin | Cozmo Yachts</title>
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
        
        <link href="<?php echo config_item('assets_dir');?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo config_item('assets_dir');?>css/themes/all-themes.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
        <!-- Jquery Core Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery/jquery.min.js"></script>
    </head>
    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">Cozmo Yachts</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Notifications -->
                        <li id="notifications" class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">notifications</i>
                                <span class="label-count">0</span>
                            </a>
                        </li>
                        <!-- #END# Notifications -->
                        <!-- Tasks -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">flag</i>
                                <span class="label-count">9</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="<?php echo config_item('assets_dir');?>users/admin/user.png" width="48" height="48" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('admin_user_name') ?></div>
                        <div class="email"><?php echo $this->session->userdata('admin_email'); ?></div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">settings</i>Settings</a></li>
                                <li><a href="<?php echo base_url('login/admin_logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li id="leads" class="active ourmenu"><a href="<?php echo base_url('admin/leads'); ?>"><i class="material-icons">assignment</i><span>Leads</span></a></li>
                        <li id="customers" class="ourmenu"><a href="<?php echo base_url('admin/customers'); ?>"><i class="material-icons">assignment</i><span>Customers</span></a></li>
                        <li id="packages" class="ourmenu"><a href="<?php echo base_url('admin/packages'); ?>"><i class="material-icons">assignment</i><span>Packages</span></a></li>
                        <li id="yachts" class="ourmenu"><a href="<?php echo base_url('admin/yachts'); ?>"><i class="material-icons">assignment</i><span>Yachts</span></a></li>
                        <li id="deals" class="ourmenu"><a href="<?php echo base_url('admin/deals'); ?>"><i class="material-icons">assignment</i><span>Deals</span></a></li>
                        <li id="bookings" class="ourmenu"><a href="<?php echo base_url('admin/bookings'); ?>"><i class="material-icons">library_books</i><span>Bookings</span></a></li>
                        <li id="payments" class="ourmenu"><a href="<?php echo base_url('admin/payments'); ?>"><i class="material-icons">payment</i><span>Payments</span></a></li>
						<li id="todo" class="ourmenu"><a href="<?php echo base_url('admin/todos'); ?>"><i class="material-icons">assignment</i><span>Todo List</span></a></li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; 2018 - 2019 <a href="javascript:void(0);">Cozmo Yachts</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.0
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
        </section>