@include('layouts.app')

    <link rel="stylesheet" href="{{URL::asset('capture/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('capture/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{URL::asset('capture/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('capture/css/style.css')}}">



 <!-- Start top-post Area -->

 <section class="top-post-area pt-10">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-nav-area">
                    <h1 class="text-white">Images</h1>
                    <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="/blogs">Post Types </a><span class="lnr lnr-arrow-right"></span><a href="{{ url('blog/images') }}">Images </a></p>
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
            <div   style="margin:1% 10% 7% 10%;width:80%;">

			<section class="ftco-section-2">
				<div class="photograhy">
					<div class="row no-gutters">
                        @foreach ($portfolios as $portfolio)
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('images/portfolios/'.$portfolio->portfolio)}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('images/portfolios/'.$portfolio->portfolio)}});">
								<div class="overlay"></div>

							</a>
                        </div>
                        @endforeach

					</div>
                </div>
                <br><br>
              <div style="margin-left:40%">  {{$portfolios->links()}}</div>
			</section>


        </div>


@include('mainPartials._footer')


    </body>

  <script src="{{URL::asset('capture/js/jquery.min.js')}}"></script>
  <script src="{{URL::asset('capture/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{URL::asset('capture/js/popper.min.js')}}"></script>
  <script src="{{URL::asset('capture/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{URL::asset('capture/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{URL::asset('capture/js/jquery.stellar.min.js')}}"></script>
  <script src="{{URL::asset('capture/js/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('capture/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{URL::asset('capture/js/aos.js')}}"></script>
  <script src="{{URL::asset('capture/js/scrollax.min.js')}}"></script>

  <script src="{{URL::asset('capture/js/main.js')}}"></script>

  </body>
</html>
