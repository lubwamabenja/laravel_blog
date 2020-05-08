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
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_1.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_1.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 01</h3>
									<span class="tag">Model</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_2.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_2.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 02</h3>
									<span class="tag">Nature</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_3.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_3.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 03</h3>
									<span class="tag">Fashion</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_4.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_4.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 04</h3>
									<span class="tag">Travel</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_5.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_5.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 05</h3>
									<span class="tag">Travel</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_6.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_6.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 06</h3>
									<span class="tag">Travel</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_7.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_7.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 07</h3>
									<span class="tag">Fashion, Model</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_8.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_8.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 08</h3>
									<span class="tag">Nature</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_9.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_9.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 09</h3>
									<span class="tag">Technology</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_10.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_10.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 10</h3>
									<span class="tag">Model</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_11.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_11.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 11</h3>
									<span class="tag">Fashion</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 ftco-animate">
							<a href="{{URL::asset('capture/images/image_12.jpg')}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('capture/images/image_12.jpg')}});">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3>Work 12</h3>
									<span class="tag">Photography</span>
								</div>
							</a>
						</div>
					</div>
				</div>
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
