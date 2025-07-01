@extends('layouts.admin.master')
@section('title', 'All Applications - Visa Abroad')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            {{-- Assuming $applications is a paginated collection --}}
            <h5 class="mb-0">Applications ({{ $applications->total() }})</h5>
            {{-- You might want to add a "Create New Application" button here if applicable --}}
            {{-- <small class="text-muted float-end">
                <a class="btn btn-sm btn-primary" href="{{ route('applications.create') }}"><i class="fa-solid fa-plus"></i> Add New</a>
            </small> --}}
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$applications->isEmpty())
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Interested Country</th>
                            <th>Submitted at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($applications as $key => $application)
                            <tr>
                                <td><strong>{{ $key + $applications->firstItem() }}</strong></td>
                                <td><strong>{{ $application->first_name }} {{ $application->middle_name }}
                                        {{ $application->last_name }}</strong></td>
                                <td><strong>{{ $application->email_address }}</strong></td>
                                <td><strong>{{ $application->mobile_no }}</strong></td>
                                <td>{{ $application->interested_country }}</td>
                                <td>{{ $application->created_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('application.show', $application->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i> </a>

                                    <form class="delete-form" action="{{ route('application.destroy', $application->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_application" data-type="confirm"
                                            type="submit" title="Delete"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $applications->links() }} {{-- Pagination links --}}
            @else
                <div class="card-body">
                    <h6>No Applications Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_application').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this application, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
        });
    </script>
@endsection
