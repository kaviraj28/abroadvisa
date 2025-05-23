@extends('layouts.frontend.master')

@section('seo')
    {{-- @include('frontend.global.seo', [
        'name' => $content->name ?? '',
        'title' => $content->seo_title ?? $content->name,
        'description' => $content->seo_description ?? '',
        'keyword' => $content->seo_keywords ?? '',
        'schema' => $content->seo_schema ?? '',
        'seoimage' => $content->image ?? '',
        'created_at' => $content->created_at,
        'updated_at' => $content->updated_at,
    ]) --}}
@endsection

@section('content')
    @include('frontend.global.banner', [
        'name' => $content->name,
        'banner' => $content->banner ?? null,
        'parentname' => '',
        'parentlink' => '',
    ])

    <section class="pricing pt-60 pb-60">
        <div class="container-xxl d_container">
            <div class="row justify-content-center">
                @foreach ($content->prices as $key => $value)
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
                                    <button class="blue-btn" data-bs-toggle="modal" data-bs-target="#seoSubscription"
                                        data-name="Standard">Contact Us</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
