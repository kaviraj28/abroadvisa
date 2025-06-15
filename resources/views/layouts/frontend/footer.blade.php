<footer class="footer-style-three">
    <div class="footer-top-three" style="background-image: url({{ asset('frontend') }}/images/background/footer-bg.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <figure class="footer-logo"><a href="/">
                                <img src="{{ $setting['site_main_logo'] ? asset(get_media($setting['site_main_logo'])->fullurl) : '' }}"
                                    alt="{{ $setting['site_main_logo'] ? get_media($setting['site_main_logo'])->alt : 'Visa Services' }}">
                            </a></figure>
                        <div class="text">
                            <h2>Imagine A Better Future</h2>
                            <p>Indignation and dislike men who are so beguiled and demoralized by the charms of pleasure
                                of the moment so blinded right to find fault.</p>
                            <h6><a href="index-3.html">Free Consultation <i class="flaticon-next"></i></a></h6>
                        </div>
                        <ul class="links-list clearfix">
                            <li><a href="index-3.html">Business</a></li>
                            <li><a href="index-3.html">Application</a></li>
                            <li><a href="index-3.html">Pay Online</a></li>
                            <li><a href="index-3.html">Evaluation</a></li>
                            <li><a href="index-3.html">Countries</a></li>
                            <li><a href="index-3.html">Career</a></li>
                            <li><a href="index-3.html">Migrate</a></li>
                            <li><a href="index-3.html">Classes</a></li>
                            <li><a href="index-3.html">FAQ’s</a></li>
                            <li><a href="index-3.html">Counselling</a></li>
                            <li><a href="index-3.html">Categories</a></li>
                            <li><a href="index-3.html">Appointment</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="text">
                            <h4>Get in Touch</h4>
                            <ul class="info-list clearfix">
                                <li>141, First Floor, 12 St Roots Terrace, <br />Los Angeles 90010.</li>
                                <li>Front Desk: <a href="tel:18963648018">+1 89-636-48018</a></li>
                            </ul>
                            <h6><a href="index-3.html">Our All Branches <i class="flaticon-next"></i></a></h6>
                        </div>
                        <ul class="social-links clearfix">
                            <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="index-3.html"><i class="fab fa-vimeo-v"></i></a></li>
                            <li><a href="index-3.html"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner clearfix">
                <div class="copyright">
                    <p class="text-center">&copy; {{ date('Y') }} <a href="/">Prime European Expert Group</a>.
                        All Rights
                        Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
