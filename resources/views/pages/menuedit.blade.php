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
        NY Speaks - Menu Edit <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
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
                      <p data-placement="top" data-toggle="tooltip"><button class="btn btn-info" data-title="Create" data-toggle="modal" data-target="#create" >Top Menu</button></p>
                      <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <h4 class="modal-title custom_align" id="Heading">Create Your Detail</h4>
                            </div>
                            <div class="modal-body">
                             {!! Form::open(['url' => 'menu_create']) !!}
                              <div class="form-group">
                              <h4>Top Menu Label</h4>
                                <input class="form-control" name="menu_top_label" type="text">
                              </div>
                              <div class="form-group">
                                <h4>Top Menu Link</h4>
                               <input class="form-control" name="menu_top_link" type="text">
                              </div>
                            </div>
                            <div class="modal-footer ">
                              <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Create">
                            </div>
                           {!! Form::close() !!}
                          </div>
                          <!-- /.modal-content --> 
                        </div>
                            <!-- /.modal-dialog --> 
                      </div>
                      <div class="table-responsive">                             
                        <table id="mytable" class="table table-bordred table-striped">  
                          <thead>
                            <th>No</th>
                            <th>Top Menu Label</th>
                            <th>Top Menu Link</th>
                            <th style="width: 20px;">Edit</th>
                            <th>Delete</th>
                          </thead>
                          <tbody>              
                            
                            @foreach($menu_tops as $index => $menu_top)
                            <tr>
                              <td>{{$index+1}}</td>
                              <td>{{$menu_top->menu_top_label}}</td>
                              <td>{{$menu_top->menu_top_link}}</td>
                              <td><p data-placement="top" data-toggle="tooltip"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{$menu_top->menu_top_id}}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                              <td><p data-placement="top" data-toggle="tooltip"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete{{$menu_top->menu_top_id}}" ><span class="glyphicon glyphicon-remove"></span></button></p></td>
                            </tr>
                            <div class="modal fade" id="edit{{$menu_top->menu_top_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                                      <input type="hidden" name="menu_top_id" id="menu_top_id" value="{{$menu_top->menu_top_id}}">
                                      <input class="form-control" name="menu_top_label" type="text" value ="{{$menu_top->menu_top_label}}">
                                    </div>
                                    <div class="form-group">
                                      <h4>Menu Link</h4>
                                     <input class="form-control" name="menu_top_link" type="text" value ="{{$menu_top->menu_top_link}}">
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
                            <div class="modal fade" id="delete{{$menu_top->menu_top_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                   {!! Form::open(['url' => 'menu_delete']) !!}
                                    <div class="form-group">
                                    <h4>Are you sure you want to delete ?</h4>
                                     <input type="hidden" name="menu_top_id" id="menu_top_id" value="{{$menu_top->menu_top_id}}">
                                  </div>
                                  <div class="modal-footer ">
                                    <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Delete">
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
                  <div class="row">                    
                    <div class="col-md-12">
                      <p data-placement="top" data-toggle="tooltip"><button class="btn btn-info" data-title="Create" data-toggle="modal" data-target="#create_main" >Main Menu</button></p>
                      <div class="modal fade" id="create_main" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <h4 class="modal-title custom_align" id="Heading">Create Your Detail</h4>
                            </div>
                            <div class="modal-body">
                             {!! Form::open(['url' => 'main_menu_create']) !!}
                              <div class="form-group">
                              <h4>Main Menu Label</h4>
                                <input class="form-control" name="menu_main_label" type="text">
                              </div>
                              <div class="form-group">
                                <h4>Main Menu Link</h4>
                               <input class="form-control" name="menu_main_link" type="text">
                              </div>
                            </div>
                            <div class="modal-footer ">
                              <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Create">
                            </div>
                           {!! Form::close() !!}
                          </div>
                          <!-- /.modal-content --> 
                        </div>
                            <!-- /.modal-dialog --> 
                      </div>
                      <div class="table-responsive">                             
                        <table id="mytable" class="table table-bordred table-striped">  
                          <thead>
                            <th>No</th>
                            <th>Top Menu Label</th>
                            <th>Top Menu Link</th>
                            <th style="width: 20px;">Edit</th>
                            <th>Delete</th>
                          </thead>
                          <tbody>              
                            
                            @foreach($menu_mains as $index => $menu_main)
                            <tr>
                              <td>{{$index+1}}</td>
                              <td>{{$menu_main->menu_main_label}}</td>
                              <td>{{$menu_main->menu_main_link}}</td>
                              <td><p data-placement="main" data-toggle="tooltip"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_main{{$menu_main->menu_main_id}}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                              <td><p data-placement="main" data-toggle="tooltip"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_main{{$menu_main->menu_main_id}}" ><span class="glyphicon glyphicon-remove"></span></button></p></td>
                            </tr>
                            <div class="modal fade" id="edit_main{{$menu_main->menu_main_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                   {!! Form::open(['url' => 'main_menu_update']) !!}
                                    <div class="form-group">
                                    <h4>Menu Label</h4>
                                      <input type="hidden" name="menu_main_id" id="menu_main_id" value="{{$menu_main->menu_main_id}}">
                                      <input class="form-control" name="menu_main_label" type="text" value ="{{$menu_main->menu_main_label}}">
                                    </div>
                                    <div class="form-group">
                                      <h4>Menu Link</h4>
                                     <input class="form-control" name="menu_main_link" type="text" value ="{{$menu_main->menu_main_link}}">
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
                            <div class="modal fade" id="delete_main{{$menu_main->menu_main_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                   {!! Form::open(['url' => 'main_menu_delete']) !!}
                                    <div class="form-group">
                                    <h4>Are you sure you want to delete ?</h4>
                                     <input type="hidden" name="menu_main_id" id="menu_main_id" value="{{$menu_main->menu_main_id}}">
                                  </div>
                                  <div class="modal-footer ">
                                    <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Delete">
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
                  <div class="row">                    
                    <div class="col-md-12">
                      <p data-placement="top" data-toggle="tooltip"><button class="btn btn-info" data-title="Create" data-toggle="modal" data-target="#create_left" >Left Menu</button></p>
                      <div class="modal fade" id="create_left" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <h4 class="modal-title custom_align" id="Heading">Create Your Detail</h4>
                            </div>
                            <div class="modal-body">
                             {!! Form::open(['url' => 'left_menu_create']) !!}
                              <div class="form-group">
                              <h4>Main Menu Label</h4>
                                <input class="form-control" name="menu_left_label" type="text">
                              </div>
                              <div class="form-group">
                                <h4>Main Menu Link</h4>
                               <input class="form-control" name="menu_left_link" type="text">
                              </div>
                            </div>
                            <div class="modal-footer ">
                              <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Create">
                            </div>
                           {!! Form::close() !!}
                          </div>
                          <!-- /.modal-content --> 
                        </div>
                            <!-- /.modal-dialog --> 
                      </div>
                      <div class="table-responsive">                             
                        <table id="mytable" class="table table-bordred table-striped">  
                          <thead>
                            <th>No</th>
                            <th>Top Menu Label</th>
                            <th>Top Menu Link</th>
                            <th style="width: 20px;">Edit</th>
                            <th>Delete</th>
                          </thead>
                          <tbody>              
                            
                            @foreach($menu_lefts as $index =>  $menu_left)
                            <tr>
                              <td>{{$index+1}}</td>
                              <td>{{$menu_left->menu_left_label}}</td>
                              <td>{{$menu_left->menu_left_link}}</td>
                              <td><p data-placement="left" data-toggle="tooltip"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_left{{$menu_left->menu_left_id}}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                              <td><p data-placement="left" data-toggle="tooltip"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_left{{$menu_left->menu_left_id}}" ><span class="glyphicon glyphicon-remove"></span></button></p></td>
                            </tr>
                            <div class="modal fade" id="edit_left{{$menu_left->menu_left_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                   {!! Form::open(['url' => 'left_menu_update']) !!}
                                    <div class="form-group">
                                    <h4>Menu Label</h4>
                                      <input type="hidden" name="menu_left_id" id="menu_left_id" value="{{$menu_left->menu_left_id}}">
                                      <input class="form-control" name="menu_left_label" type="text" value ="{{$menu_left->menu_left_label}}">
                                    </div>
                                    <div class="form-group">
                                      <h4>Menu Link</h4>
                                     <input class="form-control" name="menu_left_link" type="text" value ="{{$menu_left->menu_left_link}}">
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
                            <div class="modal fade" id="delete_left{{$menu_left->menu_left_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                   {!! Form::open(['url' => 'left_menu_delete']) !!}
                                    <div class="form-group">
                                    <h4>Are you sure you want to delete ?</h4>
                                     <input type="hidden" name="menu_left_id" id="menu_left_id" value="{{$menu_left->menu_left_id}}">
                                  </div>
                                  <div class="modal-footer ">
                                    <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Delete">
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