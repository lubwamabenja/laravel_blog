@extends('main')

@section('title',"| $post->title")

@section('content')

<!-- Home -->


          <br>
          <br>
          <br>
          <br><br>

      <!-- END header -->


      <section class="site-section py-lg">
        <div class="container">

          <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">
              <img src="{{ asset('images/'.$post->image) }}" alt="Image" class="img-fluid mb-5">
               <div class="post-meta">
                          <span class="author mr-2"><img src="{{ URL::asset('images/person_1.jpg')}}" alt="Colorlib" class="mr-2">{{$post->user->name}}</span>&bullet;
                          <span class="mr-2">{{ date('M j,Y',strtotime($post->created_at))}}</span> &bullet;
                          <span class="ml-2"><span class="fa fa-comments"></span> {{ $post->comments()->count()}}</span>
                        </div>
              <h1 class="mb-4">{{ $post->title}}</h1>

              @foreach ($post->tags as $tag)
                <a class="category mb-5" href="#">{{ $tag->name}}</a>
              @endforeach


              <div class="post-content-body">
                  {!! $post->body!!}
              </div>


              <div class="pt-5">
                <p>Categories:  <a href="#">{{ $post->category->name }}</a>
              </div>


              <div class="pt-5">
                <h3 class="mb-5">{{ $post->comments()->count()}} Comments</h3>
                <ul class="comment-list">
                    @foreach ($post->comments as $comment)
                    <li class="comment">
                        <div class="vcard">
                          <img src="{{ URL::asset('images/person_1.jpg') }}" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                        <h3>{{ $comment->name }}</h3>
                          <div class="meta">{{ date( 'M j Y h:ia',strtotime($comment->created_at))}}</div>
                        <p>{{ $comment->comment }}</p>
                          <p><a href="#" class="reply rounded">Reply</a></p>
                        </div>
                      </li>

                    @endforeach
                </ul>
                <!-- END comment-list -->

                <div class="comment-form-wrap pt-5">
                  <h3 class="mb-5">Leave a comment</h3>
                  {{ Form::open(['route' => ['comments.store',$post->id], 'method' => 'POST']) }}

                    <div class="form-group">
                        {{ Form::label('name', "Name:" )}}
                        {{Form::text('name', null, ['class ' =>'form-control']) }}

                    </div>
                    <div class="form-group">
                        {{ Form::label('email', "Email:" )}}
                        {{Form::email('email', null, ['class ' =>'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('comment', "Comment:" )}}
                      {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                     {{ Form::submit('Post Comment', ['class' =>'btn btn-primary']) }}
                    </div>

                {{ Form::close() }}
                </div>
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
              <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="images/person_2.jpg" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>Craig David</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
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
              <!-- END sidebar-box -->
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
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                    @foreach ($categories as $category)
                <li><a href="#">{{ $category->name}}<span>{{$category->posts()->count()}}</span></a></li>
                    @endforeach

                </ul>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Tags</h3>
                <ul class="tags">
             @foreach ($tags as $tag)
                  <li><a href="#">{{ $tag->name }}</a></li>
            @endforeach
                </ul>
              </div>
            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>

@endsection
