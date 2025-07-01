@extends('layouts.admin.master')
@section('title', 'Application Details - Visa Abroad')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Application Details</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('application.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back to Applications</a>
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
                        {{-- Personal Information --}}
                        <tr>
                            <td>First Name</td>
                            <td>{{ $application->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Middle Name</td>
                            <td>{{ $application->middle_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ $application->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Interested Country</td>
                            <td>{{ $application->interested_country }}</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>{{ $application->dob }}</td>
                        </tr>
                        <tr>
                            <td>Mobile No.</td>
                            <td>{{ $application->mobile_no }}</td>
                        </tr>
                        <tr>
                            <td>WhatsApp No.</td>
                            <td>{{ $application->whatsapp_no }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ ucfirst($application->gender) }}</td>
                        </tr>
                        <tr>
                            <td>Marital Status</td>
                            <td>{{ ucfirst($application->marital_status) }}</td>
                        </tr>
                        @if ($application->marital_status === 'married')
                            <tr>
                                <td>Spouse Name</td>
                                <td>{{ $application->spouse_name }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>Citizenship No.</td>
                            <td>{{ $application->citizenship_no }}</td>
                        </tr>
                        <tr>
                            <td>Issue District</td>
                            <td>{{ $application->issue_district }}</td>
                        </tr>
                        <tr>
                            <td>Issue Date</td>
                            <td>{{ $application->issue_date }}</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>{{ $application->email_address }}</td>
                        </tr>

                        {{-- Address Details --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Address Details</strong></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $application->state }}</td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td>{{ $application->district }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $application->city }}</td>
                        </tr>
                        <tr>
                            <td>Ward No.</td>
                            <td>{{ $application->ward_no }}</td>
                        </tr>
                        <tr>
                            <td>Village/Tole/Chowk Name</td>
                            <td>{{ $application->village_tole_chowk }}</td>
                        </tr>

                        {{-- Family Details --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Family Details</strong></td>
                        </tr>
                        <tr>
                            <td>Father's Name</td>
                            <td>{{ $application->father_name }}</td>
                        </tr>
                        <tr>
                            <td>Father's Contact</td>
                            <td>{{ $application->father_contact }}</td>
                        </tr>
                        <tr>
                            <td>Mother's Name</td>
                            <td>{{ $application->mother_name }}</td>
                        </tr>
                        <tr>
                            <td>Mother's Contact</td>
                            <td>{{ $application->mother_contact }}</td>
                        </tr>
                        <tr>
                            <td>Other Relative Name</td>
                            <td>{{ $application->other_relative_name }}</td>
                        </tr>
                        <tr>
                            <td>Other Relative Contact</td>
                            <td>{{ $application->other_relative_contact }}</td>
                        </tr>
                        <tr>
                            <td>Relative Relation</td>
                            <td>{{ $application->relative_relation }}</td>
                        </tr>

                        {{-- Passport Details --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Passport Details</strong></td>
                        </tr>
                        <tr>
                            <td>Passport No.</td>
                            <td>{{ $application->passport_no }}</td>
                        </tr>
                        <tr>
                            <td>Passport Issue Date</td>
                            <td>{{ $application->passport_issue_date }}</td>
                        </tr>
                        <tr>
                            <td>Passport Expire Date</td>
                            <td>{{ $application->passport_expire_date }}</td>
                        </tr>
                        <tr>
                            <td>Passport Upload</td>
                            <td>
                                @if ($application->passport_upload)
                                    <a href="{{ asset($application->passport_upload) }}" target="_blank">
                                        {{ basename($application->passport_upload) }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        {{-- Police Report --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Police Report</strong></td>
                        </tr>
                        <tr>
                            <td>Police Report Upload</td>
                            <td>
                                @if ($application->police_report_upload)
                                    <a href="{{ asset($application->police_report_upload) }}" target="_blank">
                                        {{ basename($application->police_report_upload) }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        {{-- Language Known --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Language Known</strong></td>
                        </tr>
                        <tr>
                            <td>Languages</td>
                            <td>
                                @php
                                    $languages = [];
                                    if ($application->lang_nepali) {
                                        $languages[] = 'Nepali';
                                    }
                                    if ($application->lang_english) {
                                        $languages[] = 'English';
                                    }
                                    if ($application->lang_hindi) {
                                        $languages[] = 'Hindi';
                                    }
                                    if ($application->lang_other && $application->other_language) {
                                        $languages[] = 'Other: ' . $application->other_language;
                                    }
                                    echo implode(', ', $languages);
                                @endphp
                            </td>
                        </tr>

                        {{-- Education Details --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Education Details</strong></td>
                        </tr>
                        <tr>
                            <td>Education Level</td>
                            <td>{{ $application->education_level }}</td>
                        </tr>
                        <tr>
                            <td>Education Document Upload</td>
                            <td>
                                @if ($application->edu_level_doc_upload)
                                    <a href="{{ asset($application->edu_level_doc_upload) }}" target="_blank">
                                        {{ basename($application->edu_level_doc_upload) }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        {{-- Driving License Details --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Driving License Details</strong></td>
                        </tr>
                        <tr>
                            <td>License No.</td>
                            <td>{{ $application->license_no ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>License Category</td>
                            <td>{{ $application->license_category ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>License Issue Date</td>
                            <td>{{ $application->license_issue_date ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>License Expire Date</td>
                            <td>{{ $application->license_expire_date ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>License Upload</td>
                            <td>
                                @if ($application->license_upload)
                                    <a href="{{ asset($application->license_upload) }}" target="_blank">
                                        {{ basename($application->license_upload) }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        {{-- Work Experience (Nepal) --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Work Experience (Nepal)</strong></td>
                        </tr>
                        <tr>
                            <td>Worked in Nepal?</td>
                            <td>{{ ucfirst($application->worked_in_nepal) }}</td>
                        </tr>
                        @if ($application->worked_in_nepal === 'yes')
                            <tr>
                                <td>Company Name (Nepal)</td>
                                <td>{{ $application->nepal_company }}</td>
                            </tr>
                            <tr>
                                <td>Company Address (Nepal)</td>
                                <td>{{ $application->nepal_company_address }}</td>
                            </tr>
                            <tr>
                                <td>Post (Nepal)</td>
                                <td>{{ $application->nepal_post }}</td>
                            </tr>
                            <tr>
                                <td>Working Period (Nepal)</td>
                                <td>{{ $application->nepal_working_period }}</td>
                            </tr>
                            <tr>
                                <td>Work Certificate (Nepal)</td>
                                <td>
                                    @if ($application->nepal_work_cert_upload)
                                        <a href="{{ asset($application->nepal_work_cert_upload) }}" target="_blank">
                                            {{ basename($application->nepal_work_cert_upload) }}
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        @endif

                        {{-- Additional Details: Abroad Experience --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Abroad Experience</strong></td>
                        </tr>
                        <tr>
                            <td>Been Abroad Before?</td>
                            <td>{{ ucfirst($application->been_abroad) }}</td>
                        </tr>
                        @if ($application->been_abroad === 'yes')
                            <tr>
                                <td>Country Name (Abroad)</td>
                                <td>{{ $application->abroad_country }}</td>
                            </tr>
                            <tr>
                                <td>Company Name (Abroad)</td>
                                <td>{{ $application->abroad_company }}</td>
                            </tr>
                            <tr>
                                <td>Post (Abroad)</td>
                                <td>{{ $application->abroad_post }}</td>
                            </tr>
                            <tr>
                                <td>Working Period (Abroad)</td>
                                <td>{{ $application->abroad_working_period }}</td>
                            </tr>
                            <tr>
                                <td>Work Certificate (Abroad)</td>
                                <td>
                                    @if ($application->abroad_work_cert_upload)
                                        <a href="{{ asset($application->abroad_work_cert_upload) }}" target="_blank">
                                            {{ basename($application->abroad_work_cert_upload) }}
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        @endif

                        {{-- Additional Details: Previous Application --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>Previous Application</strong></td>
                        </tr>
                        <tr>
                            <td>Applied Before?</td>
                            <td>{{ ucfirst($application->applied_before) }}</td>
                        </tr>
                        @if ($application->applied_before === 'yes')
                            <tr>
                                <td>Applied Country</td>
                                <td>{{ $application->applied_country }}</td>
                            </tr>
                            <tr>
                                <td>Agent/Manpower Name</td>
                                <td>{{ $application->agent_manpower }}</td>
                            </tr>
                            <tr>
                                <td>When Applied?</td>
                                <td>{{ $application->applied_when }}</td>
                            </tr>
                        @endif

                        {{-- Where did you hear about this Prime European Company? --}}
                        <tr>
                            <td class="table-dark text-center" colspan="2"><strong>How did you hear about us?</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>Source</td>
                            <td>
                                @if ($application->hear_about_us === 'Other' && $application->other_source)
                                    Other: {{ $application->other_source }}
                                @else
                                    {{ $application->hear_about_us }}
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Application Submitted At</td>
                            <td>{{ $application->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
