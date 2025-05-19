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
        'small_title' => $content->banner_small_title ?? $content->name,
        'big_title' => $content->banner_big_title ?? null,
        'description' => $content->banner_description ?? null,
        'link' => $content->banner_link_url ?? null,
        'linktext' => $content->banner_link_text ?? null,
        'social' => $content->banner_social ?? null,
        'image' => $content->image ?? null,
    ])
    @if ($blogs->isNotEmpty())
        <section class="blog-area bg-white pb-50 pt-50">
            <div class="container-xxl d_container">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="tpblog mb-30">
                                <div class="tpblog-thumb mb-25 fix">
                                    <a href="{{ route('blogsingle', $blog->slug) }}">
                                        {!! get_image($blog->image, '', 'blog') !!}
                                    </a>
                                </div>
                                <div class="tpblog-content">
                                    <h3 class="tpblog-title">
                                        <a href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name ?? '' }}</a>
                                    </h3>
                                    <p>{{ stripLetters($blog->description, 51, '...') }}</p>
                                    <a href="keyword-search.html">Read More <i class="fa-light fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
