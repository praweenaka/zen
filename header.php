<?php
 

function get_title($url) {

    // if ($url == "new_user") {
    //     return 'New User';
    //     exit();
    // }

 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo get_title($_GET['url']); ?></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap_custom.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-multiselect.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="dist/css/font-awesome-4.7.0/css/font-awesome.min.css">  

        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="css/ionicons/css/ionicons.min.css">-->
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">

        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!--vender-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/user.js" type="text/javascript"></script>

        <style>
            .form-group {
                margin-bottom: 8px;
            }
            #menuimghigh{
                height:50px;
            }
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini" style="background-color: #004A3B">
        <div class="wrapper" >

            <header class="main-header" style="background-color: #004A3B">
                <!-- Logo -->
                <a  style="background-color:#004A3B" href="home.php" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> 
                    <img src="img/logo.png" class="img-circle" style="width:56.35px;height:56.35px;" alt="User Image">
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" style="background-color:#EDEDED" role="navigation">
                    <!-- Sidebar toggle button-->
                    <!--  -->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" style="background-color: #004A3B"  role="button"> <span  class="sr-only">Toggle navigation</span> </a>
                    <div class="navbar-custom-menu"     >
                        <ul class="nav navbar-nav" > 
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- Notifications: style can be found in dropdown.less -->

                            <!-- Tasks: style can be found in dropdown.less -->

                            <!-- User Account: style can be found in dropdown.less --> 
                            <li class="dropdown user user-menu">
  
                                 <img src="src/images/logo.png" style="width: 50%; height: auto;">
                                 
                            </li>
                            <li class="dropdown user user-menu">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menuimghigh">
                                    <img src="img/user.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"> </span>
                                    <!--<a onclick="logout();" class="btn btn-success btn-file">Sign out</a>-->
                                </a>
                                <ul class="dropdown-menu" style="width: 50px;"> 
                                   <!--  <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg"  class="img-circle" alt="User Image">

                                        <p>
                                        </p>
                                    </li>   -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer" >
                                        
                                            
                                            <a href="../index.php"    >View Web</a> 
                                         
                                            <a onclick="logout();"  >Sign out</a>
                                        
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar" style="background-color: #004A3B">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel"> 
                        <div class="pull-left info">
                            
                            <br>
                             
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" >
                        <li class="user-header">
                            <div class="col-sm-4">
                                 <img src="img/user.png" style="width:56.35px;height:56.35px;" class="img-circle" alt="User Image">

                            </div>
                            <div class="col-sm-6">
                                <p style="color: white">Welcome,
                                        </p>
                                        <p style="color: white"><?php echo $_SESSION["UserName"] ?>
                                        </p>
                            </div>
                                       
                                        
                          </li> 
                        <li class="header" style="background-color: #004A3B;color: white">
                            ZEN DOUMS
                        </li>
                        <?php
                        if (isset($_GET['url'])) {
                            $murl = $_GET['url'];
                        } else {
                            $murl = "";
                        }

                        $mgroup = "";
                        include './connection_sql.php';
//                        $sql = "select * from view_menu where username ='" . $_SESSION["CURRENT_USER"] . "' and doc_view='1' and grp!='' order by grp,docid";
                        echo "<li  >
                                <a href='home.php'><i class='fa fa-home'></i> <span>Home </span> <i class='fa fa-angle-left pull-right'></i> </a></li>";

                        $sql = "select * from view_menu where email ='" . $_SESSION["CURRENT_USER"] . "'  and doc_view='1' order by grp,docid";
                      foreach ($conn->query($sql) as $row1) {
                           
                                echo "<li  >
                                <a href='home.php?url=" . trim($row1['name']) . "'><i class='" . trim($row1['icon_class']) . "'></i> <span>" . $row1['docname'] . "</span> <i class='fa fa-angle-left pull-right'></i> </a>
                                  

                             
                         </li>";
                    }
                        ?>



                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Control Sidebar -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                        <!-- /.control-sidebar-menu -->


                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">

                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">