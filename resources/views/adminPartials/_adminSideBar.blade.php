<div class="left-sidebar-pro">
    <nav id="sidebar">
        <div class="sidebar-header">
            <a href="#"><img src="{{ asset('images/profile/'.Auth::user()->image) }}" alt="" />
            </a>
            <h3>{{Auth::user()->name}}</h3>
            <p>Admin</p>
            <?php
                function createAcronym($string){
                    $output = null;
                    $token = strtok($string,' ');
                    while ($token !== false) {
                        $output = $token[0];
                        $token = strtok(' ');
                    }
                    return '<strong>'.$output.'+<strong>';
                }
                $string = Auth::user()->name;
                echo createAcronym($string,false);
            ?>

        </div>
        <div class="left-custom-menu-adp-wrap">
            <ul class="nav navbar-nav left-sidebar-menu-pro">
                <li class="nav-item">
                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                        {!! Html::linkRoute('posts.index','Posts',['data-toggle' => "tab", 'class' => 'dropdown-item']) !!}
                        {!! Html::linkRoute('posts.create','Create Posts',['data-toggle' => "tab", 'class' => 'dropdown-item']) !!}
                    </div>
                </li>
                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-user"></i> <span class="mini-dn">User details</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">

                        <a  href='{{ route('users.edit',Auth::user()->id)}}' class ='dropdown-item'>My Profile</a>
                        <a  href='{{ route('register')}}' class ='dropdown-item'>Register User</a>
                        <a  href='{{ route('users.index')}}' class ='dropdown-item'>All Users</a>

                    </div>
                </li>
                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Interface</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                        {!! Html::linkRoute('categories.index','Categories',['data-toggle' => "tab", 'class' => 'dropdown-item']) !!}
                        {!! Html::linkRoute('tags.index','Tags',['data-toggle' => "tab", 'class' => 'dropdown-item']) !!}
                    </div>
                </li>
                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-desktop"></i> <span class="mini-dn">Site Pages</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                        <a  href='{{ route('about.edit',1)}}' class ='dropdown-item'>About page</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>
