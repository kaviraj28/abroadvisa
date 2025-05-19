@extends('layouts.admin.master')
@section('title', 'Recruitment - Visa Abroad')

@section('content')
    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recruitment</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('recruitments.index') }}"><i class="fa-solid fa-arrow-left"></i>
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
                            <td>Name</td>
                            <td>{{ $recruitment->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $recruitment->number }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $recruitment->email }}</td>
                        </tr>
                        <tr>
                            <td>Postfolio</td>
                            <td><a href="{{ $recruitment->url }}" target="_blank">{{ $recruitment->url }}</a></td>
                        </tr>
                        <tr>
                            <td>About</td>
                            <td>{{ $recruitment->message }}</td>
                        </tr>
                        <tr>
                            <td>Resume</td>
                            <td><a class="btn btn-success btn-sm" href="{{ asset($recruitment->file) }}" target="_blank"><i
                                        class="fa-solid fa-eye"></i> View</a></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{ $recruitment->updated_at->diffForHumans() }}</td>
                        </tr>
                        @if (getCareerById($recruitment->careerpage))
                            <tr>
                                <td>Vacancy Page</td>
                                <td><a href="{{ route('careersingle', getCareerById($recruitment->careerpage)['slug']) }}"
                                        target="_blank">{{ getCareerById($recruitment->careerpage)['name'] ?? '' }}</a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
