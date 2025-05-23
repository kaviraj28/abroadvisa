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
    @if ($careers->isNotEmpty())
        <section class="careers  pt-80 pb-70">
            <div class="container">
                <div class="row">
                    @foreach ($careers as $career)
                        <div class="col-md-6 col-12 mt-4 pt-2">
                            <div class="card border-0 bg-light rounded shadow">
                                <div class="card-body p-4">
                                    @if ($career->type)
                                        <span
                                            class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">{{ $career->type ?? '' }}</span>
                                    @endif
                                    <h5>{{ $career->name ?? '' }}</h5>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <span class="text-muted d-block"><i class='bx bx-user'></i>
                                                {{ $career->level ?? '' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-muted d-block text-end"><i class='bx bx-dollar-circle'></i>
                                                {{ $career->salary ?? '' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-muted d-block"><i class="bx bx-location-plus"></i>
                                                {{ $career->location ?? 'Thamel, Kathmandu' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-muted d-block text-end"><i class='bx bx-group'></i>
                                                {{ $career->number ?? '' }}</span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-muted d-block"><i class='bx bx-calendar'></i> Apply Before :
                                                {{ get_the_date($career->deadline) ?? '' }}</span>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <a class="btn btn-primary btn-bg-two"
                                                href="{{ route('careersingle', $career->slug) }}">View Details</a>
                                        </div>
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
