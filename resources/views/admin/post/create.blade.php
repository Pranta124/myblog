@extends('layouts.backend.app')
@push('header')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush

@section('content')
<div class="content-wrapper">

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
        <div class="col-sm-6">
          <h1> Create Post </h1>
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
            <h3 class="card-title">Post Table</h3>
          </div>
          <!-- <!card header.......!> -->
           <div class="card-body">
            <div class="card">
              <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
              @csrf
              <div class="form-group">
                <label for="tittle" class="form-control-label">Tittle</label>
                  <input type="text" id="tittle" name="tittle" class="form-control" placeholder="Enter the tittle ...">
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category" id="select">
                   @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group">
                  <label for="tag" class="form-control-label">Tags</label>
                  <input type="text" id="tag" name="tags" class="form-control" placeholder="Tag (Separated by ,)">
                </div>
                <div class="form-group">
                    <label for="status"class="form-control-label">Status</label>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox" name="status" 
                          value="1" checked="">
                          <label class="form-check-label" for="checkbox">publish</label>
                      </div>
                        
                </div>
                <div class="row form-group">
                  <div class="col col-md-3"><label for="file-input" class="form-control-label">
                    File-input</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="image" class="form-control-file">
                  </div> 
                </div> 
                <div class="form-group">
                  <label>Body</label>
                    <textarea name="body" id="summernote" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            </div>
              <!-- /.card -->
          </div>
          <!--Card body-->

  
          <!--start-->


        </div>
      </div>
    </div>
  </div>
</section>



</div>
@endsection
@push('footer')
<script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 300,
        // toolbar: [
        //   ['style', ['style']],
        //   ['font', ['bold', 'underline', 'clear']],
        //   ['color', ['color']],
        //   ['para', ['ul', 'ol', 'paragraph']],
        //   ['table', ['table']],
        //   ['insert', ['link', 'picture', 'video']],
        //   ['view', ['fullscreen', 'codeview', 'help']]
        // ]
      });
    </script>
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