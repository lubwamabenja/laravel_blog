

<!-- Menu -->

<div class="menu trans_500">
<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
    <div class="menu_close_container"><div class="menu_close"></div></div>
    <form action="#" class="menu_search_form">
    <input type="text" class="menu_search_input" placeholder="Search" required="required">
    <button class="menu_search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
    <ul>
        <li class="menu_item"><a href="/home">Home</a></li>
        <li class="menu_item"><a href="/blogs">Blogs</a></li>
        <li class="menu_item"><a href="#">Portfolio</a></li>
        <li class="menu_item"><a href="/about">About us</a></li>
        <li class="menu_item"><a href="/contact">Contact</a></li>
        <li class="menu_item"><a href="/login">Login</a></li>
    </ul>
</div>
<div class="menu_social">
    <ul>
    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    </ul>
</div>
</div>

<header class="header" id="header">
    <div>
    <div class="header_top">
        <div class="container">
        <div class="row">
            <div class="col">
            <div class="header_top_content d-flex flex-row align-items-center justify-content-start">
                <div class="logo">
                <a href="#">GODS OF INK  <span class="fa fa-pencil"></span></a>
                </div>
                <div class="header_top_extra d-flex flex-row align-items-center justify-content-start ml-auto">

                <div class="header_top_phone">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>+34 586 778 8892</span>
                </div>
                </div>
                <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="header_nav" id="header_nav_pin">
        <div class="header_nav_inner">
        <div class="header_nav_container">
            <div class="container">
            <div class="row">
                <div class="col">
                <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                    <nav class="main_nav">
                    <ul class="d-flex flex-row align-items-center justify-content-start">
                        <li class="{{ Request::is('home')? "active":"" }}" ><a href="/home">Home</a></li>
                        <li class="{{ Request::is('blogs')? "active":"" }}"><a href="/blogs">Blogs</a></li>
                        <li class="{{ Request::is('/')? "active":"" }}"><a href="#">Portfolio</a></li>
                        <li class="{{ Request::is('about')? "active":"" }}"><a href="/about">About Us</a></li>
                        <li class="{{ Request::is('contact')? "active":"" }}"><a href="/contact">Contact</a></li>
                        <li class="{{ Request::is('login')? "active":"" }}"><a href="/login">Login</a></li>
                    </ul>
                    </nav>
                    <div class="search_content d-flex flex-row align-items-center justify-content-end ml-auto">
                    <form action="#" id="search_container_form" class="search_container_form">
                        <input type="text" class="search_container_input" placeholder="Search" required="required">
                        <button class="search_container_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</header>
