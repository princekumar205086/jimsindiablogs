<header class="header-menu">
    <!--START TOP BAR-->
    <div class="top-bar">
        <div class="container">
            <div class="sub-top-bar">
                <div class="current-time">
                    <span><small>{{ date('D d-m-Y H:i:s') }}</small></span>
                </div>
                <!--<div class="tracking-news">
                    <div class="panel panel-default">
                        <span class="breaking-title"> <span class="fa fa-bolt" aria-hidden="true"></span> <span class="breaking-title-text">Trending News</span> </span>
                        <div class="panel-body">
                            <ul class="demo1">
                                <li class="news-item">
                                    <p><a href="single-post-default.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet...</a></p>
                                </li>
                                <li class="news-item">
                                    <p><a href="single-post-default.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet...</a></p>
                                </li>
                                <li class="news-item">
                                    <p><a href="single-post-default.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet...</a></p>
                                </li>
                                <li class="news-item">
                                    <p><a href="single-post-default.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet...</a></p>
                                </li>
                                <li class="news-item">
                                    <p><a href="single-post-default.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet...</a></p>
                                </li>
                                <li class="news-item">
                                    <p><a href="single-post-default.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet...</a></p>
                                </li>
                                <li class="news-item">
                                    <p><a href="single-post-default.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet...</a></p>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer"> </div>
                    </div>
                </div>-->
                <div id="login-register">
                    @if(Auth::check())
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span> Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <a href="{{ route('dashboard.dashboardPage') }}"> Dashboard</a>
                    @else
                    <a href="{{ route('login') }}"><span> Login</span></a>
                    <a href="{{ route('register') }}"><span> Register</span></a>
                    @endif
                    <ul class="social-btns">
                        @if(!empty($setting->facebook))
                        <li><a href="{{ $setting->facebook }}" target="_blank" title="{{ $setting->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if(!empty($setting->twitter))
                        <li><a href="{{ $setting->twitter }}" target="_blank" title="{{ $setting->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if(!empty($setting->github))
                        <li><a href="{{ $setting->github }}" target="_blank" title="{{ $setting->github }}"><i class="fa fa-github"></i></a></li>
                        @endif
                        @if(!empty($setting->linkedin))
                        <li><a href="{{ $setting->linkedin }}" target="_blank" title="{{ $setting->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/END TOP BAR-->

    <!--START BOTTOM HEADER-->
    <div class="logo-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                        <div class="logo">
                            @php
                                $logoPath = $setting->logo ?? 'logo.png';
                                // If logo contains protocol (http/https), use directly
                                if (preg_match('#^(https?://)#', $logoPath)) {
                                    $logoUrl = $logoPath;
                                } elseif (strpos($logoPath, 'public/') === 0 || strpos($logoPath, 'web/') === 0) {
                                    // If the stored value is already a path relative to public, use asset directly
                                    $logoUrl = asset($logoPath);
                                } elseif (strpos($logoPath, '/') !== false) {
                                    // If value includes a directory (for example: images/logo.png), prefix public/web/
                                    $logoUrl = asset('web/' . ltrim($logoPath, '/'));
                                } else {
                                    // Otherwise assume just a filename stored; use /public/web/images/ folder
                                    $logoUrl = asset('web/images/' . $logoPath);
                                }
                            @endphp
                            <a aria-hidden="true" title="{{ $setting->website_title }}" href="{{ route('homePage') }}"><img alt="{{ $setting->website_title }}" src="{{ $logoUrl }}"></a>
                        </div>
                </div>
                <div class="col-sm-9">
                    <!-- <div class="ad"><a href="#" title="Maro News"><img  alt="maro-news" src="{{ asset('web') }}/images/uploads/ad.jpg"></a></div> -->
                </div>
            </div>
        </div>
    </div><!-- Logo Bar -->

    <!-- Menu Bar -->
    @include('web.includes.menubar')
    <!-- Menu Bar -->

    <!--?END BOTTOM HEADER-->
</header>


<!--START RESPONSIVE HEADER-->
<div class="responsive-header">
    <div class="res-logo-area">
        <div class="col-sm-9 col-xs-8">
            <a href="{{ route('homePage') }}" title="Maro News"><img src="{{ $logoUrl }}" alt="{{ $setting->website_title }}"></a>
        </div>
        <div class="col-sm-3 col-xs-4">
            <div id="nav-icons-head">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div class="responsive-menu">
        <a href="{{ route('homePage') }}" title="{{ $setting->website_title }}"><img src="{{ $logoUrl }}" alt="maro-news"></a>
        <ul>
            <li><a href="{{ route('homePage') }}" title="{{ $setting->website_title }}">Home</a></li>
            <li><a href="{{ route('mostPopularPage') }}" title="Most Popular">Most Popular</a></li>
            <li><a href="{{ route('tagsPage') }}" title="Tags">Tags</a></li>
            <li><a href="{{ route('categoriesPage') }}" title="Categories">Categories</a></li>
            <li><a href="{{ route('galleryPage') }}" title="Categories">Gallery</a></li>
            <li><a href="{{ route('contactUsPage') }}" title="Contact Us">Contact Us</a></li>
            @if(Auth::check())
            <li><a href="{{ route('dashboard.dashboardPage') }}"> <span style="color: #007bbd">Dashboard</span></a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span style="color: #007bbd"> Logout</span></a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @else
            <li><a href="{{ route('login') }}"><span style="color: #007bbd"> Login</span></a></li>
            <li><a href="{{ route('register') }}"><span style="color: #007bbd"> Register</span></a></li>
            @endif
        </ul>
        <div class="res-social">
            Follow US:
            <br>
            <ul class="social-btns">
                @if(!empty($setting->facebook))
                <li><a href="{{ $setting->facebook }}" target="_blank" title="{{ $setting->facebook }}"><i class="fa fa-facebook"></i></a></li>
                @endif
                @if(!empty($setting->twitter))
                <li><a href="{{ $setting->twitter }}" target="_blank" title="{{ $setting->twitter }}"><i class="fa fa-twitter"></i></a></li>
                @endif
                @if(!empty($setting->github))
                <li><a href="{{ $setting->github }}" target="_blank" title="{{ $setting->github }}"><i class="fa fa-github"></i></a></li>
                @endif
                @if(!empty($setting->linkedin))
                <li><a href="{{ $setting->linkedin }}" target="_blank" title="{{ $setting->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!--/END RESPONSIVE HEADER-->