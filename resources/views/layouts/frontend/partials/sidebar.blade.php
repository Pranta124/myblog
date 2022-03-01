@php
    $categories = App\Models\Category::all();
@endphp

        <div class="col-lg-4 sidebar-area">
            <div class="single_widget cat_widget">
                <h4 class="text-uppercase pb-20">Post categories</h4>
                <ul>
                    @foreach ($categories as $category)
                    @php
                        $count = App\Models\Post::where('category_id',$category->id)->count();
                    @endphp
                        <li>
                            <a href="{{route('category.post',$category->slug) }}">{{$category->name}}-<span>{{ $count }}</span></a> 
                        </li>
                    @endforeach
                </ul>
            </div>  
        </div> 
        <div class="single_widget recent_widget">
           <h4 class="text-uppercase pb-20">Recent Posts</h4>
           <div class="owl-carousel testimonial-carousel position-relative">
                @foreach($posts->take(3) as $latestPost)
               <div class="item">
                    <img class="img-fluid" src="{{asset('storage/post/'.$latestPost->image)}}" alt="$latestPost->image" width="50px" />
                    <a href="{{route('post',$latestPost->slug)}}">
                    <p class="mt-20 tittle text-uppercase">
                        {{$latestPost->tittle}}
                    </p>
                    </a>
                    
                    <p>
                        {{$latestPost->created_at->diffForHumans()}}
                        <span>
                            <i class="fa fa-heart" aria-hidden="true">{{$post->likedUsers->count()}}likes</i>
                            <i class="fa fa-comment" aria-hidden="true">{{$post->comments->count()}}Comments</i>
                        </span>
                    </p>         
                </div>
                @endforeach
                <div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div>
                    <div class="owl-dots">
                        <div class="owl-dot active">
                            <span></span>
                        </div>
                        <div class="owl-dot">
                            <span></span>
                        </div>
                        <div class="owl-dot">
                            <span></span>
                        </div>
                        <div class="owl-dot">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="single_widget search_widget">
    <div id="imaginary_container">
        <form action="{{route('search')}}" method="GET"> 
            
            <h4 class="text-uppercase pb-20">Search</h4>
            <div class="input-group stylish-input-group">
                <input type="text" class="form control" placeholder="Search" name="search"/>
                    <span class="input-group-addon">
                        <button type="submit">
                        <i class="fa fa-search"></i>
                        </button>
                    </span>
            </div>
        </form>
    </div>
</div>   
@php
    $tags = App\Models\Tag::all();
    $recentTags= $tags;
@endphp

<div class="single_widget tag_widget">
    <h4 class="text-uppercase pb-20">Tag Clouds</h4>
        <ul>
            @foreach ($recentTags->unique('name')->take(10) as $recentTag)
                <li><a href="{{route('tag.posts',$recentTag->name)}}">{{$recentTag->name}}</a></li>
            @endforeach
        </ul>
</div>  