@if ($small_title || $big_title || $description)
    <div class="inner-banner banner-area pt-90 pb-50">
        <div class="container-xxl d_container">
            <div class="row justify-content-center justify-content-lg-start">
                @if ($image)
                    <div class="col-xxl-6 col-xl-6 col-lg-6 d-flex justify-content-center justify-content-lg-start">
                        <div class="banner-4">
                            <div class="banner-4-content text-center text-lg-start">
                                @if ($small_title)
                                    <span>{!! $small_title ?? '' !!}</span>
                                @endif
                                <h1 class="banner-4-title cd-headline clip is-full-width">{!! $big_title ?? '' !!}</h1>
                                @if ($description)
                                    <div class="mt-30">
                                        <p>{!! $description ?? '' !!}</p>
                                    </div>
                                @endif
                                @if ($linktext && $link)
                                    <div class="banner-4-btn mb-30"><a class="blue-btn"
                                            href="{{ $link ?? '' }}">{{ $linktext ?? '' }}</a>
                                    </div>
                                @endif
                                @if ($social == 1)
                                    <div
                                        class="contact-4 d-block d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                                        <div
                                            class="d-flex align-items-center justify-content-center justify-content-lg-start">
                                            <div class="contact-4-icon"><i><svg width="26" height="26"
                                                        viewBox="0 0 26 26" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M24.964 20.596C24.964 21.028 24.868 21.472 24.664 21.904C24.46 22.336 24.196 22.744 23.848 23.128C23.26 23.776 22.612 24.244 21.88 24.544C21.16 24.844 20.38 25 19.54 25C18.316 25 17.008 24.712 15.628 24.124C14.248 23.536 12.868 22.744 11.5 21.748C10.12 20.74 8.812 19.624 7.564 18.388C6.328 17.14 5.212 15.832 4.216 14.464C3.232 13.096 2.44 11.728 1.864 10.372C1.288 9.004 1 7.696 1 6.448C1 5.632 1.144 4.852 1.432 4.132C1.72 3.4 2.176 2.728 2.812 2.128C3.58 1.372 4.42 1 5.308 1C5.644 1 5.98 1.072 6.28 1.216C6.592 1.36 6.868 1.576 7.084 1.888L9.868 5.812C10.084 6.112 10.24 6.388 10.348 6.652C10.456 6.904 10.516 7.156 10.516 7.384C10.516 7.672 10.432 7.96 10.264 8.236C10.108 8.512 9.88 8.8 9.592 9.088L8.68 10.036C8.548 10.168 8.488 10.324 8.488 10.516C8.488 10.612 8.5 10.696 8.524 10.792C8.56 10.888 8.596 10.96 8.62 11.032C8.836 11.428 9.208 11.944 9.736 12.568C10.276 13.192 10.852 13.828 11.476 14.464C12.124 15.1 12.748 15.688 13.384 16.228C14.008 16.756 14.524 17.116 14.932 17.332C14.992 17.356 15.064 17.392 15.148 17.428C15.244 17.464 15.34 17.476 15.448 17.476C15.652 17.476 15.808 17.404 15.94 17.272L16.852 16.372C17.152 16.072 17.44 15.844 17.716 15.7C17.992 15.532 18.268 15.448 18.568 15.448C18.796 15.448 19.036 15.496 19.3 15.604C19.564 15.712 19.84 15.868 20.14 16.072L24.112 18.892C24.424 19.108 24.64 19.36 24.772 19.66C24.892 19.96 24.964 20.26 24.964 20.596Z"
                                                            stroke="#2645a0" stroke-width="1.5" stroke-miterlimit="10">
                                                        </path>
                                                        <path opacity="0.4"
                                                            d="M20.7996 9.40038C20.7996 8.68038 20.2356 7.57638 19.3956 6.67638C18.6276 5.84838 17.6076 5.20038 16.5996 5.20038"
                                                            stroke="#2645a0" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path opacity="0.4"
                                                            d="M24.9996 9.4C24.9996 4.756 21.2436 1 16.5996 1"
                                                            stroke="#2645a0" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg></i></div>
                                            <div class="contact-4-text"><span>Got Questions?</span><a
                                                    href="tel:+8002563123">+800
                                                    2563 123</a></div>
                                        </div>
                                        <div
                                            class="d-flex align-items-center justify-content-center justify-content-lg-start mt-10 mt-sm-0">
                                            <div class="contact-4-icon"><i>
                                                    <svg width="26" height="26" viewBox="0 0 22 17"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.5" d="M21 0.5L11 10.2778L1 0.5H21Z"
                                                            fill="#9A9DB0" />
                                                        <path d="M21 0.5L11 10.2778L1 0.5" stroke="#2645a0"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M1 0.5H21V15.6111C21 15.8469 20.9122 16.073 20.7559 16.2397C20.5996 16.4064 20.3877 16.5 20.1667 16.5H1.83333C1.61232 16.5 1.40036 16.4064 1.24408 16.2397C1.0878 16.073 1 15.8469 1 15.6111V0.5Z"
                                                            stroke="#2645a0" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M9.18229 8.5L1.26562 16.2444" stroke="#2645a0"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M20.7526 16.2444L12.8359 8.5" stroke="#2645a0"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </i></div>
                                            <div class="contact-4-text"><span>Got Queries?</span><a
                                                    href="mailto:info@visaabroad.com">info@visaabroad.com</a></div>
                                        </div>
                                    </div>
                                    <div
                                        class="footer-widget-social d-flex justify-content-center justify-content-lg-start mt-20">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a><a
                                            href="#"><i class="fa-brands fa-twitter"></i></a><a href="#"><i
                                                class="fa-brands fa-linkedin-in"></i></a><a href="#"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="optimize-thumb text-end p-relative">
                            <div class="optimize-shape">
                                {!! get_image($image, 'optimize-shape-1', 'banner') !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12 d-flex justify-content-center">
                        <div class="banner-4">
                            <div class="banner-4-content text-center">
                                @if ($small_title)
                                    <span>{!! $small_title ?? '' !!}</span>
                                @endif
                                <h1 class="banner-4-title cd-headline clip is-full-width">{!! $big_title ?? '' !!}</h1>
                                @if ($description)
                                    <div class="mt-30">
                                        <p>{!! $description ?? '' !!}</p>
                                    </div>
                                @endif
                                @if ($linktext && $link)
                                    <div class="banner-4-btn mb-30"><a class="blue-btn"
                                            href="{{ $link ?? '' }}">{{ $linktext ?? '' }}</a>
                                    </div>
                                @endif
                                @if ($social == 1)
                                    <div
                                        class="contact-4 d-block d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                                        <div
                                            class="d-flex align-items-center justify-content-center justify-content-lg-start">
                                            <div class="contact-4-icon"><i><svg width="26" height="26"
                                                        viewBox="0 0 26 26" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M24.964 20.596C24.964 21.028 24.868 21.472 24.664 21.904C24.46 22.336 24.196 22.744 23.848 23.128C23.26 23.776 22.612 24.244 21.88 24.544C21.16 24.844 20.38 25 19.54 25C18.316 25 17.008 24.712 15.628 24.124C14.248 23.536 12.868 22.744 11.5 21.748C10.12 20.74 8.812 19.624 7.564 18.388C6.328 17.14 5.212 15.832 4.216 14.464C3.232 13.096 2.44 11.728 1.864 10.372C1.288 9.004 1 7.696 1 6.448C1 5.632 1.144 4.852 1.432 4.132C1.72 3.4 2.176 2.728 2.812 2.128C3.58 1.372 4.42 1 5.308 1C5.644 1 5.98 1.072 6.28 1.216C6.592 1.36 6.868 1.576 7.084 1.888L9.868 5.812C10.084 6.112 10.24 6.388 10.348 6.652C10.456 6.904 10.516 7.156 10.516 7.384C10.516 7.672 10.432 7.96 10.264 8.236C10.108 8.512 9.88 8.8 9.592 9.088L8.68 10.036C8.548 10.168 8.488 10.324 8.488 10.516C8.488 10.612 8.5 10.696 8.524 10.792C8.56 10.888 8.596 10.96 8.62 11.032C8.836 11.428 9.208 11.944 9.736 12.568C10.276 13.192 10.852 13.828 11.476 14.464C12.124 15.1 12.748 15.688 13.384 16.228C14.008 16.756 14.524 17.116 14.932 17.332C14.992 17.356 15.064 17.392 15.148 17.428C15.244 17.464 15.34 17.476 15.448 17.476C15.652 17.476 15.808 17.404 15.94 17.272L16.852 16.372C17.152 16.072 17.44 15.844 17.716 15.7C17.992 15.532 18.268 15.448 18.568 15.448C18.796 15.448 19.036 15.496 19.3 15.604C19.564 15.712 19.84 15.868 20.14 16.072L24.112 18.892C24.424 19.108 24.64 19.36 24.772 19.66C24.892 19.96 24.964 20.26 24.964 20.596Z"
                                                            stroke="#2645a0" stroke-width="1.5" stroke-miterlimit="10">
                                                        </path>
                                                        <path opacity="0.4"
                                                            d="M20.7996 9.40038C20.7996 8.68038 20.2356 7.57638 19.3956 6.67638C18.6276 5.84838 17.6076 5.20038 16.5996 5.20038"
                                                            stroke="#2645a0" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path opacity="0.4"
                                                            d="M24.9996 9.4C24.9996 4.756 21.2436 1 16.5996 1"
                                                            stroke="#2645a0" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg></i></div>
                                            <div class="contact-4-text"><span>Got Questions?</span><a
                                                    href="tel:{{ get_field('site_phone') }}">{{ get_field('site_phone') }}</a>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex align-items-center justify-content-center justify-content-lg-start mt-10 mt-sm-0">
                                            <div class="contact-4-icon"><i>
                                                    <svg width="26" height="26" viewBox="0 0 22 17"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.5" d="M21 0.5L11 10.2778L1 0.5H21Z"
                                                            fill="#9A9DB0" />
                                                        <path d="M21 0.5L11 10.2778L1 0.5" stroke="#2645a0"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M1 0.5H21V15.6111C21 15.8469 20.9122 16.073 20.7559 16.2397C20.5996 16.4064 20.3877 16.5 20.1667 16.5H1.83333C1.61232 16.5 1.40036 16.4064 1.24408 16.2397C1.0878 16.073 1 15.8469 1 15.6111V0.5Z"
                                                            stroke="#2645a0" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M9.18229 8.5L1.26562 16.2444" stroke="#2645a0"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M20.7526 16.2444L12.8359 8.5" stroke="#2645a0"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </i></div>
                                            <div class="contact-4-text"><span>Got Queries?</span><a
                                                    href="mailto:{{ get_field('site_email') }}">{{ get_field('site_email') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="footer-widget-social d-flex justify-content-center justify-content-lg-start mt-20">
                                        @if ($socialdata->isNotEmpty())
                                            @foreach ($socialdata as $key => $value)
                                                <a href="{{ $value->link ?? '#' }}" target="_blank"><i
                                                        class="{{ $value->icon ?? '' }}"></i></a>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
