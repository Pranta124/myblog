@extends('layouts.frontend.app')
@section('content')
<!-- Team Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">The Category Page</h1>
                    <h6 class="text-white animated slideInDown">This page shows all the categories that available by the site</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Posts</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Categories</li>
                        </ol>
                    </nav> 
                </div>
            </div>
        </div>
    </div>
<div class="main-wrapper">
    <section class="fashion-area section-gap" id="fashion">
        <div class="container">
            
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="section-title bg-white text-center text-primary px-3">Categories</h4>
                <h1 class="mb-5">All Categories</h1>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-3 col-md-6 single-fashion">
                    <img class="img-fluid" src="{{asset('storage/category/'.$category->image)}}" alt="{{$category->image}}"/>
                    <p class="date">{{$category->created_at->format('D,d M Y H:i')}}</p>
                    <h4><a href="{{route('category.post',$category->slug)}}">{{$category->name}}</a></h4>
                    
                    
                </div>
                @endforeach
            </div>
            
        </div>
        
    </section>   
</div>
@endsection