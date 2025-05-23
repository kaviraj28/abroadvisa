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
    <section class="contact-style-two bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_five">
                        <div class="content-box">
                            <div class="sec-title">
                                <h6>Quick Contact</h6>
                                <h2>Have Questions? <br />Don't Hesitate to Contact Us</h2>
                                <p>Please feel free to get in touch with us using the contact form below. We'd love to hear
                                    for you welcomed and every pain avoided.</p>
                            </div>
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><img
                                                    src="{{ asset('frontend') }}/images/icons/icon-56.png" alt="">
                                            </div>
                                            <h4>Location</h4>
                                            <p>141, First Floor, 12 St Roots Terrace, Los Angeles 90010 Unitd States of
                                                America.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><img
                                                    src="{{ asset('frontend') }}/images/icons/icon-57.png" alt="">
                                            </div>
                                            <h4>Quick Contact</h4>
                                            <ul class="info clearfix">
                                                <li>
                                                    <h6>Phone:</h6>
                                                    <p><a href="tel:18963648018">+1 89-636-48018</a></p>
                                                </li>
                                                <li>
                                                    <h6>Email:</h6>
                                                    <p><a href="mailto:support@example.com">support@example.com</a></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><img
                                                    src="{{ asset('frontend') }}/images/icons/icon-58.png" alt="">
                                            </div>
                                            <h4>Opening Hrs</h4>
                                            <ul class="info clearfix">
                                                <li>
                                                    <h6>Mon - Friday:</h6>
                                                    <p>09.00 am to 07.00 pm</p>
                                                </li>
                                                <li>
                                                    <h6>Satday:</h6>
                                                    <p>10.00 am to 05.00 pm</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="content_block_six">
                        <div class="content-box">
                            <div class="sec-title">
                                <h6>Let’s Connect</h6>
                                <h2>Send Your Message</h2>
                                <p>Please feel free to get in touch with us using the contact form below. We'd love to hear
                                    for you.</p>
                            </div>
                            <div class="form-inner">
                                <form class="default-form" id="contact-form" method="post" action="#">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="username" placeholder="Your Name" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="Email Addres" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="phone" required="" placeholder="Phone Number">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Your Message..."></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn btn-two" type="submit" name="submit-form">Submit Now<i
                                                    class="flaticon-next"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
