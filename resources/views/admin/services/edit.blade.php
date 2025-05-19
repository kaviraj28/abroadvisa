@extends('layouts.admin.master')
@section('title', 'Edit ' . $service->name . ' - Visa Abroad')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Services - {{ $service->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('services.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('services.update', $service->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id=""
                                            type="text" name="name" value="{{ old('name', $service->name) }}"
                                            placeholder="">
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-slug">slug</label>
                                        <input class="form-control @error('slug') is-invalid @enderror" id=""
                                            type="text" name="slug" value="{{ old('slug', $service->slug) }}"
                                            placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $service->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card card-body my-5 shadow br-8 p-4">
                            <ul class="nav nav-tabs px-4" id="myTab" role="tablist">
                                <li class="nav-item" role="banner">
                                    <button class="nav-link active" id="banner-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-banner" type="button" role="tab" aria-controls="banner"
                                        aria-selected="true">Banner</button>
                                </li>
                                <li class="nav-item" role="roadmap">
                                    <button class="nav-link" id="roadmap-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-roadmap" type="button" role="tab" aria-controls="roadmap"
                                        aria-selected="true">Title & Info</button>
                                </li>
                                <li class="nav-item" role="seo">
                                    <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#nav-seo"
                                        type="button" role="tab" aria-controls="seo" aria-selected="true">SEO</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade  show active" id="nav-banner" role="tabpanel"
                                    aria-labelledby="nav-banner-tab">
                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto legend-title">Banner</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="banner_small_title">Small Title</label>
                                                    <input class="form-control br-8" type="text"
                                                        name="banner_small_title"
                                                        value="{{ old('banner_small_title', $service->banner_small_title) }}"
                                                        placeholder="Enter Small Title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="banner_big_title">Big Title</label>
                                                    <input class="form-control br-8" type="text"
                                                        name="banner_big_title"
                                                        value="{{ old('banner_big_title', $service->banner_big_title) }}"
                                                        placeholder="Enter Big Title">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="banner_description">Banner Description</label>
                                                    <textarea class="form-control br-8" name="banner_description" rows="4" placeholder="Enter Banner Description">{{ old('banner_description', $service->banner_description) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="banner_link_text">Link Text</label>
                                                    <input class="form-control br-8" type="text"
                                                        name="banner_link_text"
                                                        value="{{ old('banner_link_text', $service->banner_link_text) }}"
                                                        placeholder="Enter Link Text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="banner_link_url">Link URL</label>
                                                    <input class="form-control br-8" type="text"
                                                        name="banner_link_url"
                                                        value="{{ old('banner_link_url', $service->banner_link_url) }}"
                                                        placeholder="Link URL">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="d-block">Dispaly Social</label>
                                                <div class="form-check form-check-inline mt-1">
                                                    <input class="form-check-input" id="inlineRadio1" type="radio"
                                                        name="banner_social" value="1"
                                                        @if ($service->banner_social == 1) checked @endif />
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" id="inlineRadio2" type="radio"
                                                        name="banner_social" value="0"
                                                        @if ($service->banner_social == 0) checked @endif />
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="tab-pane fade" id="nav-roadmap" role="tabpanel"
                                    aria-labelledby="nav-roadmap-tab">
                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto legend-title">Roadmap</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="roadmaptitle">Roadmap Title</label>
                                                    <input class="form-control br-8" type="text" name="roadmaptitle"
                                                        value="{{ old('roadmaptitle', $service->roadmaptitle) }}"
                                                        placeholder="Enter Roadmap Title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="roadmapinfo">Roadmap Info</label>
                                                    <textarea class="form-control br-8" type="text" name="roadmapinfo" placeholder="Enter Roadmap Info">{{ old('roadmapinfo', $service->roadmapinfo) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3 mt-2">
                                                    <label for="banner">Featured Banner</label>
                                                    <div class="custom-file">
                                                        <a class="banner-modal" data-bs-toggle="modal"
                                                            data-bs-target="#bannerModel" href="javascript:void(0)">
                                                            <div
                                                                class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                <div
                                                                    class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                    @if ($service->roadmapimage)
                                                                        @php
                                                                            $banner = get_media(
                                                                                $service->roadmapimage ?? '',
                                                                            );
                                                                        @endphp
                                                                        @if ($banner)
                                                                            <img id="banner_img"
                                                                                src="{{ asset($banner->fullurl) }}"
                                                                                alt="{{ $banner->alt }}">
                                                                        @else
                                                                            <img id="banner_img"
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
                                                            name="roadmapimage"
                                                            value="{{ old('roadmapimage', $service->roadmapimage) }}">
                                                        @error('roadmapimage')
                                                            <div class="invalid-feedback" style="display: block;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto legend-title">Industry We Serve</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="industrytitle">Industry Title</label>
                                                    <input class="form-control br-8" type="text" name="industrytitle"
                                                        value="{{ old('industrytitle', $service->industrytitle) }}"
                                                        placeholder="Enter Industry Title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="industryinfo">Industry Info</label>
                                                    <textarea class="form-control br-8" type="text" name="industryinfo" placeholder="Enter Industry Info">{{ old('industryinfo', $service->industryinfo) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto legend-title">Projects</legend>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="projecttitle">Project Title</label>
                                                    <input class="form-control br-8" type="text" name="projecttitle"
                                                        value="{{ old('projecttitle', $service->projecttitle) }}"
                                                        placeholder="Enter Project Title">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="projectinfo">Project Info</label>
                                                    <textarea class="form-control br-8" type="text" name="projectinfo" placeholder="Enter Project Info">{{ old('projectinfo', $service->projectinfo) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto legend-title">Pricing</legend>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="pricingtitle">Pricing Title</label>
                                                    <input class="form-control br-8" type="text" name="pricingtitle"
                                                        value="{{ old('pricingtitle', $service->pricingtitle) }}"
                                                        placeholder="Enter Pricing Title">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="pricinginfo">Pricing Info</label>
                                                    <textarea class="form-control br-8" type="text" name="pricinginfo" placeholder="Enter Pricing Info">{{ old('pricinginfo', $service->pricinginfo) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto legend-title">Faqs</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="faqtitle">Faq Title</label>
                                                    <input class="form-control br-8" type="text" name="faqtitle"
                                                        value="{{ old('faqtitle', $service->faqtitle) }}"
                                                        placeholder="Enter Faq Title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="faqinfo">Faq Info</label>
                                                    <textarea class="form-control br-8" type="text" name="faqinfo" placeholder="Enter faq Info">{{ old('faqinfo', $service->faqinfo) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3 mt-2">
                                                    <label for="video">Faq Image</label>
                                                    <div class="custom-file">
                                                        <a class="video-modal" data-bs-toggle="modal"
                                                            data-bs-target="#videoModel" href="javascript:void(0)">
                                                            <div
                                                                class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                <div
                                                                    class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                    @if ($service->faqimage)
                                                                        @php
                                                                            $video = get_media(
                                                                                $service->faqimage ?? '',
                                                                            );
                                                                        @endphp
                                                                        @if ($video)
                                                                            <img id="video_img"
                                                                                src="{{ asset($video->fullurl) }}"
                                                                                alt="{{ $video->alt }}">
                                                                        @else
                                                                            <img id="video_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    @else
                                                                        <img class="custom-width" id="video_img"
                                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                                            alt="upload-image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="btn btn-sm btn-danger d-none" id="video_remove"
                                                            href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                            Delete</a>

                                                        <input class="" id="video_id" type="hidden"
                                                            name="faqimage"
                                                            value="{{ old('faqimage', $service->faqimage) }}">
                                                        @error('faqimage')
                                                            <div class="invalid-feedback" style="display: block;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="tab-pane fade" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
                                    <fieldset class="border p-3">
                                        <legend class="float-none w-auto legend-title">SEO</legend>
                                        <div class="form-group mb-3">
                                            <label for="seo_title">Seo Title</label>
                                            <input class="form-control br-8" type="text" name="seo_title"
                                                value="{{ old('seo_title', $service->seo_title) }}"
                                                placeholder="Enter Seo Title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="seo_description">Seo Description</label>
                                            <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description', $service->seo_description) }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="seo_keywords">Seo Keywords</label>
                                            <input class="form-control br-8" type="text" name="seo_keywords"
                                                value="{{ old('seo_keywords', $service->seo_keywords) }}"
                                                placeholder="Enter Seo Keywords">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="seo_schema">Seo Schema</label>
                                            <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema', $service->seo_schema) }}</textarea>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0"
                                        @if ($service->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($service->status == 1) selected @endif
                                        value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $service->order) }}"
                                    placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                @if ($service->image)
                                                    @php
                                                        $feature = get_media($service->image ?? '');
                                                    @endphp
                                                    @if ($feature)
                                                        <img id="feature_img" src="{{ asset($feature->fullurl) }}"
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
                                        href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image', $service->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-sm btn-success" href="{{ route('servicesingle', $service->slug) }}"
                                    target="_blank"><i class="fa-solid fa-eye"></i> View</a>
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
