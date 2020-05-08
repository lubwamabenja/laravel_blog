@extends('layouts.main')

@section('title',"| $user->name Posts")

@section('content')


    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-nav-area">
                        <h1 class="text-white">{{$user->name }} Posts</h1>
                        <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span><a>Bloggers</a> <span class="lnr lnr-arrow-right"></span><a>{{$user->name}}</a></p>
                    </div>
                </div>
                @foreach ($mainPosts as $mainPost)


                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>Latest Post:</span><a href="{{ url('blog/'.$mainPost->slug) }}">{{$mainPost->title}}</a></h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">All Posts</h4>
                        @foreach ($posts as $post)
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset('images/'.$post->image) }}" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="{{ url('category/'.$post->category->name) }}">{{$post->category->name}}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-7 post-right">
                                <a href="{{ url('blog/'.$post->slug) }}">
                                    <h4>{{$post->title}}</h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="{{ url('bloggers/'.$post->user->name) }}"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ date( 'M j Y',strtotime($post->created_at))}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span>{{$post->comments()->count()}}Comments</a></li>
                                </ul>
                                <p class="excert">
                                    {{substr(strip_tags($post->body),0,100)}}...
                                </p>
                            </div>
                        </div>
                        @endforeach

                        <div class="load-more">
                            <div class="row">
                                <div class="col-md-12 text-center">

                                        {!! $posts->links()  !!}

                                </div>
                              </div>
                        </div>

                    </div>
                    <!-- End latest-post Area -->
                </div>
                <div class="col-lg-4">
                    <div class="sidebars-area">

                        <div class="single-sidebar-widget newsletter-widget">
                            <h6 class="title">Newsletter</h6>
                            <p>
                                Here, I focus on a range of items
                                andfeatures that we use in life without
                                giving them a second thought.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="col-autos">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="text">
                                    </div>
                                </div>
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p>
                                You can unsubscribe us at any time
                            </p>
                        </div>
                        <div class="single-sidebar-widget most-popular-widget">
                            <h6 class="title">Most Popular</h6>
                            @foreach ($popularPosts as $popularPost)


                            <div class="single-list flex-row d-flex">
                                <div class="thumb">
                                    <img src="{{ asset('images/'.$popularPost->image) }}" width="100px" alt="">
                                </div>
                                <div class="details">
                                    <a href="image-post.html">
                                        <h6>{{$popularPost->title}}</h6>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ date('M j,Y',strtotime($popularPost->created_at))}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span>{{$popularPost->comments()->count()}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        <div class="single-sidebar-widget social-network-widget" style="margin-bottom: 80px">
                            <h6 class="title">Tags</h6>

                            <ul class="tags">
                                @foreach ($tags as $tag)
                                    <li><a href="{{ url('tags/u/'.$tag->name) }}">{{$tag->name}}</a></li>
                                   @endforeach
                            </ul>

                        </div>
                        <div class="single-sidebar-widget social-network-widget">
                            <h6 class="title">Social Networks</h6>

                                <ul class="categories">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ url('category/'.$category->name) }}">{{$category->name}}<span>{{$category->posts()->count()}}</span></a></li>
                                     @endforeach
                                </ul>
                        </div>
                        <div class="single-sidebar-widget social-network-widget">
                            <h6 class="title">Social Networks</h6>
                            <ul class="social-list">
                                <li class="d-flex justify-content-between align-items-center fb">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>

                                    </div>
                                    <a href="#">Like our page</a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center tw">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>

                                    </div>
                                    <a href="#">Follow Us</a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center yt">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>

                                    </div>
                                    <a href="#">Subscribe</a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center rs">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-rss" aria-hidden="true"></i>

                                    </div>
                                    <a href="#">Subscribe</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->



@endsection
