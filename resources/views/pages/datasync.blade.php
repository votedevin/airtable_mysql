@extends('admin.layouts.dashboard')

@section('template_title')
  Welcome {{ $user->name }}
@endsection

@section('template_fastload_css')

@endsection

@section('content')
    <style>
      .box-header.with-border {
      border-bottom: 1px solid #f4f4f4;
      height: 55px;
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
        NY Speaks - Data Sync <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
      <section class="content">
          <div class="box box-primary box-solid">
            <div class="box-header">

              <h3 class="box-title" style="margin: 5px;"></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="text-left">
              <a href="http://52.10.101.155/agency.php">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Agencies from Airtable
              </a>
              <h4>Updated Date: {{$agencyupdate->created_at}}</h4>
            </div>
            <div class="text-left">
              <a href="http://52.10.101.155/project.php">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Projects from Airtable
              </a>
              <h4>Updated Date: {{$projectupdate->created_at}}</h4>
            </div>
            <div class="text-left">
              <a href="http://52.10.101.155/commitment.php">
                <i class="fa fa-download" aria-hidden="true"></i>
                Update Commitments from Airtable
              </a>
              <h4>Updated Date: {{$commitmentupdate->created_at}}</h4>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

      </section>
  </div>
</body>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
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
