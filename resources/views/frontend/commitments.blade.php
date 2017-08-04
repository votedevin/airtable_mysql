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
@media (max-width: 767px){
  #nomainmenu{
    display: block !important;
  }
  .skin-blue .main-header .navbar{
    background-color: #ffffff;
  }
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
<header class="main-header" style="background-color: #ffffff;">
  <div class="toplink">
  <ul>
    @foreach($menutops as $menu_top)
    <li>
      <a target="_blank" rel="nofollow" href="{{$menu_top->menu_top_link}}">{{$menu_top->menu_top_label}} &nbsp&nbsp&nbsp|</a>
    </li>
      @endforeach
  </ul>
 </div>
   <div class="top-bar-title">
   <a href="http://proposals.votedevin.com/" style="color: #ffffff;"><img src="../../resources/images/logo.png" style="padding-right: 10px;"> Capital Budgets</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>Menu
      </button>
   </div>
      @if($mainmenu != NULL)
      <nav class="navbar navbar-static-top" style="margin: 0; background-color: #ffffff; color: #000000; min-height: 48px;border-bottom: 1px solid #dee0e3;">
        <div class="container" style="width: 100%">
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse" style="    margin-left: 12%; height: 48px !important; box-shadow: none;">
            <ul class="nav navbar-nav">
              <li style="display: none;"><a href="http://proposals.votedevin.com/users/sign_in"><b>Sign In</b></a></li>
              <li style="display: none;"><a href="http://proposals.votedevin.com/users/sign_up"><b>Register</b></a></li>
              @foreach($menumains as $menu_main)
                  @if($menu_main->menu_main_label=='Projects')
                    <li class="active"><a href="{{$menu_main->menu_main_link}}"><b>{{$menu_main->menu_main_label}} </b><span class="sr-only">(current)</span></a></li>
                  @else
                  <li ><a href="{{$menu_main->menu_main_link}}"><b>{{$menu_main->menu_main_label}} </b><span class="sr-only">(current)</span></a></li>
                  @endif
              @endforeach
              @foreach($menutops as $menu_top)
                  <li style="display: none;"><a href="{{$menu_top->menu_top_link}}"><b>{{$menu_top->menu_top_label}}</b></a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="title" style="font-size: 16px;display: none;">
         <ul style="padding-top: 13px;">
          @foreach($menulefts as $menu_left)
            <li><a href="{{$menu_left->menu_left_link}}" style="margin-right: 10px;"><b>{{$menu_left->menu_left_label}}</b></a></li>
          @endforeach
          </ul>
        </div>
      <!-- /.container-fluid -->
      </nav>
      @else
      <nav class="navbar navbar-static-top" id="nomainmenu" style="display: none;">
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse" style="    margin-left: 12%; height: 48px !important; box-shadow: none;">
          <ul class="nav navbar-nav">
            <li style="display: none;"><a href="http://proposals.votedevin.com/users/sign_in"><b>Sign In</b></a></li>
            <li style="display: none;"><a href="http://proposals.votedevin.com/users/sign_up"><b>Register</b></a></li>
            @foreach($menumains as $menu_main)
                @if($menu_main->menu_main_label=='Projects')
                  <li class="active"><a href="{{$menu_main->menu_main_link}}"><b>{{$menu_main->menu_main_label}} </b><span class="sr-only">(current)</span></a></li>
                @else
                <li ><a href="{{$menu_main->menu_main_link}}"><b>{{$menu_main->menu_main_label}} </b><span class="sr-only">(current)</span></a></li>
                @endif
            @endforeach
            @foreach($menutops as $menu_top)
                <li style="display: none;"><a href="{{$menu_top->menu_top_link}}"><b>{{$menu_top->menu_top_label}}</b></a></li>
            @endforeach
          </ul>
        </div>   
        <div class="title" style="font-size: 16px;display: none;">
         <ul style="padding-top: 13px;">
          @foreach($menulefts as $menu_left)
            <li><a href="{{$menu_left->menu_left_link}}" style="margin-right: 10px;"><b>{{$menu_left->menu_left_label}}</b></a></li>
          @endforeach
          </ul>
        </div>
      </nav>
      @endif
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
      
        @foreach($menulefts as $index => $menu_left)
          @if($index ==2)
           <li class="active"><a href="{{$menu_left->menu_left_link}}"><i class="fa fa-circle-o"></i> <span>{{$menu_left->menu_left_label}} </span></a></li>
          @else
          <li><a href="{{$menu_left->menu_left_link}}"><i class="fa fa-circle-o"></i> <span>{{$menu_left->menu_left_label}} </span></a></li>
          @endif
        @endforeach
      </ul>
      <!-- /.sidebar-menu -->
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
            <div class="box-header" style="background-color: #004A83;">
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
              <table id="example" class="display nowrap" cellspacing="0" width="100%">
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
