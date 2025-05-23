<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon"
        href="{{ asset($setting['site_fav_icon'] ? get_media($setting['site_fav_icon'])->fullurl : 'frontend/images/logo.png') }}"
        type="image/x-icon">
    <link rel="icon"
        href="{{ asset($setting['site_fav_icon'] ? get_media($setting['site_fav_icon'])->fullurl : 'frontend/images/logo.png') }}"
        type="image/x-icon">
    @include('frontend.global.seo', [
        'name' => 'Page Not Found',
        'title' => 'Page Not Found',
        'description' => 'Page Not Found',
        'keyword' => 'Page Not Found',
        'seoimage' => 'frontend/images/404-error.jpg',
        'created_at' => '2023-06-06T08:09:15+00:00',
        'updated_at' => '2023-06-06T10:54:05+00:00',
    ])
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend') }}/css/font-awesome-all.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/flaticon.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/owl.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/color.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/responsive.css" rel="stylesheet">
</head>

<body>
    <div class="boxed_wrapper ">
        <main>
            <section class="error-section centred">
                <div class="auto-container">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('frontend') }}/images/icons/error.png"
                                alt="404"></figure>
                        <h2>Sorry, Something Went Wrong</h2>
                        <p>Oops! The page you are looking for does not exist. Please return to <br />the site’s
                            homepage.</p>
                        <a class="theme-btn btn-two" href="/">Back to Home<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend') }}/js/jquery.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/owl.js"></script>
    <script src="{{ asset('frontend') }}/js/wow.js"></script>
    <script src="{{ asset('frontend') }}/js/validation.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.fancybox.js"></script>
    <script src="{{ asset('frontend') }}/js/appear.js"></script>
    <script src="{{ asset('frontend') }}/js/scrollbar.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend') }}/js/parallax-scroll.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.lettering.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.circleType.js"></script>

    <!-- main-js -->
    <script src="{{ asset('frontend') }}/js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("img").forEach(img => {
                if (!img.hasAttribute("loading")) {
                    img.setAttribute("loading", "lazy");
                }
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
