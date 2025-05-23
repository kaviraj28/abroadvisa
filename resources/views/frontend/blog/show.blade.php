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
    <section class="postbox-area mt-90 pb-60">
        <div class="container-xxl d_container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="postbox-area-wrap">
                        <div class="postbox-main">
                            <div class="blog-details-content">
                                <h1 class="blog-details-banner-title">{{ $content->name ?? '' }}</h1>
                            </div>
                            @if (!empty($tableOfContents))
                                <div class="sidebar__widget mb-20 d-block d-lg-none">
                                    <h3 class="sidebar__widget-title">Table of Contents</h3>
                                    <div class="sidebar__widget-content">
                                        <ul>
                                            @foreach ($tableOfContents as $toc)
                                                <li>
                                                    <a href="#{{ $toc['id'] }}">{{ $toc['title'] }}</a>
                                                    @if (!empty($toc['subheadings']))
                                                        <ul>
                                                            @foreach ($toc['subheadings'] as $sub)
                                                                <li><a href="#{{ $sub['id'] }}">{{ $sub['title'] }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="postbox-img w-100">
                                {!! get_image($content->image) !!}
                            </div>
                            <div class="postbox-single-text">
                                {!! $content->description ?? '' !!}
                            </div>
                        </div>
                        @if ($previousPost || $nextPost)
                            <div class="row align-items-center">
                                @if ($previousPost)
                                    <div class="col-md-6">
                                        <div class="postbox-more-left mb-55">
                                            <div class="postbox-more-icon">
                                                <a href="{{ route('blogsingle', $previousPost->slug) }}">
                                                    <span>
                                                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 10L1 5.5L5.5 1" stroke="#84848B"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Previous
                                                </a>
                                            </div>
                                            <div class="postbox-more-content">
                                                <span><a
                                                        href="{{ route('blogsingle', $previousPost->slug) }}">{{ $previousPost->name ?? '' }}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($nextPost)
                                    <div class="col-md-6">
                                        <div class="postbox-more-right mb-55">
                                            <div class="postbox-more-icon text-md-end">
                                                <a href="{{ route('blogsingle', $nextPost->slug) }}">
                                                    Next
                                                    <span>
                                                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 10L5.5 5.5L1 1" stroke="#84848B" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                            <div
                                                class="postbox-more-content d-flex align-items-center justify-content-md-end">
                                                <span class="text-end"><a
                                                        href="{{ route('blogsingle', $nextPost->slug) }}">{{ $nextPost->name ?? '' }}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="sidebar__wrapper ml-30 side-sticky">
                        @if (!empty($tableOfContents))
                            <div class="sidebar__widget mb-20 d-none d-lg-block">
                                <h3 class="sidebar__widget-title">Table of Contents</h3>
                                <div class="sidebar__widget-content">
                                    <ul>
                                        @foreach ($tableOfContents as $toc)
                                            <li>
                                                <a href="#{{ $toc['id'] }}">{{ $toc['title'] }}</a>
                                                @if (!empty($toc['subheadings']))
                                                    <ul>
                                                        @foreach ($toc['subheadings'] as $sub)
                                                            <li><a href="#{{ $sub['id'] }}">{{ $sub['title'] }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="sidebar__widget mb-20">
                            <h3 class="sidebar__widget-title">Recent Post</h3>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__post rc__post">
                                    <div class="rc__post mb-10 d-flex align-items-center">
                                        <div class="rc__post-thumb mr-20">
                                            <a href="/"><img
                                                    src="{{ asset('frontend') }}/img/blog/sidebar/blog-sm-1.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="/">Unpacking SEO for <br> the Google Local
                                                    Pack.</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>Jun 28,2023</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-10 d-flex align-items-center">
                                        <div class="rc__post-thumb mr-20">
                                            <a href="/"><img
                                                    src="{{ asset('frontend') }}/img/blog/sidebar/blog-sm-2.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="/">7 of the Best Examples of Beautiful Blog
                                                    Design</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>July 21, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rc__post mb-10 d-flex align-items-center">
                                        <div class="rc__post-thumb mr-20">
                                            <a href="/"><img
                                                    src="{{ asset('frontend') }}/img/blog/sidebar/blog-sm-3.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h3 class="rc__post-title">
                                                <a href="/">Working From Home?
                                                    Let’s Get Started</a>
                                            </h3>
                                            <div class="rc__meta">
                                                <span>July 21, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($socialdata->isNotEmpty())
                            <div class="sidebar__widget mb-20">
                                <h3 class="sidebar__widget-title">Social</h3>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__widget-social">
                                        @foreach ($socialdata as $key => $value)
                                            <a href="{{ $value->link ?? '#' }}" target="_blank"><i
                                                    class="{{ $value->icon ?? '' }}"></i></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
