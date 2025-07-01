<header class="main-header header-style-two">

    <div class="header-top-two d-none d-md-block">
        <div class="auto-container">
            <div class="top-inner clearfix">
                <div class="left-column pull-left">
                    <div class="phone-box mr-3"><i class="flaticon-headphones"></i>
                        <h6><a href="tel:{{ get_field('site_phone') }}">{{ get_field('site_phone') }}</a></h6>
                    </div>
                    <div class="phone-box"><i class="flaticon-email"></i>
                        <h6><a href="mailto:{{ get_field('site_email') }}">{{ get_field('site_email') }}</a></h6>
                    </div>
                </div>
                <div class="top-right pull-right">
                    @if ($socialdata->isNotEmpty())
                        <ul class="social-links clearfix">
                            <li>
                                <h6>Follow On: </h6>
                            </li>
                            @foreach ($socialdata as $data)
                                <li>
                                    <a href="{{ $data->link ?? '' }}" target="_blank">
                                        <i class="{{ $data->icon ?? '' }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="header-lower">
        <div class="outer-box">
            <div class="auto-container">
                <div class="main-box">
                    <div class="logo-box">
                        <div class="bg-layer"></div>
                        <figure class="logo"><a href="/">
                                {!! get_image(get_field('site_main_logo'), 'logo-img') !!}
                            </a></figure>
                    </div>
                    <div class="menu-area clearfix">

                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                {!! get_the_menu(1, 'navigation clearfix') !!}
                            </div>
                        </nav>
                    </div>
                    <div class="menu-right-content">
                        <div class="btn-box">
                            <a class="theme-btn btn-one" href="/applications">Appointment<i
                                    class="flaticon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="main-box">
                    <div class="logo-box">
                        <div class="bg-layer"></div>
                        <figure class="logo"><a href="/">
                                {!! get_image(get_field('site_main_logo'), 'logo-img') !!}
                            </a></figure>
                    </div>
                    <div class="menu-area">
                        <nav class="main-menu clearfix">

                        </nav>
                    </div>
                    <div class="menu-right-content">
                        <div class="btn-box">
                            <a class="theme-btn btn-one" href="/applications">Appointment<i
                                    class="flaticon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="/">
                {!! get_image(get_field('site_main_logo'), 'logo-img') !!}
            </a></div>
        <div class="menu-outer"></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>{{ get_field('site_location') }}</li>
                <li><a href="tel:{{ get_field('site_phone') }}">{{ get_field('site_phone') }}</a></li>
                <li><a href="mailto:{{ get_field('site_email') }}">{{ get_field('site_email') }}</a></li>
            </ul>
        </div>
        <div class="social-links">
            @if ($socialdata->isNotEmpty())
                <ul class="clearfix">
                    @foreach ($socialdata as $data)
                        <li>
                            <a href="{{ $data->link ?? '' }}" target="_blank">
                                <i class="{{ $data->icon ?? '' }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </nav>
</div>
