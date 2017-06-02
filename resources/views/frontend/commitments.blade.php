<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NYC | Commitments</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-select.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <script src="../js/jquery-2.2.3.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
  <link href="../resources/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
  <link href="../resources/css/chosen.min.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shCore.css" rel="stylesheet" type="text/css" />
  <link href="../resources/css/shThemeDefault.css" rel="stylesheet" type="text/css" />

  
  <script src="../js/jquery-2.2.3.min.js"></script>
  <script src="../resources/js/chosen.jquery.min.js"></script>
  <script src="../resources/js/jquery.dataTables.min.js"></script>
  <script src="../resources/js/jquery.dataTables.yadcf.js"></script>
  <script src="../resources/js/dom_source_example2.js"></script>
  <script type="text/javascript" src="../resources/js/shCore.js"></script>
  <script type="text/javascript" src="../resources/js/shBrushJScript.js"></script>
  
<style>
body{
  font-size: 13x;
}
#example_info, #example_paginate, #example_length, #example_filter{ display: none; }
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 999999;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv{
  display: none;
  text-align: center;
}
.agencytd.sorting_asc{
  width: 325px !important;
}
</style>
</head>

<body onload="myFunction()" style="margin:0;" class="hold-transition skin-blue sidebar-mini">
<div id="mask" style="
    position: fixed;
    width: 100%;
    height: 100%;
    background: white;
    opacity: 0.8;
    background-color: white;
    z-index: 2000;
"></div>
<div id="loader"></div>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>NYC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>NYC</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="text-center"><h4 style="margin-top: 15px; color: #ffffff;">NYC Capital Commitments</h4></div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

   <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        
        <li><a href="/agencies"><i class="fa fa-tasks"></i> <span> Agencies </span></a></li>
        <li><a href="/projects"><i class="ion ion-clipboard"></i> <span> Projects </span></a></li>
        <li class="active"><a href="/commitments"><i class="fa fa-database"></i> <span> Commitments </span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 120%;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      

    
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
         

  
        
      </div> 


          <div class="box box-primary box-solid">
            <div class="box-header">
            <h4>Commitments</h4> 
    
            </div>
            <!-- /.box-header -->

      <!-- search form -->
            <div class="row" style="margin-top: 20px; margin-left: 0px;">
              
                <div class="col-sm-4 col-md-4">
                  <div class="input-group col-md-12">
                    <form action="/commitments/find" method="POST" class="form-group">  
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="text" class="form-control" placeholder="Search (Description)" name="find" style="    width: calc(100% - 40px);"> 
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" id="mysearchbutton" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </span>
                    </form>


                  </div>            
                </div>
                <div class="col-sm-8 col-md-8">
                <h4><b style="margin-left:30px;"> Noncity Cost</b> <a href="/commitments/noncitycostdesc"> <i class="fa fa-sort-amount-desc" aria-hidden="true"></i> </a><a href="/commitments/noncitycostasc"> <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> </a><b style="margin-left:65px; "> City cost </b> <a href="/commitments/citycostdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/commitments/citycostasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></h4>

                </div>
              
            </div> 
            <div class="box-body">
              <table id="example" cellpadding="0" cellspacing="0" border="0" class="display">
                <thead>
                <tr>
                  <th class= "agencytd">Agency Name</th>
                  <th>Project ID</th>
                  <th style="width: 2000px !important;">Description</th>
                  <th>Commitment Date</th>
                  <th>Non-City Cost</th>
                  <th>City Cost</th>
                  <th>Budgetline</th>
                  <th>FMS Number</th>
                  <th>Commitment Code</th>
                </tr>
                </thead>
                <tbody id="tblData">
                 @foreach ($commitments as $commitment)
                  <tr>
                    <td><a href="/agencies/{{$commitment->magency}}">{{$commitment->magencyname}}</a></td>
                    <td><a href="/projects/{{$commitment->projectid}}">{{$commitment->project_projectid}}</a></td>
                    <td>{{$commitment->description}}</td>
                    <td>{{$commitment->plancommdate}}</td>
                    <td>${{number_format($commitment->noncitycost)}}</td>
                    <td>${{number_format($commitment->citycost)}}</td>
                    <td>{{$commitment->budgetline}}</td>
                    <td>{{$commitment->fmsnumber}}</td>
                    <td>{{$commitment->commitmentcode}}</td>
                  </tr>

                  @endforeach

                </tbody>
              </table>
              <div class="text-right">
                {{$commitments->links()}}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->

<!-- Bootstrap 3.3.6 -->
<script src="../js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../js/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
<!-- page script -->
<script src="../js/bootstrap-select.js"></script>

<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 0);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("mask").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>
