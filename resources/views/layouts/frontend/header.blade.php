<header class="main-header header-style-two">

    <div class="header-top-two d-none d-md-block">
        <div class="auto-container">
            <div class="top-inner clearfix">
                <div class="left-column pull-left">
                    <div class="phone-box mr-3"><i class="flaticon-headphones"></i>
                        <h6><a href="tel:188845678901">+1 888 456 78 901</a></h6>
                    </div>
                    <div class="phone-box"><i class="flaticon-email"></i>
                        <h6><a href="tel:188845678901">+1 888 456 78 901</a></h6>
                    </div>
                </div>
                <div class="top-right pull-right">
                    <ul class="social-links clearfix">
                        <li>
                            <h6>Follow On: </h6>
                        </li>
                        <li><a href="/"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="/"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="/"><i class="fab fa-vimeo-v"></i></a></li>
                    </ul>
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
                                <img src="{{ $setting['site_main_logo'] ? asset(get_media($setting['site_main_logo'])->fullurl) : '' }}"
                                    alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Visa Services' }}">
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
                                <ul class="navigation clearfix">
                                    <li><a href="/">Home</a>
                                    </li>
                                    <li class="dropdown"><a href="/">About</a>
                                        <ul>
                                            <li><a href="about.html">About Immigo</a></li>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="faq.html">FAQ’s</a></li>
                                            <li><a href="error.html">404</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="/">Coaching</a>
                                    </li>
                                    <li class="dropdown"><a href="/">Visa</a>
                                    </li>
                                    <li class="dropdown"><a href="/">Countries</a>
                                    </li>
                                    <li class="dropdown"><a href="/">Blog</a>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-right-content">
                        <div class="btn-box">
                            <a class="theme-btn btn-one" href="/">Enquiry<i class="flaticon-next"></i></a>
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
                                <img src="{{ $setting['site_main_logo'] ? asset(get_media($setting['site_main_logo'])->fullurl) : '' }}"
                                    alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Visa Services' }}">
                            </a></figure>
                    </div>
                    <div class="menu-area">
                        <nav class="main-menu clearfix">

                        </nav>
                    </div>
                    <div class="menu-right-content">
                        <div class="btn-box">
                            <a class="theme-btn btn-one" href="/">Enquiry<i class="flaticon-next"></i></a>
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
                <img src="{{ $setting['site_main_logo'] ? asset(get_media($setting['site_main_logo'])->fullurl) : '' }}"
                    alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Visa Services' }}">
            </a></div>
        <div class="menu-outer"></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="/"><span class="fab fa-twitter"></span></a></li>
                <li><a href="/"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="/"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="/"><span class="fab fa-instagram"></span></a></li>
                <li><a href="/"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div>
