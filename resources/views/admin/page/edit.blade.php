@extends('layouts.admin.master')
@section('title', 'Edit ' . $page->name . ' - Visa Abroad')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit News - {{ $page->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('page.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('page.update', $page->id) }}"
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
                                            type="text" name="name" value="{{ old('name', $page->name) }}"
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
                                            type="text" name="slug" value="{{ old('slug', $page->slug) }}"
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
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $page->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @if ($page->template == 10)
                                <div class="form-group mb-3">
                                    <label for="gallery">Gallery</label>
                                    <div class="custom-file">
                                        <a class="gallery-modal" data-bs-toggle="modal" data-bs-target="#galleryModel"
                                            href="javascript:void(0)">
                                            <div
                                                class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3 p-3">
                                                <div class="row row-cols-auto gap-2 thumb-image " id="gallerysimg">
                                                    @if ($page->others)
                                                        @php
                                                            $gallery = get_gallery($page->others);
                                                        @endphp
                                                        @if ($gallery)
                                                            @foreach ($gallery as $galls)
                                                                @if ($galls)
                                                                    <div
                                                                        class="col thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        <img id="gallery_img"
                                                                            src="{{ asset($galls->fullurl) }}"
                                                                            alt="{{ $galls->alt }}">
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        <div
                                                            class="col thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                            <img class="custom-width" id="gallery_img"
                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                alt="upload-image">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                        <a class="btn btn-sm btn-danger d-none" id="gallery_remove"
                                            href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                        <input class="" id="gallery_id" type="hidden" name="others"
                                            value="{{ old('others', $page->others) }}">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="card card-body banner my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">Banner</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="banner_small_title">Small Title</label>
                                            <input class="form-control br-8" type="text" name="banner_small_title"
                                                value="{{ old('banner_small_title', $page->banner_small_title) }}"
                                                placeholder="Enter Small Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="banner_big_title">Big Title</label>
                                            <input class="form-control br-8" type="text" name="banner_big_title"
                                                value="{{ old('banner_big_title', $page->banner_big_title) }}"
                                                placeholder="Enter Big Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="banner_description">Banner Description</label>
                                            <textarea class="form-control br-8" name="banner_description" rows="4" placeholder="Enter Banner Description">{{ old('banner_description', $page->banner_description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="banner_link_text">Link Text</label>
                                            <input class="form-control br-8" type="text" name="banner_link_text"
                                                value="{{ old('banner_link_text', $page->banner_link_text) }}"
                                                placeholder="Enter Link Text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="banner_link_url">Link URL</label>
                                            <input class="form-control br-8" type="text" name="banner_link_url"
                                                value="{{ old('banner_link_url', $page->banner_link_url) }}"
                                                placeholder="Link URL">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="d-block">Dispaly Social</label>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" id="inlineRadio1" type="radio"
                                                name="banner_social" value="1"
                                                @if ($page->banner_social == 1) checked @endif />
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="inlineRadio2" type="radio"
                                                name="banner_social" value="0"
                                                @if ($page->banner_social == 0) checked @endif />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">Seo Title</label>
                                    <input class="form-control br-8" type="text" name="seo_title"
                                        value="{{ old('seo_title', $page->seo_title) }}" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description', $page->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords', $page->seo_keywords) }}"
                                        placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema', $page->seo_schema) }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0"
                                        @if ($page->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($page->status == 1) selected @endif
                                        value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Template</label>
                                <select class="form-select ms-5" id="template" name="template">
                                    <option class="p-3" @if ($page->template == 0) selected @endif
                                        value="0">Default Template</option>
                                    <option class="p-3" @if ($page->template == 1) selected @endif
                                        value="1">Side-To-Side</option>
                                    <option class="p-3" @if ($page->template == 2) selected @endif
                                        value="2">About Us</option>
                                    <option class="p-3" @if ($page->template == 3) selected @endif
                                        value="3">Contact Us</option>
                                    <option class="p-3" @if ($page->template == 4) selected @endif
                                        value="4">Services</option>
                                    <option class="p-3" @if ($page->template == 5) selected @endif
                                        value="5">Country</option>
                                    <option class="p-3" @if ($page->template == 6) selected @endif
                                        value="6">Teams</option>
                                    <option class="p-3" @if ($page->template == 7) selected @endif
                                        value="7">Reviews</option>
                                    <option class="p-3" @if ($page->template == 8) selected @endif
                                        value="8">Faqs</option>
                                    <option class="p-3" @if ($page->template == 10) selected @endif
                                        value="10">Blogs</option>
                                    <option class="p-3" @if ($page->template == 12) selected @endif
                                        value="12">Sitemap</option>
                                </select>
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
                                                @if ($page->image)
                                                    @php
                                                        $feature = get_media($page->image ?? '');
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
                                        value="{{ old('image', $page->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-sm btn-success" href="{{ route('pagesingle', $page->slug) }}"
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
