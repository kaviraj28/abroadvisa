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
    @if ($faqs->isNotEmpty())
        <div class="faq-area pt-100 pb-70">
            <div class="container">
                <div class="row pt-45">
                    <div class="col-lg-12">
                        <div class="faq-content">
                            <div class="faq-accordion">
                                <ul class="accordion">
                                    @foreach ($faqs as $key => $fq)
                                        <li class="accordion-item">
                                            <a class="accordion-title{{ $key == 0 ? ' active' : '' }}"
                                                href="javascript:void(0)">
                                                <i class="bx bx-plus"></i>
                                                {{ $fq->question ?? '' }}
                                            </a>
                                            <div class="accordion-content{{ $key == 0 ? ' show' : '' }}">
                                                {!! $fq->answer ?? '' !!}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
