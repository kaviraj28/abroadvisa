@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
        'name' => $setting['homepage_seo_title'] ?? 'Visa Abroad',
        'title' => $setting['homepage_seo_title'] ?? 'Visa Abroad',
        'description' => $setting['homepage_seo_description'] ?? '',
        'keyword' => $setting['homepage_seo_keywords'] ?? '',
        'schema' => $setting['homepage_seo_schema'] ?? '',
        'seoimage' => $setting['homepage_image'] ?? '',
        'created_at' => '2023-11-10T08:09:15+00:00',
        'updated_at' => '2023-11-10T10:54:15+00:00',
    ])
@endsection

@section('content')
    <!-- banner-section -->
    <style>
        .banner-style-three .image-layer:before {
            background: -webkit-linear-gradient(-90deg, rgba(68, 1, 18, 1) 0%, rgba(0, 0, 0, 0.4) 100%);
        }
    </style>
    <section class="banner-section banner-style-three centred">
        <div class="image-layer">
            <div class="relative overflow-hidden">
                <div class="slider-video-box">
                    <iframe
                        src="https://www.youtube.com/embed/CKXE6HvourU?mode=opaque&wmode=transparent&autoplay=1&loop=1&controls=0&modestbranding=1&rel=0&autohide=1&showinfo=0&color=white&iv_load_policy=3&theme=light&wmode=transparent&mute=1&playlist=CKXE6HvourU"
                        frameborder="0" allow="autoplay" style=""></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- service-style-three -->
    <section class="service-style-three centred">
        <div class="auto-container">
            <div class="inner-container">
                <span class="big-text">Services</span>
                <div class="three-item-carousel owl-carousel owl-theme">
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-5.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-6.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details.html">Student Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-7.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-8.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details-2.html">Residence Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details-2.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-9.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-10.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details-4.html">Tourist Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details-4.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-5.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-6.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details.html">Student Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-7.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-8.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details-2.html">Residence Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details-2.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-9.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-10.jpg"
                                                alt=""></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details-4.html">Tourist Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details-4.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-5.jpg"
                                                alt=""></figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-6.jpg"
                                                alt=""></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details.html">Student Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-7.jpg"
                                                alt=""></figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-8.jpg"
                                                alt=""></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details-2.html">Residence Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details-2.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-9.jpg"
                                                alt=""></figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image"><img
                                                src="{{ asset('frontend') }}/images/service/service-10.jpg"
                                                alt=""></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="visa-details-4.html">Tourist Visa</a></h4>
                                <p>Foresee the pain and trouble that are bound.</p>
                                <div class="btn-box"><a href="visa-details-4.html"><span>More Details</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-style-three end -->

    <!-- about-style-three -->
    <section class="about-style-three">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <div class="text">
                            <h2>14</h2>
                            <h6>Years of <br />Experienced</h6>
                        </div>
                        <div class="curve-text">
                            <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-23.png"
                                    alt=""></div>
                            <span class="curved-circle-2 rotate-me">Immigo Imigration Agency Esytablished 2007.</span>
                        </div>
                        <figure class="image image-1"><img src="{{ asset('frontend') }}/images/resource/about-4.jpg"
                                alt="">
                        </figure>
                        <figure class="image image-2"><img src="{{ asset('frontend') }}/images/resource/about-5.jpg"
                                alt="">
                        </figure>
                        <figure class="image image-3"><img src="{{ asset('frontend') }}/images/resource/about-6.jpg"
                                alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <h6>About Immigo</h6>
                            <h2>Leading Immigration Consulting Firm Based In United States.</h2>
                        </div>
                        <div class="text">
                            <p>Denouncing pleasure and praising pain was born and will give you a complete ings of the great
                                explorer of the truth the master-builder.</p>
                        </div>
                        <div class="inner-box">
                            <div class="single-item">
                                <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-24.png"
                                        alt=""></div>
                                <h4>Trusted by Clients</h4>
                                <p>Give you a completed account the expound the teachings saying through shrinking from toil
                                    and pain.</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-25.png"
                                        alt=""></div>
                                <h4>24/7 Support</h4>
                                <p>Expound actual teachings too the great explorers truth our being able to do what we like
                                    best.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-three end -->

    <!-- coaching-style-three -->
    <section class="coaching-style-three"
        style="background-image: url({{ asset('frontend') }}/images/background/coaching-bg-2.jpg);">
        <div class="outer-container clearfix">
            <div class="coaching-block-three">
                <div class="inner-box">
                    <div class="upper-box">
                        <span class="count-text">01</span>
                        <div class="link"><a href="coaching-details.html"><i class="flaticon-diagonal-arrow-1"></i></a>
                        </div>
                    </div>
                    <div class="lower-box">
                        <div class="text">
                            <h4><a href="coaching-details.html"><span>ielts</span> Coaching</a></h4>
                        </div>
                        <div class="overlay-text">
                            <h4><a href="coaching-details.html"><span>ielts</span> Coaching</a></h4>
                            <p>Indignation and dislike men who are so all beguileds and demoralized expounds that.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coaching-block-three">
                <div class="inner-box">
                    <div class="upper-box">
                        <span class="count-text">02</span>
                        <div class="link"><a href="coaching-details.html"><i class="flaticon-diagonal-arrow-1"></i></a>
                        </div>
                    </div>
                    <div class="lower-box">
                        <div class="text">
                            <h4><a href="coaching-details-2.html"><span>toefl</span> Coaching</a></h4>
                        </div>
                        <div class="overlay-text">
                            <h4><a href="coaching-details-2.html"><span>toefl</span> Coaching</a></h4>
                            <p>Indignation and dislike men who are so all beguileds and demoralized expounds that.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coaching-block-three">
                <div class="inner-box">
                    <div class="upper-box">
                        <span class="count-text">03</span>
                        <div class="link"><a href="coaching-details.html"><i class="flaticon-diagonal-arrow-1"></i></a>
                        </div>
                    </div>
                    <div class="lower-box">
                        <div class="text">
                            <h4><a href="coaching-details-3.html"><span>pte</span> Coaching</a></h4>
                        </div>
                        <div class="overlay-text">
                            <h4><a href="coaching-details-3.html"><span>pte</span> Coaching</a></h4>
                            <p>Indignation and dislike men who are so all beguileds and demoralized expounds that.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coaching-block-three">
                <div class="inner-box">
                    <div class="upper-box">
                        <span class="count-text">04</span>
                        <div class="link"><a href="coaching-details.html"><i class="flaticon-diagonal-arrow-1"></i></a>
                        </div>
                    </div>
                    <div class="lower-box">
                        <div class="text">
                            <h4><a href="coaching-details-4.html"><span>oet</span> Coaching</a></h4>
                        </div>
                        <div class="overlay-text">
                            <h4><a href="coaching-details-4.html"><span>oet</span> Coaching</a></h4>
                            <p>Indignation and dislike men who are so all beguileds and demoralized expounds that.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- coaching-style-three end -->

    <!-- countries-style-three -->
    <section class="countries-style-three">
        <div class="pattern-layer" style="background-image: url({{ asset('frontend') }}/images/shape/shape-16.png);">
        </div>
        <div class="auto-container">
            <div class="sec-title">
                <h6>Countries We Offer</h6>
                <h2>Services for Following Countries</h2>
            </div>
            <div class="four-item-carousel owl-carousel owl-theme owl-dots-none">
                <div class="countries-block-three">
                    <div class="inner-box">
                        <figure class="flag"><img src="{{ asset('frontend') }}/images/icons/flag-9.png"
                                alt=""></figure>
                        <h6>Immigrate to</h6>
                        <h4><a href="countries-details.html">United States</a></h4>
                        <p>Known for the quality universities & friendly country.</p>
                        <ul class="list clearfix">
                            <li><i class="flaticon-diagonal-arrow"></i>Visitor Visa</li>
                            <li><i class="flaticon-diagonal-arrow"></i>Student Visa & Admission</li>
                            <li><i class="flaticon-diagonal-arrow"></i>Work Visa – H1B</li>
                        </ul>
                    </div>
                </div>
                <div class="countries-block-three">
                    <div class="inner-box">
                        <figure class="flag"><img src="{{ asset('frontend') }}/images/icons/flag-10.png"
                                alt=""></figure>
                        <h6>Immigrate to</h6>
                        <h4><a href="countries-details-4.html">United Arab Emirates</a></h4>
                        <p>Desire that they can foresee trouble bound ensue.</p>
                        <ul class="list clearfix">
                            <li><i class="flaticon-diagonal-arrow"></i>Visitor Visa</li>
                            <li><i class="flaticon-diagonal-arrow"></i>Student Visa & Admission</li>
                            <li><i class="flaticon-diagonal-arrow"></i>Work Visa – FSTP</li>
                        </ul>
                    </div>
                </div>
                <div class="countries-block-three">
                    <div class="inner-box">
                        <figure class="flag"><img src="{{ asset('frontend') }}/images/icons/flag-11.png"
                                alt=""></figure>
                        <h6>Immigrate to</h6>
                        <h4><a href="countries-details-5.html">United Kingdom</a></h4>
                        <p>Known for the quality universities & friendly country.</p>
                        <ul class="list clearfix">
                            <li><i class="flaticon-diagonal-arrow"></i>Visitor Visa</li>
                            <li><i class="flaticon-diagonal-arrow"></i>Student Visa & Admission</li>
                        </ul>
                    </div>
                </div>
                <div class="countries-block-three">
                    <div class="inner-box">
                        <figure class="flag"><img src="{{ asset('frontend') }}/images/icons/flag-12.png"
                                alt=""></figure>
                        <h6>Immigrate to</h6>
                        <h4><a href="countries-details-6.html">South Africa</a></h4>
                        <p>Desire that they can foresee trouble bound ensue.</p>
                        <ul class="list clearfix">
                            <li><i class="flaticon-diagonal-arrow"></i>Visitor Visa</li>
                            <li><i class="flaticon-diagonal-arrow"></i>Student Visa & Admission</li>
                            <li><i class="flaticon-diagonal-arrow"></i>Golden Visa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- countries-style-three end -->

    <!-- chooseus-style-three -->
    <section class="chooseus-style-three centred">
        <div class="auto-container">
            <div class="sec-title light centred">
                <h6>Why Choose Us</h6>
                <h2>We Guarantee to Offer the Tailor <br />Made Services</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme">
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-26.png"
                                alt=""></div>
                        <h4>Direct Interviews</h4>
                        <p>Other hand denounce with righteous indignation dislike men who are so beguiled demoralized the
                            charms.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-27.png"
                                alt=""></div>
                        <h4>Faster Procesing</h4>
                        <p>Blinded by desire that they cannot foresee the pain and trouble that are bound to and equal blame
                            belongs.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-28.png"
                                alt=""></div>
                        <h4>Cost Effective</h4>
                        <p>Our power of choice is untrammelled and when nothing prevents our being able to do what we like
                            best.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-26.png"
                                alt=""></div>
                        <h4>Direct Interviews</h4>
                        <p>Other hand denounce with righteous indignation dislike men who are so beguiled demoralized the
                            charms.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-27.png"
                                alt=""></div>
                        <h4>Faster Procesing</h4>
                        <p>Blinded by desire that they cannot foresee the pain and trouble that are bound to and equal blame
                            belongs.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-28.png"
                                alt=""></div>
                        <h4>Cost Effective</h4>
                        <p>Our power of choice is untrammelled and when nothing prevents our being able to do what we like
                            best.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-26.png"
                                alt=""></div>
                        <h4>Direct Interviews</h4>
                        <p>Other hand denounce with righteous indignation dislike men who are so beguiled demoralized the
                            charms.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-27.png"
                                alt=""></div>
                        <h4>Faster Procesing</h4>
                        <p>Blinded by desire that they cannot foresee the pain and trouble that are bound to and equal blame
                            belongs.</p>
                    </div>
                </div>
                <div class="chooseus-block-two">
                    <div class="inner-box">
                        <div class="shape"
                            style="background-image: url({{ asset('frontend') }}/images/shape/shape-17.png);"></div>
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-28.png"
                                alt=""></div>
                        <h4>Cost Effective</h4>
                        <p>Our power of choice is untrammelled and when nothing prevents our being able to do what we like
                            best.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-style-three end -->

    <!-- testimonial-style-three -->
    <section class="testimonial-style-three">
        <div class="auto-container">
            <div class="sec-title">
                <h6>Client Reviews</h6>
                <h2>Feedback From Our Clients</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                <div class="testimonial-content">
                    <div class="inner-box">
                        <div class="quote"><img src="{{ asset('frontend') }}/images/icons/quote-3.png" alt="">
                        </div>
                        <div class="author-box">
                            <figure class="author-thumb"><img
                                    src="{{ asset('frontend') }}/images/resource/testimonial-9.jpg" alt="">
                            </figure>
                            <h4>Silverster Scott</h4>
                            <span class="designation">Netherland</span>
                        </div>
                        <div class="text">
                            <p>Immigo definitely highly recommended canadian an migration agency. A big applause & very
                                grateful to Mr.Richard for efforts.</p>
                        </div>
                        <ul class="rating clearfix">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="inner-box">
                        <div class="quote"><img src="{{ asset('frontend') }}/images/icons/quote-3.png" alt="">
                        </div>
                        <div class="author-box">
                            <figure class="author-thumb"><img
                                    src="{{ asset('frontend') }}/images/resource/testimonial-10.jpg" alt="">
                            </figure>
                            <h4>Nora Penelope</h4>
                            <span class="designation">Switcherland</span>
                        </div>
                        <div class="text">
                            <p>Immigo visa consultancy is the best we came across while doing research and migrating to
                                netherlans All informations genuine and helpful.</p>
                        </div>
                        <ul class="rating clearfix">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="inner-box">
                        <div class="quote"><img src="{{ asset('frontend') }}/images/icons/quote-3.png" alt="">
                        </div>
                        <div class="author-box">
                            <figure class="author-thumb"><img
                                    src="{{ asset('frontend') }}/images/resource/testimonial-11.jpg" alt="">
                            </figure>
                            <h4>Arlo Sebastian</h4>
                            <span class="designation">South Africa</span>
                        </div>
                        <div class="text">
                            <p>Awesome customer service, they know what they are doing. Straight to the point help with the
                                forms if you need it. We 100% recommend to others.</p>
                        </div>
                        <ul class="rating clearfix">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-style-three end -->

    <!-- gallery-section -->
    <section class="gallery-section">
        <div class="outer-container">
            <div class="gallery-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                <div class="gallery-block-one">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('frontend') }}/images/gallery/gallery-1.jpg"
                                alt=""></figure>
                        <div class="view-btn"><a class="lightbox-image" data-fancybox="gallery"
                                href="assets/images/gallery/gallery-1.jpg"><i class="flaticon-zoom-in"></i></a></div>
                    </div>
                </div>
                <div class="gallery-block-one">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('frontend') }}/images/gallery/gallery-2.jpg"
                                alt=""></figure>
                        <div class="view-btn"><a class="lightbox-image" data-fancybox="gallery"
                                href="assets/images/gallery/gallery-2.jpg"><i class="flaticon-zoom-in"></i></a></div>
                    </div>
                </div>
                <div class="gallery-block-one">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('frontend') }}/images/gallery/gallery-3.jpg"
                                alt=""></figure>
                        <div class="view-btn"><a class="lightbox-image" data-fancybox="gallery"
                                href="assets/images/gallery/gallery-3.jpg"><i class="flaticon-zoom-in"></i></a></div>
                    </div>
                </div>
                <div class="gallery-block-one">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('frontend') }}/images/gallery/gallery-4.jpg"
                                alt=""></figure>
                        <div class="view-btn"><a class="lightbox-image" data-fancybox="gallery"
                                href="assets/images/gallery/gallery-4.jpg"><i class="flaticon-zoom-in"></i></a></div>
                    </div>
                </div>
                <div class="gallery-block-one">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('frontend') }}/images/gallery/gallery-5.jpg"
                                alt=""></figure>
                        <div class="view-btn"><a class="lightbox-image" data-fancybox="gallery"
                                href="assets/images/gallery/gallery-5.jpg"><i class="flaticon-zoom-in"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery-section end -->

    <!-- funfact-section -->
    <section class="funfact-section">
        <div class="outer-container clearfix">
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="inner">
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-29.png"
                                alt=""></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="25">0</span>
                        </div>
                    </div>
                    <h4>Offices Worldwide</h4>
                    <p>This mistaken idea denouncing praising pain was born anyone.</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="inner">
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-30.png"
                                alt=""></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="468">0</span>
                        </div>
                    </div>
                    <h4>Team Members</h4>
                    <p>Teachings of the great explorer the truth master-builder of human.</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="inner">
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-31.png"
                                alt=""></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="9.7">0</span><span>K</span>
                        </div>
                    </div>
                    <h4>Visa Processed</h4>
                    <p>Nor again is there anyone loves or pursue or desires to obtain pain.</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="inner">
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-32.png"
                                alt=""></div>
                        <div class="count-outer count-box">
                            <span>0</span><span class="count-text" data-speed="1500" data-stop="5">0</span>
                        </div>
                    </div>
                    <h4>Countries Served</h4>
                    <p>This mistaken idea denouncing praising pain was born anyone.</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="inner">
                        <div class="icon-box"><img src="{{ asset('frontend') }}/images/icons/icon-33.png"
                                alt=""></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="99">0</span><span>%</span>
                        </div>
                    </div>
                    <h4>Satisfied Clients</h4>
                    <p>Teachings of the great explorer the truth master-builder of human.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- funfact-section end -->

    <!-- faq-section -->
    <section class="faq-section" style="background-image: url({{ asset('frontend') }}/images/background/faq-bg.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 faq-column">
                    <div class="faq-content">
                        <div class="sec-title light">
                            <h6>Most Common Faq’s</h6>
                            <h2>Questions & Answers</h2>
                            <p>Get answers to the most frequently asked questions asked by our valuable clients, You did’t
                                get the answers ask to our experts.</p>
                        </div>
                        <ul class="questions-list clearfix">
                            <li><a href="faq.html"><span>Q1.</span>Which country is better for immigration?</a></li>
                            <li><a href="faq.html"><span>Q2.</span>How can I get a student visa?</a></li>
                            <li><a href="faq.html"><span>Q3.</span>How much does immigration cost?</a></li>
                            <li><a href="faq.html"><span>Q4.</span>How do I contact Immigo Consultant?</a></li>
                        </ul>
                        <div class="link"><a href="faq.html">View More Faq’s <i class="flaticon-next"></i></a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 contact-column">
                    <div class="contact-content">
                        <div class="sec-title light">
                            <h6>Let’s Connect</h6>
                            <h2>Send Your Message</h2>
                            <p>Please feel free to get in touch with us using the contact form below. We'd love to hear for
                                you.</p>
                        </div>
                        <div class="form-inner">
                            <form action="https://st.ourhtmldemo.com/new/Immigo/contact.html" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email Addres" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="pnone" placeholder="Phone Number" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Your Message..."></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <div class="message-btn">
                                            <button class="theme-btn" type="submit">Submit Now<i
                                                    class="flaticon-next"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq-section end -->

    <!-- news-section -->
    <section class="news-section style-two bg-color-1">
        <div class="auto-container">
            <div class="sec-title centred">
                <h6>News & Updates</h6>
                <h2>Read Our Latest Insights</h2>
            </div>
            <div class="two-item-carousel owl-carousel owl-theme">
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <h2>14<span>Oct</span></h2>
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend') }}/images/news/news-7.jpg" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <figure class="author-thumb"><img src="{{ asset('frontend') }}/images/news/author-1.jpg"
                                        alt="">
                                </figure>
                                <h6><a href="blog-details.html">Immigration</a></h6>
                                <span>Post By: Colmin O'Neill</span>
                            </div>
                            <h4><a href="blog-details.html">Citizenship Concept on How to Become a UK Citizen</a></h4>
                            <p>Laborio physical exercise excepts obtain some advantage from...</p>
                            <div class="lower-box clearfix">
                                <div class="link pull-left"><a href="blog-details.html"><span>REad More</span></a></div>
                                <ul class="info clearfix pull-right">
                                    <li><i class="far fa-heart"></i><a href="blog-details.html">36</a></li>
                                    <li><i class="far fa-comment"></i><a href="blog-details.html">08</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <h2>05<span>Oct</span></h2>
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend') }}/images/news/news-8.jpg" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <figure class="author-thumb"><img src="{{ asset('frontend') }}/images/news/author-2.jpg"
                                        alt="">
                                </figure>
                                <h6><a href="blog-details.html">Resident Visa</a></h6>
                                <span>Post By: Layla Madison</span>
                            </div>
                            <h4><a href="blog-details.html">Benefits of Being a Permnent Resident in Canada</a></h4>
                            <p>Foresee the pain and trouble that bound ensue equal blame belongs...</p>
                            <div class="lower-box clearfix">
                                <div class="link pull-left"><a href="blog-details.html"><span>REad More</span></a></div>
                                <ul class="info clearfix pull-right">
                                    <li><i class="far fa-heart"></i><a href="blog-details.html">03</a></li>
                                    <li><i class="far fa-comment"></i><a href="blog-details.html">12</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <h2>14<span>Oct</span></h2>
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend') }}/images/news/news-7.jpg" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <figure class="author-thumb"><img src="{{ asset('frontend') }}/images/news/author-1.jpg"
                                        alt="">
                                </figure>
                                <h6><a href="blog-details.html">Immigration</a></h6>
                                <span>Post By: Colmin O'Neill</span>
                            </div>
                            <h4><a href="blog-details.html">Citizenship Concept on How to Become a UK Citizen</a></h4>
                            <p>Laborio physical exercise excepts obtain some advantage from...</p>
                            <div class="lower-box clearfix">
                                <div class="link pull-left"><a href="blog-details.html"><span>REad More</span></a></div>
                                <ul class="info clearfix pull-right">
                                    <li><i class="far fa-heart"></i><a href="blog-details.html">36</a></li>
                                    <li><i class="far fa-comment"></i><a href="blog-details.html">08</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <h2>05<span>Oct</span></h2>
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend') }}/images/news/news-8.jpg" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <figure class="author-thumb"><img src="{{ asset('frontend') }}/images/news/author-2.jpg"
                                        alt="">
                                </figure>
                                <h6><a href="blog-details.html">Resident Visa</a></h6>
                                <span>Post By: Layla Madison</span>
                            </div>
                            <h4><a href="blog-details.html">Benefits of Being a Permnent Resident in Canada</a></h4>
                            <p>Foresee the pain and trouble that bound ensue equal blame belongs...</p>
                            <div class="lower-box clearfix">
                                <div class="link pull-left"><a href="blog-details.html"><span>REad More</span></a></div>
                                <ul class="info clearfix pull-right">
                                    <li><i class="far fa-heart"></i><a href="blog-details.html">03</a></li>
                                    <li><i class="far fa-comment"></i><a href="blog-details.html">12</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <h2>14<span>Oct</span></h2>
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend') }}/images/news/news-7.jpg" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <figure class="author-thumb"><img src="{{ asset('frontend') }}/images/news/author-1.jpg"
                                        alt="">
                                </figure>
                                <h6><a href="blog-details.html">Immigration</a></h6>
                                <span>Post By: Colmin O'Neill</span>
                            </div>
                            <h4><a href="blog-details.html">Citizenship Concept on How to Become a UK Citizen</a></h4>
                            <p>Laborio physical exercise excepts obtain some advantage from...</p>
                            <div class="lower-box clearfix">
                                <div class="link pull-left"><a href="blog-details.html"><span>REad More</span></a></div>
                                <ul class="info clearfix pull-right">
                                    <li><i class="far fa-heart"></i><a href="blog-details.html">36</a></li>
                                    <li><i class="far fa-comment"></i><a href="blog-details.html">08</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <h2>05<span>Oct</span></h2>
                            <figure class="image"><a href="blog-details.html"><img
                                        src="{{ asset('frontend') }}/images/news/news-8.jpg" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <figure class="author-thumb"><img src="{{ asset('frontend') }}/images/news/author-2.jpg"
                                        alt="">
                                </figure>
                                <h6><a href="blog-details.html">Resident Visa</a></h6>
                                <span>Post By: Layla Madison</span>
                            </div>
                            <h4><a href="blog-details.html">Benefits of Being a Permnent Resident in Canada</a></h4>
                            <p>Foresee the pain and trouble that bound ensue equal blame belongs...</p>
                            <div class="lower-box clearfix">
                                <div class="link pull-left"><a href="blog-details.html"><span>REad More</span></a></div>
                                <ul class="info clearfix pull-right">
                                    <li><i class="far fa-heart"></i><a href="blog-details.html">03</a></li>
                                    <li><i class="far fa-comment"></i><a href="blog-details.html">12</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news-section end -->

    <!-- clients-section -->
    <section class="clients-section style-two">
        <div class="outer-container">
            <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                <figure class="clients-logo-box">
                    <a href="index.html"><img src="{{ asset('frontend') }}/images/clients/clients-logo-7.png"
                            alt=""></a>
                </figure>
                <figure class="clients-logo-box">
                    <a href="index.html"><img src="{{ asset('frontend') }}/images/clients/clients-logo-8.png"
                            alt=""></a>
                </figure>
                <figure class="clients-logo-box">
                    <a href="index.html"><img src="{{ asset('frontend') }}/images/clients/clients-logo-9.png"
                            alt=""></a>
                </figure>
                <figure class="clients-logo-box">
                    <a href="index.html"><img src="{{ asset('frontend') }}/images/clients/clients-logo-10.png"
                            alt=""></a>
                </figure>
                <figure class="clients-logo-box">
                    <a href="index.html"><img src="{{ asset('frontend') }}/images/clients/clients-logo-11.png"
                            alt=""></a>
                </figure>
                <figure class="clients-logo-box">
                    <a href="index.html"><img src="{{ asset('frontend') }}/images/clients/clients-logo-12.png"
                            alt=""></a>
                </figure>
            </div>
        </div>
    </section>
    <!-- clients-section end -->

    {{-- @if ($popups->isNotEmpty())
        @foreach ($popups as $key => $value)
            <div class="danfepopup modal fade" id="danfe-{{ $key }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="danfe-{{ $key }}Label"
                aria-hidden="true" style="z-index: 999999999;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header pb-0">
                            <h5 class="modal-title" id="danfe-{{ $key }}Label">{{ $value->name }}</h5>
                            <a class="btn-close" data-bs-target="#danfe-{{ $key++ }}" data-bs-dismiss="modal"
                                href="#danfe-{{ $key++ }}"data-bs-toggle="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            @if ($value->image)
                                <div class="media-wrapper">
                                    {!! get_image($value->image) !!}
                                </div>
                            @endif
                            @if ($value->description)
                                <div class="modal-text pt-3">
                                    {!! $value->description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#danfe-0').modal('show');
        });
    </script>
    <script>
        // Youtube Video 
        function setVideoCenter() {
            var $box = $('.slider-video-box');
            var height = $box.height();
            var width = $box.width() + 2; // Added 2 to increase the width by 3px
            var new_height = width / 1.78;
            if (new_height > height) {
                $box.find('iframe').css({
                    width: width,
                    height: new_height,
                    top: '-' + (new_height / 2 - height / 2) + 'px',
                    left: '0',
                });
            } else {
                var new_width = height * 1.78;
                $box.find('iframe').css({
                    width: new_width,
                    height: height,
                    top: '0',
                    left: '-' + (new_width / 2 - width / 2) + 'px'
                });
            }
        }

        $(function() {
            setVideoCenter();
            $(window).resize(setVideoCenter);
        });
    </script>
@endsection
