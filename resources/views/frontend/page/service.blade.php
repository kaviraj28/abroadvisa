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

    @if ($services->isNotEmpty())
        <section class="seo-area pt-60 pb-60 bg-white">
            <div class="container-xxl d_container">
                <div class="row justify-content-center">
                    @foreach ($services as $value)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="tpseo p-relative mb-40">
                                <div class="tpseo-bg tpseo-bg3"></div>
                                <div class="tpseo-content">
                                    <h4 class="tpseo-title mb-15">{{ $value->name ?? '' }}</h4>
                                    <div class="tpseo-info">
                                        <p>{{ stripLetters($value->description, 50, '...') }}</p>
                                        <div class="tpseo-details">
                                            <a href="{{ route('servicesingle', $value->slug) }}">Learn More <i
                                                    class="fa-light fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tpseo-thumb w-img d-flex justify-content-center">
                                    {!! get_image($value->image) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
