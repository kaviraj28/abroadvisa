@extends('layouts.admin.master')
@section('title', 'Website Settings')

@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="card-body p-0">
                    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card card-primary shadow br-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2 nav flex-column gap-2 nav-pills" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <button class="nav-link text-start active" id="v-pills-global-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-global" type="button"
                                            role="tab" aria-controls="v-pills-global"
                                            aria-selected="true">Global</button>
                                        <button class="nav-link text-start" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="false">Homepage</button>
                                    </div>
                                    <div class="col-9 col-sm-10 tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-global" role="tabpanel"
                                            aria-labelledby="v-pills-global-tab">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="image">Site Main Logo</label>
                                                        <div class="custom-file">
                                                            <a class="feature-modal" data-bs-toggle="modal"
                                                                data-bs-target="#featureModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if (get_field('site_main_logo'))
                                                                            @php
                                                                                $feature = get_media(
                                                                                    get_field('site_main_logo') ?? '',
                                                                                );
                                                                            @endphp
                                                                            @if ($feature)
                                                                                <img id="feature_img"
                                                                                    src="{{ asset($feature->fullurl) }}"
                                                                                    alt="{{ $feature->alt }}">
                                                                            @else
                                                                                <img id="feature_img"
                                                                                    src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                    alt="upload-image">
                                                                            @endif
                                                                        @else
                                                                            <img class="custom-width" id="feature_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="feature_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="feature_id" type="hidden"
                                                                name="site_main_logo"
                                                                value="{{ old('site_main_logo', get_field('site_main_logo')) }}">
                                                            @error('image')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="banner">Site Fav Icon</label>
                                                        <div class="custom-file">
                                                            <a class="banner-modal" data-bs-toggle="modal"
                                                                data-bs-target="#bannerModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if (get_field('site_fav_icon'))
                                                                            @php
                                                                                $banner = get_media(
                                                                                    get_field('site_fav_icon') ?? '',
                                                                                );
                                                                            @endphp
                                                                            @if ($banner)
                                                                                <img id="banner_img"
                                                                                    src="{{ asset($banner->fullurl) }}"
                                                                                    alt="{{ $banner->alt }}">
                                                                            @else
                                                                                <img id="feature_img"
                                                                                    src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                    alt="upload-image">
                                                                            @endif
                                                                        @else
                                                                            <img class="custom-width" id="banner_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="banner_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="banner_id" type="hidden"
                                                                name="site_fav_icon"
                                                                value="{{ old('site_fav_icon', get_field('site_fav_icon')) }}">
                                                            @error('site_fav_icon')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="footer">Site Footer Logo</label>
                                                        <div class="custom-file">
                                                            <a class="footer-modal" data-bs-toggle="modal"
                                                                data-bs-target="#footerModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if (get_field('site_footer_logo'))
                                                                            @php
                                                                                $footer = get_media(
                                                                                    get_field('site_footer_logo') ?? '',
                                                                                );
                                                                            @endphp
                                                                            @if ($footer)
                                                                                <img id="footer_img"
                                                                                    src="{{ asset($footer->fullurl) }}"
                                                                                    alt="{{ $footer->alt }}">
                                                                            @else
                                                                                <img id="feature_img"
                                                                                    src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                    alt="upload-image">
                                                                            @endif
                                                                        @else
                                                                            <img class="custom-width" id="footer_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="footer_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="footer_id" type="hidden"
                                                                name="site_footer_logo"
                                                                value="{{ old('site_footer_logo', get_field('site_footer_logo')) }}">
                                                            @error('site_footer_logo')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_information">Site Information</label>
                                                        <textarea class="form-control br-8" name="site_information" rows="4" placeholder="Enter Site Information">{{ get_field('site_information') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone">Phone Number</label>
                                                        <input class="form-control br-8" type="tel" name="site_phone"
                                                            value="{{ get_field('site_phone') }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email">Email</label>
                                                        <input class="form-control br-8" type="email" name="site_email"
                                                            value="{{ get_field('site_email') }}"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone_two">Phone Number(2)</label>
                                                        <input class="form-control br-8" type="tel" two
                                                            name="site_phone_2" value="{{ get_field('site_phone_two') }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email_two">Email(2)</label>
                                                        <input class="form-control br-8" type="email" two
                                                            name="site_email_2" value="{{ get_field('site_email_two') }}"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location">Location</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location" value="{{ get_field('site_location') }}"
                                                            placeholder="Enter Location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location_url">Location Url</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location_url"
                                                            value="{{ get_field('site_location_url') }}"
                                                            placeholder="Enter Location Url">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_copyright">Open Time</label>
                                                        <textarea class="form-control br-8" name="site_copyright" rows="4" placeholder="Enter Site Copyright">{{ get_field('site_copyright') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_title">Enter Homepage Title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="homepage_title"
                                                            value="{{ get_field('homepage_title') }}"
                                                            placeholder="Enter Homepage Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="home">Select Homepage Image</label>
                                                        <div class="custom-file">
                                                            <a class="home-modal" data-bs-toggle="modal"
                                                                data-bs-target="#homeModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if (get_field('homepage_image'))
                                                                            @php
                                                                                $home = get_media(
                                                                                    get_field('homepage_image') ?? '',
                                                                                );
                                                                            @endphp
                                                                            <img id="home_img"
                                                                                src="{{ asset($home->fullurl) }}"
                                                                                alt="{{ $home->alt }}">
                                                                        @else
                                                                            <img class="custom-width" id="home_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="home_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="home_id" type="hidden"
                                                                name="homepage_image"
                                                                value="{{ old('homepage_image', get_field('homepage_image')) }}">
                                                            @error('homepage_image')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="homepage_description">Enter Homepage
                                                            Description</label>
                                                        <textarea class="form-control ckeditor br-8" name="homepage_description" rows="4">{{ get_field('homepage_description') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="blog_title">Enter Blog Title</label>
                                                        <input class="form-control br-8" type="text" name="blog_title"
                                                            value="{{ get_field('blog_title') }}"
                                                            placeholder="Enter Blog Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="blog_description">Enter Blog
                                                            Description</label>
                                                        <textarea class="form-control br-8" name="blog_description" rows="4">{{ get_field('blog_description') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="border p-3">
                                                        <legend class="float-none w-auto legend-title">SEO</legend>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="homepage_seo_title">Enter Homepage
                                                                        Seo
                                                                        Title</label>
                                                                    <input class="form-control br-8" type="text"
                                                                        name="homepage_seo_title"
                                                                        value="{{ get_field('homepage_seo_title') }}"
                                                                        placeholder="Enter Homepage Seo Title">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="homepage_seo_keywords">Enter
                                                                        Homepage
                                                                        Seo Keywords</label>
                                                                    <input class="form-control br-8" type="text"
                                                                        name="homepage_seo_keywords"
                                                                        value="{{ get_field('homepage_seo_keywords') }}"
                                                                        placeholder="Enter Homepage Seo Keywords">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="homepage_seo_description">Enter
                                                                        Homepage
                                                                        Seo
                                                                        Description</label>
                                                                    <textarea class="form-control br-8" name="homepage_seo_description" rows="4">{{ get_field('homepage_seo_description') }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="homepage_seo_schema">Enter Homepage
                                                                        Seo
                                                                        Schema</label>
                                                                    <textarea class="form-control br-8" name="homepage_seo_schema" rows="10">{{ get_field('homepage_seo_schema') }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footers">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="fa-solid fa-rotate"></i> Update Setting</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
