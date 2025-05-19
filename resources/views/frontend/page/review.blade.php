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
    @if ($reviews->isNotEmpty())
        <section class="clients-area clients-area-two pt-100 pb-70">
            <div class="container">
                <div class="row pt-45">
                    @foreach ($reviews as $key => $rev)
                        <div class="col-md-6">
                            <div class="clients-content">
                                <div class="content">
                                    {!! get_image($rev->image, '', 'home-review') !!}
                                    <i class="bx bxs-quote-alt-left"></i>
                                    <h3>{{ $rev->name ?? '' }}</h3>
                                    <span>{{ $rev->position ?? '' }}</span>
                                </div>
                                {!! $rev->description ?? '' !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
