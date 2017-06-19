<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agencies</title>
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
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<style>
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

  </style>
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

<header class="main-header" style="background-color: #ffffff;">
  <div class="toplink">

  <ul>
    @foreach($menus as $menu)
    @if($menu->menu_id > 8)
    <li>
      <a target="_blank" rel="nofollow" href="{{$menu->menu_link}}">{{$menu->menu_label}} &nbsp&nbsp&nbsp|</a>
    </li>
      @endif
      @endforeach
  </ul>
 </div>
   <div class="top-bar-title">
   <a href="http://proposals.votedevin.com/" style="color: #ffffff;"><img src="../../resources/images/logo_header.png" style="padding-right: 10px;"> NY Speaks</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>Menu
      </button>
   </div>

      <nav class="navbar navbar-static-top" style="margin: 0; background-color: #ffffff; color: #000000; min-height: 48px;border-bottom: 1px solid #dee0e3;">
      <div class="container">


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse" style="    margin-left: 17.5%; height: 48px !important; box-shadow: none;">
          <ul class="nav navbar-nav">
            <li style="display: none;"><a href="http://proposals.votedevin.com/users/sign_in"><b>Sign In</b></a></li>
            <li style="display: none;"><a href="http://proposals.votedevin.com/users/sign_up"><b>Register</b></a></li>
            @foreach($menus as $menu)
              @if($menu->menu_id < 9)
                @if($menu->menu_id==5)
                  <li class="active"><a href="{{$menu->menu_link}}"><b>{{$menu->menu_label}} </b><span class="sr-only">(current)</span></a></li>
                @else
                <li ><a href="{{$menu->menu_link}}"><b>{{$menu->menu_label}} </b><span class="sr-only">(current)</span></a></li>
                @endif
              @else
                <li style="display: none;"><a href="{{$menu->menu_link}}"><b>{{$menu->menu_label}}</b></a></li>
              @endif
            @endforeach

          </ul>
        </div>
      </div>
        <div class="title" style="font-size: 16px;display: none;">
         <ul style="padding-top: 13px;">
            <li><a href="http://budgets.votedevin.com/agencies" style="margin-right: 10px;"><b>Agencies</b></a></li>
            <li><a href="http://budgets.votedevin.com/projects" style="margin-right: 10px;"><b>Projects</b></a></li>
            <li><a href="http://budgets.votedevin.com/commitments" style="margin-right: 10px;"><b>Commitments</b></a></li>
          </ul>
        </div>
      <!-- /.container-fluid -->
    </nav>
</header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
   

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
      
        <li class="active"><a href="/agencies"><i class="fa fa-tasks"></i> <span> Agencies </span></a></li>
        <li><a href="/projects"><i class="ion ion-clipboard"></i> <span> Projects </span></a></li>
        <li><a href="/commitments"><i class="fa fa-database"></i> <span> Commitments </span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="navbar-header" style="display: none;">
          <ul>
            <li><a href="http://budgets.votedevin.com/agencies"><b>Agencies</b></a></li>
            <li><a href="http://budgets.votedevin.com/projects"><b>Projects</b></a></li>
            <li><a href="http://budgets.votedevin.com/Commitments"><b>Commitments</b></a></li>
          </ul>
        </div>
      <div class="callout callout-info" style="margin-bottom: 0 !important;background-color: #004A83 !important;">
        <h4 style="margin-bottom: 0;">Agencies</h4> 
      </div>
    
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- search form -->
      <div class="row">
        
          <div class="col-sm-4 col-md-4">
            <div class="input-group col-md-12">
              <form action="/agencies/find" method="POST" class="form-group">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" placeholder="Search (Agency Name)" name="find" style="    width: calc(100% - 40px);"> 
                <span class="input-group-btn">
                  <button class="btn btn-secondary" id="mysearchbutton" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </span>
              </form>


            </div>            
          </div>
          <div class="col-sm-12 col-md-8" style="padding-top: 6px; padding-bottom: 10px;">

            <div class="col-sm-4 col-md-4">
              <b style="font-size: 16px;"> Total Cost <a href="/agencies/totalcostdesc"> <i class="fa fa-sort-amount-desc" aria-hidden="true" ></i> </a><a href="/agencies/totalcostasc"> <i class="fa fa-sort-amount-asc" aria-hidden="true" style="margin-right:30px;"></i> </a></b>
            </div>
            <div class="col-sm-4 col-md-4">
              <b style="font-size: 16px;"> Project <a href="/agencies/projectsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/agencies/projectsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true" style="margin-right:30px;"></i></a></b>
            </div>
            <div class="col-sm-4 col-md-4">
              <b style="font-size: 16px;"> Commitments<a href="/agencies/commitmentsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/agencies/commitmentsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></b>
            </div>
          </ul>

          </div>
        
      </div> 
      <!-- /.search form -->
      <!-- Your Page Content Here -->
      <div class="row" id="row">
          @foreach ($agencys as $agency)
            <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header with-border  text-center" style="height:55px">
                  <h3 class="box-title"><a href="/project/{{$agency->agency_recordid}}">{{$agency->magencyname}}</a></h3>
                </div>
                <div class="box-body" id="tblData">
                  <dl class="dl-horizontal">
                    <dt>Agency Acronym </dt><dd>{{$agency->magencyacro}}</dd>
                    <dt># Project </dt><dd> {{$agency->projects}}</dd>                   
                    <dt># Commitments </dt><dd>{{number_format($agency->commitments)}}</dd>
                    <dt>Total Cost </dt><dd>${{number_format($agency->total_project_cost)}}</dd>
                  </dl>
                </div>
              </div>
            </div>
          @endforeach
      </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    </div>
    <!-- Default to the left -->
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="_blank"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>. It was funded and developed by Friends of Devin Balkind, a political organization urging you to Vote for Devin Balkind for New York City Public Advocate in November. Learn more at <a href="http://proposals.votedevin.com/" target="_blank"> VoteDevin.com</a>.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="../js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
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
