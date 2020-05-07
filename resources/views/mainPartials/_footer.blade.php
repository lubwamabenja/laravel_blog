<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Quick links</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/blogs">Blogs</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Tags</h4>
                <ul>
                    @foreach ($tags as $tag)
                    <li><a href="{{ url('tags/u/'.$tag->name) }}">{{$tag->name}}</a></li>
                   @endforeach

                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Categories</h4>
                <ul>
                    @foreach ($categories as $category)
                    <li><a href="{{ url('category/'.$category->name) }}">{{$category->name}}</a></li>
                   @endforeach
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="#">Experts</a></li>
                    <li><a href="#">Agencies</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Instragram Feed</h4>
                <ul class="instafeed d-flex flex-wrap">
                    <li><img src="major/img/i1.jpg" alt=""></li>
                    <li><img src="major/img/i2.jpg" alt=""></li>
                    <li><img src="major/img/i3.jpg" alt=""></li>
                    <li><img src="major/img/i4.jpg" alt=""></li>
                    <li><img src="major/img/i5.jpg" alt=""></li>
                    <li><img src="major/img/i6.jpg" alt=""></li>
                    <li><img src="major/img/i7.jpg" alt=""></li>
                    <li><img src="major/img/i8.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | GODS OF INK </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->
