@extends('layouts.main')

@section('title','| Single Post')

@section('content')


    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-nav-area">
                        <h1 class="text-white">{{$post->title}}</h1>
                        <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="/blogs">Post Types </a><span class="lnr lnr-arrow-right"></span><a href="{{ url('blog/'.$post->slug) }}">Blog Post </a></p>
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
                    <!-- Start single-post Area -->
                    <div class="single-post-wrap">
                        <div class="feature-img-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset('images/'.$post->image) }}" alt="">
                        </div>
                        <div class="content-wrap">
                            <ul class="tags mt-10">
                                <li><a href="{{ url('category/'.$post->category->name) }}">{{$post->category->name}}</a></li>
                            </ul>
                            <a href="#">
                            <h3>{{$post->name}}</h3>
                            </a>
                            <ul class="meta pb-20">
                                <li><a href="{{ url('bloggers/'.$post->user->name) }}"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ date('M j,Y',strtotime($post->created_at))}}</a></li>
                                <li><a href="#"><span class="lnr lnr-bubble"></span>{{$post->comments()->count()}} </a></li>
                            </ul>
                            {!!$post->body!!}

                        <div class="navigation-wrap justify-content-between d-flex">
                            <a class="prev" href="#"><span class="lnr lnr-arrow-left"></span>Prev Post</a>
                            <a class="next" href="#">Next Post<span class="lnr lnr-arrow-right"></span></a>
                        </div>

                        <div class="comment-sec-area">
                            <div class="container">
                                <div class="row flex-column">
                                    <h6>{{ $post->comments()->count()}} Comments</h6>
                                    @foreach ($post->comments as $comment)
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="{{URL::asset('major/img/blog/c1.jpg')}}" alt="">
                                                </div>
                                                <div class="desc">
                                                <h5><a href="#">{{$comment->name}}</a></h5>
                                                    <p class="date">{{ date( 'M j Y h:ia',strtotime($comment->created_at))}}</p>
                                                    <p class="comment">
                                                       {{$comment->comment}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="" class="text-uppercase">reply</a>
                                            </div>
                                        </div>
                                        {{ Form::open(['route' => ['comments.store',$post->id], 'method' => 'POST']) }}

                                        <div class="form-group">
                                            {{ Form::textarea('reply', null, ['class' => 'form-control ','rows'=>'2','required=""',
                                            'onfocus'=>"this.placeholder = ''",'onblur'=>"this.placeholder = 'reply'",'placeholder'=>'Enter Comment']) }}

                                        </div>
                                        {!! Form::close() !!}

                                        <div class="reply-btn">
                                            <a href="" class="text-uppercase">reply</a>
                                        </div>

                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-form">
                        <h4>Post Comment</h4>

                    {{ Form::open(['route' => ['comments.store',$post->id], 'method' => 'POST']) }}
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-12 name">
                                    {{Form::text('name', null, ['class ' =>'form-control','placeholder'=>'Enter Name',
                                    'onfocus'=>"this.placeholder = ''",'onblur'=>"this.placeholder = 'Enter Name'"]) }}

                                </div>
                                <div class="form-group col-lg-6 col-md-12 email">
                                    {{Form::email('email', null, ['class ' =>'form-control','placeholder'=>'Enter Email',
                                    'onfocus'=>"this.placeholder = ''",'onblur'=>"this.placeholder = 'Enter Email'",'required']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::textarea('comment', null, ['class' => 'form-control mb-10','required=""',
                                'onfocus'=>"this.placeholder = ''",'onblur'=>"this.placeholder = 'Enter Email'",'placeholder'=>'Enter Comment']) }}

                            </div>
                            {{ Form::submit('Post Comment', ['class' =>'primary-btn text-uppercase']) }}

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- End single-post Area -->
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
