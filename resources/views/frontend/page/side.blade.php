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
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-play">
                        {!! get_image($content->image) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content ml-25">
                        {!! $content->description ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
