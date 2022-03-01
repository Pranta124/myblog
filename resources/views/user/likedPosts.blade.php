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
          <h1 class="m-0">Liked Post</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">LikedPost</a></li>
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
          <h1>LikedPost-Tables</h1>
        </div>
         <!-- <div class="col-sm-6"> 
          <ol class="breadcrumb float-sm-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
               <i class="fa fa-plus"></i>
          </button>
          </ol>
        </div> -->
       
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
      <h3 class="card-title">Liked Post Data</h3>
    </div>
       <!-- /.card-header -->
      <div class="card">
            
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
    <!-- <div class="col-sm-12 col-md-6">
      <div id="example1_filter" class="dataTables_filter">
        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
      </div>
    </div> -->
  </div>
  <div class="row">
    
      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                  <thead>
                    <th>#</th>
                    <th>Post Tittle</th>
                    <th>Category</th>
                    <th>Views $ Like</th>
                    <th>Created_At</th>
                  </thead>
                  <tbody>
                    @foreach (Auth::user()->likedPosts as $key => $post)
                    <tr>
                      <td>{{$key+1}}</td>
                    <td ><a href="{{route('post',$post->slug)}}">{{$post->tittle}}</td>
                    <td>{{$post->category->name}}</td>
                     <td><button  class="btn btn-danger" type="button"><i class="fa fa-heart"></i>{{$post->likedUsers->count()}}</button><button class="btn btn-info" type="button"><i class="fa fa-eye"></i>{{$post->view_count}}</button></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    
                    </tr>
                    @endforeach
               </tbody>
                 
                </table>
              </div>
             
               </div>
               
              <!-- /.card-body -->
            </div>
      <!--Card body-->

  </div>
</div>
</div>
</div>
<!--start-->
</div>
</div>
</div>
</section>



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