@extends('layouts.admin.master')
@section('title', 'Client Registration - Visa Abroad')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Client Registration</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('clientRegistration.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Field</th>
                            <th scope="col">Answer</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Company Name</td>
                            <td>{{ $clientRegistration->cname }}</td>
                        </tr>
                        <tr>
                            <td>Company Phone</td>
                            <td>{{ $clientRegistration->cnumber }}</td>
                        </tr>
                        <tr>
                            <td>Company Email</td>
                            <td>{{ $clientRegistration->cmail }}</td>
                        </tr>
                        <tr>
                            <td>Company Address</td>
                            <td>{{ $clientRegistration->caddress }}</td>
                        </tr>
                        <tr>
                            <td>Company Fax</td>
                            <td>{{ $clientRegistration->cfax }}</td>
                        </tr>
                        <tr>
                            <td>Company Website</td>
                            <td>{{ $clientRegistration->curl }}</td>
                        </tr>
                        <tr>
                            <td>Company Registration</td>
                            <td>{{ $clientRegistration->cregistration }}</td>
                        </tr>
                        <tr>
                            <td>Company Pan</td>
                            <td>{{ $clientRegistration->cpan }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $clientRegistration->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $clientRegistration->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $clientRegistration->email }}</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td>{{ $clientRegistration->designation }}</td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td><span
                                    class="badge rounded-pill bg-label-{{ $clientRegistration->status == 1 ? 'success' : 'danger' }}">{{ $clientRegistration->status == 1 ? 'Agreed' : 'Not Agreed' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{ $clientRegistration->updated_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>

                </table>

                <div class="form-group my-3">
                    <label for="agreement">Agreement</label>
                    <textarea class="form-control ckeditor br-8 @error('agreement') is-invalid @enderror" id="agreement" name="agreement"
                        rows="10" placeholder="Enter Client Agreement">{{ $clientRegistration->agreement ? $clientRegistration->agreement : ($setting['default_agreement'] ? $setting['default_agreement'] : '') }}</textarea>
                    @error('agreement')
                        <div class="invalid-feedback" style="display: block;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <a class="btn btn-lg btn-primary mb-3" href="{{ route('print', $clientRegistration->id) }}" download>
                        Download Agreement
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
