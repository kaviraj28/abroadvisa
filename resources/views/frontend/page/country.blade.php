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

    @if ($countries->isNotEmpty())
        <section class="countries-style-three countries-page">
            <div class="pattern-layer"
                style="background-image: url({{ asset('frontend/assets/images/shape/shape-18.png') }});"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach ($countries as $key => $data)
                        <div class="col-lg-3 col-md-6 col-sm-12 countries-block">
                            <div class="countries-block-three">
                                <div class="inner-box">
                                    <figure class="flag">
                                        {!! get_image($data->image) !!}
                                    </figure>
                                    <h4><a href="{{ route('countrysingle', $data->slug) }}">{{ $data->name ?? '' }}</a></h4>
                                    <p>{{ stripLetters($data->description, 90, '...') }}</p>
                                    <div class="link">
                                        <a href="{{ route('countrysingle', $data->slug) }}">Read More</a>
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
