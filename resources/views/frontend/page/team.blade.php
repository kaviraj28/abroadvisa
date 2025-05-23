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

    @if ($teams->isNotEmpty())
        <div class="team-area pt-100 pb-70 bg-f9f6f6">
            <div class="container">
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-team">
                                <div class="team-image">
                                    {!! get_image($team->image, '', 'team') !!}
                                </div>
                                <div class="team-content">
                                    <div class="team-info">
                                        <h3>{{ $team->name ?? '' }}</h3>
                                        @if ($team->position)
                                            <span>{{ $team->position ?? '' }}</span>
                                        @endif
                                    </div>
                                    {!! $team->description ?? '' !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
