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
    @if ($faqs->isNotEmpty())
        <section class="faq-page-section">
            <div class="auto-container">
                <div class="content-box">
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12 content-column">
                            <div class="faq-content">
                                <ul class="accordion-box">
                                    @foreach ($faqs as $key => $fq)
                                        <li class="accordion block{{ $key == 0 ? ' active-block' : '' }}">
                                            <div class="acc-btn{{ $key == 0 ? ' active' : '' }}">
                                                <div class="icon-outer"><i class="flaticon-diagonal-arrow"></i></div>
                                                <h5><span>Q{{ $key + 1 }}.</span>{{ $fq->question ?? '' }}</h5>
                                            </div>
                                            <div class="acc-content{{ $key == 0 ? ' current' : '' }}">
                                                <div class="text">
                                                    {!! $fq->answer ?? '' !!}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
