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
  <link rel="stylesheet" href="../css/custom.css">
  <script src="../js/jquery-2.2.3.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

<script src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js">
  </script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
  </script>

  <script type="text/javascript" class="init">
  
$(document).ready(function() {
  $('#example').DataTable( {
    "scrollY": 400,
    "scrollX": true
  } );
} );

  </script>
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

    <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
      
        <li><a href="/agencies"><i class="fa fa-tasks"></i> <span> Agencies </span></a></li>
        <li class="active"><a href="/projects"><i class="ion ion-clipboard"></i> <span> Projects </span></a></li>
        <li><a href="/commitments"><i class="fa fa-database"></i> <span> Commitments </span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="row">
        
  
        
      </div>

          <div class="box box-primary box-solid">
            <div class="box-header" style="background-color: #004A83;">
            <h4>Projects</h4> 
    
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Agency</th>
                  <th>Description</th>
                  <th>#Commitments</th>
                  <th>Total Cost &nbsp &nbsp&nbsp&nbsp&nbsp</th>
                </tr>
                </thead>
              <tbody>
               @foreach ($projects as $project)
                <tr>
                  <td><a href="/projects/{{$project->project_recordid}}"> {{$project->project_projectid}}</a></td>
                  <td>{{$project->magencyname}}</td>
                  <td>{{$project->project_description}}</td>
                  <td>{{sizeof(explode(",", $project->project_commitments))}}</td>
                  <td>${{number_format($project->project_totalcost)}}</td>
                </tr>

                @endforeach

            
                </tbody>
              </table>
              <dir class="text-right">
                    
              </dir>
            </div>
            <!-- /.box-body -->



      </div>
      <!-- /.row -->

    </section>
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

<!-- Bootstrap 3.3.6 -->

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
