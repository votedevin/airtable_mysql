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
        Agencies <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

      {!! Breadcrumbs::render() !!}

      </section>
    <section class="content">
      <!-- search form -->
      <div class="row">
        
          <div class="col-sm-4 col-md-4">
            <div class="input-group col-md-12">
              <form action="/pages/agencies/find" method="POST" class="form-group">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" placeholder="Search (Agency Name)" name="find" style="    width: calc(100% - 40px);"> 
                <span class="input-group-btn">
                  <button class="btn btn-secondary" id="mysearchbutton" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </span>
              </form>


            </div>            
          </div>
          <div class="col-sm-8 col-md-8">
          <h4><b style="margin-left:30px;"> Total Cost</b> <a href="/pages/agencies/totalcostdesc"> <i class="fa fa-sort-amount-desc" aria-hidden="true"></i> </a><a href="/pages/agencies/totalcostasc"> <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> </a><b style="margin-left:65px; "> Projects </b> <a href="/pages/agencies/projectsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/pages/agencies/projectsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a><b style="margin-left:65px;"> Commitments </b><a href="/pages/agencies/commitmentsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/pages/agencies/commitmentsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></h4>

          </div>
        
      </div> 
      <!-- /.search form -->
      <!-- Your Page Content Here -->
      <div class="row" id="row">
          @foreach ($agencys as $agency)
            <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header with-border  text-center" style="height:55px">
                  <h3 class="box-title"><a href="/pages/project/{{$agency->agency_recordid}}">{{$agency->magencyname}}</a></h3>
                </div>
                <div class="box-body" id="tblData">
                  <dl class="dl-horizontal">
                    <dt>Agency Acronym </dt><dd>{{$agency->magencyacro}}</dd>
                    <dt># Project </dt><dd> {{$agency->projects}}</dd>
                    <dt># Commitments </dt><dd> {{$agency->commitments}}</dd>
                    <dt>Total Cost </dt><dd>${{number_format($agency->total_project_cost)}}</dd>
                  </dl>
                </div>
              </div>
            </div>
          @endforeach
      </div>
    
    </section>
  </div>
</body>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
   <script src="../js/airtable.browser.js"></script>
  <script src="../js/agency.js"></script>
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