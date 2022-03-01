@extends('layouts.frontend.app')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('frontend/img/carousel-1.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best blogger site</h5>
                                <h1 class="display-3 text-white animated slideInDown">The Best Online Blogger Platform</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('frontend/img/carousel-2.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best blogger site</h5>
                                <h1 class="display-3 text-white animated slideInDown">The Best Online Blogger Platform</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Latest Post</h6>
                <h1 class="mb-5">Find the lates Post from all categories</h1>
            </div>
            <div class="row g-3">
            @foreach ($posts as $post)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="$post->image">
                            <i class="fa far-post"></i>
                            <p class="date">{{$post->created_at->diffForHumans()}}</p>
                            <h4 class="text-primary"><a href="{{route('post',$post->slug)}}">{{$post->tittle}}</a></h4>
                        </div>
                    </div>
                </div>
                
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Service End -->


    


    

    <!--  Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h4 class="section-title bg-white text-center text-primary px-3">Hot Topics</h4>
                <h6 class="mb-5"> The post which are most views in this week</h6>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach($posts as $post)
                <div class="testimonial-item text-center">
                    <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="$post->image" />
                    <h5 class="mb-0"><a href="{{route('post',$post->slug)}}">{{$post->tittle}}</a></h5>
                    <div class="date">{{$post->created_at->diffForHumans()}}</div>
                    <div class="text-center p-4 pb-0">
                    <p>{!! Str::limit($post->body, 400)!!}</p>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-heart" aria-hidden="true"></i><a href="#">{{$post->likedUsers->count()}} Likes</a></small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">{{$post->comments->count()}}Comments</a></small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">{{$post->view_count}} Views</a></small>   
                    </div>
                </div>  
                @endforeach 
                <div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div>
                    <div class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div></div>
                </div>
            </div>
        </div>
    </div>
    <!--  End -->

    


    
    <!--about start-->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('frontend/img/admin.jpg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="mb-4">Pranta Roy</h2>
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Creator</h6>
                    <h1 class="mb-4">Welcome to Know about me...</h1>
                    <p class="mb-4">I am a Web Developer..  I working with Laravel framework-php.</p>
                    <p class="mb-4">Email:prantaroy1997@gmail.com</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!--about end-->
  
  
@endsection