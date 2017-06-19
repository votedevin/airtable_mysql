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
        Ny - Data Sync <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
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
            <div class="container">
                <div class="row">                    
                    <div class="col-md-12">
                      <div class="table-responsive">                             
                        <table id="mytable" class="table table-bordred table-striped">  
                          <thead>
                            <th>No</th>
                            <th>Menu Label</th>
                            <th>Menu Link</th>
                            <th>Edit</th>
                          </thead>
                          <tbody>              
                            
                            @foreach($menuedits as $menuedit)
                            <tr>
                              <td>{{$menuedit->menu_id}}</td>
                              <td>{{$menuedit->menu_label}}</td>
                              <td>{{$menuedit->menu_link}}</td>
                              <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{$menuedit->menu_id}}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                            </tr>
                            <div class="modal fade" id="edit{{$menuedit->menu_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                   {!! Form::open(['url' => 'menu_update']) !!}
                                    <div class="form-group">
                                    <h4>Menu Label</h4>
                                      <input type="hidden" name="menu_id" id="menu_id" value="{{$menuedit->menu_id}}">
                                      <input class="form-control" name="menu_label" type="text" placeholder="{{$menuedit->menu_label}}">
                                    </div>
                                    <div class="form-group">
                                      <h4>Menu Link</h4>
                                     <input class="form-control" name="menu_link" type="text" placeholder="{{$menuedit->menu_link}}">
                                    </div>
                                  </div>
                                  <div class="modal-footer ">
                                    <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Update">
                                  </div>
                                 {!! Form::close() !!}
                                </div>
                                <!-- /.modal-content --> 
                              </div>
                                  <!-- /.modal-dialog --> 
                            </div>
                            @endforeach
                       
                          </tbody>            
                        </table>     
                      </div>   
                    </div>
                  </div>
              </div>


    


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