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
        'parentname' => 'Country',
        'parentlink' => '/country',
    ])
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="inner-box">
                            <div class="content-one">
                                <figure class="image-box">
                                    {!! get_image($content->image) !!}
                                </figure>
                                <div class="text">
                                    {!! $content->description ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>Other Services</h4>
                            </div>
                            <div class="post-inner">
                                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                    <div class="post clearfix"
                                        style="background-image: url({{ asset('frontend') }}/images/news/post-1.jpg);">

                                        <h4><a href="blog-details.html">Citizenship Concept on How to Become a UK
                                                Citizen.</a></h4>

                                    </div>
                                    <div class="post clearfix"
                                        style="background-image: url({{ asset('frontend') }}/images/news/post-1.jpg);">

                                        <h4><a href="blog-details.html">Citizenship Concept on How to Become a UK
                                                Citizen.</a></h4>

                                    </div>
                                    <div class="post clearfix"
                                        style="background-image: url({{ asset('frontend') }}/images/news/post-1.jpg);">

                                        <h4><a href="blog-details.html">Citizenship Concept on How to Become a UK
                                                Citizen.</a></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
