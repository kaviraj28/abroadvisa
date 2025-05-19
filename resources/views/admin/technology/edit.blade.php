@extends('layouts.admin.master')
@section('title', 'Edit ' . $technology->name . ' - Visa Abroad')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Technology - {{ $technology->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('technology.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('technology.update', $technology->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4 mb-3">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $technology->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gallery">Gallery</label>
                                <div class="custom-file">
                                    <a class="gallery-modal" data-bs-toggle="modal" data-bs-target="#galleryModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3 p-3">
                                            <div class="row row-cols-auto gap-2 thumb-image " id="gallerysimg">
                                                @if ($technology->gallery)
                                                    @php
                                                        $gallery = get_gallery($technology->gallery);
                                                    @endphp
                                                    @if ($gallery)
                                                        @foreach ($gallery as $galls)
                                                            @if ($galls)
                                                                <div
                                                                    class="col thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                    <img id="gallery_img" src="{{ asset($galls->fullurl) }}"
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
                                    <a class="btn btn-sm btn-danger d-none" id="gallery_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="gallery_id" type="hidden" name="gallery"
                                        value="{{ old('gallery', $technology->gallery) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($technology->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($technology->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $technology->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers">
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
