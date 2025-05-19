@extends('layouts.admin.master')
@section('title', 'Create New Client - Visa Abroad')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Client Agreement</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('clientRegistration.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('clientRegistration.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9 mb-5">
                        <div class="card card-body main-description shadow br-8 p-4 mb-3">
                            <div class="form-group mb-3">
                                <label for="cname">Company Name</label>
                                <input class="form-control br-8 @error('cname') is-invalid @enderror" type="text"
                                    name="cname" value="{{ old('cname') }}" placeholder="Enter Client Name">
                                @error('cname')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="agreement">Agreement</label>
                                <textarea class="form-control ckeditor br-8 @error('agreement') is-invalid @enderror" id="agreement" name="agreement"
                                    rows="10" placeholder="Enter Client Agreement">{{ old('agreement') }}</textarea>
                                @error('agreement')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-3" id="status" name="status">
                                    <option class="p-3" value="0">Not Agreed</option>
                                    <option class="p-3" value="1">Agreed</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-plus"></i>
                                    Publish</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
