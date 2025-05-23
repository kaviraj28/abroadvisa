@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
        'name' => $content->name ?? '',
        'title' => $content->seo_title ?? $content->name,
        'description' => $content->seo_description ?? '',
        'keyword' => $content->seo_keywords ?? '',
        'schema' => $content->seo_schema ?? '',
        'seoimage' => $content->image ?? '',
        'created_at' => $content->created_at,
        'updated_at' => $content->updated_at,
    ])
@endsection

@section('content')
    @include('frontend.global.banner', [
        'name' => $content->name,
        'banner' => $content->banner ?? null,
        'parentname' => '',
        'parentlink' => '',
    ])

    @if ($progress->isNotEmpty())
        <section class="process-area bg-white pt-60 pb-60">
            <div class="container-xxl d_container">
                <div class="row mb-30">
                    <div class="col-lg-12">
                        <div class="section-wrapper text-center mb-20">
                            <span>Our Process</span>
                            <h5 class="section-title-4">What Our clients says</h5>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @foreach ($progress as $value)
                        <div class="col-lg-3 col-sm-6">
                            <div class="card text-center rounded-3 p-4 mb-10">
                                <div class="process-thumb mb-30 mx-auto">
                                    {!! get_image($value->image, '', 'process') !!}
                                </div>
                                <h4>{{ $value->name ?? '' }}</h4>
                                {!! $value->description ?? '' !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="about-area pb-60 pt-60">
        <div class="container-xxl d_container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-5">
                        <div class="about-5-section mb-70">
                            <span class="sub-title">Abour Us</span>
                            <h4 class="title">Meet pure visibility</h4>
                            <p>Our experience spans a wide range of industries, fromhealthcare and <br> ecommerce to
                                multi-location businesses</p>
                        </div>
                        <div class="about-5-content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="about-5-item">
                                        <div class="about-5-item-title mb-20">
                                            <span>
                                                <img src="{{ asset('frontend') }}/img/shape/about-5-shape-1.svg"
                                                    alt="">
                                            </span>
                                        </div>
                                        <div class="about-5-item-text">
                                            <p>
                                                We pride our selves on working <br> as an extension of your marketing <br>
                                                team &
                                                making tailored to your <br> industry, business goals.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="about-5-item about-5-item-2">
                                        <div class="about-5-item-title mb-20">
                                            <span>
                                                <img src="{{ asset('frontend') }}/img/shape/about-5-shape-2.svg"
                                                    alt="">
                                            </span>
                                        </div>
                                        <div class="about-5-item-text">
                                            <p>
                                                We work with the teams that build <br> brands to understand, improve, <br>
                                                and
                                                protect.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-5-thumb p-relative">
                        <img class="tpchoose-border-anim" src="{{ asset('frontend') }}/img/bg/about-5-bg-2.jpg"
                            alt="">
                        <a class="popup-video" href="https://www.youtube.com/watch?v=TYYf8zYjP5k">
                            <div class="about-5-shape">
                                <div class="about-5-shape-one">
                                    <img src="{{ asset('frontend') }}/img/shape/video-blue.png" alt="">
                                </div>
                                <div class="about-5-shape-two">
                                    <img src="{{ asset('frontend') }}/img/shape/video-white.png" alt="">
                                </div>
                                <div class="about-5-video-icon">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="counter-area pb-90">
        <div class="container-xxl d_container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-5 d-flex mb-30">
                        <div class="counter-5-icon">
                            <i>
                                <img src="{{ asset('frontend') }}/img/icon/counter-5-icon-1.svg" alt="">
                            </i>
                        </div>
                        <div class="counter-5-content">
                            <b class="counter-5-count mb-10">
                                <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="25">25</span>
                                <i class="fa-regular fa-plus"></i>
                            </b>
                            <p>Experience Year</p>
                            <div class="counter-5-bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                        style="width: 60%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-5 counter-5-2 d-flex mb-30">
                        <div class="counter-5-icon">
                            <i>
                                <img src="{{ asset('frontend') }}/img/icon/counter-5-icon-2.svg" alt="">
                            </i>
                        </div>
                        <div class="counter-5-content">
                            <b class="counter-5-count mb-10">
                                <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="120"></span>
                                <i class="fa-regular fa-plus"></i>
                            </b>
                            <p>Successful Projects</p>
                            <div class="counter-5-bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                        style="width: 77%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-5 counter-5-3 d-flex mb-30">
                        <div class="counter-5-icon">
                            <i>
                                <img src="{{ asset('frontend') }}/img/icon/counter-5-icon-3.svg" alt="">
                            </i>
                        </div>
                        <div class="counter-5-content">
                            <b class="counter-5-count mb-10">
                                <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="160"></span>
                                <i class="fa-regular fa-plus"></i>
                            </b>
                            <p>Happy Customers</p>
                            <div class="counter-5-bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                        style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-5 counter-5-4 d-flex mb-30">
                        <div class="counter-5-icon">
                            <i>
                                <img src="{{ asset('frontend') }}/img/icon/counter-5-icon-1.svg" alt="">
                            </i>
                        </div>
                        <div class="counter-5-content">
                            <b class="counter-5-count mb-10">
                                <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="35"></span>
                                <i class="fa-regular fa-plus"></i>
                            </b>
                            <p>Team Members</p>
                            <div class="counter-5-bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                        style="width: 65%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($reviews->isNotEmpty())
        <section class="textimonial-area bg-white pb-60 pt-60 fix">
            <div class="container">
                <div class="row justify-content-center mb-50">
                    <div class="col-lg-12">
                        <div class="section-wrapper text-center mb-20">
                            <span>Testimonials</span>
                            <h5 class="section-title-4">What Our clients says</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="tptestimonial-wrap p-relative">
                    <div class="tptestimonial-wrapper tptestimonial-active">
                        @foreach ($reviews as $key => $value)
                            <div class="tptestimonial p-relative d-flex align-items-center">
                                <div class="tptestimonial-thumb mr-40">
                                    {!! get_image($value->image, '', 'review') !!}
                                </div>
                                <div class="tptestimonial-content">
                                    <div class="tptestimonial-shape mb-20">
                                        <i><svg width="40" height="30" viewBox="0 0 40 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M24.2289 29.0379C24.7654 29.0379 25.8383 28.0753 27.4476 26.1502C29.0569 24.332 30.559 22.2465 31.9537 19.8935C33.2412 17.5406 33.8849 15.455 33.8849 13.6368C33.8849 13.1021 33.7776 12.5139 33.563 11.8721C33.3485 12.6208 32.8657 13.2625 32.1147 13.7973C31.2563 14.439 30.0762 14.7598 28.5741 14.7598C26.3211 14.7598 24.6581 14.1181 23.5852 12.8347C22.405 11.6582 21.8149 10.1609 21.8149 8.34273C21.8149 6.20369 22.6732 4.27856 24.3899 2.56734C25.9992 0.856103 28.1986 0.000488217 30.9881 0.000488217C33.4558 0.000488217 35.4942 0.695676 37.1036 2.08605C38.6056 3.47643 39.5176 5.13418 39.8394 7.05931C39.9467 7.59407 40.0004 8.44969 40.0004 9.62616C40.0004 13.6903 38.6593 17.5406 35.977 21.177C33.2948 24.9203 29.7007 27.8614 25.1945 30.0005L24.2289 29.0379ZM2.98579 29.0379C3.52223 29.0379 4.59512 28.0753 6.20445 26.1502C7.81377 24.332 9.31581 22.2465 10.7106 19.8935C11.998 17.5406 12.6418 15.455 12.6418 13.6368C12.6418 13.1021 12.5345 12.5139 12.3199 11.8721C12.1053 12.6208 11.6225 13.2625 10.8715 13.7973C10.0132 14.439 8.83301 14.7598 7.33097 14.7598C5.07791 14.7598 3.41494 14.1181 2.34205 12.8347C1.16188 11.6582 0.571791 10.1609 0.571791 8.34273C0.571791 6.20369 1.4301 4.27856 3.14672 2.56734C4.75605 0.856103 6.95546 0.000488217 9.74497 0.000488217C12.2126 0.000488217 14.2511 0.695676 15.8604 2.08605C17.3625 3.47643 18.2744 5.13418 18.5963 7.05931C18.7036 7.59407 18.7572 8.44969 18.7572 9.62616C18.7572 13.6903 17.4161 17.5406 14.7339 21.177C12.0517 24.9203 8.4575 27.8614 3.95138 30.0005L2.98579 29.0379Z"
                                                    fill="black" stroke="currentColor" fill-opacity="0.2" />
                                            </svg>
                                        </i>
                                    </div>
                                    {!! $value->description ?? '' !!}
                                    <div class="tptestimonial-avatar-info">
                                        <h5 class="tptestimonial-avatar-title">{{ $value->name ?? '' }}</h5>
                                        <span>{{ $value->desigation ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="testimonial-fixed-bg fix"></div>
                    <div class="tptestimonial-arrow">
                        <div class="testimonial-arrows p-relative">
                            <button class="prev-testimonial">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" fill="none"
                                        viewBox="0 0 8 14">
                                        <path fill-rule="evenodd"
                                            d="M7.707.293a1 1 0 0 1 0 1.414L2.414 7l5.293 5.293a1 1 0 0 1-1.414 1.414l-6-6a1 1 0 0 1 0-1.414l6-6a1 1 0 0 1 1.414 0z"
                                            fill="#000">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                            <button class="next-testimonial">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" fill="none"
                                        viewBox="0 0 8 14">
                                        <path fill-rule="evenodd"
                                            d="M.293 13.707a1 1 0 0 1 0-1.414L5.586 7 .293 1.707A1 1 0 1 1 1.707.293l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414 0z"
                                            fill="#000">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
