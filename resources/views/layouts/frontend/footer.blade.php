<footer class="footer-style-three">
    <div class="footer-top-three" style="background-image: url({{ asset('frontend') }}/images/background/footer-bg.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <figure class="footer-logo"><a href="/">
                                {!! get_image(get_field('site_footer_logo')) !!}
                            </a></figure>
                        <div class="text">
                            {!! get_field('site_info') !!}
                            <h6><a href="index-3.html">Free Consultation <i class="flaticon-next"></i></a></h6>
                        </div>
                        {!! get_the_menu(2, 'links-list clearfix') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="text">
                            <h4>Get in Touch</h4>
                            <ul class="info-list clearfix">
                                <li>{{ get_field('site_location') }}</li>
                                <li><a href="tel:{{ get_field('site_phone') }}">{{ get_field('site_phone') }}</a></li>
                                <li><a href="tel:{{ get_field('site_email') }}">{{ get_field('site_email') }}</a></li>
                            </ul>
                            <h6><a href="index-3.html">Our All Branches <i class="flaticon-next"></i></a></h6>
                        </div>
                        @if ($socialdata->isNotEmpty())
                            <ul class="social-links clearfix">
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
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner clearfix">
                <div class="copyright">
                    <p class="text-center">&copy; {{ date('Y') }} <a href="/">Prime European Expert
                            Group</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
