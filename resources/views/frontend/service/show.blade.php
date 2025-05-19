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
    @if ($roadmapChunks)
        <section class="feature-area bg-white pt-60 pb-60">
            <div class="container-xxl d_container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-wrapper text-center mb-20">
                            <span>{{ $content->roadmaptitle ?? '' }}</span>
                            <h5 class="section-title-4">{!! $content->roadmapinfo ?? '' !!}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <div class="feature-inner-wrap mb-60">
                            <div class="feature-inner-list">
                                @foreach ($roadmapChunks->get(0) ?? [] as $roadmap)
                                    <div class="feature-inner-item">
                                        <div class="feature-inner-icon">
                                            {!! get_image($roadmap->image) !!}
                                        </div>
                                        <div class="feature-inner-content">
                                            <h4 class="feature-inner-title">{{ $roadmap->name }}</h4>
                                            {!! $roadmap->description !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 align-self-end">
                        <div class="feature-inner-gallery">
                            <div class="feature-inner-thumb">
                                {!! get_image($content->roadmapimage) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="feature-inner-wrap mb-60">
                            <div class="feature-inner-list">
                                @foreach ($roadmapChunks->get(1) ?? [] as $roadmap)
                                    <div class="feature-inner-item">
                                        <div class="feature-inner-icon">
                                            {!! get_image($roadmap->image) !!}
                                        </div>
                                        <div class="feature-inner-content">
                                            <h4 class="feature-inner-title">{{ $roadmap->name }}</h4>
                                            {!! $roadmap->description !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($content->industry->isNotEmpty())
        <section class="quality-services-area pb-60 pt-60">
            <div class="container-xxl d_container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-wrapper text-center mb-20">
                            <span>{{ $content->industrytitle ?? '' }}</span>
                            <h5 class="section-title-4">{!! $content->industryinfo ?? '' !!}</h5>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="quality-services-nav">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    @foreach ($content->industry as $key => $value)
                                        <button class="nav-link{{ $key == 0 ? ' active' : '' }}"
                                            id="v-pills-{{ $key }}-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-{{ $key }}" type="button" role="tab"
                                            aria-controls="v-pills-{{ $key }}" aria-selected="true">
                                            <span>
                                                {{ $value->name ?? '' }}
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="services-quality-tab">
                            <div class="tab-content" id="v-pills-tabContent">
                                @foreach ($content->industry as $key => $value)
                                    <div class="tab-pane fade{{ $key == 0 ? ' show active' : '' }}"
                                        id="v-pills-{{ $key }}" role="tabpanel"
                                        aria-labelledby="v-pills-{{ $key }}-tab" tabindex="0">
                                        <div class="services-quality-wrapper">
                                            <div class="services-quality-thumb">
                                                {!! get_image($value->image) !!}
                                            </div>
                                            <div class="services-quality-content">
                                                {!! $value->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($content->projects->isNotEmpty())
        <section class="case-area bg-white pt-60 pb-60 fix">
            <div class="container-xxl d_container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-wrapper text-center mb-20">
                            <span>{{ $content->projecttitle ?? '' }}</span>
                            <h5 class="section-title-4">{!! $content->projectinfo ?? '' !!}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xxl d_container">
                <div class="row tpcase-active">
                    @foreach ($content->projects as $key => $value)
                        <div class="col-lg-6">
                            <div class="tpcase">
                                <div class="tpcase-thumb w-img">
                                    {!! get_image($value->image, '', 'srvproject') !!}
                                </div>
                                <div class="tpcase-content">
                                    <h3 class="tpcase-title">{{ $value->name ?? '' }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if ($content->pricing)
        @if ($content?->pricing?->prices->isNotEmpty())
            <section class="pricing pt-60 pb-60">
                <div class="container-xxl d_container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-wrapper text-center mb-20">
                                <span>{{ $content->pricingtitle ?? '' }}</span>
                                <h5 class="section-title-4">{!! $content->pricinginfo ?? '' !!}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($content->pricing->prices as $value)
                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <div class="card p-3 shadow rounded">
                                    <div class="card-head text-center">
                                        <h2 class="title">{!! $value->name ?? '' !!}</h2>
                                        <h3 class="price">
                                            <sup>Rs</sup>
                                            <span>{{ $value->price ?? '' }}/ </span>
                                            <small>month</small>
                                        </h3>
                                        @if ($value->info)
                                            <p class="text">{{ $value->info ?? '' }}</p>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="content">
                                            {!! $value->description ?? '' !!}
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center mt-4">
                                            <button class="blue-btn" data-bs-toggle="modal"
                                                data-bs-target="#seoSubscription" data-name="Standard">Contact
                                                Us</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endif

    @if ($content->faqs->isNotEmpty())
        <section class="faq-area bg-white pb-60 pt-60">
            <div class="container-xxl d_container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="tp-faq-wrapper mb-80">
                            <div class="col-lg-12">
                                <div class="section-wrapper mb-20">
                                    <span>{{ $content->faqtitle ?? '' }}</span>
                                    <h5 class="section-title-4">{!! $content->faqinfo ?? '' !!}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="tp-accordion">
                            <div class="accordion mb-35" id="accordionExample">
                                @foreach ($content->faqs as $key => $value)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $key }}">
                                            <button class="accordion-button{{ $key != 0 ? ' collapsed' : '' }}"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}"
                                                type="button" aria-expanded="false"
                                                aria-controls="collapse{{ $key }}">
                                                {{ $value->question }}
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                            id="collapse{{ $key }}" data-bs-parent="#accordionExample"
                                            aria-labelledby="headingThree">
                                            <div class="accordion-body">
                                                {!! $value->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
