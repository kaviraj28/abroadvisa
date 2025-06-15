@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
        'name' => $setting['homepage_seo_title'] ?? 'Visa Abroad',
        'title' => $setting['homepage_seo_title'] ?? 'Visa Abroad',
        'description' => $setting['homepage_seo_description'] ?? '',
        'keyword' => $setting['homepage_seo_keywords'] ?? '',
        'schema' => $setting['homepage_seo_schema'] ?? '',
        'seoimage' => $setting['homepage_image'] ?? '',
        'created_at' => '2025-06-10T08:09:15+00:00',
        'updated_at' => '2025-06-10T10:54:15+00:00',
    ])
@endsection

@section('content')
    <section class="banner-section banner-style-three centred">
        <div class="image-layer">
            <div class="position-relative overflow-hidden">
                <div class="slider-video-box">
                    <iframe
                        src="https://www.youtube.com/embed/cIGQxDDnPZI?mode=opaque&autoplay=1&mute=1&loop=1&playlist=cIGQxDDnPZI&controls=1&modestbranding=1&rel=0&autohide=1"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <div class="video-content">
                        <div class="container d-none d-md-block">

                        </div>
                    </div>
                </div>
                <div class="landmark"
                    style="background: url({{ asset('frontend/images/landmark.png') }});
                    background-repeat: repeat;background-size: auto;height: 164px;margin-top: -180px;z-index: 1;position: relative;background-size: cover;background-repeat: no-repeat;transform: rotateY(180deg);">
                </div>
            </div>
        </div>
    </section>

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
    @if ($services->isNotEmpty())
        <section class="coaching-style-two">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                style="background-image: url({{ asset('frontend') }}/images/background/coaching-bg.jpg);"></div>
            <div class="outer-container">
                <div class="row clearfix">
                    @foreach ($services as $key => $data)
                        <div class="col-lg-3 col-md-6 col-sm-12 coaching-block">
                            <div class="coaching-block-two">
                                <div class="inner-box">
                                    <span class="count-text">0{{ $key + 1 }}</span>
                                    @if ($data->image)
                                        <figure class="image-box">
                                            {!! get_image($data->image) !!}
                                        </figure>
                                    @endif
                                    <div class="text">
                                        <h4><a href="{{ route('servicesingle', $data->slug) }}">{{ $data->name ?? '' }}</a>
                                        </h4>
                                        <div class="link">
                                            <a href="{{ route('servicesingle', $data->slug) }}">
                                                <i class="flaticon-diagonal-arrow-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="overlay-text">
                                        <h4>
                                            <a
                                                href="{{ route('servicesingle', $data->slug) }}">{{ $data->name ?? '' }}</a>
                                        </h4>
                                        @if ($data->short_description)
                                            <p>{{ $data->short_description ?? '' }}</p>
                                        @endif
                                        <div class="link"><a href="{{ route('servicesingle', $data->slug) }}"><i
                                                    class="flaticon-diagonal-arrow-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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
                        <figure class="flag"><img src="{{ asset('frontend') }}/images/icons/flag-9.png" alt="">
                        </figure>
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
                        <figure class="flag"><img src="{{ asset('frontend') }}/images/icons/flag-10.png" alt="">
                        </figure>
                        <h6>Immigrate to</h6>
                        <h4><a href="/">United Arab Emirates</a></h4>
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
                        <figure class="flag"><img src="{{ asset('frontend') }}/images/icons/flag-11.png" alt="">
                        </figure>
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
    @if ($reviews->isNotEmpty())
        <section class="testimonial-style-three">
            <div class="auto-container">
                <div class="sec-title">
                    <h6>Client Reviews</h6>
                    <h2>Feedback From Our Clients</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                    @foreach ($reviews as $key => $data)
                        <div class="testimonial-content">
                            <div class="inner-box">
                                <div class="quote">
                                    <img src="{{ asset('frontend') }}/images/icons/quote-3.png" alt="">
                                </div>
                                <div class="author-box">
                                    <figure class="author-thumb">
                                        {!! get_image($data->image) !!}
                                    </figure>
                                    <h4>{{ $data->name ?? '' }}</h4>
                                    <span class="designation">{{ $data->position ?? '' }}</span>
                                </div>
                                <div class="text">
                                    {!! $data->description ?? '' !!}
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
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($counters->isNotEmpty())
        <section class="funfact-section">
            <div class="outer-container clearfix">
                @foreach ($counters as $key => $data)
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="inner">
                                <div class="icon-box">
                                    {!! get_image($data->icon) !!}
                                </div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500"
                                        data-stop="{{ $data->count_num }}">0</span>
                                    @if ($data->num_postfix)
                                        <span>{{ $data->num_postfix ?? '' }}</span>
                                    @endif
                                </div>
                            </div>
                            <h4>{{ $data->name ?? '' }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    <section class="faq-section" style="background-image: url({{ asset('frontend') }}/images/background/faq-bg.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 faq-column">
                    <div class="faq-content">
                        <div class="sec-title light">
                            <h6>Most Common Faq’s</h6>
                            <h2>Questions & Answers</h2>
                            <p>Get answers to the most frequently asked questions asked by our valuable clients, You
                                did’t
                                get the answers ask to our experts.</p>
                        </div>
                        <ul class="questions-list clearfix">
                            <li><a href="/"><span>Q1.</span>Which country is better for immigration?</a></li>
                            <li><a href="/"><span>Q2.</span>How can I get a student visa?</a></li>
                            <li><a href="/"><span>Q3.</span>How much does immigration cost?</a></li>
                            <li><a href="/"><span>Q4.</span>How do I contact Immigo Consultant?</a></li>
                        </ul>
                        <div class="link"><a href="/">View More Faq’s <i class="flaticon-next"></i></a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 contact-column">
                    <div class="contact-content">
                        <div class="sec-title light">
                            <h6>Let’s Connect</h6>
                            <h2>Send Your Message</h2>
                            <p>Please feel free to get in touch with us using the contact form below. We'd love to hear
                                for
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
    @if ($blogs->isNotEmpty())
        <section class="news-section style-two bg-color-1">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6>News & Updates</h6>
                    <h2>Read Our Latest Insights</h2>
                </div>
                <div class="two-item-carousel owl-carousel owl-theme">
                    @foreach ($blogs as $key => $data)
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <h2>14<span>Oct</span></h2>
                                    <figure class="image">
                                        <a href="{{ route('blogsingle', $data->slug) }}">
                                            {!! get_image($data->image) !!}
                                        </a>
                                    </figure>
                                </div>
                                <div class="lower-content">
                                    <h4>
                                        <a href="{{ route('blogsingle', $data->slug) }}">
                                            {{ $data->name ?? '' }}
                                        </a>
                                    </h4>
                                    <p>{{ stripLetters($data->description, 60) }}</p>
                                    <div class="lower-box clearfix">
                                        <div class="link pull-left"><a
                                                href="{{ route('blogsingle', $data->slug) }}"><span>Read More</span></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($popups->isNotEmpty())
        @foreach ($popups as $key => $value)
            <div class="visaspopup modal fade" id="visas-{{ $key }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="visas-{{ $key }}Label"
                aria-hidden="true" style="z-index: 999999999;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header pb-0">
                            <h5 class="modal-title" id="visas-{{ $key }}Label">{{ $value->name }}</h5>
                            <a class="btn-close" data-bs-target="#visas-{{ $key++ }}" data-bs-dismiss="modal"
                                href="#visas-{{ $key++ }}"data-bs-toggle="modal" aria-label="Close"></a>
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
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#visas-0').modal('show');
        });

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
