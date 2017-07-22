<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SHEMA MUYANGO GAEL">

    <link rel="shortcut icon" href="">

    <title>River Trading Ltd</title>

    <!-- DataTables -->
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
        </script>




        
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="" class="logo"><i class="icon-magnet icon-c-logo"></i><span>River Trading Ltd</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/google_avatar.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href=""><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                        <li class="divider"></li>
                                        <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                          <i class="ti-power-off m-r-10 text-danger"></i>
                                        Logout
                                        </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                          </form>
                                      </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->



<!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <?php 
                                if (Auth::user()->user_type == 'admin') { ?>

                            <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="/admin_dashboard" class="waves-effect"><i class="ti-dashboard"></i><span> Dashboard</a>
                            </li>

                            <li class="text-muted menu-title">Big Stock</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-folder"></i><span>Big Stock Activities</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/bigstock">Goods In Stock </a></li>
                                    <li><a href="/take_stock_in">New Stock</a></li>
                                    <li><a href="/new_stock">Add to Existing Stock</a></li>
                                    <li><a href="/take_stock_out">Take Stock Out</a></li>
                                    <li><a href="/goods_taken_out">Goods Taken Out</a></li>
                                    <li><a href="/recently_added">Recently Added</a></li>
                                </ul>
                            </li>

                            <li class="text-muted menu-title">Small Stock</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-folder"></i><span>Small Stock Activities</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/smallstock">Goods In stock</a></li>
                                    <li><a href="/stock_in">Take Stock In</a></li>
                                    <li><a href="/stock_out">Take Stock Out</a></li>
                                    <li><a href="/add_new_stock">Add to Existing Stock</a></li>
                                    <li><a href="/stock_taken_out">Goods Taken Out</a></li>
                                    <li><a href="/stock_added">Recently Added</a></li>
                                </ul>
                            </li>

                            <li class="text-muted menu-title">Sales Stock</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-folder"></i><span>Sale Stock Activities</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">  
                                    <li><a href="/salestock">Goods In Stock</a></li>
                                    <li><a href="/new_stock_entry">Take Stock In</a></li>
                                    <li><a href="/sale_stock">Take Stock Out</a></li> 
                                    <li><a href="/add_to_stock">Add To Existing Stock</a></li>
                                    <li><a href="/added_stock">Recently Added</a></li>
                                </ul>
                            </li>



                            <li class="text-muted menu-title">Settings</li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span>System Settings</span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="/users"><i class="ti-user"></i>Users</a></li>
                                </ul>
                            </li>

                            <?php } ?>

                            <?php 
                            if (Auth::user()->user_type == 'stocker' && Auth::user()->store_type== 'bigstock') { ?>

                            <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="/bigstock_dashboard" class="waves-effect"><i class="ti-dashboard"></i><span> Dashboard</a>
                            </li>

                            <li class="text-muted menu-title">Big Stock</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-folder"></i><span>Big Stock Activities</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/goods_in_stock">Goods In Stock </a></li>
                                    <li><a href="/stocker_take_stock_in">New Stock</a></li>
                                    <li><a href="/update_stock">Add to Existing Stock</a></li>
                                    <li><a href="/stocker_take_stock_out">Take Stock Out</a></li>
                                    <li><a href="/goods_taken_out">Goods Taken Out</a></li>
                                    <li><a href="/recently_added_stock">Recently Added</a></li>
                                </ul>
                            </li>

                            <?php } ?>

                            <?php 
                            if (Auth::user()->user_type == 'stocker' && Auth::user()->store_type== 'smallstock') { ?>

                            <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="/smallstock_dashboard" class="waves-effect"><i class="ti-dashboard"></i><span> Dashboard</a>
                            </li>

                            <li class="text-muted menu-title">Small Stock</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-folder"></i><span>Small Stock Activities</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/small_stock">Goods In stock</a></li>
                                    <li><a href="/smallstocker_take_stock_in">Take Stock In</a></li>
                                    <li><a href="/smallstocker_take_stock_out">Take Stock Out</a></li>
                                    <li><a href="/update_small_stock">Add to Existing Stock</a></li>
                                    <li><a href="/taken_out">Goods Taken Out</a></li>
                                    <li><a href="/recently_added_small_stock">Recently Added</a></li>
                                </ul>
                            </li>

                            <?php } ?>

                            <?php 
                            if (Auth::user()->user_type == 'seller' && Auth::user()->store_type== 'salestock') { ?>

                            <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="/salestock_dashboard" class="waves-effect"><i class="ti-dashboard"></i><span> Dashboard</a>
                            </li>

                           <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-folder"></i><span>Sale Stock Activities</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="/goods_in_salestock">Goods In Stock</a></li>
                                    <li><a href="/sale_stock_entry">Take Stock In</a></li>
                                    <li><a href="/sale_stock_outing">Take Stock Out</a></li> 
                                    <li><a href="/salestock_update">Add To Existing Stock</a></li>
                                    <li><a href="/salestock_recently_added">Recently Added</a></li>
                                </ul>
                            </li>

                            <?php } ?>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
            

    
        <script>
            var resizefunc = [];
        </script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>


<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>



