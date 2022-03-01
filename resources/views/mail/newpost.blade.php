@extends('layouts.frontend.app')
@section('content')
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="section-title bg-white text-center text-primary px-3"></h3>
                <h1 class="mb-5">Pranta Roy</h1>
            </div>
            <div class="row g-4">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="$post->image">
                        </div>
                        <div class="date mt-20 mb-20">{{$post->created_at->diffForHumans()}}</div>
                        <div class="text-center p-4 pb-0">
                            <a hre="{{route('post',$post->slug)}}"><h5 class="mb-0">{{$post->tittle}}</h5></a>
                          
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{$post->user->name}}</h5>
                            
                        </div>
                        <div class="user-img">
                            <img class="img-fluid" src="{{asset('storage/user/'.$post->user->image)}}" alt="{{$post->user->name}}" width="50px"/>
                        </div>
                        <h4 class="text-muted">{{$post->category->name}}</h4>
                        <p>{!!Str::limit($post->body,300)!!}</p>
                        <div class="d-flex border-top">
                            
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-heart" aria-hidden="true"></i><a href="#">{{$post->likedUsers->count()}} Likes</a></small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">{{$post->comments->count()}} Comments</a></small>
                                
                        </div>
                        <div class="justify content-center d-flex">
                        <a href="{{route('post',$post->slug)}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                        </div>
                        
                    </div>
                </div>
               
            </div>
                    <div class="row justify-content-right">
                        <div class="col-6 mail-footer">
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>prantaroy1997@gmail.com</p>
                            <p>2021 @Pranta roy.All Rights Reserved</p>
                        </div>
                    </div>  
        </div>
      

</div>
@endsection