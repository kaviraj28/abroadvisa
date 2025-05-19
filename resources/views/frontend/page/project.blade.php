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

    @if (!empty($projects))
        <section class="portfolio-area bg-white pt-60 pb-60">
            <div class="container-xxl d_container">
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="portfolio-inner-masonary d-block d-md-flex justify-content-md-center gap-md-2 masonary-menu mb-30">
                            <button class="active" data-filter="*"><span>All Work</span></button>
                            @foreach ($projects as $key => $category)
                                <button data-filter=".{{ Str::slug($key) }}">
                                    <span>{{ $key }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row grid">
                    @foreach ($projects as $key => $projects)
                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6 grid-item {{ Str::slug($key) }}">
                                <div class="portfolio-inner-item mb-60">
                                    <div class="portfolio-inner-thumb">
                                        {!! get_image($project['image'], '', 'project') !!}
                                    </div>
                                    <div class="portfolio-inner-content">
                                        <span>{{ $key }}</span>
                                        <h4 class="portfolio-inner-title">
                                            {{ $project['name'] ?? 'Untitled Project' }}

                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
