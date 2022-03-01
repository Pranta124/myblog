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
        <div class="col-sm-6">
          <h1 class="m-0">Post</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Post</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<section class="content-header">
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
      <div class="col-md-12">
       
         <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-info"> <i class="fa fa-plus"></i></a>
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal-{{$post->id}}">
                 
                  <i class="fa fa-trash"></i>
            </button>
         
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
            <h3 class="card-title">Post Table</h3>
          </div>
       <!-- /.card-header -->
          <div class="card">
            
            <div class="card-body">
              <div class="col-md-12 p-0"> 
                 <!-- <img src="{{asset('storage/post/'.$post->image)}}"   class="image w-100">  -->
              </div>
                
                  <h1>{{$post->tittle}}</h1>
                  <h5> {{$post->category->name}}</h5>
                  <p>Created at:{{$post->created_at}}</p>
                  <h5>Tags</h5>
                 <div class="my-2">
                   @if($post->tags)

                   @foreach($post->tags as $tag)
                      <a href="#" class="btn btn-outline-primary btn-flat btn-sm">{{$tag->name}}</a>
                   @endforeach
                      @endif
                  </div>
                  <hr>
                  <div>{!!$post->body!!}</div>
               
             
  

            </div>
              <!-- /.card-body -->
          </div>
      <!--Card -->

      </div>
    </div>
  </div>
</div>
<!--start-->
<div class="animated">

<div class="modal fade" id="deleteModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="Launch Secondary Modal"
 data-backdrop="static"   aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-tittle" id="Launch Default Modal">Delete Post</h5>
    <button type="button" class="close" data-dismiss="modal" aria-level="close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="modal-body">
    <p>
      The post will be deleted!!!
    </p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deletepost-{{$post->id}}').submit();" >Confirm</button>
    <form action="{{route('admin.post.destroy',$post->id)}}" style="display: none" id="deletepost-{{$post->id}}" method="POST">
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



</div>
@endsection
@push('footer')

  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
 @endpush