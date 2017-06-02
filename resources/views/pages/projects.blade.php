@extends('admin.layouts.dashboard')

@section('template_title')
  Welcome {{ $user->name }}
@endsection

@section('template_fastload_css')
@endsection

@section('content')
  <link href="../../resources/css/jquery.dataTables.css" rel="stylesheet" type="text/css">

  <link href="../../resources/css/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
  <link href="../../resources/css/shCore.css" rel="stylesheet" type="text/css" />
  <link href="../../resources/css/shThemeDefault.css" rel="stylesheet" type="text/css" />
  <link href="../../resources/css/chosen.min.css" rel="stylesheet" type="text/css" />
  <style>
    body {
      font-size: 12px;
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
   <div class="content-wrapper">
      <section class="content-header">

      <h1>
        Ny - Commitments <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
    <section class="content">   

       <div class="box box-primary box-solid">
            <div class="box-header">
            <h4>Projects</h4> 
    
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
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
                  <td><a href="/pages/projects/{{$project->project_recordid}}"> {{$project->project_projectid}}</a></td>
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
</body>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.min.js"></script>
    <script src="../../js/bootstrap-select.js"></script>
    <script src="../../resources/js/chosen.jquery.min.js"></script>
    <script src="../../resources/js/jquery.dataTables.yadcf.js"></script>
    <script src="../../resources/js/dom_source_example1.js"></script>
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

@endsection