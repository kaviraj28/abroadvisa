@php
    $logo = get_field('site_main_logo') ? get_media(get_field('site_main_logo')) : '';
    $logoheight = $logo ? $logo->height : '';
    $logowidth = $logo ? $logo->width : '';

    $image = $seoimage ? get_media($seoimage) : '';

    $url = $image ? asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) : '';

    $height = $image ? $image->height : '';
    $width = $image ? $image->width : '';

@endphp
@if ($keyword)
    <meta name="keywords" content="{{ $keyword ?? '' }}">
@endif
<link rel="profile" href="http://gmpg.org/xfn/11">
<title>{{ $title ?? '' }}</title>
@if ($description)
    <meta name="description" content="{{ $description ?? '' }}">
@endif
<link rel="canonical" href="{{ Request::url() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $title ?? '' }}" />
@if ($description)
    <meta property="og:description" content="{{ $description ?? '' }}" />
@endif
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:site_name" content="{{ $title ?? '' }}" />
<meta property="article:publisher" content="https://www.facebook.com/studiodanfe" />
<meta property="article:modified_time" content="{{ $updated_at }}" />
@php
    if (!empty($image)) {
        echo '<meta property="og:image" content="' . $url . '"/>';
        if ($width) {
            echo '<meta property="og:image:width" content="' . $width . '"/>';
        }
        if ($height) {
            echo '<meta property="og:image:height" content="' . $height . '"/>';
        }
        echo '<meta property="og:image:type" content="image/jpeg"/>';
    }
@endphp
@if (!empty($schema))
    <script type="application/ld+json" ignore--minify>{!! $schema ?? '' !!}</script>
@else
    <script type="application/ld+json" ignore--minify>
        {
            "@context":"https://schema.org",
            "@graph":[
                {
                    "@type":"WebPage",
                    "@id":"{{ Request::url() }}/",
                    "url":"{{ Request::url() }}/",
                    "name":"{{ $name ?? '' }}",
                    "isPartOf":{
                        "@id":"{{ url('/') }}/#website"
                    },
                    "primaryImageOfPage":{
                        "@id":"{{ Request::url() }}/#primaryimage"
                    },
                    "image":{
                        "@id":"{{ Request::url() }}/#primaryimage"
                    },
                    "thumbnailUrl":"{{ $url }}",
                    "datePublished":"{{ $created_at }}",
                    "dateModified":"{{ $updated_at }}",
                    "description":"{{ $description ?? '' }}",
                    "breadcrumb":{
                        "@id":"{{ Request::url() }}/#breadcrumb"
                    },
                    "inLanguage":"en-US",
                    "potentialAction":[
                        {
                            "@type":"ReadAction",
                            "target":[
                                "{{ Request::url() }}/"
                            ]
                        }
                    ]
                },
                {
                    "@type":"ImageObject",
                    "inLanguage":"en-US",
                    "@id":"{{ Request::url() }}/#primaryimage",
                    "url":"{{ $url ?? '' }}",
                    "contentUrl":"{{ $url ?? '' }}",
                    "width":"{{ $width ?? '' }}",
                    "height":"{{ $height ?? '' }}",
                    "caption":"{{ $title ?? '' }}"
                },
                {
                    "@type":"BreadcrumbList",
                    "@id":"{{ Request::url() }}/#breadcrumb",
                    "itemListElement":[
                        {
                            "@type":"ListItem",
                            "position":1,
                            "name":"Home",
                            "item":"{{ url('/') }}/"
                        },
                        @if(Request::segment(1) == 'blogs' && Request::segment(2) != Null)
                        {
                            "@type":"ListItem",
                            "position":2,
                            "name":"Blogs",
                            "item":"{{ url('/') }}/blogs/"
                        },
                        
                        @endif
                        @if(Request::segment(1) == 'destination' && Request::segment(2) != Null)
                        
                        {
                            "@type":"ListItem",
                            "position":2,
                            "name":"Destinations",
                            "item":"{{ url('/') }}/destinations/"
                        },
                        
                        @endif
                        @if(Request::segment(1) == 'category' && Request::segment(2) != Null)

                        {
                            "@type":"ListItem",
                            "position":2,
                            "name":"Blog Category",
                            "item":"{{ url('/') }}/categories/"
                        },

                        @endif

                        {
                        "@type":"ListItem",
                        "position":{{ Request::segment(2) != Null ? 3 : 2 }},
                        "name":"{{ $name ?? '' }}"
                        }
                    ]
                },
                {
                    "@type":"WebSite",
                    "@id":"{{ url('/') }}/#website",
                    "url":"{{ url('/') }}/",
                    "name":"{{ get_field('homepage_seo_title') ?? '' }}",
                    "description":"{{ get_field('homepage_seo_description') ?? '' }}",
                    "publisher":{
                        "@id":"{{ url('/') }}/#organization"
                    },
                    "inLanguage":"en-US"
                }
            ]
        }
    </script>
@endif
