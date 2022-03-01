@extends('layouts.frontend.app')

@section('content')
 <!-- Team Start -->
 <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">The Post Page</h1>
                    <h6 class="text-white animated slideInDown">This page shows single post that available by the site</h6>
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
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="section-title bg-white text-center text-primary px-3">Post</h3>
                <h1 class="mb-5">Single Post</h1>
            </div>
            <div class="row g-4">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="$post->image">
                        </div>
                        <div class="text-center p-4 pb-0">
                         <h5 class="mb-0">{{$post->tittle}}</h5>
                          
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{$post->user->name}}</h5>
                            <div class="date mt-20 mb-20">{{$post->created_at->diffForHumans()}}</div>
                        </div>
                        <div class="user-img">
                            <img class="img-fluid" src="{{asset('storage/user/'.$post->user->image)}}" alt="{{$post->user->name}}" width="50px"/>
                        </div>
                        <h4 class="text-muted">{{$post->category->name}}</h4>
                        
                    </div>
                </div>
               
            </div>
           
        </div>
        <div class="tags">
            <ul>
             @foreach ($post->tags as $tag)
                <li><a href="#">{{$tag->name}}</a></li>
             @endforeach
            </ul>   
        </div>
        <div class="single-post-content">
            {!!$post->body!!}
        </div> 
        <div class="d-flex border-top">
            @guest
                <small class="flex-fill text-center border-end py-2"><i class="fa fa-heart" aria-hidden="true"></i>{{$post->likedUsers->count()}} Likes</small>
            @else
                <small class="flex-fill text-center border-end py-2"><a href="#" onclick="document.getElementById('like-form-{{$post->id}}').submit();"><i class="fa fa-heart" aria-hidden="true" style="color:{{
                    Auth::user()->likedPosts->where('post_id', $post->id)->count() > 0 ? 'red' : ''}}"></i></a>{{$post->likedUsers->count()}}Likes</small>
                <form action="{{route('post.like',$post->id)}}" method="POST" style="display: none" id="like-form-{{$post->id}}">
                    @csrf
                </form>
            @endguest
                <small class="flex-fill text-center border-end py-2"><i class="fa fa-comment" aria-hidden="true"></i> {{$post->comments->count()}} Comments</small>
                <small class="flex-fill text-center border-end py-2"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->view_count}} Views</small>          
        </div>
        <!-- start comment sec area -->
        <section class="comment-sec-area pt-80 pb-80">
            <div class="container">
                <div class="row flex-column">
                    <h5 class="text-uppercase pb-80">{{$post->comments->count()}} Comments</h5>
                        @foreach($post->comments as $comment)
                        <div class="comment">
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="single-comment justify-content-left d-flex">
                                        <div class="thumb">
                                            <img src="{{asset('storage/user/'.$comment->user->image)}}" alt="$comment->user->image" width=50px/>
                                        </div>
                                        <div class="desc">
                                        <h5><a href="">{{$comment->user->name}}</a></h5>
                                            <p class="date">{{$comment->user->created_at->format('D,d M Y H:i')}}</p> 
                                            <p class="comment">
                                                    {{$comment->comment}}
                                            </p>
                                        </div>
                                    </div>
                                        
                                    <div class="">
                                        <button class="btn-reply text-uppercase" id="reply-btn" onclick="showReplyForm('{{$comment->id}}','{{$comment->user->name}}')">Reply</button>
                                    </div>
                                     @if($comment->replies->count() > 0)
                                        @foreach($comment->replies as $reply)
                                            <div class="comment-list left-padding">
                                                <div class="single-comment justify-content -between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="{{asset('storage/user/'.$reply->user->image)}}" alt="{{$reply->user->image}}" width=50px/>
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#">{{$reply->user->name}}</a></h5>
                                                            <p class="date">{{$reply->created_at->format('D,d M Y H:i')}}</p>
                                                            <p class="comment">{{$reply->message}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <button class="btn-reply text-uppercase" id="reply-btn" 
                                                            onclick="showReplyForm('{{$comment->id}}','{{$reply->user->name}}')">reply1
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                     @else

                                     @endif
                                    <div class="comment-list left-padding" id="reply-form-{{$comment->id}}" style="display:none">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="" alt=""/>
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Pranta</a></h5>
                                                <p class="date">dec4,2021</p>
                                                <div class="row flex-row d-flex">
                                                    <form action="{{route('reply.store',$comment->id)}}" method="POST">
                                                        @csrf
                                                        <div class="col-lg-12">
                                                            <textarea id="reply-form-{{$comment->id}}-text" cols="60" rows="2" class="form-control mb-10" name="message" placeholder="Message"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn-reply text-uppercase ml-3">Reply</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </section>
            <!-- end comment sec area -->
        <!-- Start commentform area -->
        <section class="commentform-area pb-120 pt-80 mb-100">
            @guest
            <div class="container">
                <h4 class="text wow fadeInUp">Please log in to comment</h4>
            </div>
            @else
        
            <div class="container">
                <h5 class="text wow fadeInUp">Leave a Reply<h5>
                <div class="row flex-row d-flex">
                    <div class="col-lg-12">
                        <form action="{{route('comment.store',$post->id)}}" method="POST">
                            @csrf
                        
                            <textarea class="form-control mb-10" name="comment" placeholder="Message" 
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"
                                required="">
                            </textarea>
                            <button type="submit" class="primary-btn mt-20" href="#">Comment</button>
                        
                        </form>
                    </div>    
                </div>   
            </div>
       
            @endguest
        </section >
        <!-- End commentform area -->
        @include('layouts.frontend.partials.sidebar')
</div>   
@endsection
@push('footer')
    <script type="text/javascript">
        function showReplyForm(commentId,user)
        {
            var x = document.getElementById(`reply-form-${commentId}`);
            var input = document.getElementById(`reply-form-${commentId}-text`);
            if(x.style.display === "none")
            {
                x.style.display = "block";
                input.innerText=`@${user} `;
            }
            else
            {
                x.style.display = "none";
            }
        }
    </script>
@endpush