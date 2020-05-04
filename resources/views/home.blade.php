@extends('main')

@section('title','| Homepage')

@section('content')

        <!-- Home -->
@foreach ($mainPosts as $mainPost)
<div class="home">
    <div class="background_image" style="background-image:url({{ asset('images/'.$mainPost->image) }})">
        </div>
    <div class="home_container">
            <div class="container">
            <div class="row">
                <div class="col">
                <div class="home_content">
                    <div class="home_title">{{$mainPost->title}}</div>
                    <div class="button home_button"><a href="{{ url('blog/'.$mainPost->slug) }}"><span>read more</span><span>read more</span></a></div>
                </div>
                </div>
            </div>
            </div>
    </div>
</div>


@endforeach

      <br>
      <br>


      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">

                @foreach ($posts as $post)<!--=================== Start of the for each loop==========================-->


                <div class="col-md-6">
                <a href="{{ url('blog/'.$post->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="{{ asset('images/'.$post->image) }}" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="{{ asset('images/profile/'.$post->user->image) }}" alt="nathan"> {{$post->user->name}}</span>&bullet;
                        <span class="mr-2">{{ date('M j,Y',strtotime($post->created_at))}}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> {{$post->comments()->count()}}</span>
                      </div>
                      <h2>{{$post->title}}</h2>
                    </div>
                  </a>
                </div>
                @endforeach <!--================= End of the for each loop===================================-->

              </div>
         </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                <form action="#" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->
              @foreach ($users as $user)

              <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="{{ asset('images/profile/'.$user->image) }}" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>{{$user->name}}</h2>
                  <p>{{$user->bio}}</p>
                    <p><a href="#" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div>

              @endforeach

              <!-- Start sidebar-box -->
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                    @foreach ($popularPosts as $popularPost)

                    <li>
                      <a href="">
                        <img src="{{ asset('images/'.$popularPost->image) }}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>{{$popularPost->title}}</h4>
                          <div class="post-meta">
                            <span class="mr-2">{{ date( 'M j Y h:ia',strtotime($popularPost->created_at))}}</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    @endforeach

                  </ul>
                </div>
              </div>


              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                    @foreach ($categories as $category)
                         <li><a href="#">{{$category->name}}<span>{{$category->posts()->count()}}</span></a></li>
                @endforeach
                </ul>
              </div>


              <div class="sidebar-box">
                <h3 class="heading">Tags</h3>
                <ul class="tags">
                    @foreach ($tags as $tag)
                    <li><a href="#">{{$tag->name}}</a></li>
                   @endforeach
                </ul>
              </div>
            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>

   @endsection
