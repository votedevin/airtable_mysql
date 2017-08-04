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
  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5970165a0f81140011019a43&product=inline-share-buttons"></script>
  <script type="text/javascript" class="init">
  
$(document).ready(function() {
  $('#example').DataTable( {
    "scrollY": 400,
    "scrollX": true
  } );
} );

  </script>
  <style>
.box.box-solid.box-primary>.box-header a {
    color: #000;
}
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
.dataTables_length, .dataTables_filter
{
  display: none;
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
    <i class="fa fa-bars"></i>Menu</button>
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
          @if($index == 1)
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
  <div class="content-wrapper">

    <section class="content">
      <div class="row">
        
  
        
      </div>

          <div class="box box-primary box-solid">
            <div class="box-header" style="margin-bottom: 20px; background-color: #004A83; padding: 0;">
                  <div class="col-sm-2" style="margin-top: 7px;">
                    <h4>Project Profile</h4>
                  </div>
                  <div class="col-sm-9" style="padding-top: 3px;">
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse" style="display: block;">
                      <ul class="nav navbar-nav" style="padding-bottom:8px;">
                        @if($projects->project_type==null)
                        <li style="padding-top: 8px;"><a href="" class="btn btn-block btn-info btn-lg" style="padding:7px;" disabled>Type: None</a></li>
                        @else
                        <li style="padding-top: 8px;"><a href="/projecttype/{{$projects->project_type}}" class="btn btn-block btn-info btn-lg" style="padding:7px;">Type: {{$projects->project_type}}</a></li>
                        @endif
                        <li style="padding-top: 10px;"><div class="sharethis-inline-share-buttons"></div></li>
                        <li style="padding-top: 8px;"><a target="_blank" href="https://airtable.com/shrMbpSztHkjCXbHc" class="btn btn-block btn-info btn-lg" style="padding:7px;">Add Information</a></li>
                      </ul>
                  </div>
                  </div>
                </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row" style="margin: 0;">
                <div class="col-md-6">
                  <dl class="dl-horizontal">
                    <dt>Project Name: </dt><dd> {{$projects->project_projectid}}</dd>
                    <dt>Agency Name: </dt> <dd> {{$projects->magencyname}}</dd>
                    <dt>Description: </dt> <dd> {{$projects->project_description}}</dd>
                    <dt>City Cost: </dt><dd> ${{number_format($projects->project_citycost)}}</dd>
                    <dt>Non-City Cost: </dt><dd> ${{number_format($projects->project_noncitycost)}}</dd>
                    <dt>Total Cost: </dt> <dd> ${{number_format($projects->project_totalcost)}}</dd>
                    <dt>#of Commitments:</dt> <dd>{{sizeof(explode(",", $projects->project_commitments))}}</dd>
                  </dl>
                </div>
                <div class="col-md-6">
                    @if ($projects->project_lat==0 && $projects->project_long==0)
                      <p style="font-size: 16px; padding-right: 40px; padding-top: 60px;">There is no map data. Please add some by clicking "Add Information" and submitting an address for the project.</p>
                    @else
                    <div style="width: 100%; height: 300px;">

                      {!! Mapper::render() !!}
                    </div>
                    @endif
                </div>
              </div>
              <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Description</th>
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
              <dir class="text-right">
                    
              </dir>
              <div id="disqus_thread"></div>
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
