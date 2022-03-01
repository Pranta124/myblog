@extends('layouts.frontend.app')
@section('content')
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">All Post of {{$query}}</h1>
                    <h6 class="text-white animated slideInDown">This page shows all the tags that available by the site</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Tag</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Post</li>
                        </ol>
                    </nav>    
                </div>
            </div>
        </div>
    </div>
 <!-- Posts Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="section-title bg-white text-center text-primary px-3">Tags</h4>
                <h1 class="mb-5">All Post of tag</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @if ($tags->count() > 0)
                @foreach ($tags as $tag)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/post/'.$tag->post->image)}}" alt="{{$tag->post->image}}">
                            
                        </div>
                        <div class="date mt-20 mb-20">{{$tag->post->created_at->diffForHumans()}}</div>
                        <div class="text-center p-4 pb-0">
                          <a href="{{route('post',$tag->post->slug)}}"> <h5 class="mb-0">{{$tag->post->tittle}}</h5></a>
                           <p>{!! Str::limit($tag->post->body, 400) !!}</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-heart" aria-hidden="true"></i><a href="#">{{$post->likedUsers->count()}}Likes</a></small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">{{$post->comments->count()}}Comments</a></small>
                            
                        </div>
                    </div>
                </div>
               @endforeach
               @else
               <h1  class="text-center wow fadeInUp" >No posts available</h1>
               @endif
               <div class="justify-content-center d-flex mt-5">
                         {{ $tags->appends(Request::all())->links()}}
                </div>
            
            </div>
        </div> 
        @include('layouts.frontend.partials.sidebar'); 
</div>
    <!-- Courses End -->
   
@endsection