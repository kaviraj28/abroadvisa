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
    @if ($blogs->isNotEmpty())
        <section class="news-section blog-three-column">
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <h2>14<span>Oct</span></h2>
                                        <figure class="image">
                                            <a href="{{ route('blogsingle', $blog->slug) }}">
                                                {{ $blog->image }}
                                                {!! get_image($blog->image, '', '') !!}
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <h4>
                                            <a href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name ?? '' }}</a>
                                        </h4>
                                        <p>{{ stripLetters($blog->description, 51, '...') }}</p>
                                        <div class="lower-box clearfix">
                                            <div class="link pull-left">
                                                <a href="{{ route('blogsingle', $blog->slug) }}">
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
