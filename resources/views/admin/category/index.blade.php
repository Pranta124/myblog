@extends('layouts.backend.app')
@push('header')

<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush

@section('content')
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-md-12">
         @if($errors->any())
          @foreach($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Erorr</span>{{$error}}
          </div>
          @endforeach
          @endif
      
        </div>
        <div class="col-sm-6">
          <h1 class="m-0">Category</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Category</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>CategoryTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
               <i class="fa fa-plus"></i>
          </button>
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
      <h3 class="card-title">Category Data</h3>
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
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                     <th>Action</th>
                 
                  </thead>
                  <tbody>
                    @foreach ($categories as $key => $category)
                    <tr>
                      <td>{{$key+1}}</td>
                    <td >{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                     <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal-{{$category->id}}">
                       
                        <i class="fa fa-eye"></i>
                       </button>
                       <button type="button" class="btn btn-success"data-toggle="modal" data-target="#editModel-{{$category->id}}">
                        
                         <i class="fa fa-edit"></i>
                       </button>
                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$category->id}}">
                        
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
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="Launch Primary Modal"
    data-backdrop="static" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-tittle" id="Launch Default Modal">Create Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-level="close">
              <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.category.store')}}"method="post" id="createCategory" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="form-group">
              <label for="text-input">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
   
            <div class="form-group">
              <label>Description</label>
                <textarea name="description" class="form-control"  id="textarea-input" rows="3" placeholder="Enter ..." style="height: 69px;"></textarea>
            </div>
            <div class="form-group">
              <label>Category image </label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="file-input">Choose file</label>
                </div>
              </div>
            </div> 
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"  onclick="event.preventDefault();
                document.getElementById('createCategory').submit();">Submit</button>
            </div>
          </form>
        </div>
  
      </div>
    </div>
  </div>
  @foreach ($categories as $category)
  <div class="modal fade" id="viewModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="Launch Default Modal"
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
          <div class="row">
            <div class="col-sm-6">
              <div class="row form-group">
            
                <div class="col col-md-3">
                  <label class="form-control-label">Name</label>
                </div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static">{{$category->name}}</p>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                   <label class="form-control-label">Slug</label>
                </div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static">{{$category->slug}}</p>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label class="form-control-label">Created At</label>
                </div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static">{{$category->created_at}}</p>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label class="form-control-label">Updated At</label>
                </div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static">{{$category->updated_at}}</p>
                </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label class="form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-9">
                  <p class="form-control-static">{{$category->description}}</p>
                </div>
              </div>
            </div>
            <!-- end sm-6 -->
            <div class="col-sm-6">
              <img src="{{asset('storage/category/'.$category->image)}}" alt="{{$category->image}}">
            </div>
          </div> 
       
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    
          </div>
        </div>
      </div>
    </div>
  </div>
<!--View-->
  <div class="modal fade" id="editModel-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="Launch Primary Modal"
    data-backdrop="static" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
          <h5 class="modal-tittle" id="Launch Default Modal">Edit-Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-level="close">
               <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.category.update',$category->id)}}"method="post" id="editcategory-{{$category->id}}" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="text-input">Name</label>
                <input type="text" class="form-control" value="{{$category->name}}" id="name" name="name" placeholder="Enter your name">
            </div>
   
            <div class="form-group">
              <label>Description</label>
                <textarea name="description" class="form-control"  id="textarea-input" rows="3" placeholder="Enter ..." style="height: 69px;">{{$category->description}}</textarea>
            </div>
            <div class="form-group">
              <label>Category-image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                   <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"  onclick="event.preventDefault();
                document.getElementById('editcategory-{{$category->id}}').submit();">Submit</button>
            </div>
          </form>
        </div>
  
      </div>
    </div>
  </div>
<!--Edit-->
  <div class="modal fade" id="deleteModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="Launch Secondary Modal"
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
              document.getElementById('deletecategory-{{$category->id}}').submit();" >Confirm</button>
              <form action="{{route('admin.category.destroy',$category->id)}}" style="display : none" id= "deletecategory-{{$category->id}}" method="POST">
                 @csrf
                 @method('DELETE')
              </form>
        </div>
      </div>
    </div>
  </div>
<!--delete-->
</div>
</div>
</div>
</div>
</section>

@endforeach

</div>
@endsection
@push('footer')
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
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
 @endpush