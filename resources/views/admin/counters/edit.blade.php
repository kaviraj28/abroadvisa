@extends('layouts.admin.master')
@section('title', 'Counters')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit counter "{{ $counter->title ?? '' }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('counters.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('counters.update', $counter->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Text</label>
                                <input class="form-control @error('name') is-invalid @enderror" id=""
                                    type="text" value="{{ old('name', $counter->name) }}" name="name" placeholder="">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Number</label>
                                <input class="form-control @error('count_num') is-invalid @enderror" id=""
                                    type="number" value="{{ old('count_num', $counter->count_num) }}" name="count_num"
                                    placeholder="1234">
                                @error('count_num')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">After Number</label>
                                <input class="form-control @error('num_postfix') is-invalid @enderror" id=""
                                    type="text" value="{{ old('num_postfix', $counter->num_postfix) }}"
                                    name="num_postfix" placeholder="K+">
                                @error('num_postfix')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Order</label>
                            <input class="form-control @error('order') is-invalid @enderror" type="number" name="order"
                                value="{{ old('order', $counter->order) }}">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">

                            <div class="form-group">
                                <label for="image">Icon</label>
                                <div class="custom-file">
                                    <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                @if ($member->icon)
                                                    @php
                                                        $feature = get_media($member->icon ?? '');
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
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="feature_id" type="hidden" name="icon"
                                        value="{{ old('icon', $member->icon) }}">
                                    @error('icon')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-rotate"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
