@extends('layouts.backend.app')
@push('header')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div class="content-wrapper">
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="">Profile</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  
</div>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-md-12">
         @if($errors->any())
          @foreach($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Erorr</span>{{$error}}
          </div>
          @endforeach
          @endif
      
        </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <strong class="card-tittle mb-3">Profile Card</strong>
          </div>
            <div class="card  body">
            
              <div class="mx-auto d-block">
                <img class="rounded-circle mx-auto d-block" src="{{asset('storage/user/'.$user->image)}}" alt="card image cap">
                <h5 class="text-sm-center mt-2 mb-1">{{$user->name}}</h5>
               
                </div>
           
            </div>
        </div>
      </div>
      <div class="col-md-8">
      <div class="card-body">
            <h4>Profile Content Below</h4>
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Credential</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <form action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                  @csrf
                  @method('PUT')
                <div class="row form-grup">
                  <div class="col col-md-3"><label class="form-control-label">Email</label></div>
                    <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$user->email}}</p>
                    </div>
                </div> 
                      <div class="form-group">
                        <label>User-ID</label>
                        <input type="text" id="userid" name="userid" class="form-control" value="{{$user->userid}}" placeholder="Enter ...">
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter ...">
                      </div>
                      <div class="form-group">
                    <label for="exampleInputFile">Profile-Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control-file" id="file-input" name="image">
                        <label class="custom-file-label" for="file-input">Choose file</label>
                      </div>
                      </div>
                  </div>
                  <div class="form-group">
                        <label>About</label>
                        <textarea name="about" id="about" class="form-control" rows="4" placeholder="Enter ...">{{$user->about}}</textarea>
                  </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i>Submit
                    </button>
               </form>
              </div>
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                <form action="{{route('admin.profile.password')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                  @csrf 
                  @method('PUT')
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">
                    
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                  
                  </div>
                  <div class="form-group">
                    <label for="password_confimation">Confirm_Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="New Password">
                    
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i>Submit
                    </button>
                </form>
              </div>
              
            </div>
          </div> 
      </div>
    </div>  
  </section>
  <!-- /.content -->
  


</div>
@endsection
@push('footer')
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endpush