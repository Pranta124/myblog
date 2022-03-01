@extends('layouts.backend.app')
@push('header')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush

@section('content')
<div class="content-wrapper">
@include('layouts.backend.partials.header');

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#" class="active" >Users-Table</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  
  </section>
  
  <!-- /.content-header -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Users Data</h3>
    </div>
       <!-- /.card-header -->
      <div class="card">
            
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
    <div class="col-sm-12 col-md-6">
      <div id="example1_filter" class="dataTables_filter">
        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
      </div>
    </div>
  </div>
  <div class="row">
    
      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                  <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>User Id</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                     <th>Action</th>
                 
                  </thead>
                  <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                      <td>{{$key+1}}</td>
                    <td >{{$user->name}}</td>
                    <td>{{$user->role_id}}</td>
                    <td>{{$user->userid}}</td>
                    <td>{{$user->email}}</td>
                    <td >{{$user->created_at}}</td>
                    <td >{{$user->updated_at}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal-{{$user->id}}">
                       
                        <i class="fa fa-eye"></i>
                       </button>
                       <button type="button" class="btn btn-success "data-toggle="modal" data-target="#editModal-{{$user->id}}">
                        
                         <i class="fa fa-edit"></i>
                       </button>
                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$user->id}}">
                        
                         <i class="fa fa-trash"></i>
                       </button>
                    </td>
                    </tr>
                    @endforeach
               </tbody>
                 
                </table>
              </div>
              <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
               </div>
               <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
      <!--Card body-->

  </div>
</div>
</div>
</div>
<!--start-->
<div class="animated">
  @foreach ($users as $user)
<div class="modal fade" id="viewModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="Launch Default Modal"
data-backdrop="static" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-tittle" id="Launch Default Modal">ViewModal</h5>
    <button type="button" class="close" data-dismiss="modal" aria-level="close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="modal-body">
  <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">Name</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->name}}</p>
     </div>
   </div>
   <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">Role</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->role_id}}</p>
     </div>
   </div>
   <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">User Id</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->userid}}</p>
     </div>
   </div>
   
  
  <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">Email</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->email}}</p>
     </div>
  </div>
  <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">Created At</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->created_at}}</p>
     </div>
  </div>
  <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">Created At</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->created_at}}</p>
     </div>
  </div>
  <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">Updated At</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->updated_at}}</p>
     </div>
  </div>
  <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">About</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->about}}</p>
     </div>
  </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    
  </div>
</div>
</div>
</div>
<!--View-->
<div class="modal fade" id="editModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="Launch Primary Modal"
data-backdrop="static" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-tittle" id="Launch Default Modal">EditUser</h5>
    <button type="button" class="close" data-dismiss="modal" aria-level="close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="modal-body">
    <form action="{{route('admin.users.update',$user->id)}}"method="post" id="editUser-{{$user->id}}" encrypt="multipart/form-data" class="form-horizontal">
    @csrf
    @method('PUT')
   <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">Name</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static">{{$user->name}}</p>
     </div>
   </div>
   <div class="row form-group">
     <div class="col col-md-3">
       <label class="form-control-label">User Id</label>
     </div>
     <div class="col-12 col-md-9">
       <p class="form-control-static"> {{$user->userid}}</p>
     </div>
   </div>
   <div class="row form-group">
     <div class="col col-md-3">
    <label class="form-control-label">Role</label>
    </div>   
  <div class="col col-md-9">
    <div class="form-check">
      @foreach ($roles as $role)
      <div class="radio">
        <label for="radio1" class="form-check-label">
          <input type="radio" id="{{$role->id}}" name="role" value="{{$role->id}}"
          class="form-check-input" {{$user->role->id == $role->id ? 'checked' : " "}}>{{$role->name}}
        </label>
        </div>
        @endforeach
      </div>
   
  </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary"  onclick="event.preventDefault();
    document.getElementById('editUser-{{$user->id}}').submit();">Submit</button>
  </div>
   </form>
  </div>
  
</div>
</div>
</div>
<!--Edit-->
<div class="modal fade" id="deleteModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="Launch Secondary Modal"
 data-backdrop="static"   aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-tittle" id="Launch Default Modal">Delete User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-level="close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="modal-body">
    <p>
      The user will be deleted.
    </p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteUser-{{$user->id}}').submit();" >Confirm</button>
    <form action="{{route('admin.users.destroy',$user->id)}}" style="display: none" id="deleteUser-{{$user->id}}" method="POST">
  @csrf
  @method('DELETE')
  </form>
  </div>
</div>
</div>
</div>
<!--delete-->
<!--end-->
</div>
</div>
</div>
</div>
</section>

@endforeach

</div>
@endsection
@push('footer')
<script src="{{asset('backend/../../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('backend/../../plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/../../plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/../../dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/../../dist/js/demo.js')}}"></script>
  <script src="{{asset('backend/http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js')}}"></script>
  <script>
  $(document).ready(function()
  {
    (function($)
    {
      $('#filter').keyup(function()
      {
        var rex = new RegExp($(this).val(),'i');
        $('.searchable tr').hide();
        $('.searchable tr').filter(function()
        {
          return rex.test($(this).text());
        }).show();
      })
    }(jQuery));
  });
  </script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
 @endpush