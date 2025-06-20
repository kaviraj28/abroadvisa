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
    @if ($services->isNotEmpty())
        <section class="coaching-section bg-color-1">
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach ($services as $key => $data)
                        <div class="col-lg-3 col-md-6 col-sm-12 coaching-block">
                            <div class="coaching-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image">
                                        {!! get_image($data->image) !!}
                                    </figure>
                                    <div class="content-box">
                                        <div class="icon-box"><a href="{{ route('servicesingle', $data->slug) }}"><i
                                                    class="flaticon-diagonal-arrow-1"></i></a></div>
                                        <h5><a href="{{ route('servicesingle', $data->slug) }}">{{ $data->name ?? '' }}</a>
                                        </h5>
                                    </div>
                                    <div class="overlay-content">
                                        <div class="icon-box"><a href="{{ route('servicesingle', $data->slug) }}"><i
                                                    class="flaticon-diagonal-arrow-1"></i></a></div>
                                        <h5><a href="{{ route('servicesingle', $data->slug) }}">{{ $data->name ?? '' }}</a>
                                        </h5>
                                        <p>{{ stripLetters($data->description, 60, '...') }}</p>
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
