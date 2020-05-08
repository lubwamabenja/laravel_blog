<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="{{ route('posts.index')}}">Posts</a>
                                    </li>
                                    <li><a href="{{ route('posts.create')}}">Create Posts</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demo" href="#">User Details <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="demo" class="collapse dropdown-header-top">
                                    <li><a href="{{ route('users.edit',Auth::user()->id)}}">My Profile</a>
                                    </li>
                                    <li><a href="{{ route('register')}}">Register User</a>
                                    </li>
                                    <li><a href="{{ route('users.index')}}">All Users</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#others" href="#">Attributes <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="others" class="collapse dropdown-header-top">

                                    <li>{!! Html::linkRoute('categories.index','Categories') !!}
                                    </li>
                                    <li>{!! Html::linkRoute('tags.index','Tags') !!}
                                    </li>

                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                    <li><a  href='{{ route('about.edit',1)}}'>About page</a>
                                    </li>

                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
