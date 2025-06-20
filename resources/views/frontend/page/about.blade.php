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

    <section class="about-style-three">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    {!! get_image($content->image) !!}
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <h6>About Prime European Experts</h6>
                            {!! $content->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($counters->isNotEmpty())
        <section class="funfact-section">
            <div class="outer-container clearfix">
                @foreach ($counters as $key => $data)
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="inner">
                                <div class="icon-box">
                                    {!! get_image($data->icon) !!}
                                </div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="1500" data-stop="{{ $data->count_num }}">0</span>
                                    @if ($data->num_postfix)
                                        <span>{{ $data->num_postfix ?? '' }}</span>
                                    @endif
                                </div>
                            </div>
                            <h4>{{ $data->name ?? '' }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endsection
