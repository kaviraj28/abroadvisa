@extends('layouts.frontend.master')
@section('seo')
    @include('frontend.global.seo', [
        'name' => 'Page Not Found',
        'title' => 'Page Not Found',
        'description' => 'Page Not Found',
        'keyword' => 'Page Not Found',
        'seoimage' => 'frontend/images/404-error.jpg',
        'created_at' => '2023-06-06T08:09:15+00:00',
        'updated_at' => '2023-06-06T10:54:05+00:00',
    ])
@endsection

@section('content')
    <div class="error-area pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="error-content">
                        <img src="{{ asset('frontend/img/404.png') }}" alt="404 Error">
                        <h1 class="mt-20">Oops! Page Not Found</h1>
                        <p>The page you are looking for might have been removed had its name changed or is temporarily
                            unavailable.</p>
                        <a class="green-btn mt-10" href="/">
                            Return To Home Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
