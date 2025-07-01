@extends('layouts.frontend.master')

@section('content')
    <style>
        .form-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .form-header h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .step-indicator .line {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 4px;
            background-color: #e0e0e0;
            transform: translateY(-50%);
            z-index: 1;
        }

        .step-indicator .step {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: bold;
            position: relative;
            z-index: 2;
            transition: background-color 0.3s, border-color 0.3s;
            border: 2px solid #e0e0e0;
            cursor: pointer;
        }

        .step-indicator .step.active {
            background-color: #15384d;
            border-color: #15384d;
        }

        .step-indicator .step.completed {
            background-color: #28a745;
            border-color: #28a745;
        }

        .step-indicator .step span {
            font-size: 1rem;
        }

        .step-indicator .step-label {
            position: absolute;
            top: 50px;
            font-size: 0.9rem;
            color: #6c757d;
            white-space: nowrap;
        }

        .step-indicator .step.active .step-label,
        .step-indicator .step.completed .step-label {
            color: #15384d;
            font-weight: bold;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            min-height: 50px;
            padding: 10px 15px;
        }

        .form-floating>label {
            padding: 1rem 0.75rem;
        }

        .btn-primary {
            background-color: #15384d;
            border-color: #15384d;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: bold;
            transition: background-color 0.3s, border-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: bold;
            transition: background-color 0.3s, border-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(108, 117, 125, 0.2);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(108, 117, 125, 0.3);
        }

        .form-check-input {
            border-radius: 5px;
        }

        .upload-section {
            border: 2px dashed #15384d;
            border-radius: 10px;
            text-align: center;
            background-color: #eaf6ff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-section:hover {
            background-color: #d0e7ff;
            border-color: #0056b3;
        }

        .upload-section i {
            font-size: 2.5rem;
            color: #15384d;
            margin-bottom: 10px;
        }

        .upload-section p {
            margin: 0;
            color: #15384d;
            font-weight: bold;
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        legend {
            float: none;
            width: auto;
            padding: 0 10px;
            font-size: 1.25rem;
            font-weight: bold;
            color: #15384d;
            margin-bottom: 0;
            /* Adjust to prevent extra spacing */
        }

        .is-invalid+.invalid-feedback {
            display: block;
        }

        .ct-margin {
            margin-top: 140px;
        }
    </style>
    <section class="appoint mb-3">
        <div class="container">
            <div class="form-container ct-margin">
                <div class="form-header">
                    <h2>Application Form</h2>
                    <p>Please fill out the form carefully to proceed with your application.</p>
                </div>

                <div class="step-indicator">
                    <div class="line"></div>
                    <div class="step active" data-step="1">
                        <span>Step 1</span>
                    </div>
                    <div class="step" data-step="2">
                        <span>Step 2</span>
                    </div>
                    <div class="step" data-step="3">
                        <span>Step 3</span>
                    </div>
                    <div class="step" data-step="4">
                        <span>Step 4</span>
                    </div>
                </div>

                {{-- Display validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="multiStepForm" action="{{ route('applications') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Step 1: Personal Information & Family Details -->
                    <div class="form-section active mt-3" id="step1">
                        <fieldset>
                            <legend>Personal Information</legend>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('first_name') is-invalid @enderror" id="firstName"
                                            data-original-required="true" type="text" name="first_name"
                                            placeholder="First Name" value="{{ old('first_name') }}" required>
                                        <label for="firstName">First Name (पहिलो नाम)</label>
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('middle_name') is-invalid @enderror"
                                            id="middleName" type="text" name="middle_name" placeholder="Middle Name"
                                            value="{{ old('middle_name') }}">
                                        <label for="middleName">Middle Name (विचको नाम)</label>
                                        @error('middle_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('last_name') is-invalid @enderror" id="lastName"
                                            data-original-required="true" type="text" name="last_name"
                                            placeholder="Last Name" value="{{ old('last_name') }}" required>
                                        <label for="lastName">Last Name (थर)</label>
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('interested_country') is-invalid @enderror"
                                            id="interestedCountry" data-original-required="true" name="interested_country"
                                            required>
                                            <option selected disabled value="">Select Country</option>
                                            <option value="greece"
                                                {{ old('interested_country') == 'greece' ? 'selected' : '' }}>Greece
                                            </option>
                                            <option value="portugal"
                                                {{ old('interested_country') == 'portugal' ? 'selected' : '' }}>Portugal
                                            </option>
                                            <option value="germany"
                                                {{ old('interested_country') == 'germany' ? 'selected' : '' }}>Germany
                                            </option>
                                            <option value="other"
                                                {{ old('interested_country') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        <label for="interestedCountry">Interested Country (रुची भएको देश)</label>
                                        @error('interested_country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('dob') is-invalid @enderror" id="dob"
                                            data-original-required="true" type="date" name="dob"
                                            placeholder="YYYY-MM-DD" value="{{ old('dob') }}" required>
                                        <label for="dob">Date of Birth (जन्म मिति) *</label>
                                        @error('dob')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="text-muted ms-2">Age: <span id="ageDisplay">AUTO CALCULATED</span></small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('mobile_no') is-invalid @enderror" id="mobileNo"
                                            data-original-required="true" type="tel" name="mobile_no" placeholder="+977"
                                            value="{{ old('mobile_no') }}" required>
                                        <label for="mobileNo">Mobile No. +977</label>
                                        @error('mobile_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('whatsapp_no') is-invalid @enderror"
                                            id="whatsAppNo" type="tel" name="whatsapp_no" placeholder="+977"
                                            value="{{ old('whatsapp_no') }}">
                                        <label for="whatsAppNo">WhatsApp No. +977</label>
                                        @error('whatsapp_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check mt-2 ms-2">
                                        <input class="form-check-input" id="copyMobileNo" type="checkbox"
                                            name="copy_mobile_no" value="1"
                                            {{ old('copy_mobile_no') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="copyMobileNo">Copy Mobile No.</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                            data-original-required="true" name="gender" required>
                                            <option selected disabled value="">Select Gender</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                                (पुरुष)</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                Female
                                                (महिला)</option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                        <label for="gender">Gender (लिङ्ग) *</label>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('marital_status') is-invalid @enderror"
                                            id="maritalStatus" data-original-required="true" name="marital_status"
                                            required>
                                            <option selected disabled value="">Select Status</option>
                                            <option value="married"
                                                {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married
                                                (विवाहित)
                                            </option>
                                            <option value="unmarried"
                                                {{ old('marital_status') == 'unmarried' ? 'selected' : '' }}>Unmarried
                                                (अविवाहित)</option>
                                            <option value="divorced"
                                                {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced
                                            </option>
                                            <option value="widowed"
                                                {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                        </select>
                                        <label for="maritalStatus">Marital Status *</label>
                                        @error('marital_status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" id="spouseNameField"
                                    style="display: {{ old('marital_status') == 'married' ? 'block' : 'none' }};">
                                    <div class="form-floating">
                                        <input class="form-control @error('spouse_name') is-invalid @enderror"
                                            id="spouseName" type="text" name="spouse_name" placeholder="Spouse Name"
                                            value="{{ old('spouse_name') }}">
                                        <label for="spouseName">Spouse Name (पति/पत्नीको नाम)</label>
                                        @error('spouse_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('citizenship_no') is-invalid @enderror"
                                            id="citizenshipNo" data-original-required="true" type="text"
                                            name="citizenship_no" placeholder="Citizenship No."
                                            value="{{ old('citizenship_no') }}" required>
                                        <label for="citizenshipNo">Citizenship No. (नागरिता न.)</label>
                                        @error('citizenship_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('issue_district') is-invalid @enderror"
                                            id="issueDistrict" data-original-required="true" type="text"
                                            name="issue_district" placeholder="Issue District"
                                            value="{{ old('issue_district') }}" required>
                                        <label for="issueDistrict">Issue District (जारी जिल्ला)</label>
                                        @error('issue_district')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('issue_date') is-invalid @enderror"
                                            id="issueDate" data-original-required="true" type="date"
                                            name="issue_date" placeholder="Issue Date" value="{{ old('issue_date') }}"
                                            required>
                                        <label for="issueDate">Issue Date (जारी मिति)</label>
                                        @error('issue_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control @error('email_address') is-invalid @enderror"
                                            id="emailAddress" data-original-required="true" type="email"
                                            name="email_address" placeholder="name@example.com"
                                            value="{{ old('email_address') }}" required>
                                        <label for="emailAddress">Email Address (इमेल ठेगाना)</label>
                                        @error('email_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Family Details</legend>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('father_name') is-invalid @enderror"
                                            id="fatherName" data-original-required="true" type="text"
                                            name="father_name" placeholder="Full Name" value="{{ old('father_name') }}"
                                            required>
                                        <label for="fatherName">Father's Name (बुबाको नाम)</label>
                                        @error('father_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('father_contact') is-invalid @enderror"
                                            id="fatherContact" type="tel" name="father_contact" placeholder="+977"
                                            value="{{ old('father_contact') }}">
                                        <label for="fatherContact">Contact No. (सम्पर्क नं.)</label>
                                        @error('father_contact')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('mother_name') is-invalid @enderror"
                                            id="motherName" data-original-required="true" type="text"
                                            name="mother_name" placeholder="Full Name" value="{{ old('mother_name') }}"
                                            required>
                                        <label for="motherName">Mother's Name (आमाको नाम)</label>
                                        @error('mother_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('mother_contact') is-invalid @enderror"
                                            id="motherContact" type="tel" name="mother_contact" placeholder="+977"
                                            value="{{ old('mother_contact') }}">
                                        <label for="motherContact">Contact No. (सम्पर्क नं.)</label>
                                        @error('mother_contact')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('other_relative_name') is-invalid @enderror"
                                            id="otherRelativeName" type="text" name="other_relative_name"
                                            placeholder="Full Name" value="{{ old('other_relative_name') }}">
                                        <label for="otherRelativeName">Other Relative (अन्य नातेदार)</label>
                                        @error('other_relative_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('other_relative_contact') is-invalid @enderror"
                                            id="otherRelativeContact" type="tel" name="other_relative_contact"
                                            placeholder="+977" value="{{ old('other_relative_contact') }}">
                                        <label for="otherRelativeContact">Contact No. (सम्पर्क नं.)</label>
                                        @error('other_relative_contact')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control @error('relative_relation') is-invalid @enderror"
                                            id="relativeRelation" type="text" name="relative_relation"
                                            placeholder="Relation" value="{{ old('relative_relation') }}">
                                        <label for="relativeRelation">Relation (नाता साईनो)</label>
                                        @error('relative_relation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Step 2: Address Details -->
                    <div class="form-section mt-3" id="step2">
                        <fieldset>
                            <legend>Address Details</legend>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('state') is-invalid @enderror" id="state"
                                            data-original-required="true" name="state" required>
                                            <option selected disabled value="">Select State</option>
                                            {{-- Provinces will be loaded here by JavaScript --}}
                                        </select>
                                        <label for="state">State (प्रदेश)</label>
                                        @error('state')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('district') is-invalid @enderror"
                                            id="district" data-original-required="true" name="district" required
                                            disabled>
                                            <option selected disabled value="">Select District</option>
                                            {{-- Districts will be populated based on state selection --}}
                                        </select>
                                        <label for="district">District (जिल्ला)</label>
                                        @error('district')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('city') is-invalid @enderror" id="city"
                                            data-original-required="true" name="city" required disabled>
                                            <option selected disabled value="">Select City</option>
                                            {{-- Cities will be populated based on district selection --}}
                                        </select>
                                        <label for="city">City (गा.पा/न.पा./उप.न.पा)</label>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('ward_no') is-invalid @enderror" id="wardNo"
                                            data-original-required="true" type="number" name="ward_no"
                                            placeholder="Ward No." value="{{ old('ward_no') }}" required min="1">
                                        <label for="wardNo">Ward No. (वडा नं.)</label>
                                        @error('ward_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control @error('village_tole_chowk') is-invalid @enderror"
                                            id="villageToleChowk" data-original-required="true" type="text"
                                            name="village_tole_chowk" placeholder="Village/Tole/Chowk Name"
                                            value="{{ old('village_tole_chowk') }}" required>
                                        <label for="villageToleChowk">Village/Tole/Chowk Name (गांउ/टोल/चोक नाम)</label>
                                        @error('village_tole_chowk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Step 3: Experience & Education -->
                    <div class="form-section mt-3" id="step3">

                        <fieldset>
                            <legend>Education Details</legend>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select @error('education_level') is-invalid @enderror"
                                            id="educationLevel" data-original-required="true" name="education_level"
                                            required>
                                            <option selected disabled value="">Select Level (योग्यता छान्नुहोस्)
                                            </option>
                                            <option value="primary"
                                                {{ old('education_level') == 'primary' ? 'selected' : '' }}>
                                                Primary/प्राथमिक
                                                तह (कक्षा १-५)</option>
                                            <option value="lower_secondary"
                                                {{ old('education_level') == 'lower_secondary' ? 'selected' : '' }}>Lower
                                                Secondary/निम्न माध्यामिक तह (कक्षा ८)</option>
                                            <option value="secondary"
                                                {{ old('education_level') == 'secondary' ? 'selected' : '' }}>Secondary
                                                माध्यामिक तह (SLC/SEE)</option>
                                            <option value="higher_secondary"
                                                {{ old('education_level') == 'higher_secondary' ? 'selected' : '' }}>Higher
                                                Secondary/उच्च माध्यामिक तह (PLUS 2)</option>
                                            <option value="bachelor"
                                                {{ old('education_level') == 'bachelor' ? 'selected' : '' }}>Bachelor's
                                                Degree
                                                स्नातक तह</option>
                                            <option value="master"
                                                {{ old('education_level') == 'master' ? 'selected' : '' }}>
                                                Master's Degree
                                                स्नातकोत्तर तह</option>
                                            <option value="m_phil"
                                                {{ old('education_level') == 'm_phil' ? 'selected' : '' }}>
                                                MPhil/दर्शनशास्त्र स्नातकोत्तर</option>
                                            <option value="phd"
                                                {{ old('education_level') == 'phd' ? 'selected' : '' }}>
                                                PhD/विद्यावारिधी</option>
                                        </select>
                                        <label for="educationLevel">Education Level (शैक्षिक योग्यता) *</label>
                                        @error('education_level')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="upload-section">
                                        <input class="form-control @error('edu_level_doc_upload') is-invalid @enderror"
                                            id="eduLevelDocUpload" type="file" name="edu_level_doc_upload"
                                            accept="image/*,.pdf" hidden>
                                        <label class="d-block w-100 py-4 cursor-pointer" for="eduLevelDocUpload">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Upload Selected Education Level Document</p>
                                        </label>
                                        <span class="file-name-display" id="eduLevelDocUploadFileName"></span>
                                        <div class="invalid-feedback" id="eduLevelDocUpload-feedback"></div>
                                        @error('edu_level_doc_upload')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Language Known</legend>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="langNepali" type="checkbox"
                                            name="lang_nepali" value="1" {{ old('lang_nepali') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="langNepali">Nepali (नेपाली)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="langEnglish" type="checkbox"
                                            name="lang_english" value="1"
                                            {{ old('lang_english') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="langEnglish">English (अंग्रेजी)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="langHindi" type="checkbox" name="lang_hindi"
                                            value="1" {{ old('lang_hindi') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="langHindi">Hindi (हिन्दी)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="langOther" type="checkbox" name="lang_other"
                                            value="1" {{ old('lang_other') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="langOther">Other (अन्य)</label>
                                    </div>
                                </div>
                                <div class="col-md-12" id="otherLanguageField"
                                    style="display: {{ old('lang_other') ? 'block' : 'none' }};">
                                    <div class="form-floating">
                                        <input class="form-control @error('other_language') is-invalid @enderror"
                                            id="otherLanguage" type="text" name="other_language"
                                            placeholder="Enter other language(s)" value="{{ old('other_language') }}">
                                        <label for="otherLanguage">Specify Other Language(s)</label>
                                        @error('other_language')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Passport Details</legend>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('passport_no') is-invalid @enderror"
                                            id="passportNo" data-original-required="true" type="text"
                                            name="passport_no" placeholder="Passport No."
                                            value="{{ old('passport_no') }}" required>
                                        <label for="passportNo">Passport No. (राहदानी नं.)*</label>
                                        @error('passport_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('passport_issue_date') is-invalid @enderror"
                                            id="passportIssueDate" data-original-required="true" type="date"
                                            name="passport_issue_date" placeholder="Issue Date"
                                            value="{{ old('passport_issue_date') }}" required>
                                        <label for="passportIssueDate">Issue Date. (म्याद जारी मिति) *</label>
                                        @error('passport_issue_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('passport_expire_date') is-invalid @enderror"
                                            id="passportExpireDate" data-original-required="true" type="date"
                                            name="passport_expire_date" placeholder="Expire Date"
                                            value="{{ old('passport_expire_date') }}" required>
                                        <label for="passportExpireDate">Expire Date. (म्याद समाप्त मिति)*</label>
                                        @error('passport_expire_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="upload-section">
                                        <input class="form-control @error('passport_upload') is-invalid @enderror"
                                            id="passportUpload" type="file" name="passport_upload"
                                            accept="image/*,.pdf" hidden>
                                        <label class="d-block w-100 py-4 cursor-pointer" for="passportUpload">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Upload Passport Scan</p>
                                        </label>
                                        <span class="file-name-display" id="passportUploadFileName"></span>
                                        <div class="invalid-feedback" id="passportUpload-feedback"></div>
                                        @error('passport_upload')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Police Report</legend>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="upload-section">
                                        <input class="form-control @error('police_report_upload') is-invalid @enderror"
                                            id="policeReportUpload" type="file" name="police_report_upload"
                                            accept="image/*,.pdf" hidden>
                                        <label class="d-block w-100 py-4 cursor-pointer" for="policeReportUpload">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Upload Police Report (पुलिस रिपोर्ट)</p>
                                        </label>
                                        <span class="file-name-display" id="policeReportUploadFileName"></span>
                                        <div class="invalid-feedback" id="policeReportUpload-feedback"></div>
                                        @error('police_report_upload')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Driving License Details</legend>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('license_no') is-invalid @enderror"
                                            id="licenseNo" type="text" name="license_no" placeholder="License No."
                                            value="{{ old('license_no') }}">
                                        <label for="licenseNo">License No. (लाइसेन्स नं.)</label>
                                        @error('license_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('license_category') is-invalid @enderror"
                                            id="licenseCategory" type="text" name="license_category"
                                            placeholder="Category." value="{{ old('license_category') }}">
                                        <label for="licenseCategory">Category. (वर्गिकरण.)</label>
                                        @error('license_category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('license_issue_date') is-invalid @enderror"
                                            id="licenseIssueDate" type="date" name="license_issue_date"
                                            placeholder="Issue Date." value="{{ old('license_issue_date') }}">
                                        <label for="licenseIssueDate">Issue Date. (म्याद जारी मिति)</label>
                                        @error('license_issue_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control @error('license_expire_date') is-invalid @enderror"
                                            id="licenseExpireDate" type="date" name="license_expire_date"
                                            placeholder="Expire Date." value="{{ old('license_expire_date') }}">
                                        <label for="licenseExpireDate">Expire Date. (म्याद समाप्त मिति)</label>
                                        @error('license_expire_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="upload-section">
                                        <input class="form-control @error('license_upload') is-invalid @enderror"
                                            id="licenseUpload" type="file" name="license_upload"
                                            accept="image/*,.pdf" hidden>
                                        <label class="d-block w-100 py-4 cursor-pointer" for="licenseUpload">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Upload Driving License</p>
                                        </label>
                                        <span class="file-name-display" id="licenseUploadFileName"></span>
                                        <div class="invalid-feedback" id="licenseUpload-feedback"></div>
                                        @error('license_upload')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Step 4: General Details -->
                    <div class="form-section mt-3" id="step4">
                        <fieldset>
                            <legend>General Details</legend>
                            <h5 class="mb-3">Work Experience (Nepal)</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <p class="mb-2">Have you worked in Nepal or not? (नेपालमा काम गर्नु भएको छ वा छैन ?)
                                    </p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('worked_in_nepal') is-invalid @enderror"
                                            id="workedInNepalYes" data-original-required="true" type="radio"
                                            name="worked_in_nepal" value="yes"
                                            {{ old('worked_in_nepal') == 'yes' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="workedInNepalYes">Yes (छ)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('worked_in_nepal') is-invalid @enderror"
                                            id="workedInNepalNo" data-original-required="true" type="radio"
                                            name="worked_in_nepal" value="no"
                                            {{ old('worked_in_nepal') == 'no' || !old('worked_in_nepal') ? 'checked' : '' }}
                                            required>
                                        <label class="form-check-label" for="workedInNepalNo">No (छैन)</label>
                                    </div>
                                    @error('worked_in_nepal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row g-3" id="nepalWorkExperienceFields"
                                    style="display: {{ old('worked_in_nepal') == 'yes' ? 'flex' : 'none' }};">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('nepal_company') is-invalid @enderror"
                                                id="nepalCompany" type="text" name="nepal_company"
                                                placeholder="Company Name" value="{{ old('nepal_company') }}">
                                            <label for="nepalCompany">Company Name (कंपनीको नाम)</label>
                                            @error('nepal_company')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input
                                                class="form-control @error('nepal_company_address') is-invalid @enderror"
                                                id="nepalCompanyAddress" type="text" name="nepal_company_address"
                                                placeholder="Company Address"
                                                value="{{ old('nepal_company_address') }}">
                                            <label for="nepalCompanyAddress">Company Address (कंपनीको ठेगाना)</label>
                                            @error('nepal_company_address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('nepal_post') is-invalid @enderror"
                                                id="nepalPost" type="text" name="nepal_post" placeholder="Post"
                                                value="{{ old('nepal_post') }}">
                                            <label for="nepalPost">Post (पद) e.g., Driver: Heavy Truck Driver</label>
                                            @error('nepal_post')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input
                                                class="form-control @error('nepal_working_period') is-invalid @enderror"
                                                id="nepalWorkingPeriod" type="text" name="nepal_working_period"
                                                placeholder="YYYY-MM-DD toYYYY-MM-DD"
                                                value="{{ old('nepal_working_period') }}">
                                            <label for="nepalWorkingPeriod">Working Period (काम गरेको अवधि)</label>
                                            @error('nepal_working_period')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="upload-section">
                                            <input
                                                class="form-control @error('nepal_work_cert_upload') is-invalid @enderror"
                                                id="nepalWorkCertUpload" type="file" name="nepal_work_cert_upload"
                                                accept="image/*,.pdf" hidden>
                                            <label class="d-block w-100 py-4 cursor-pointer" for="nepalWorkCertUpload">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>Upload work experience certificate (अनुभव प्रमाण पत्र अपलोड गर्नुहोस्)
                                                </p>
                                            </label>
                                            <span class="file-name-display" id="nepalWorkCertUploadFileName"></span>
                                            <div class="invalid-feedback" id="nepalWorkCertUpload-feedback"></div>
                                            @error('nepal_work_cert_upload')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">Additional Details: Abroad Experience</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <p class="mb-2">Have you ever been abroad before ? (के तपाई पहिला विदेश जानुभएको छ ?)
                                    </p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('been_abroad') is-invalid @enderror"
                                            id="beenAbroadYes" data-original-required="true" type="radio"
                                            name="been_abroad" value="yes"
                                            {{ old('been_abroad') == 'yes' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="beenAbroadYes">Yes (छ)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('been_abroad') is-invalid @enderror"
                                            id="beenAbroadNo" data-original-required="true" type="radio"
                                            name="been_abroad" value="no"
                                            {{ old('been_abroad') == 'no' || !old('been_abroad') ? 'checked' : '' }}
                                            required>
                                        <label class="form-check-label" for="beenAbroadNo">No (छैन)</label>
                                    </div>
                                    @error('been_abroad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row g-3" id="abroadExperienceFields"
                                    style="display: {{ old('been_abroad') == 'yes' ? 'flex' : 'none' }};">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('abroad_country') is-invalid @enderror"
                                                id="abroadCountry" type="text" name="abroad_country"
                                                placeholder="Country Name" value="{{ old('abroad_country') }}">
                                            <label for="abroadCountry">Country Name (देशको नाम)</label>
                                            @error('abroad_country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('abroad_company') is-invalid @enderror"
                                                id="abroadCompany" type="text" name="abroad_company"
                                                placeholder="Company Name" value="{{ old('abroad_company') }}">
                                            <label for="abroadCompany">Company Name (कंपनीको नाम)</label>
                                            @error('abroad_company')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('abroad_post') is-invalid @enderror"
                                                id="abroadPost" type="text" name="abroad_post" placeholder="Post"
                                                value="{{ old('abroad_post') }}">
                                            <label for="abroadPost">Post (पद) e.g., Driver: Heavy Truck Driver</label>
                                            @error('ababroad_postroad_post')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input
                                                class="form-control @error('abroad_working_period') is-invalid @enderror"
                                                id="abroadWorkingPeriod" type="text" name="abroad_working_period"
                                                placeholder="YYYY-MM-DD toYYYY-MM-DD"
                                                value="{{ old('abroad_working_period') }}">
                                            <label for="abroadWorkingPeriod">Working Period (काम गरेको अवधि)</label>
                                            @error('abroad_working_period')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="upload-section">
                                            <input
                                                class="form-control @error('abroad_work_cert_upload') is-invalid @enderror"
                                                id="abroadWorkCertUpload" type="file" name="abroad_work_cert_upload"
                                                accept="image/*,.pdf" hidden>
                                            <label class="d-block w-100 py-4 cursor-pointer" for="abroadWorkCertUpload">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>Upload work experience certificate (अनुभव प्रमाण पत्र अपलोड गर्नुहोस्)
                                                </p>
                                            </label>
                                            <span class="file-name-display" id="abroadWorkCertUploadFileName"></span>
                                            <div class="invalid-feedback" id="abroadWorkCertUpload-feedback"></div>
                                            @error('abroad_work_cert_upload')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">Additional Details: Previous Application</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <p class="mb-2">Have you applied Europe or Other Country before ? (के तपाईले पहिले
                                        युरोप
                                        वा अन्य देशमा आवेदन दिनुभएको थियो ?)</p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('applied_before') is-invalid @enderror"
                                            id="appliedBeforeYes" data-original-required="true" type="radio"
                                            name="applied_before" value="yes"
                                            {{ old('applied_before') == 'yes' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="appliedBeforeYes">Yes (छ)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('applied_before') is-invalid @enderror"
                                            id="appliedBeforeNo" data-original-required="true" type="radio"
                                            name="applied_before" value="no"
                                            {{ old('applied_before') == 'no' || !old('applied_before') ? 'checked' : '' }}
                                            required>
                                        <label class="form-check-label" for="appliedBeforeNo">No (छैन)</label>
                                    </div>
                                    @error('applied_before')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row g-3" id="previousApplicationFields"
                                    style="display: {{ old('applied_before') == 'yes' ? 'flex' : 'none' }};">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('applied_country') is-invalid @enderror"
                                                id="appliedCountry" type="text" name="applied_country"
                                                placeholder="Country Name" value="{{ old('applied_country') }}">
                                            <label for="appliedCountry">Country Name (देशको नाम)</label>
                                            @error('applied_country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control @error('agent_manpower') is-invalid @enderror"
                                                id="agentManpower" type="text" name="agent_manpower"
                                                placeholder="Agent/Manpower Name" value="{{ old('agent_manpower') }}">
                                            <label for="agentManpower">Agent/ Manpower Name (एजेन्ट / मेनपावरको
                                                नाम)</label>
                                            @error('agent_manpower')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input class="form-control @error('applied_when') is-invalid @enderror"
                                                id="appliedWhen" type="date" name="applied_when"
                                                placeholder="YYYY-MM-DD" value="{{ old('applied_when') }}">
                                            <label for="appliedWhen">When did you applied? (कहिले आवेदन दिनु भएको थियो
                                                ?)</label>
                                            @error('applied_when')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">Where did you hear about this Prime European Company?</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <p class="mb-2">Where did you hear about this Prime European Company?</p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('hear_about_us') is-invalid @enderror"
                                            id="hearFacebook" data-original-required="true" type="radio"
                                            name="hear_about_us" value="Facebook"
                                            {{ old('hear_about_us') == 'Facebook' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="hearFacebook">Facebook (फेसबुक)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('hear_about_us') is-invalid @enderror"
                                            id="hearInstagram" data-original-required="true" type="radio"
                                            name="hear_about_us" value="Instagram"
                                            {{ old('hear_about_us') == 'Instagram' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="hearInstagram">Instagram (इन्टाग्राम)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('hear_about_us') is-invalid @enderror"
                                            id="hearWhatsapp" data-original-required="true" type="radio"
                                            name="hear_about_us" value="Whatsapp"
                                            {{ old('hear_about_us') == 'Whatsapp' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="hearWhatsapp">Whatsapp (वाएप)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('hear_about_us') is-invalid @enderror"
                                            id="hearFriendsFamilies" data-original-required="true" type="radio"
                                            name="hear_about_us" value="Friends/families"
                                            {{ old('hear_about_us') == 'Friends/families' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="hearFriendsFamilies">Friends/families
                                            (साथीभाई/परिवार)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('hear_about_us') is-invalid @enderror"
                                            id="hearOtherSource" data-original-required="true" type="radio"
                                            name="hear_about_us" value="Other"
                                            {{ old('hear_about_us') == 'Other' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="hearOtherSource">Other</label>
                                    </div>
                                    @error('hear_about_us')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12" id="otherSourceField"
                                    style="display: {{ old('hear_about_us') == 'Other' ? 'block' : 'none' }};">
                                    <div class="form-floating">
                                        <input class="form-control @error('other_source') is-invalid @enderror"
                                            id="otherSource" type="text" name="other_source"
                                            placeholder="Specify other source" value="{{ old('other_source') }}">
                                        <label for="otherSource">Specify Other Source</label>
                                        @error('other_source')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </fieldset>
                    </div>

                    <div class="form-navigation">
                        <button class="btn btn-secondary" id="prevBtn" type="button"
                            style="display: none;">Previous</button>
                        <button class="btn btn-primary ms-auto" id="nextBtn" type="button">Next</button>
                        <button class="btn btn-primary ms-auto" id="submitBtn" type="submit"
                            style="display: none;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        let currentStep = 1;
        const totalSteps = 4; // Updated to 4 sections

        const formSections = document.querySelectorAll('.form-section');
        const stepIndicators = document.querySelectorAll('.step-indicator .step');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const multiStepForm = document.getElementById('multiStepForm');

        // Safely embed PHP old() values into JavaScript
        const oldState = JSON.parse('{{ json_encode(old('state')) }}');
        const oldDistrict = JSON.parse('{{ json_encode(old('district')) }}');
        const oldCity = JSON.parse('{{ json_encode(old('city')) }}');
        const oldMaritalStatus = JSON.parse('{{ json_encode(old('marital_status')) }}');
        const oldLangOther = JSON.parse('{{ json_encode(old('lang_other')) }}');
        const oldWorkedInNepal = JSON.parse('{{ json_encode(old('worked_in_nepal')) }}');
        const oldBeenAbroad = JSON.parse('{{ json_encode(old('been_abroad')) }}');
        const oldAppliedBefore = JSON.parse('{{ json_encode(old('applied_before')) }}');
        const oldHearAboutUs = JSON.parse('{{ json_encode(old('hear_about_us')) }}');

        // For errors, pass the entire error keys array
        const errorKeys = JSON.parse('{{ json_encode($errors->keys()) }}');


        // Nepal location data from the provided JSON
        const nepalLocations = {
            "provinceList": [{
                    "id": 1,
                    "name": "KOSHI PROVINCE",
                    "districtList": [{
                            "id": 1,
                            "name": "TAPLEJUNG",
                            "municipalityList": [{
                                    "id": 1,
                                    "name": "Fattanglung Rural Municipality"
                                },
                                {
                                    "id": 2,
                                    "name": "Maiwakhola Rural Municipality"
                                },
                                {
                                    "id": 3,
                                    "name": "Meringden Rural Municipality"
                                },
                                {
                                    "id": 4,
                                    "name": "Mikawakhola Rural Municipality"
                                },
                                {
                                    "id": 5,
                                    "name": "Phungling Municipality"
                                },
                                {
                                    "id": 6,
                                    "name": "Serijdangha Rural Municipality"
                                },
                                {
                                    "id": 7,
                                    "name": "Sidingwa Rural Municipality"
                                },
                                {
                                    "id": 8,
                                    "name": "Yangwarak Rural Municipality"
                                },
                                {
                                    "id": 9,
                                    "name": "Aatharai Triveni Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 2,
                            "name": "SANKHUWASABHA",
                            "municipalityList": [{
                                    "id": 10,
                                    "name": "Bhotkhola Rural Municipality"
                                },
                                {
                                    "id": 11,
                                    "name": "Chainpur Municipality"
                                },
                                {
                                    "id": 12,
                                    "name": "Chichila Rural Municipality"
                                },
                                {
                                    "id": 13,
                                    "name": "Dharmadevi Municipality"
                                },
                                {
                                    "id": 14,
                                    "name": "Khadbari Municipality"
                                },
                                {
                                    "id": 15,
                                    "name": "Madi Municipality"
                                },
                                {
                                    "id": 16,
                                    "name": "Makalu Rural Municipality"
                                },
                                {
                                    "id": 17,
                                    "name": "Panchkhapan Municipality"
                                },
                                {
                                    "id": 18,
                                    "name": "Sabhapokhari Rural Municipality"
                                },
                                {
                                    "id": 19,
                                    "name": "Silichong Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 3,
                            "name": "SOLUKHUMBU",
                            "municipalityList": [{
                                    "id": 20,
                                    "name": "Mapya Rural Municipality"
                                },
                                {
                                    "id": 21,
                                    "name": "Thulung Rural Municipality"
                                },
                                {
                                    "id": 22,
                                    "name": "Khumbupasanglahmu Rural Municipality"
                                },
                                {
                                    "id": 23,
                                    "name": "Likhupike Rural Municipality"
                                },
                                {
                                    "id": 24,
                                    "name": "Mahakulung Rural Municipality"
                                },
                                {
                                    "id": 25,
                                    "name": "Necha Salyan Rural Municipality"
                                },
                                {
                                    "id": 26,
                                    "name": "Solududhakunda Municipality"
                                },
                                {
                                    "id": 27,
                                    "name": "Sotang Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 4,
                            "name": "OKHALDHUNGA",
                            "municipalityList": [{
                                    "id": 28,
                                    "name": "Champadevi Rural Municipality"
                                },
                                {
                                    "id": 29,
                                    "name": "Chisankhugadhi Rural Municipality"
                                },
                                {
                                    "id": 30,
                                    "name": "Khijidemba Rural Municipality"
                                },
                                {
                                    "id": 31,
                                    "name": "Likhu Rural Municipality"
                                },
                                {
                                    "id": 32,
                                    "name": "Manebhanjyang Rural Municipality"
                                },
                                {
                                    "id": 33,
                                    "name": "Molung Rural Municipality"
                                },
                                {
                                    "id": 34,
                                    "name": "Siddhicharan Municipality"
                                },
                                {
                                    "id": 35,
                                    "name": "Sunkoshi Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 5,
                            "name": "KHOTANG",
                            "municipalityList": [{
                                    "id": 36,
                                    "name": "Ainselukhark Rural Municipality"
                                },
                                {
                                    "id": 37,
                                    "name": "Barahapokhari Rural Municipality"
                                },
                                {
                                    "id": 38,
                                    "name": "Diprung Rural Municipality"
                                },
                                {
                                    "id": 39,
                                    "name": "Halesi Tuwachung Municipality"
                                },
                                {
                                    "id": 40,
                                    "name": "Jantedhunga Rural Municipality"
                                },
                                {
                                    "id": 41,
                                    "name": "Kepilasagadhi Rural Municipality"
                                },
                                {
                                    "id": 42,
                                    "name": "Khotehang Rural Municipality"
                                },
                                {
                                    "id": 43,
                                    "name": "Lamidanda Rural Municipality"
                                },
                                {
                                    "id": 44,
                                    "name": "Rupakot Majhuwagadhi Municipality"
                                },
                                {
                                    "id": 45,
                                    "name": "Sakela Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 6,
                            "name": "BHOJPUR",
                            "municipalityList": [{
                                    "id": 46,
                                    "name": "Aamchowk Rural Municipality"
                                },
                                {
                                    "id": 47,
                                    "name": "Arun Rural Municipality"
                                },
                                {
                                    "id": 48,
                                    "name": "Bhojpur Municipality"
                                },
                                {
                                    "id": 49,
                                    "name": "Hatuwagadhi Rural Municipality"
                                },
                                {
                                    "id": 50,
                                    "name": "Pauwadungma Rural Municipality"
                                },
                                {
                                    "id": 51,
                                    "name": "Ram Prasad Rai Rural Municipality"
                                },
                                {
                                    "id": 52,
                                    "name": "Shadananda Municipality"
                                },
                                {
                                    "id": 53,
                                    "name": "Salpa silicho Rural Municipality"
                                },
                                {
                                    "id": 54,
                                    "name": "Tayamkemaiyum Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 7,
                            "name": "DHANKUTA",
                            "municipalityList": [{
                                    "id": 55,
                                    "name": "Cha Thar Jorpati Rural Municipality"
                                },
                                {
                                    "id": 56,
                                    "name": "Chaubise Rural Municipality"
                                },
                                {
                                    "id": 57,
                                    "name": "Dhankuta Municipality"
                                },
                                {
                                    "id": 58,
                                    "name": "Khalsa Chintang Sahidbhumi Rural Municipality"
                                },
                                {
                                    "id": 59,
                                    "name": "Mahalakshmi Municipality"
                                },
                                {
                                    "id": 60,
                                    "name": "Pakhribash Municipality"
                                },
                                {
                                    "id": 61,
                                    "name": "Sangurigadhi Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 8,
                            "name": "TERHATHUM",
                            "municipalityList": [{
                                    "id": 62,
                                    "name": "Aathrai Rural Municipality"
                                },
                                {
                                    "id": 63,
                                    "name": "Chaa Thar Rural Municipality"
                                },
                                {
                                    "id": 64,
                                    "name": "Laliguransh Municipality"
                                },
                                {
                                    "id": 65,
                                    "name": "Menchayayam Rural Municipality"
                                },
                                {
                                    "id": 66,
                                    "name": "Myanglung Municipality"
                                },
                                {
                                    "id": 67,
                                    "name": "Phedap Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 9,
                            "name": "PANCHTHAR",
                            "municipalityList": [{
                                    "id": 68,
                                    "name": "Falgunanda Rural Municipality"
                                },
                                {
                                    "id": 69,
                                    "name": "Hilihang Rural Municipality"
                                },
                                {
                                    "id": 70,
                                    "name": "Kummayak Rural Municipality"
                                },
                                {
                                    "id": 71,
                                    "name": "Miklajung Rural Municipality"
                                },
                                {
                                    "id": 72,
                                    "name": "Phalaelung Rural Municipality"
                                },
                                {
                                    "id": 73,
                                    "name": "Phidim Municipality"
                                },
                                {
                                    "id": 74,
                                    "name": "Tumwaewa Rural Municipality"
                                },
                                {
                                    "id": 75,
                                    "name": "Yangwarak Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 10,
                            "name": "ILAM",
                            "municipalityList": [{
                                    "id": 76,
                                    "name": "Chulachuli Rural Municipality"
                                },
                                {
                                    "id": 77,
                                    "name": "Deumai Municipality"
                                },
                                {
                                    "id": 78,
                                    "name": "Fakfokthum Rural Municipality"
                                },
                                {
                                    "id": 79,
                                    "name": "Ilam Municipality"
                                },
                                {
                                    "id": 80,
                                    "name": "Mai Jogmai Rural Municipality"
                                },
                                {
                                    "id": 81,
                                    "name": "Mai Municipality"
                                },
                                {
                                    "id": 82,
                                    "name": "Mangsebung Rural Municipality"
                                },
                                {
                                    "id": 83,
                                    "name": "Rong Rural Municipality"
                                },
                                {
                                    "id": 84,
                                    "name": "Sandakpur Rural Municipality"
                                },
                                {
                                    "id": 85,
                                    "name": "Suryaudaya Municipality"
                                }
                            ]
                        },
                        {
                            "id": 11,
                            "name": "JHAPA",
                            "municipalityList": [{
                                    "id": 86,
                                    "name": "Arjundhara Municipality"
                                },
                                {
                                    "id": 87,
                                    "name": "Barhadashi Rural Municipality"
                                },
                                {
                                    "id": 88,
                                    "name": "Bhadrapur Municipality"
                                },
                                {
                                    "id": 89,
                                    "name": "Birtamod Municipality"
                                },
                                {
                                    "id": 90,
                                    "name": "Buddha Shanti Rural Municipality"
                                },
                                {
                                    "id": 91,
                                    "name": "Damak Municipality"
                                },
                                {
                                    "id": 92,
                                    "name": "Gauradaha Municipality"
                                },
                                {
                                    "id": 93,
                                    "name": "Gaurigunj Rural Municipality"
                                },
                                {
                                    "id": 94,
                                    "name": "Haldibari Rural Municipality"
                                },
                                {
                                    "id": 95,
                                    "name": "Jhapa Rural Municipality"
                                },
                                {
                                    "id": 96,
                                    "name": "Kachanakawal Rural Municipality"
                                },
                                {
                                    "id": 97,
                                    "name": "Kamal Rural Municipality"
                                },
                                {
                                    "id": 98,
                                    "name": "Kankai Municipality"
                                },
                                {
                                    "id": 99,
                                    "name": "Mechinagar Municipality"
                                },
                                {
                                    "id": 100,
                                    "name": "Sitasatakshi Municipality"
                                }
                            ]
                        },
                        {
                            "id": 12,
                            "name": "MORANG",
                            "municipalityList": [{
                                    "id": 101,
                                    "name": "Belbari Municipality"
                                },
                                {
                                    "id": 102,
                                    "name": "Biratnagar Upa Maha Municipality"
                                },
                                {
                                    "id": 103,
                                    "name": "Budhiganga Rural Municipality"
                                },
                                {
                                    "id": 104,
                                    "name": "Dha Municipality althan Rural Municipality"
                                },
                                {
                                    "id": 105,
                                    "name": "Gramthan Rural Municipality"
                                },
                                {
                                    "id": 106,
                                    "name": "Jahada Rural Municipality"
                                },
                                {
                                    "id": 107,
                                    "name": "Kanepokhari Rural Municipality"
                                },
                                {
                                    "id": 108,
                                    "name": "Katahari Rural Municipality"
                                },
                                {
                                    "id": 109,
                                    "name": "Kerabari Rural Municipality"
                                },
                                {
                                    "id": 110,
                                    "name": "Letang Municipality"
                                },
                                {
                                    "id": 111,
                                    "name": "Miklajung Rural Municipality"
                                },
                                {
                                    "id": 112,
                                    "name": "Patahri shanishchare Municipality"
                                },
                                {
                                    "id": 113,
                                    "name": "Rangeli Municipality"
                                },
                                {
                                    "id": 114,
                                    "name": "Ratuwamai Municipality"
                                },
                                {
                                    "id": 115,
                                    "name": "Sundar Haraicha Municipality"
                                },
                                {
                                    "id": 116,
                                    "name": "Sunbarshi municipality"
                                },
                                {
                                    "id": 117,
                                    "name": "Uralabari Municipality"
                                }
                            ]
                        },
                        {
                            "id": 13,
                            "name": "SUNSARI",
                            "municipalityList": [{
                                    "id": 118,
                                    "name": "Baraha Municipality"
                                },
                                {
                                    "id": 119,
                                    "name": "Barju Rural Municipality"
                                },
                                {
                                    "id": 120,
                                    "name": "Devangunj Rural Municipality"
                                },
                                {
                                    "id": 121,
                                    "name": "Dharan Upamaha Municipality"
                                },
                                {
                                    "id": 122,
                                    "name": "Duhabi Municipality"
                                },
                                {
                                    "id": 123,
                                    "name": "Gadhi Rural Municipality"
                                },
                                {
                                    "id": 124,
                                    "name": "Harinagar Rural Municipality"
                                },
                                {
                                    "id": 125,
                                    "name": "Inarwa Municipality"
                                },
                                {
                                    "id": 126,
                                    "name": "Itahari Upa Maha Municipality"
                                },
                                {
                                    "id": 127,
                                    "name": "Jhokraha Rural Municipality"
                                },
                                {
                                    "id": 128,
                                    "name": "Koshi Rural Municipality"
                                },
                                {
                                    "id": 129,
                                    "name": "Ramdhuni Municipality"
                                }
                            ]
                        },
                        {
                            "id": 14,
                            "name": "UDAYAPUR",
                            "municipalityList": [{
                                    "id": 130,
                                    "name": "Belaka Municipality"
                                },
                                {
                                    "id": 131,
                                    "name": "Chaudandigadhi Municipality"
                                },
                                {
                                    "id": 132,
                                    "name": "Katari Municipality"
                                },
                                {
                                    "id": 133,
                                    "name": "Rautamai Rural Municipality"
                                },
                                {
                                    "id": 134,
                                    "name": "Sunkoshi Rural Municipality"
                                },
                                {
                                    "id": 135,
                                    "name": "Tapli Rural Municipality"
                                },
                                {
                                    "id": 136,
                                    "name": "Triyuga Municipality"
                                },
                                {
                                    "id": 137,
                                    "name": "Udayapurgadhi Rural Municipality"
                                }
                            ]
                        }
                    ]
                },
                {
                    "id": 2,
                    "name": "MADHESH PROVINCE",
                    "districtList": [{
                            "id": 15,
                            "name": "SAPTARI",
                            "municipalityList": [{
                                    "id": 138,
                                    "name": "Rajgadh Rural Municipality"
                                },
                                {
                                    "id": 139,
                                    "name": "Bishnupur Rural Municipality"
                                },
                                {
                                    "id": 140,
                                    "name": "Bode Barsain Municipality"
                                },
                                {
                                    "id": 141,
                                    "name": "Chhinnamasta Rural Municipality"
                                },
                                {
                                    "id": 142,
                                    "name": "Dakneshwori Municipality"
                                },
                                {
                                    "id": 143,
                                    "name": "Hanumannagar Kankalani Municipality"
                                },
                                {
                                    "id": 144,
                                    "name": "Kanchanrup Municipality"
                                },
                                {
                                    "id": 145,
                                    "name": "Khadak Municipality"
                                },
                                {
                                    "id": 146,
                                    "name": "Krishna Savaran Rural Municipality"
                                },
                                {
                                    "id": 147,
                                    "name": "Mahadev Rural Municipality"
                                },
                                {
                                    "id": 148,
                                    "name": "Rajbiraj Municipality"
                                },
                                {
                                    "id": 149,
                                    "name": "Rupani Rural Municipality"
                                },
                                {
                                    "id": 150,
                                    "name": "Saptakoshi Rural Municipality"
                                },
                                {
                                    "id": 151,
                                    "name": "Shambhunath Municipality"
                                },
                                {
                                    "id": 152,
                                    "name": "Balanbihul Rural Municipality"
                                },
                                {
                                    "id": 153,
                                    "name": "Tilathi Koiladi Rural Municipality"
                                },
                                {
                                    "id": 154,
                                    "name": "Tirahut Rural Municipality"
                                },
                                {
                                    "id": 155,
                                    "name": "Surunga Municipality"
                                }
                            ]
                        },
                        {
                            "id": 16,
                            "name": "SIRAHA",
                            "municipalityList": [{
                                    "id": 156,
                                    "name": "Arnama Rural Municipality"
                                },
                                {
                                    "id": 157,
                                    "name": "Aurahi Rural Municipality"
                                },
                                {
                                    "id": 158,
                                    "name": "Bariyarpatti Rural Municipality"
                                },
                                {
                                    "id": 159,
                                    "name": "Bhagawa Municipality ur Rural Municipality"
                                },
                                {
                                    "id": 160,
                                    "name": "Dhangadhimai Municipality"
                                },
                                {
                                    "id": 161,
                                    "name": "Golbazar Municipality"
                                },
                                {
                                    "id": 162,
                                    "name": "Kalya Municipality ur Municipality"
                                },
                                {
                                    "id": 163,
                                    "name": "Karjanhya Rural Municipality"
                                },
                                {
                                    "id": 164,
                                    "name": "Lahan Municipality"
                                },
                                {
                                    "id": 165,
                                    "name": "Laxmipur Patari Rural Municipality"
                                },
                                {
                                    "id": 166,
                                    "name": "Mirchaiya Municipality"
                                },
                                {
                                    "id": 167,
                                    "name": "Naraha Rural Municipality"
                                },
                                {
                                    "id": 168,
                                    "name": "Nawarajpur Rural Municipality"
                                },
                                {
                                    "id": 169,
                                    "name": "Sakhuwanankarkatti Rural Municipality"
                                },
                                {
                                    "id": 170,
                                    "name": "Siraha Municipality"
                                },
                                {
                                    "id": 171,
                                    "name": "Sukhipur Rural Municipality"
                                },
                                {
                                    "id": 172,
                                    "name": "Bishnupur Gaunpalika"
                                }
                            ]
                        },
                        {
                            "id": 17,
                            "name": "DHANUSA",
                            "municipalityList": [{
                                    "id": 173,
                                    "name": "Chireshwar Nath Municipality"
                                },
                                {
                                    "id": 174,
                                    "name": "Dhanushadham Municipality"
                                },
                                {
                                    "id": 175,
                                    "name": "Sabaila Municipality"
                                },
                                {
                                    "id": 176,
                                    "name": "Mithla Municipality"
                                },
                                {
                                    "id": 177,
                                    "name": "Ganeshman Charnath N.P."
                                },
                                {
                                    "id": 178,
                                    "name": "Janakpur Up Municipality"
                                },
                                {
                                    "id": 179,
                                    "name": "Shahidnagar Nagar palika"
                                },
                                {
                                    "id": 180,
                                    "name": "Mithala Bihari nagar palika"
                                },
                                {
                                    "id": 181,
                                    "name": "Hanshpur Nagar Palika"
                                },
                                {
                                    "id": 182,
                                    "name": "Bideha Nagar Palika"
                                },
                                {
                                    "id": 183,
                                    "name": "Kamala siddhi Nagar Palika"
                                },
                                {
                                    "id": 184,
                                    "name": "Nagarain nagar Palika"
                                },
                                {
                                    "id": 185,
                                    "name": "mukhiya Patti gaun Palika"
                                },
                                {
                                    "id": 186,
                                    "name": "Bateshwar Gaun Palika"
                                },
                                {
                                    "id": 187,
                                    "name": "Dhanauji gaun Palika"
                                },
                                {
                                    "id": 188,
                                    "name": "Janak Nandani gaun Palika"
                                },
                                {
                                    "id": 189,
                                    "name": "Laxminya Gaun Palika"
                                },
                                {
                                    "id": 190,
                                    "name": "Aarurahi Gaun Palika"
                                }
                            ]
                        },
                        {
                            "id": 18,
                            "name": "MAHOTTARI",
                            "municipalityList": [{
                                    "id": 191,
                                    "name": "Loharpatti Municipality"
                                },
                                {
                                    "id": 192,
                                    "name": "Bardibas Municipality"
                                },
                                {
                                    "id": 193,
                                    "name": "Aurhi Municipality"
                                },
                                {
                                    "id": 194,
                                    "name": "Ramgopalpur Municipality"
                                },
                                {
                                    "id": 195,
                                    "name": "Balawa Municipality"
                                },
                                {
                                    "id": 196,
                                    "name": "Gaushala Municipality"
                                },
                                {
                                    "id": 197,
                                    "name": "Jaleshwar Municipality"
                                },
                                {
                                    "id": 198,
                                    "name": "Manara Shiswa Municipality"
                                },
                                {
                                    "id": 199,
                                    "name": "Matihani Municipality"
                                },
                                {
                                    "id": 200,
                                    "name": "Pipara Rural Municipality"
                                },
                                {
                                    "id": 201,
                                    "name": "Ekdanra Rural Municipality"
                                },
                                {
                                    "id": 202,
                                    "name": "Mahottari Rural Municipality"
                                },
                                {
                                    "id": 203,
                                    "name": "Sonama Rural Municipality"
                                },
                                {
                                    "id": 204,
                                    "name": "Samsi Rural Municipality"
                                },
                                {
                                    "id": 205,
                                    "name": "Bhagaha Municipality"
                                }
                            ]
                        },
                        {
                            "id": 19,
                            "name": "SARLAHI",
                            "municipalityList": [{
                                    "id": 206,
                                    "name": "Balara Municipality"
                                },
                                {
                                    "id": 207,
                                    "name": "Barahathawa Municipality"
                                },
                                {
                                    "id": 208,
                                    "name": "Basbariya Rural Municipality"
                                },
                                {
                                    "id": 209,
                                    "name": "Bishnu Rural Municipality"
                                },
                                {
                                    "id": 210,
                                    "name": "Bramhapuri Rural Municipality"
                                },
                                {
                                    "id": 211,
                                    "name": "Chakarghatta Rural Municipality"
                                },
                                {
                                    "id": 212,
                                    "name": "Chandranagar Rural Municipality"
                                },
                                {
                                    "id": 213,
                                    "name": "Dhankaul Rural Municipality"
                                },
                                {
                                    "id": 214,
                                    "name": "Haripur Municipality"
                                },
                                {
                                    "id": 215,
                                    "name": "Haripurwa Municipality"
                                },
                                {
                                    "id": 216,
                                    "name": "Harlakhi Rural Municipality"
                                },
                                {
                                    "id": 217,
                                    "name": "Ishwarpur Municipality"
                                },
                                {
                                    "id": 218,
                                    "name": "Kaudena Rural Municipality"
                                },
                                {
                                    "id": 219,
                                    "name": "Lalbandi Municipality"
                                },
                                {
                                    "id": 220,
                                    "name": "Malangwa Municipality"
                                },
                                {
                                    "id": 221,
                                    "name": "Parsa Rural Municipality"
                                },
                                {
                                    "id": 222,
                                    "name": "Ramnagar Baharwa Rural Municipality"
                                },
                                {
                                    "id": 223,
                                    "name": "Godaita Municipality"
                                },
                                {
                                    "id": 224,
                                    "name": "Rohini Rural Municipality"
                                },
                                {
                                    "id": 225,
                                    "name": "Kabilasi Municipality"
                                },
                                {
                                    "id": 226,
                                    "name": "Bagmati Municipality"
                                }
                            ]
                        },
                        {
                            "id": 20,
                            "name": "RAUTAHAT",
                            "municipalityList": [{
                                    "id": 227,
                                    "name": "Auraiya Rural Municipality"
                                },
                                {
                                    "id": 228,
                                    "name": "Badharwa Municipality"
                                },
                                {
                                    "id": 229,
                                    "name": "Baudhimai Municipality"
                                },
                                {
                                    "id": 230,
                                    "name": "Brindaban Municipality"
                                },
                                {
                                    "id": 231,
                                    "name": "Chandrapur Municipality"
                                },
                                {
                                    "id": 232,
                                    "name": "Dewahi Gonahi Municipality"
                                },
                                {
                                    "id": 233,
                                    "name": "Durga Bhagwati Rural Municipality"
                                },
                                {
                                    "id": 234,
                                    "name": "Fatuha Maheshpur Rural Municipality"
                                },
                                {
                                    "id": 235,
                                    "name": "Gadhimai Municipality"
                                },
                                {
                                    "id": 236,
                                    "name": "Garuda Municipality"
                                },
                                {
                                    "id": 237,
                                    "name": "Gaur Municipality"
                                },
                                {
                                    "id": 238,
                                    "name": "Katahariya Municipality"
                                },
                                {
                                    "id": 239,
                                    "name": "Madhav Narayan Municipality"
                                },
                                {
                                    "id": 240,
                                    "name": "Paroha Municipality"
                                },
                                {
                                    "id": 241,
                                    "name": "Yamunamai Rural Municipality"
                                },
                                {
                                    "id": 242,
                                    "name": "Rajpur Municipality"
                                },
                                {
                                    "id": 243,
                                    "name": "Ishanath Municipality"
                                },
                                {
                                    "id": 244,
                                    "name": "Gaurigunj Municipality"
                                }
                            ]
                        },
                        {
                            "id": 21,
                            "name": "BARA",
                            "municipalityList": [{
                                    "id": 245,
                                    "name": "Baragadhi Rural Municipality"
                                },
                                {
                                    "id": 246,
                                    "name": "Feta Rural Municipality"
                                },
                                {
                                    "id": 247,
                                    "name": "Kalaiya Upa Maha Nagar Palika"
                                },
                                {
                                    "id": 248,
                                    "name": "Karaiyamai Rural Municipality"
                                },
                                {
                                    "id": 249,
                                    "name": "Kolhabi Municipality"
                                },
                                {
                                    "id": 250,
                                    "name": "Devtal Rural Municipality"
                                },
                                {
                                    "id": 251,
                                    "name": "Jitpur simara Upa Maha Nagar Palika"
                                },
                                {
                                    "id": 252,
                                    "name": "Pachrauta Municipality"
                                },
                                {
                                    "id": 253,
                                    "name": "Parawanipur Rural Municipality"
                                },
                                {
                                    "id": 254,
                                    "name": "Phattepur Rural Municipality"
                                },
                                {
                                    "id": 255,
                                    "name": "Prasauni Rural Municipality"
                                },
                                {
                                    "id": 256,
                                    "name": "Simraungadh Municipality"
                                },
                                {
                                    "id": 257,
                                    "name": "Suwarna Rural Municipality"
                                },
                                {
                                    "id": 258,
                                    "name": "Mahagadhimai Municipality"
                                },
                                {
                                    "id": 259,
                                    "name": "Nijgadh Municipality"
                                },
                                {
                                    "id": 260,
                                    "name": "Adarsha Kotwal Municipality"
                                }
                            ]
                        },
                        {
                            "id": 22,
                            "name": "PARSA",
                            "municipalityList": [{
                                    "id": 261,
                                    "name": "Bindabasini Rural Municipality"
                                },
                                {
                                    "id": 262,
                                    "name": "Chhipaharmai Rural Municipality"
                                },
                                {
                                    "id": 263,
                                    "name": "Dhobini Rural Municipality"
                                },
                                {
                                    "id": 264,
                                    "name": "Jagarnathpur Rural Municipality"
                                },
                                {
                                    "id": 265,
                                    "name": "Jirabhawani Rural Municipality"
                                },
                                {
                                    "id": 266,
                                    "name": "Kaliya Gamai Rural Municipality"
                                },
                                {
                                    "id": 267,
                                    "name": "Pakaha Mainpur Rural Municipality"
                                },
                                {
                                    "id": 268,
                                    "name": "Parsagadhi Municipality"
                                },
                                {
                                    "id": 269,
                                    "name": "Paterwasugauli Rural Municipality"
                                },
                                {
                                    "id": 270,
                                    "name": "Pokhariya Municipality"
                                },
                                {
                                    "id": 271,
                                    "name": "Sakhuwa prasauni Rural Municipality"
                                },
                                {
                                    "id": 272,
                                    "name": "Thori Rural Municipality"
                                },
                                {
                                    "id": 273,
                                    "name": "Birgunj Maha Nagar Palika"
                                },
                                {
                                    "id": 274,
                                    "name": "Bahudaramai Municipality"
                                }
                            ]
                        }
                    ]
                },
                {
                    "id": 3,
                    "name": "BAGMATI PROVINCE",
                    "districtList": [{
                            "id": 23,
                            "name": "DOLAKHA",
                            "municipalityList": [{
                                    "id": 275,
                                    "name": "Baiteshwor Rural Municipality"
                                },
                                {
                                    "id": 276,
                                    "name": "Bhimeshwor Municipality"
                                },
                                {
                                    "id": 277,
                                    "name": "Gaurishankar Rural Municipality"
                                },
                                {
                                    "id": 278,
                                    "name": "Jiri Municipality"
                                },
                                {
                                    "id": 279,
                                    "name": "Kalinchowk Rural Municipality"
                                },
                                {
                                    "id": 280,
                                    "name": "Melung Rural Municipality"
                                },
                                {
                                    "id": 281,
                                    "name": "Tamakhoshi Rural Municipality"
                                },
                                {
                                    "id": 282,
                                    "name": "Thasang Rural Municipality"
                                },
                                {
                                    "id": 283,
                                    "name": "Shailung Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 24,
                            "name": "RASUWA",
                            "municipalityList": [{
                                    "id": 284,
                                    "name": "Amachhodingmo Rural Municipality"
                                },
                                {
                                    "id": 285,
                                    "name": "Gosaikunda Rural Municipality"
                                },
                                {
                                    "id": 286,
                                    "name": "Kalika Rural Municipality"
                                },
                                {
                                    "id": 287,
                                    "name": "Naukunda Rural Municipality"
                                },
                                {
                                    "id": 288,
                                    "name": "Uttargaya Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 25,
                            "name": "SINDHUPALCHOK",
                            "municipalityList": [{
                                    "id": 289,
                                    "name": "Balefi Rural Municipality"
                                },
                                {
                                    "id": 290,
                                    "name": "Bhotekoshi Rural Municipality"
                                },
                                {
                                    "id": 291,
                                    "name": "Chautara Sangachokhi Municipality"
                                },
                                {
                                    "id": 292,
                                    "name": "Helambu Rural Municipality"
                                },
                                {
                                    "id": 293,
                                    "name": "Indrawati Rural Municipality"
                                },
                                {
                                    "id": 294,
                                    "name": "Jugal Rural Municipality"
                                },
                                {
                                    "id": 295,
                                    "name": "Lispangkhu Rural Municipality"
                                },
                                {
                                    "id": 296,
                                    "name": "Melamchi Municipality"
                                },
                                {
                                    "id": 297,
                                    "name": "Panchpokhari Thangpal Rural Municipality"
                                },
                                {
                                    "id": 298,
                                    "name": "Sunkoshi Rural Municipality"
                                },
                                {
                                    "id": 299,
                                    "name": "Thangpal Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 26,
                            "name": "DHADING",
                            "municipalityList": [{
                                    "id": 300,
                                    "name": "Benighat Rorang Rural Municipality"
                                },
                                {
                                    "id": 301,
                                    "name": "Dhadingbesi Rural Municipality"
                                },
                                {
                                    "id": 302,
                                    "name": "Gajuri Rural Municipality"
                                },
                                {
                                    "id": 303,
                                    "name": "Galchhi Rural Municipality"
                                },
                                {
                                    "id": 304,
                                    "name": "Gangajamuna Rural Municipality"
                                },
                                {
                                    "id": 305,
                                    "name": "Jwalamukhi Rural Municipality"
                                },
                                {
                                    "id": 306,
                                    "name": "Khaniyabas Rural Municipality"
                                },
                                {
                                    "id": 307,
                                    "name": "Netrawati Dabjong Rural Municipality"
                                },
                                {
                                    "id": 308,
                                    "name": "Nilkantha Municipality"
                                },
                                {
                                    "id": 309,
                                    "name": "Rubi Valley Rural Municipality"
                                },
                                {
                                    "id": 310,
                                    "name": "Siddhalek Rural Municipality"
                                },
                                {
                                    "id": 311,
                                    "name": "Thakre Rural Municipality"
                                },
                                {
                                    "id": 312,
                                    "name": "Tripurasundari Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 27,
                            "name": "KAVREPALANCHOK",
                            "municipalityList": [{
                                    "id": 313,
                                    "name": "Bethanchowk Rural Municipality"
                                },
                                {
                                    "id": 314,
                                    "name": "Chauri Deurali Rural Municipality"
                                },
                                {
                                    "id": 315,
                                    "name": "Dhulikhel Municipality"
                                },
                                {
                                    "id": 316,
                                    "name": "Khanikhola Rural Municipality"
                                },
                                {
                                    "id": 317,
                                    "name": "Mandandeupur Municipality"
                                },
                                {
                                    "id": 318,
                                    "name": "Namobuddha Municipality"
                                },
                                {
                                    "id": 319,
                                    "name": "Panauti Municipality"
                                },
                                {
                                    "id": 320,
                                    "name": "Panchkhal Municipality"
                                },
                                {
                                    "id": 321,
                                    "name": "Roshi Rural Municipality"
                                },
                                {
                                    "id": 322,
                                    "name": "Temal Rural Municipality"
                                },
                                {
                                    "id": 323,
                                    "name": "Banepa Municipality"
                                },
                                {
                                    "id": 324,
                                    "name": "Mahabharat Rural Municipality"
                                },
                                {
                                    "id": 325,
                                    "name": "Milke Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 28,
                            "name": "NUWAKOT",
                            "municipalityList": [{
                                    "id": 326,
                                    "name": "Bidur Municipality"
                                },
                                {
                                    "id": 327,
                                    "name": "Belkotgadhi Municipality"
                                },
                                {
                                    "id": 328,
                                    "name": "Kakani Rural Municipality"
                                },
                                {
                                    "id": 329,
                                    "name": "Kispang Rural Municipality"
                                },
                                {
                                    "id": 330,
                                    "name": "Likhu Rural Municipality"
                                },
                                {
                                    "id": 331,
                                    "name": "Dupcheshwar Rural Municipality"
                                },
                                {
                                    "id": 332,
                                    "name": "Panchakanya Rural Municipality"
                                },
                                {
                                    "id": 333,
                                    "name": "Shivapuri Rural Municipality"
                                },
                                {
                                    "id": 334,
                                    "name": "Suryagadhi Rural Municipality"
                                },
                                {
                                    "id": 335,
                                    "name": "Tadi Rural Municipality"
                                },
                                {
                                    "id": 336,
                                    "name": "Myagang Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 29,
                            "name": "KATHMANDU",
                            "municipalityList": [{
                                    "id": 337,
                                    "name": "Kathmandu Maha Nagar Palika"
                                },
                                {
                                    "id": 338,
                                    "name": "Kirtipur Municipality"
                                },
                                {
                                    "id": 339,
                                    "name": "Chandragiri Municipality"
                                },
                                {
                                    "id": 340,
                                    "name": "Budhanilkantha Municipality"
                                },
                                {
                                    "id": 341,
                                    "name": "Tokha Municipality"
                                },
                                {
                                    "id": 342,
                                    "name": "Gokarneshwar Municipality"
                                },
                                {
                                    "id": 343,
                                    "name": "Nagarjun Municipality"
                                },
                                {
                                    "id": 344,
                                    "name": "Kageshwori Manahara Municipality"
                                },
                                {
                                    "id": 345,
                                    "name": "Shankharapur Municipality"
                                },
                                {
                                    "id": 346,
                                    "name": "Tarakeshwar Municipality"
                                },
                                {
                                    "id": 347,
                                    "name": "Dakshinkali Municipality"
                                },
                                {
                                    "id": 348,
                                    "name": "Thimi Municipality"
                                }
                            ]
                        },
                        {
                            "id": 30,
                            "name": "LALITPUR",
                            "municipalityList": [{
                                    "id": 349,
                                    "name": "Godawari Municipality"
                                },
                                {
                                    "id": 350,
                                    "name": "Konjyosom Rural Municipality"
                                },
                                {
                                    "id": 351,
                                    "name": "Bagmati Rural Municipality"
                                },
                                {
                                    "id": 352,
                                    "name": "Mahankal Rural Municipality"
                                },
                                {
                                    "id": 353,
                                    "name": "Lalitpur Maha Nagar Palika"
                                },
                                {
                                    "id": 354,
                                    "name": "Bajrabarahi Municipality"
                                }
                            ]
                        },
                        {
                            "id": 31,
                            "name": "BHAKTAPUR",
                            "municipalityList": [{
                                    "id": 355,
                                    "name": "Bhaktapur Municipality"
                                },
                                {
                                    "id": 356,
                                    "name": "Changunarayan Municipality"
                                },
                                {
                                    "id": 357,
                                    "name": "Madhyapur Thimi Municipality"
                                },
                                {
                                    "id": 358,
                                    "name": "Suryabinayak Municipality"
                                }
                            ]
                        },
                        {
                            "id": 32,
                            "name": "MAKWANPUR",
                            "municipalityList": [{
                                    "id": 359,
                                    "name": "Bagmati Rural Municipality"
                                },
                                {
                                    "id": 360,
                                    "name": "Bakaiya Rural Municipality"
                                },
                                {
                                    "id": 361,
                                    "name": "Bhimphedi Rural Municipality"
                                },
                                {
                                    "id": 362,
                                    "name": "Hetauda Upa Maha Nagar Palika"
                                },
                                {
                                    "id": 363,
                                    "name": "Indrasarowar Rural Municipality"
                                },
                                {
                                    "id": 364,
                                    "name": "Manahari Rural Municipality"
                                },
                                {
                                    "id": 365,
                                    "name": "Makwanpurgadhi Rural Municipality"
                                },
                                {
                                    "id": 366,
                                    "name": "Raksirang Rural Municipality"
                                },
                                {
                                    "id": 367,
                                    "name": "Thaha Municipality"
                                },
                                {
                                    "id": 368,
                                    "name": "Kamalamai Municipality"
                                }
                            ]
                        },
                        {
                            "id": 33,
                            "name": "CHITWAN",
                            "municipalityList": [{
                                    "id": 369,
                                    "name": "Bharatpur Maha Nagar Palika"
                                },
                                {
                                    "id": 370,
                                    "name": "Ichchhakamana Rural Municipality"
                                },
                                {
                                    "id": 371,
                                    "name": "Khairhani Municipality"
                                },
                                {
                                    "id": 372,
                                    "name": "Madi Municipality"
                                },
                                {
                                    "id": 373,
                                    "name": "Kalika Municipality"
                                },
                                {
                                    "id": 374,
                                    "name": "Rapti Municipality"
                                },
                                {
                                    "id": 375,
                                    "name": "Ratnanagar Municipality"
                                }
                            ]
                        },
                        {
                            "id": 34,
                            "name": "SINDHULI",
                            "municipalityList": [{
                                    "id": 376,
                                    "name": "Dudhauli Municipality"
                                },
                                {
                                    "id": 377,
                                    "name": "Fikkal Rural Municipality"
                                },
                                {
                                    "id": 378,
                                    "name": "Golanjor Rural Municipality"
                                },
                                {
                                    "id": 379,
                                    "name": "Kamalamai Municipality"
                                },
                                {
                                    "id": 380,
                                    "name": "Marin Rural Municipality"
                                },
                                {
                                    "id": 381,
                                    "name": "Sunkoshi Rural Municipality"
                                },
                                {
                                    "id": 382,
                                    "name": "Tinpatan Rural Municipality"
                                },
                                {
                                    "id": 383,
                                    "name": "Hariharpur Gadhi Rural Municipality"
                                },
                                {
                                    "id": 384,
                                    "name": "Ghanglekh Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 35,
                            "name": "RAMECHHAP",
                            "municipalityList": [{
                                    "id": 385,
                                    "name": "Gokulganga Rural Municipality"
                                },
                                {
                                    "id": 386,
                                    "name": "Likhu Tamakoshi Rural Municipality"
                                },
                                {
                                    "id": 387,
                                    "name": "Manthali Municipality"
                                },
                                {
                                    "id": 388,
                                    "name": "Ramechhap Municipality"
                                },
                                {
                                    "id": 389,
                                    "name": "Sunapati Rural Municipality"
                                },
                                {
                                    "id": 390,
                                    "name": "Umakunda Rural Municipality"
                                },
                                {
                                    "id": 391,
                                    "name": "Khana Khola Rural Municipality"
                                },
                                {
                                    "id": 392,
                                    "name": "Dhoramba Rural Municipality"
                                }
                            ]
                        }
                    ]
                },
                {
                    "id": 4,
                    "name": "GANDAKI PROVINCE",
                    "districtList": [{
                            "id": 36,
                            "name": "GORKHA",
                            "municipalityList": [{
                                    "id": 393,
                                    "name": "Aarughat Rural Municipality"
                                },
                                {
                                    "id": 394,
                                    "name": "Ajirkot Rural Municipality"
                                },
                                {
                                    "id": 395,
                                    "name": "Bhimsenthan Rural Municipality"
                                },
                                {
                                    "id": 396,
                                    "name": "Chum Nubri Rural Municipality"
                                },
                                {
                                    "id": 397,
                                    "name": "Dharche Rural Municipality"
                                },
                                {
                                    "id": 398,
                                    "name": "Gandaki Rural Municipality"
                                },
                                {
                                    "id": 399,
                                    "name": "Gorkha Municipality"
                                },
                                {
                                    "id": 400,
                                    "name": "Palungtar Municipality"
                                },
                                {
                                    "id": 401,
                                    "name": "Sahid Lakhan Rural Municipality"
                                },
                                {
                                    "id": 402,
                                    "name": "Siranchok Rural Municipality"
                                },
                                {
                                    "id": 403,
                                    "name": "Suli Kot Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 37,
                            "name": "MANANG",
                            "municipalityList": [{
                                    "id": 404,
                                    "name": "Chame Rural Municipality"
                                },
                                {
                                    "id": 405,
                                    "name": "Narpa Bhumi Rural Municipality"
                                },
                                {
                                    "id": 406,
                                    "name": "Nason Rural Municipality"
                                },
                                {
                                    "id": 407,
                                    "name": "Manang Ngisyang Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 38,
                            "name": "MUSTANG",
                            "municipalityList": [{
                                    "id": 408,
                                    "name": "Dalome Rural Municipality"
                                },
                                {
                                    "id": 409,
                                    "name": "Gharphajhong Rural Municipality"
                                },
                                {
                                    "id": 410,
                                    "name": "Lo-Ghekar Damodarkunda Rural Municipality"
                                },
                                {
                                    "id": 411,
                                    "name": "Lomanthang Rural Municipality"
                                },
                                {
                                    "id": 412,
                                    "name": "Thasang Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 39,
                            "name": "MYAGDI",
                            "municipalityList": [{
                                    "id": 413,
                                    "name": "Annapurna Rural Municipality"
                                },
                                {
                                    "id": 414,
                                    "name": "Beni Municipality"
                                },
                                {
                                    "id": 415,
                                    "name": "Dhawalagiri Rural Municipality"
                                },
                                {
                                    "id": 416,
                                    "name": "Malika Rural Municipality"
                                },
                                {
                                    "id": 417,
                                    "name": "Mangala Rural Municipality"
                                },
                                {
                                    "id": 418,
                                    "name": "Raghuganga Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 40,
                            "name": "KASKI",
                            "municipalityList": [{
                                    "id": 419,
                                    "name": "Annapurna Rural Municipality"
                                },
                                {
                                    "id": 420,
                                    "name": "Machhapuchchhre Rural Municipality"
                                },
                                {
                                    "id": 421,
                                    "name": "Madi Rural Municipality"
                                },
                                {
                                    "id": 422,
                                    "name": "Pokhara Lekhnath Maha Nagar Palika"
                                },
                                {
                                    "id": 423,
                                    "name": "Rupa Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 41,
                            "name": "LAMJUNG",
                            "municipalityList": [{
                                    "id": 424,
                                    "name": "Besishahar Municipality"
                                },
                                {
                                    "id": 425,
                                    "name": "Dordi Rural Municipality"
                                },
                                {
                                    "id": 426,
                                    "name": "Dudhpokhari Rural Municipality"
                                },
                                {
                                    "id": 427,
                                    "name": "Kwaholasothar Rural Municipality"
                                },
                                {
                                    "id": 428,
                                    "name": "Madhyanepal Municipality"
                                },
                                {
                                    "id": 429,
                                    "name": "Marsyangdi Rural Municipality"
                                },
                                {
                                    "id": 430,
                                    "name": "Sundarbazar Municipality"
                                },
                                {
                                    "id": 431,
                                    "name": "Ramgopalpur Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 42,
                            "name": "TANAHU",
                            "municipalityList": [{
                                    "id": 432,
                                    "name": "Bhanu Municipality"
                                },
                                {
                                    "id": 433,
                                    "name": "Bhimaad Municipality"
                                },
                                {
                                    "id": 434,
                                    "name": "Byas Municipality"
                                },
                                {
                                    "id": 435,
                                    "name": "Devghat Rural Municipality"
                                },
                                {
                                    "id": 436,
                                    "name": "Bandipur Rural Municipality"
                                },
                                {
                                    "id": 437,
                                    "name": "Ghiring Rural Municipality"
                                },
                                {
                                    "id": 438,
                                    "name": "Myagde Rural Municipality"
                                },
                                {
                                    "id": 439,
                                    "name": "Rishing Rural Municipality"
                                },
                                {
                                    "id": 440,
                                    "name": "Shuklagandaki Municipality"
                                },
                                {
                                    "id": 441,
                                    "name": "Ambu khaireni Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 43,
                            "name": "SYANGJA",
                            "municipalityList": [{
                                    "id": 442,
                                    "name": "Andhikhola Rural Municipality"
                                },
                                {
                                    "id": 443,
                                    "name": "Arjun Chupari Rural Municipality"
                                },
                                {
                                    "id": 444,
                                    "name": "Bhirkot Municipality"
                                },
                                {
                                    "id": 445,
                                    "name": "Biruwa Rural Municipality"
                                },
                                {
                                    "id": 446,
                                    "name": "Chapakot Municipality"
                                },
                                {
                                    "id": 447,
                                    "name": "Galyang Municipality"
                                },
                                {
                                    "id": 448,
                                    "name": "Harinas Rural Municipality"
                                },
                                {
                                    "id": 449,
                                    "name": "Phedikhola Rural Municipality"
                                },
                                {
                                    "id": 450,
                                    "name": "Putalibazar Municipality"
                                },
                                {
                                    "id": 451,
                                    "name": "Waling Municipality"
                                },
                                {
                                    "id": 452,
                                    "name": "Kaligandaki Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 44,
                            "name": "PARBAT",
                            "municipalityList": [{
                                    "id": 453,
                                    "name": "Bihadi Rural Municipality"
                                },
                                {
                                    "id": 454,
                                    "name": "Jaljala Rural Municipality"
                                },
                                {
                                    "id": 455,
                                    "name": "Kushma Municipality"
                                },
                                {
                                    "id": 456,
                                    "name": "Modi Rural Municipality"
                                },
                                {
                                    "id": 457,
                                    "name": "Paiyun Rural Municipality"
                                },
                                {
                                    "id": 458,
                                    "name": "Phalewas Municipality"
                                },
                                {
                                    "id": 459,
                                    "name": "Mahashila Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 45,
                            "name": "BAGLUNG",
                            "municipalityList": [{
                                    "id": 460,
                                    "name": "Baglung Municipality"
                                },
                                {
                                    "id": 461,
                                    "name": "Badigad Rural Municipality"
                                },
                                {
                                    "id": 462,
                                    "name": "Dhorpatan Municipality"
                                },
                                {
                                    "id": 463,
                                    "name": "Galkot Municipality"
                                },
                                {
                                    "id": 464,
                                    "name": "Jaimini Municipality"
                                },
                                {
                                    "id": 465,
                                    "name": "Kansini Rural Municipality"
                                },
                                {
                                    "id": 466,
                                    "name": "Nisikhola Rural Municipality"
                                },
                                {
                                    "id": 467,
                                    "name": "Taman Khola Rural Municipality"
                                },
                                {
                                    "id": 468,
                                    "name": "Tarakhola Rural Municipality"
                                },
                                {
                                    "id": 469,
                                    "name": "Bareng Rural Municipality"
                                }
                            ]
                        }
                    ]
                },
                {
                    "id": 5,
                    "name": "LUMBINI PROVINCE",
                    "districtList": [{
                            "id": 46,
                            "name": "NAWALPARASI EAST (BARDAGHAT PASCHIM)",
                            "municipalityList": [{
                                    "id": 470,
                                    "name": "Buligngata Rural Municipality"
                                },
                                {
                                    "id": 471,
                                    "name": "Devachuli Municipality"
                                },
                                {
                                    "id": 472,
                                    "name": "Gaidakot Municipality"
                                },
                                {
                                    "id": 473,
                                    "name": "Kawashoti Municipality"
                                },
                                {
                                    "id": 474,
                                    "name": "Madhyabindu Municipality"
                                },
                                {
                                    "id": 475,
                                    "name": "Hupsekot Rural Municipality"
                                },
                                {
                                    "id": 476,
                                    "name": "Binayi Tribeni Rural Municipality"
                                },
                                {
                                    "id": 477,
                                    "name": "Bungdikot Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 47,
                            "name": "PALPA",
                            "municipalityList": [{
                                    "id": 478,
                                    "name": "Baganaskali Rural Municipality"
                                },
                                {
                                    "id": 479,
                                    "name": "Bhojpur Rural Municipality"
                                },
                                {
                                    "id": 480,
                                    "name": "Mathagadhi Rural Municipality"
                                },
                                {
                                    "id": 481,
                                    "name": "Purbakhola Rural Municipality"
                                },
                                {
                                    "id": 482,
                                    "name": "Rambha Rural Municipality"
                                },
                                {
                                    "id": 483,
                                    "name": "Rainadevi Chhahara Rural Municipality"
                                },
                                {
                                    "id": 484,
                                    "name": "Rampur Municipality"
                                },
                                {
                                    "id": 485,
                                    "name": "Ribdikot Rural Municipality"
                                },
                                {
                                    "id": 486,
                                    "name": "Tansen Municipality"
                                },
                                {
                                    "id": 487,
                                    "name": "Tinau Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 48,
                            "name": "RUPANDEHI",
                            "municipalityList": [{
                                    "id": 488,
                                    "name": "Butwal Upa Maha Nagar Palika"
                                },
                                {
                                    "id": 489,
                                    "name": "Devdaha Municipality"
                                },
                                {
                                    "id": 490,
                                    "name": "Gaidadhawa Municipality"
                                },
                                {
                                    "id": 491,
                                    "name": "Lumbini Sanskritik Municipality"
                                },
                                {
                                    "id": 492,
                                    "name": "Madhav Narayan Municipality"
                                },
                                {
                                    "id": 493,
                                    "name": "Mayadevi Rural Municipality"
                                },
                                {
                                    "id": 494,
                                    "name": "Omsatiya Rural Municipality"
                                },
                                {
                                    "id": 495,
                                    "name": "Rohini Rural Municipality"
                                },
                                {
                                    "id": 496,
                                    "name": "Siddharthanagar Municipality"
                                },
                                {
                                    "id": 497,
                                    "name": "Siyari Rural Municipality"
                                },
                                {
                                    "id": 498,
                                    "name": "Sainamaina Municipality"
                                },
                                {
                                    "id": 499,
                                    "name": "Shuddhodhan Rural Municipality"
                                },
                                {
                                    "id": 500,
                                    "name": "Marchawari Rural Municipality"
                                },
                                {
                                    "id": 501,
                                    "name": "Kotahi Rural Municipality"
                                },
                                {
                                    "id": 502,
                                    "name": "Kanchan Rural Municipality"
                                },
                                {
                                    "id": 503,
                                    "name": "Tilottama Municipality"
                                }
                            ]
                        },
                        {
                            "id": 49,
                            "name": "KAPILVASTU",
                            "municipalityList": [{
                                    "id": 504,
                                    "name": "Kapilvastu Municipality"
                                },
                                {
                                    "id": 505,
                                    "name": "Buddhabhumi Municipality"
                                },
                                {
                                    "id": 506,
                                    "name": "Maharajgunj Municipality"
                                },
                                {
                                    "id": 507,
                                    "name": "Mayadevi Rural Municipality"
                                },
                                {
                                    "id": 508,
                                    "name": "Shuddhodhan Rural Municipality"
                                },
                                {
                                    "id": 509,
                                    "name": "Sivraj Municipality"
                                },
                                {
                                    "id": 510,
                                    "name": "Yasodhara Rural Municipality"
                                },
                                {
                                    "id": 511,
                                    "name": "Bijaynagar Rural Municipality"
                                },
                                {
                                    "id": 512,
                                    "name": "Banganga Municipality"
                                },
                                {
                                    "id": 513,
                                    "name": "Krishnanagar Municipality"
                                }
                            ]
                        },
                        {
                            "id": 50,
                            "name": "ARGHAKHANCHI",
                            "municipalityList": [{
                                    "id": 514,
                                    "name": "Bhumesthan Municipality"
                                },
                                {
                                    "id": 515,
                                    "name": "Chhatradev Rural Municipality"
                                },
                                {
                                    "id": 516,
                                    "name": "Paudera Rural Municipality"
                                },
                                {
                                    "id": 517,
                                    "name": "Panini Rural Municipality"
                                },
                                {
                                    "id": 518,
                                    "name": "Sandhikharka Municipality"
                                },
                                {
                                    "id": 519,
                                    "name": "Sitganga Municipality"
                                }
                            ]
                        },
                        {
                            "id": 51,
                            "name": "GULMI",
                            "municipalityList": [{
                                    "id": 520,
                                    "name": "Chhatrakot Rural Municipality"
                                },
                                {
                                    "id": 521,
                                    "name": "Dhurkot Rural Municipality"
                                },
                                {
                                    "id": 522,
                                    "name": "Gulmi Durbar Rural Municipality"
                                },
                                {
                                    "id": 523,
                                    "name": "Ishma Rural Municipality"
                                },
                                {
                                    "id": 524,
                                    "name": "Kaligandaki Rural Municipality"
                                },
                                {
                                    "id": 525,
                                    "name": "Madane Rural Municipality"
                                },
                                {
                                    "id": 526,
                                    "name": "Malika Rural Municipality"
                                },
                                {
                                    "id": 527,
                                    "name": "Musikot Municipality"
                                },
                                {
                                    "id": 528,
                                    "name": "Resunga Municipality"
                                },
                                {
                                    "id": 529,
                                    "name": "Satyawati Rural Municipality"
                                },
                                {
                                    "id": 530,
                                    "name": "Chandrakot Rural Municipality"
                                },
                                {
                                    "id": 531,
                                    "name": "Rurukshree Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 52,
                            "name": "PARSA",
                            "municipalityList": [{
                                    "id": 532,
                                    "name": "Bardaghat Municipality"
                                },
                                {
                                    "id": 533,
                                    "name": "Palhinandan Rural Municipality"
                                },
                                {
                                    "id": 534,
                                    "name": "Pratapapur Rural Municipality"
                                },
                                {
                                    "id": 535,
                                    "name": "Ramgram Municipality"
                                },
                                {
                                    "id": 536,
                                    "name": "Sarawal Rural Municipality"
                                },
                                {
                                    "id": 537,
                                    "name": "Sunawal Municipality"
                                },
                                {
                                    "id": 538,
                                    "name": "Susta Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 53,
                            "name": "BANKET",
                            "municipalityList": [{
                                    "id": 539,
                                    "name": "Baijanath Rural Municipality"
                                },
                                {
                                    "id": 540,
                                    "name": "Khajura Rural Municipality"
                                },
                                {
                                    "id": 541,
                                    "name": "Kohalpur Municipality"
                                },
                                {
                                    "id": 542,
                                    "name": "Narainapur Rural Municipality"
                                },
                                {
                                    "id": 543,
                                    "name": "Nepalgunj Upamaha Municipality"
                                },
                                {
                                    "id": 544,
                                    "name": "Rapti Sonari Rural Municipality"
                                },
                                {
                                    "id": 545,
                                    "name": "Duduwa Rural Municipality"
                                },
                                {
                                    "id": 546,
                                    "name": "Janaki Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 54,
                            "name": "BARDIYA",
                            "municipalityList": [{
                                    "id": 547,
                                    "name": "Badhaiyatal Rural Municipality"
                                },
                                {
                                    "id": 548,
                                    "name": "Bansagadhi Municipality"
                                },
                                {
                                    "id": 549,
                                    "name": "Barbardiya Municipality"
                                },
                                {
                                    "id": 550,
                                    "name": "Geruwa Rural Municipality"
                                },
                                {
                                    "id": 551,
                                    "name": "Gulariya Municipality"
                                },
                                {
                                    "id": 552,
                                    "name": "Madhuwan Municipality"
                                },
                                {
                                    "id": 553,
                                    "name": "Rajapur Municipality"
                                },
                                {
                                    "id": 554,
                                    "name": "Thakurbaba Municipality"
                                }
                            ]
                        },
                        {
                            "id": 55,
                            "name": "DANG",
                            "municipalityList": [{
                                    "id": 555,
                                    "name": "Banglachuli Rural Municipality"
                                },
                                {
                                    "id": 556,
                                    "name": "Ghorahi Upa Maha Nagar Palika"
                                },
                                {
                                    "id": 557,
                                    "name": "Dangisharan Rural Municipality"
                                },
                                {
                                    "id": 558,
                                    "name": "Gadawa Rural Municipality"
                                },
                                {
                                    "id": 559,
                                    "name": "Lamahi Municipality"
                                },
                                {
                                    "id": 560,
                                    "name": "Rapti Rural Municipality"
                                },
                                {
                                    "id": 561,
                                    "name": "Shantinagar Rural Municipality"
                                },
                                {
                                    "id": 562,
                                    "name": "Tulsipur Upamaha Nagar Palika"
                                },
                                {
                                    "id": 563,
                                    "name": "Babai Rural Municipality"
                                },
                                {
                                    "id": 564,
                                    "name": "Rajpur Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 56,
                            "name": "PYUTHAN",
                            "municipalityList": [{
                                    "id": 565,
                                    "name": "Gaumukhi Rural Municipality"
                                },
                                {
                                    "id": 566,
                                    "name": "Jhimruk Rural Municipality"
                                },
                                {
                                    "id": 567,
                                    "name": "Mallarani Rural Municipality"
                                },
                                {
                                    "id": 568,
                                    "name": "Marjhine Rural Municipality"
                                },
                                {
                                    "id": 569,
                                    "name": "Naubahini Rural Municipality"
                                },
                                {
                                    "id": 570,
                                    "name": "Pyuthan Municipality"
                                },
                                {
                                    "id": 571,
                                    "name": "Swargadwari Municipality"
                                },
                                {
                                    "id": 572,
                                    "name": "Ayirabati Rural Municipality"
                                },
                                {
                                    "id": 573,
                                    "name": "Sarumarani Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 57,
                            "name": "ROLPA",
                            "municipalityList": [{
                                    "id": 574,
                                    "name": "Gangadev Rural Municipality"
                                },
                                {
                                    "id": 575,
                                    "name": "Lungri Rural Municipality"
                                },
                                {
                                    "id": 576,
                                    "name": "Maadi Rural Municipality"
                                },
                                {
                                    "id": 577,
                                    "name": "Paribartan Rural Municipality"
                                },
                                {
                                    "id": 578,
                                    "name": "Rolpa Municipality"
                                },
                                {
                                    "id": 579,
                                    "name": "Sunilsmrati Rural Municipality"
                                },
                                {
                                    "id": 580,
                                    "name": "Thawang Rural Municipality"
                                },
                                {
                                    "id": 581,
                                    "name": "Trimohani Rural Municipality"
                                },
                                {
                                    "id": 582,
                                    "name": "Sunchhahari Rural Municipality"
                                },
                                {
                                    "id": 583,
                                    "name": "Lukla Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 58,
                            "name": "RUKUM EAST",
                            "municipalityList": [{
                                    "id": 584,
                                    "name": "Bhume Rural Municipality"
                                },
                                {
                                    "id": 585,
                                    "name": "Putha Uttarganga Rural Municipality"
                                },
                                {
                                    "id": 586,
                                    "name": "Sisne Rural Municipality"
                                }
                            ]
                        }
                    ]
                },
                {
                    "id": 6,
                    "name": "KARNALI PROVINCE",
                    "districtList": [{
                            "id": 59,
                            "name": "WEST RUKUM",
                            "municipalityList": [{
                                    "id": 587,
                                    "name": "Aathbiskot Municipality"
                                },
                                {
                                    "id": 588,
                                    "name": "Banfikot Rural Municipality"
                                },
                                {
                                    "id": 589,
                                    "name": "Chaurjahari Municipality"
                                },
                                {
                                    "id": 590,
                                    "name": "Musikot Municipality"
                                },
                                {
                                    "id": 591,
                                    "name": "Tribeni Rural Municipality"
                                },
                                {
                                    "id": 592,
                                    "name": "Sani Bheri Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 60,
                            "name": "SULYAN",
                            "municipalityList": [{
                                    "id": 593,
                                    "name": "Chhedagad Municipality"
                                },
                                {
                                    "id": 594,
                                    "name": "Dharmagar Rural Municipality"
                                },
                                {
                                    "id": 595,
                                    "name": "Kali Nadi Rural Municipality"
                                },
                                {
                                    "id": 596,
                                    "name": "Kumakhmalika Rural Municipality"
                                },
                                {
                                    "id": 597,
                                    "name": "Sharada Municipality"
                                },
                                {
                                    "id": 598,
                                    "name": "Kapurekot Rural Municipality"
                                },
                                {
                                    "id": 599,
                                    "name": "Tribeni Rural Municipality"
                                },
                                {
                                    "id": 600,
                                    "name": "Bagchaur Municipality"
                                },
                                {
                                    "id": 601,
                                    "name": "Darma Rural Municipality"
                                },
                                {
                                    "id": 602,
                                    "name": "Kumakhamalika Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 61,
                            "name": "DAILEKH",
                            "municipalityList": [{
                                    "id": 603,
                                    "name": "Aathbis Municipality"
                                },
                                {
                                    "id": 604,
                                    "name": "Bhagawatimai Rural Municipality"
                                },
                                {
                                    "id": 605,
                                    "name": "Bheriganga Municipality"
                                },
                                {
                                    "id": 606,
                                    "name": "Chamunda Bindrasaini Municipality"
                                },
                                {
                                    "id": 607,
                                    "name": "Dullu Municipality"
                                },
                                {
                                    "id": 608,
                                    "name": "Dungeshwar Rural Municipality"
                                },
                                {
                                    "id": 609,
                                    "name": "Gurans Rural Municipality"
                                },
                                {
                                    "id": 610,
                                    "name": "Mahabu Rural Municipality"
                                },
                                {
                                    "id": 611,
                                    "name": "Naumule Rural Municipality"
                                },
                                {
                                    "id": 612,
                                    "name": "Thantikandh Rural Municipality"
                                },
                                {
                                    "id": 613,
                                    "name": "Narayan Municipality"
                                }
                            ]
                        },
                        {
                            "id": 62,
                            "name": "JAJARKOT",
                            "municipalityList": [{
                                    "id": 614,
                                    "name": "Bheri Municipality"
                                },
                                {
                                    "id": 615,
                                    "name": "Chhedagad Municipality"
                                },
                                {
                                    "id": 616,
                                    "name": "Junichande Rural Municipality"
                                },
                                {
                                    "id": 617,
                                    "name": "Kuse Rural Municipality"
                                },
                                {
                                    "id": 618,
                                    "name": "Shivalaya Rural Municipality"
                                },
                                {
                                    "id": 619,
                                    "name": "Tribeni Nalgad Municipality"
                                },
                                {
                                    "id": 620,
                                    "name": "Barekot Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 63,
                            "name": "DOLPA",
                            "municipalityList": [{
                                    "id": 621,
                                    "name": "Chharka Tangsong Rural Municipality"
                                },
                                {
                                    "id": 622,
                                    "name": "Dolpo Buddha Rural Municipality"
                                },
                                {
                                    "id": 623,
                                    "name": "Jagadulla Rural Municipality"
                                },
                                {
                                    "id": 624,
                                    "name": "Kaike Rural Municipality"
                                },
                                {
                                    "id": 625,
                                    "name": "Mudkechula Rural Municipality"
                                },
                                {
                                    "id": 626,
                                    "name": "Shey Phoksundo Rural Municipality"
                                },
                                {
                                    "id": 627,
                                    "name": "Thulibheri Municipality"
                                },
                                {
                                    "id": 628,
                                    "name": "Tripurasundari Municipality"
                                }
                            ]
                        },
                        {
                            "id": 64,
                            "name": "JUMLA",
                            "municipalityList": [{
                                    "id": 629,
                                    "name": "Chandannath Municipality"
                                },
                                {
                                    "id": 630,
                                    "name": "Guthichaur Rural Municipality"
                                },
                                {
                                    "id": 631,
                                    "name": "Kanaka Sundari Rural Municipality"
                                },
                                {
                                    "id": 632,
                                    "name": "Patarsi Rural Municipality"
                                },
                                {
                                    "id": 633,
                                    "name": "Sinja Rural Municipality"
                                },
                                {
                                    "id": 634,
                                    "name": "Tatopani Rural Municipality"
                                },
                                {
                                    "id": 635,
                                    "name": "Thalung Rural Municipality"
                                },
                                {
                                    "id": 636,
                                    "name": "Hima Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 65,
                            "name": "MUGU",
                            "municipalityList": [{
                                    "id": 637,
                                    "name": "Gamgadhi Rural Municipality"
                                },
                                {
                                    "id": 638,
                                    "name": "Chhayanath Rara Municipality"
                                },
                                {
                                    "id": 639,
                                    "name": "Mugum Karmarong Rural Municipality"
                                },
                                {
                                    "id": 640,
                                    "name": "Soru Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 66,
                            "name": "KALIKOT",
                            "municipalityList": [{
                                    "id": 641,
                                    "name": "Khandachakra Municipality"
                                },
                                {
                                    "id": 642,
                                    "name": "Narharinath Rural Municipality"
                                },
                                {
                                    "id": 643,
                                    "name": "Pachaljharana Rural Municipality"
                                },
                                {
                                    "id": 644,
                                    "name": "Raskot Municipality"
                                },
                                {
                                    "id": 645,
                                    "name": "Sanbhu Rural Municipality"
                                },
                                {
                                    "id": 646,
                                    "name": "Tilagufa Municipality"
                                },
                                {
                                    "id": 647,
                                    "name": "Mahawai Rural Municipality"
                                },
                                {
                                    "id": 648,
                                    "name": "Palata Rural Municipality"
                                },
                                {
                                    "id": 649,
                                    "name": "Sanni Triveni Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 67,
                            "name": "HUMLA",
                            "municipalityList": [{
                                    "id": 650,
                                    "name": "Adanchuli Rural Municipality"
                                },
                                {
                                    "id": 651,
                                    "name": "Chankheli Rural Municipality"
                                },
                                {
                                    "id": 652,
                                    "name": "Kharpunath Rural Municipality"
                                },
                                {
                                    "id": 653,
                                    "name": "Namkha Rural Municipality"
                                },
                                {
                                    "id": 654,
                                    "name": "Sarkegad Rural Municipality"
                                },
                                {
                                    "id": 655,
                                    "name": "Simkot Rural Municipality"
                                },
                                {
                                    "id": 656,
                                    "name": "Tajakot Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 68,
                            "name": "SURKHET",
                            "municipalityList": [{
                                    "id": 657,
                                    "name": "Bheriganga Municipality"
                                },
                                {
                                    "id": 658,
                                    "name": "Birendranagar Upa Maha Nagar Palika"
                                },
                                {
                                    "id": 659,
                                    "name": "Chingad Rural Municipality"
                                },
                                {
                                    "id": 660,
                                    "name": "Gurbhakot Municipality"
                                },
                                {
                                    "id": 661,
                                    "name": "Lekbesi Municipality"
                                },
                                {
                                    "id": 662,
                                    "name": "Panchapuri Municipality"
                                },
                                {
                                    "id": 663,
                                    "name": "Barahatal Rural Municipality"
                                },
                                {
                                    "id": 664,
                                    "name": "Simta Rural Municipality"
                                },
                                {
                                    "id": 665,
                                    "name": "Chaukune Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 69,
                            "name": "SALYAN",
                            "municipalityList": [{
                                    "id": 666,
                                    "name": "Bagchaur Municipality"
                                },
                                {
                                    "id": 667,
                                    "name": "Darma Rural Municipality"
                                },
                                {
                                    "id": 668,
                                    "name": "Kalimati Rural Municipality"
                                },
                                {
                                    "id": 669,
                                    "name": "Kumakhmalika Rural Municipality"
                                },
                                {
                                    "id": 670,
                                    "name": "Kapurchaur Rural Municipality"
                                },
                                {
                                    "id": 671,
                                    "name": "Sarada Municipality"
                                },
                                {
                                    "id": 672,
                                    "name": "Sharada Municipality"
                                },
                                {
                                    "id": 673,
                                    "name": "Siddhakumakh Rural Municipality"
                                },
                                {
                                    "id": 674,
                                    "name": "Tribeni Rural Municipality"
                                },
                                {
                                    "id": 675,
                                    "name": "Kumakhamalika Rural Municipality"
                                }
                            ]
                        }
                    ]
                },
                {
                    "id": 7,
                    "name": "SUDURPASCHIM PROVINCE",
                    "districtList": [{
                            "id": 70,
                            "name": "BAJHANG",
                            "municipalityList": [{
                                    "id": 676,
                                    "name": "Bithadchir Rural Municipality"
                                },
                                {
                                    "id": 677,
                                    "name": "Bungal Rural Municipality"
                                },
                                {
                                    "id": 678,
                                    "name": "Chhabispathibhera Rural Municipality"
                                },
                                {
                                    "id": 679,
                                    "name": "Durgathali Rural Municipality"
                                },
                                {
                                    "id": 680,
                                    "name": "Jayaprithvi Municipality"
                                },
                                {
                                    "id": 681,
                                    "name": "Kedarsyu Rural Municipality"
                                },
                                {
                                    "id": 682,
                                    "name": "Masta Rural Municipality"
                                },
                                {
                                    "id": 683,
                                    "name": "Saipal Rural Municipality"
                                },
                                {
                                    "id": 684,
                                    "name": "Talakot Rural Municipality"
                                },
                                {
                                    "id": 685,
                                    "name": "Thalara Rural Municipality"
                                },
                                {
                                    "id": 686,
                                    "name": "Durga Rural Municipality"
                                },
                                {
                                    "id": 687,
                                    "name": "Budhiganga Municipality"
                                },
                                {
                                    "id": 688,
                                    "name": "Budhinanda Municipality"
                                }
                            ]
                        },
                        {
                            "id": 71,
                            "name": "BAITADI",
                            "municipalityList": [{
                                    "id": 689,
                                    "name": "Dasharathchand Municipality"
                                },
                                {
                                    "id": 690,
                                    "name": "Dilasaini Rural Municipality"
                                },
                                {
                                    "id": 691,
                                    "name": "Dogadakedar Rural Municipality"
                                },
                                {
                                    "id": 692,
                                    "name": "Melauli Municipality"
                                },
                                {
                                    "id": 693,
                                    "name": "Pancheshwor Rural Municipality"
                                },
                                {
                                    "id": 694,
                                    "name": "Patan Municipality"
                                },
                                {
                                    "id": 695,
                                    "name": "Purchaudi Municipality"
                                },
                                {
                                    "id": 696,
                                    "name": "Surnaya Rural Municipality"
                                },
                                {
                                    "id": 697,
                                    "name": "Sigas Rural Municipality"
                                },
                                {
                                    "id": 698,
                                    "name": "Shivaling Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 72,
                            "name": "ACHHAM",
                            "municipalityList": [{
                                    "id": 699,
                                    "name": "Chaurpati Rural Municipality"
                                },
                                {
                                    "id": 700,
                                    "name": "Dhakari Rural Municipality"
                                },
                                {
                                    "id": 701,
                                    "name": "Kamalbazar Municipality"
                                },
                                {
                                    "id": 702,
                                    "name": "Mangalsen Municipality"
                                },
                                {
                                    "id": 703,
                                    "name": "Panchdeval Binayak Municipality"
                                },
                                {
                                    "id": 704,
                                    "name": "Ramaroshan Rural Municipality"
                                },
                                {
                                    "id": 705,
                                    "name": "Sanfebagar Municipality"
                                },
                                {
                                    "id": 706,
                                    "name": "Turmakhand Rural Municipality"
                                },
                                {
                                    "id": 707,
                                    "name": "Mellekh Rural Municipality"
                                },
                                {
                                    "id": 708,
                                    "name": "Dhugachaur Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 73,
                            "name": "DARCHULA",
                            "municipalityList": [{
                                    "id": 709,
                                    "name": "Apihimal Rural Municipality"
                                },
                                {
                                    "id": 710,
                                    "name": "Byas Rural Municipality"
                                },
                                {
                                    "id": 711,
                                    "name": "Darchula Municipality"
                                },
                                {
                                    "id": 712,
                                    "name": "Dunhu Rural Municipality"
                                },
                                {
                                    "id": 713,
                                    "name": "Lekam Rural Municipality"
                                },
                                {
                                    "id": 714,
                                    "name": "Malikarjun Rural Municipality"
                                },
                                {
                                    "id": 715,
                                    "name": "Naugad Rural Municipality"
                                },
                                {
                                    "id": 716,
                                    "name": "Shailyashikhar Municipality"
                                },
                                {
                                    "id": 717,
                                    "name": "Mahakali Municipality"
                                }
                            ]
                        },
                        {
                            "id": 74,
                            "name": "BAJURA",
                            "municipalityList": [{
                                    "id": 718,
                                    "name": "Badimalika Municipality"
                                },
                                {
                                    "id": 719,
                                    "name": "Budhinanda Municipality"
                                },
                                {
                                    "id": 720,
                                    "name": "Budhiganga Municipality"
                                },
                                {
                                    "id": 721,
                                    "name": "Chhededaha Rural Municipality"
                                },
                                {
                                    "id": 722,
                                    "name": "Gaumul Rural Municipality"
                                },
                                {
                                    "id": 723,
                                    "name": "Himali Rural Municipality"
                                },
                                {
                                    "id": 724,
                                    "name": "Jagannath Rural Municipality"
                                },
                                {
                                    "id": 725,
                                    "name": "Khaptad Chhededaha Rural Municipality"
                                },
                                {
                                    "id": 726,
                                    "name": "Triveni Municipality"
                                }
                            ]
                        },
                        {
                            "id": 75,
                            "name": "KANCHANPUR",
                            "municipalityList": [{
                                    "id": 727,
                                    "name": "Bedkot Municipality"
                                },
                                {
                                    "id": 728,
                                    "name": "Belauri Municipality"
                                },
                                {
                                    "id": 729,
                                    "name": "Beldandi Rural Municipality"
                                },
                                {
                                    "id": 730,
                                    "name": "Bhimdatta Municipality"
                                },
                                {
                                    "id": 731,
                                    "name": "Krishnapur Municipality"
                                },
                                {
                                    "id": 732,
                                    "name": "Laljhadi Rural Municipality"
                                },
                                {
                                    "id": 733,
                                    "name": "Punarbas Municipality"
                                },
                                {
                                    "id": 734,
                                    "name": "Shuklaphanta Municipality"
                                },
                                {
                                    "id": 735,
                                    "name": "Mahakali Municipality"
                                }
                            ]
                        },
                        {
                            "id": 76,
                            "name": "DOTI",
                            "municipalityList": [{
                                    "id": 736,
                                    "name": "Adarsha Rural Municipality"
                                },
                                {
                                    "id": 737,
                                    "name": "Badikedar Rural Municipality"
                                },
                                {
                                    "id": 738,
                                    "name": "Bogtan Rural Municipality"
                                },
                                {
                                    "id": 739,
                                    "name": "Dipayal Silgadhi Municipality"
                                },
                                {
                                    "id": 740,
                                    "name": "Purbichauki Rural Municipality"
                                },
                                {
                                    "id": 741,
                                    "name": "Sayal Rural Municipality"
                                },
                                {
                                    "id": 742,
                                    "name": "Shikhar Municipality"
                                },
                                {
                                    "id": 743,
                                    "name": "Jorayal Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 77,
                            "name": "KAILALI",
                            "municipalityList": [{
                                    "id": 744,
                                    "name": "Bhajani Municipality"
                                },
                                {
                                    "id": 745,
                                    "name": "Gauriganga Municipality"
                                },
                                {
                                    "id": 746,
                                    "name": "Godawari Municipality"
                                },
                                {
                                    "id": 747,
                                    "name": "Janaki Rural Municipality"
                                },
                                {
                                    "id": 748,
                                    "name": "Joshipur Rural Municipality"
                                },
                                {
                                    "id": 749,
                                    "name": "Lamkichuha Municipality"
                                },
                                {
                                    "id": 750,
                                    "name": "Mohanyal Rural Municipality"
                                },
                                {
                                    "id": 751,
                                    "name": "Bardagoriya Rural Municipality"
                                },
                                {
                                    "id": 752,
                                    "name": "Dhangadhi Upamaha Nagar Palika"
                                },
                                {
                                    "id": 753,
                                    "name": "Tikapur Municipality"
                                },
                                {
                                    "id": 754,
                                    "name": "Ghodaghodi Municipality"
                                },
                                {
                                    "id": 755,
                                    "name": "Kailari Rural Municipality"
                                }
                            ]
                        },
                        {
                            "id": 78,
                            "name": "DADELDHURA",
                            "municipalityList": [{
                                    "id": 756,
                                    "name": "Alital Rural Municipality"
                                },
                                {
                                    "id": 757,
                                    "name": "Bhageshwor Rural Municipality"
                                },
                                {
                                    "id": 758,
                                    "name": "Ganyapdhura Rural Municipality"
                                },
                                {
                                    "id": 759,
                                    "name": "Navadurga Rural Municipality"
                                },
                                {
                                    "id": 760,
                                    "name": "Parashuram Municipality"
                                },
                                {
                                    "id": 761,
                                    "name": "Ajayameru Rural Municipality"
                                },
                                {
                                    "id": 762,
                                    "name": "Amargadhi Municipality"
                                }
                            ]
                        }
                    ]
                }
            ]
        };


        function showStep(step) {
            formSections.forEach((section, index) => {
                const isActiveStep = (index + 1) === step;
                section.classList.remove('active');

                if (isActiveStep) {
                    section.classList.add('active');
                    // When a step becomes active, enable its required fields
                    section.querySelectorAll('[data-original-required]').forEach(field => {
                        // Special handling for radio buttons where the group is required, not each individual radio
                        if (field.type === 'radio' && field.name === 'worked_in_nepal') {
                            // Ensure at least one radio in the group is 'required' on the active step
                            // Only set required on the radio button that is checked or the first one in the group
                            // if no radio is checked in the group
                            if (field.checked || !document.querySelector(
                                    `input[name="${field.name}"]:checked`)) {
                                field.setAttribute('required', 'true');
                            }
                        } else if (field.type === 'radio' && field.name === 'been_abroad') {
                            if (field.checked || !document.querySelector(
                                    `input[name="${field.name}"]:checked`)) {
                                field.setAttribute('required', 'true');
                            }
                        } else if (field.type === 'radio' && field.name === 'applied_before') {
                            if (field.checked || !document.querySelector(
                                    `input[name="${field.name}"]:checked`)) {
                                field.setAttribute('required', 'true');
                            }
                        } else if (field.type === 'radio' && field.name === 'hear_about_us') {
                            if (field.checked || !document.querySelector(
                                    `input[name="${field.name}"]:checked`)) {
                                field.setAttribute('required', 'true');
                            }
                        } else if (field.type !== 'file') { // Do not set 'required' on file inputs
                            field.setAttribute('required', 'true');
                        }
                    });

                    // Re-apply conditional required for spouse_name if marital_status is already married and step 1 is active
                    if (step === 1 && maritalStatus.value === 'married') {
                        spouseNameField.querySelector('input').setAttribute('required', 'true');
                    }
                    // Re-apply conditional required for other_language if lang_other is already checked and step 3 is active
                    if (step === 3 && langOtherCheckbox.checked) {
                        otherLanguageField.querySelector('input').setAttribute('required', 'true');
                    }
                    // Re-apply conditional required for nepal/abroad/previous application experience if relevant radio is checked and step 4 is active
                    if (step === 4) {
                        if (workedInNepalYes.checked) {
                            nepalWorkExperienceFields.querySelectorAll('input, select').forEach(field => {
                                if (field.id !== 'nepalWorkCertUpload') { // Exclude file input
                                    field.setAttribute('required', 'true');
                                }
                            });
                        }
                        if (beenAbroadYes.checked) {
                            abroadExperienceFields.querySelectorAll('input, select').forEach(field => {
                                if (field.id !== 'abroadWorkCertUpload') { // Exclude file input
                                    field.setAttribute('required', 'true');
                                }
                            });
                        }
                        if (appliedBeforeYes.checked) {
                            previousApplicationFields.querySelectorAll('input, select').forEach(field => field
                                .setAttribute('required', 'true'));
                        }
                        if (hearOtherSourceRadio.checked) {
                            otherSourceField.querySelector('input').setAttribute('required', 'true');
                        }
                    }

                } else {
                    // When a step becomes inactive, remove required from all its fields
                    section.querySelectorAll('[required]').forEach(field => {
                        field.removeAttribute('required');
                    });
                }
            });

            stepIndicators.forEach((indicator, index) => {
                indicator.classList.remove('active', 'completed');
                if (index + 1 < step) {
                    indicator.classList.add('completed');
                } else if (index + 1 === step) {
                    indicator.classList.add('active');
                }
            });

            if (step === 1) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'block';
            }

            if (step === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'block';
            } else {
                nextBtn.style.display = 'block';
                submitBtn.style.display = 'none';
            }
        }

        function validateStep(step) {
            let isValid = true;
            const currentSection = document.getElementById(`step${step}`);
            // Select only currently visible and required fields
            const requiredFields = currentSection.querySelectorAll('[required]:not([style*="display: none"] *)');

            requiredFields.forEach(field => {
                // For radio button groups, check if at least one in the group is checked
                if (field.type === 'radio') {
                    const radioGroup = document.querySelectorAll(`input[name="${field.name}"]`);
                    const isAnyRadioChecked = Array.from(radioGroup).some(radio => radio.checked);
                    if (!isAnyRadioChecked) {
                        isValid = false;
                        // Add is-invalid class to all radios in the group for visual feedback
                        radioGroup.forEach(radio => radio.classList.add('is-invalid'));
                    } else {
                        radioGroup.forEach(radio => radio.classList.remove('is-invalid'));
                    }
                } else if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            // Specific validation for date of birth format (YYYY-MM-DD)
            if (step === 1) {
                const dobInput = document.getElementById('dob');
                const dobValue = dobInput.value;
                const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                if (dobInput.hasAttribute('required') && dobValue && !dateRegex.test(dobValue)) {
                    dobInput.classList.add('is-invalid');
                    isValid = false;
                }
            }

            // File upload validation
            const fileInputs = currentSection.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                // Only validate if a file has been selected
                if (input.files.length > 0) {
                    const file = input.files[0];
                    const maxFileSize = 200 * 1024; // 200 KB in bytes
                    const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
                    const feedbackElement = document.getElementById(`${input.id}-feedback`);

                    // Remove previous invalid states
                    input.classList.remove('is-invalid');
                    if (feedbackElement) {
                        feedbackElement.textContent = '';
                    }

                    if (file.size > maxFileSize) {
                        input.classList.add('is-invalid');
                        if (feedbackElement) {
                            feedbackElement.textContent = 'File size must be max 200KB.';
                        }
                        isValid = false;
                    } else if (!allowedTypes.includes(file.type)) {
                        input.classList.add('is-invalid');
                        if (feedbackElement) {
                            feedbackElement.textContent = 'Only JPEG, PNG, JPG, and PDF files are allowed.';
                        }
                        isValid = false;
                    }
                }
            });

            return isValid;
        }

        nextBtn.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            } else {
                // If validation fails, focus on the first invalid field in the current step
                const currentSection = document.getElementById(`step${currentStep}`);
                const firstInvalidField = currentSection.querySelector('.is-invalid');
                if (firstInvalidField) {
                    firstInvalidField.focus();
                }
                // No alert needed, as Bootstrap's invalid-feedback is visual.
                // However, for debugging or explicit user feedback, you might add a small toast/modal
            }
        });

        prevBtn.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });

        // The form submission is now handled by Laravel, so this JS part will be replaced by server-side handling
        // multiStepForm.addEventListener('submit', (event) => {
        //     event.preventDefault();
        //     if (validateStep(totalSteps)) {
        //         alert('Form submitted successfully!');
        //         const formData = new FormData(multiStepForm);
        //         const data = {};
        //         for (let [key, value] of formData.entries()) {
        //             data[key] = value;
        //         }
        //         console.log(data);
        //     } else {
        //         alert('Please fill in all required fields before submitting.');
        //     }
        // });


        // Dynamic fields visibility and logic
        const maritalStatus = document.getElementById('maritalStatus');
        const spouseNameField = document.getElementById('spouseNameField');
        // Initial check for spouse name field visibility on page load
        if (oldMaritalStatus === 'married') {
            spouseNameField.style.display = 'block';
            if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                spouseNameField.querySelector('input').setAttribute('required', 'true');
            }
        }
        maritalStatus.addEventListener('change', () => {
            if (maritalStatus.value === 'married') {
                spouseNameField.style.display = 'block';
                if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                    spouseNameField.querySelector('input').setAttribute('required', 'true');
                }
            } else {
                spouseNameField.style.display = 'none';
                spouseNameField.querySelector('input').removeAttribute('required');
                spouseNameField.querySelector('input').value = ''; // Clear value if hidden
            }
        });

        const dobInput = document.getElementById('dob');
        const ageDisplay = document.getElementById('ageDisplay');
        dobInput.addEventListener('change', () => {
            const birthDate = new Date(dobInput.value);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            ageDisplay.textContent = age >= 0 ? age : 'Invalid Date';
        });

        const copyMobileNoCheckbox = document.getElementById('copyMobileNo');
        const mobileNoInput = document.getElementById('mobileNo');
        const whatsAppNoInput = document.getElementById('whatsAppNo');
        copyMobileNoCheckbox.addEventListener('change', () => {
            if (copyMobileNoCheckbox.checked) {
                whatsAppNoInput.value = mobileNoInput.value;
                whatsAppNoInput.setAttribute('readonly', 'true');
            } else {
                whatsAppNoInput.removeAttribute('readonly');
                whatsAppNoInput.value = '';
            }
        });

        // Language Known - Other
        const langOtherCheckbox = document.getElementById('langOther');
        const otherLanguageField = document.getElementById('otherLanguageField');
        // Initial check for other language field visibility on page load
        if (oldLangOther) { // Check if oldLangOther is truthy (meaning it was checked)
            otherLanguageField.style.display = 'block';
            if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                otherLanguageField.querySelector('input').setAttribute('required', 'true');
            }
        }
        langOtherCheckbox.addEventListener('change', () => { // Listen to the checkbox directly
            if (langOtherCheckbox.checked) {
                otherLanguageField.style.display = 'block';
                if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                    otherLanguageField.querySelector('input').setAttribute('required', 'true');
                }
            } else {
                otherLanguageField.style.display = 'none';
                otherLanguageField.querySelector('input').removeAttribute('required');
                otherLanguageField.querySelector('input').value = '';
            }
        });


        // Work in Nepal radio buttons
        const workedInNepalYes = document.getElementById('workedInNepalYes');
        const workedInNepalNo = document.getElementById('workedInNepalNo');
        const nepalWorkExperienceFields = document.getElementById('nepalWorkExperienceFields');

        function toggleNepalWorkExperienceFields() {
            if (workedInNepalYes.checked) {
                nepalWorkExperienceFields.style.display = 'flex';
                if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                    nepalWorkExperienceFields.querySelectorAll('input, select').forEach(field => {
                        if (field.id !== 'nepalWorkCertUpload') { // Exclude file input from required attribute
                            field.setAttribute('required', 'true');
                        }
                    });
                }
            } else {
                nepalWorkExperienceFields.style.display = 'none';
                nepalWorkExperienceFields.querySelectorAll('input, select').forEach(field => {
                    field.removeAttribute('required');
                    field.value = ''; // Clear values when hidden
                });
            }
        }
        workedInNepalYes.addEventListener('change', toggleNepalWorkExperienceFields);
        workedInNepalNo.addEventListener('change', toggleNepalWorkExperienceFields);
        // Initial call, using the oldWorkedInNepal value
        if (oldWorkedInNepal === 'yes') {
            workedInNepalYes.checked = true;
        } else if (oldWorkedInNepal === 'no') {
            workedInNepalNo.checked = true;
        }
        toggleNepalWorkExperienceFields();


        // Been Abroad radio buttons
        const beenAbroadYes = document.getElementById('beenAbroadYes');
        const beenAbroadNo = document.getElementById('beenAbroadNo');
        const abroadExperienceFields = document.getElementById('abroadExperienceFields');

        function toggleAbroadExperienceFields() {
            if (beenAbroadYes.checked) {
                abroadExperienceFields.style.display = 'flex';
                if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                    abroadExperienceFields.querySelectorAll('input, select').forEach(field => {
                        if (field.id !== 'abroadWorkCertUpload') { // Exclude file input from required attribute
                            field.setAttribute('required', 'true');
                        }
                    });
                }
            } else {
                abroadExperienceFields.style.display = 'none';
                abroadExperienceFields.querySelectorAll('input, select').forEach(field => {
                    field.removeAttribute('required');
                    field.value = ''; // Clear values when hidden
                });
            }
        }
        beenAbroadYes.addEventListener('change', toggleAbroadExperienceFields);
        beenAbroadNo.addEventListener('change', toggleAbroadExperienceFields);
        // Initial call, using the oldBeenAbroad value
        if (oldBeenAbroad === 'yes') {
            beenAbroadYes.checked = true;
        } else if (oldBeenAbroad === 'no') {
            beenAbroadNo.checked = true;
        }
        toggleAbroadExperienceFields();


        // Applied Europe or Other Country before radio buttons
        const appliedBeforeYes = document.getElementById('appliedBeforeYes');
        const appliedBeforeNo = document.getElementById('appliedBeforeNo');
        const previousApplicationFields = document.getElementById('previousApplicationFields');

        function togglePreviousApplicationFields() {
            if (appliedBeforeYes.checked) {
                previousApplicationFields.style.display = 'flex';
                if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                    previousApplicationFields.querySelectorAll('input, select').forEach(field => field.setAttribute(
                        'required', 'true'));
                }
            } else {
                previousApplicationFields.style.display = 'none';
                previousApplicationFields.querySelectorAll('input, select').forEach(field => {
                    field.removeAttribute('required');
                    field.value = ''; // Clear values when hidden
                });
            }
        }
        appliedBeforeYes.addEventListener('change', togglePreviousApplicationFields);
        appliedBeforeNo.addEventListener('change', togglePreviousApplicationFields);
        // Initial call, using the oldAppliedBefore value
        if (oldAppliedBefore === 'yes') {
            appliedBeforeYes.checked = true;
        } else if (oldAppliedBefore === 'no') {
            appliedBeforeNo.checked = true;
        }
        togglePreviousApplicationFields();


        // Hear About Us - Other
        const hearOtherSourceRadio = document.getElementById('hearOtherSource');
        const otherSourceField = document.getElementById('otherSourceField');
        // Initial check for other source field visibility on page load
        if (oldHearAboutUs === 'Other') {
            hearOtherSourceRadio.checked = true; // Ensure the radio button is checked
            otherSourceField.style.display = 'block';
            if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                otherSourceField.querySelector('input').setAttribute('required', 'true');
            }
        }
        document.querySelectorAll('input[name="hear_about_us"]').forEach(radio => {
            radio.addEventListener('change', () => {
                if (hearOtherSourceRadio.checked) {
                    otherSourceField.style.display = 'block';
                    if (document.getElementById(`step${currentStep}`).classList.contains('active')) {
                        otherSourceField.querySelector('input').setAttribute('required', 'true');
                    }
                } else {
                    otherSourceField.style.display = 'none';
                    otherSourceField.querySelector('input').removeAttribute('required');
                    otherSourceField.querySelector('input').value = '';
                }
            });
        });


        // Country/State/District/City Logic (using nepalLocations data)
        const stateSelect = document.getElementById('state');
        const districtSelect = document.getElementById('district');
        const citySelect = document.getElementById('city');

        // Function to populate provinces
        function populateProvinces() {
            stateSelect.innerHTML = '<option selected disabled value="">Select State</option>';
            nepalLocations.provinceList.forEach(province => {
                const option = document.createElement('option');
                option.value = province.name; // Use name as value
                option.textContent = province.name;
                // Preserve old input if any for validation errors
                if (oldState === province.name) {
                    option.selected = true;
                }
                stateSelect.appendChild(option);
            });
            // Initially disable district and city dropdowns
            districtSelect.disabled = true;
            citySelect.disabled = true;

            // Trigger change event to populate districts if old state value exists
            if (oldState) {
                stateSelect.dispatchEvent(new Event('change'));
            }
        }

        // Function to populate districts based on selected province
        stateSelect.addEventListener('change', () => {
            const selectedProvinceName = stateSelect.value;
            districtSelect.innerHTML = '<option selected disabled value="">Select District</option>';
            citySelect.innerHTML = '<option selected disabled value="">Select City</option>';
            districtSelect.disabled = true; // Disable district until a valid province is chosen
            citySelect.disabled = true; // Disable city

            const selectedProvince = nepalLocations.provinceList.find(
                province => province.name === selectedProvinceName
            );

            if (selectedProvince) {
                selectedProvince.districtList.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.name;
                    option.textContent = district.name;
                    // Preserve old input if any
                    if (oldDistrict === district.name) {
                        option.selected = true;
                    }
                    districtSelect.appendChild(option);
                });
                districtSelect.disabled = false; // Enable district select

                // Trigger change event to populate cities if old district value exists
                if (oldDistrict) {
                    districtSelect.dispatchEvent(new Event('change'));
                }
            }
        });

        // Function to populate municipalities (cities) based on selected district
        districtSelect.addEventListener('change', () => {
            const selectedProvinceName = stateSelect.value;
            const selectedDistrictName = districtSelect.value;
            citySelect.innerHTML = '<option selected disabled value="">Select City</option>';
            citySelect.disabled = true; // Disable city until a valid district is chosen

            const selectedProvince = nepalLocations.provinceList.find(
                province => province.name === selectedProvinceName
            );

            if (selectedProvince) {
                const selectedDistrict = selectedProvince.districtList.find(
                    district => district.name === selectedDistrictName
                );
                if (selectedDistrict) {
                    selectedDistrict.municipalityList.forEach(municipality => {
                        const option = document.createElement('option');
                        option.value = municipality.name;
                        option.textContent = municipality.name;
                        // Preserve old input if any
                        if (oldCity === municipality.name) {
                            option.selected = true;
                        }
                        citySelect.appendChild(option);
                    });
                    citySelect.disabled = false; // Enable city select
                }
            }
        });

        // Initial setup
        populateProvinces(); // Populate provinces on page load
        showStep(currentStep);

        // Conditional upload for Greece
        const interestedCountrySelect = document.getElementById('interestedCountry');
        interestedCountrySelect.addEventListener('change', () => {
            const passportUploadLabel = document.querySelector(
                'label[for="passportUpload"] p'); // Select the <p> tag
            if (interestedCountrySelect.value === 'greece') {
                passportUploadLabel.textContent =
                    `Upload Passport Scan (Birth Certificate also required for Greece)`;
            } else {
                passportUploadLabel.textContent = `Upload Passport Scan`;
            }
        });

        // File name display logic
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const fileNameDisplay = document.getElementById(`${this.id}FileName`);
                if (this.files.length > 0) {
                    fileNameDisplay.textContent = `Selected File: ${this.files[0].name}`;
                } else {
                    fileNameDisplay.textContent = '';
                }
            });
        });


        // --- Handle showing the correct step if there are validation errors ---
        // This is crucial for multi-step forms when using server-side validation.
        // It ensures the user lands back on the step where errors occurred.
        @if ($errors->any())
            let errorFoundStep = 1; // Default to first step
            const fieldToStepMap = {
                // Step 1 fields
                'first_name': 1,
                'middle_name': 1,
                'last_name': 1,
                'interested_country': 1,
                'dob': 1,
                'mobile_no': 1,
                'whatsapp_no': 1,
                'gender': 1,
                'marital_status': 1,
                'spouse_name': 1,
                'citizenship_no': 1,
                'issue_district': 1,
                'issue_date': 1,
                'email_address': 1,
                'father_name': 1,
                'father_contact': 1,
                'mother_name': 1,
                'mother_contact': 1,
                'other_relative_name': 1,
                'other_relative_contact': 1,
                'relative_relation': 1,
                // Step 2 fields
                'state': 2,
                'district': 2,
                'city': 2,
                'ward_no': 2,
                'village_tole_chowk': 2,
                // Step 3 fields
                'passport_no': 3,
                'passport_issue_date': 3,
                'passport_expire_date': 3,
                'passport_upload': 3,
                'police_report_upload': 3,
                'lang_nepali': 3,
                'lang_english': 3,
                'lang_hindi': 3,
                'lang_other': 3,
                'other_language': 3,
                'education_level': 3,
                'edu_level_doc_upload': 3,
                'license_no': 3,
                'license_category': 3,
                'license_issue_date': 3,
                'license_expire_date': 3,
                'license_upload': 3,
                // Step 4 fields
                'worked_in_nepal': 4,
                'nepal_company': 4,
                'nepal_company_address': 4,
                'nepal_post': 4,
                'nepal_working_period': 4,
                'nepal_work_cert_upload': 4,
                'been_abroad': 4,
                'abroad_country': 4,
                'abroad_company': 4,
                'abroad_post': 4,
                'abroad_working_period': 4,
                'abroad_work_cert_upload': 4,
                'applied_before': 4,
                'applied_country': 4,
                'agent_manpower': 4,
                'applied_when': 4,
                'hear_about_us': 4,
                'other_source': 4
            };

            errorKeys.forEach(field => {
                if (fieldToStepMap[field] && fieldToStepMap[field] < errorFoundStep) {
                    // This logic ensures we go to the earliest step with an error
                    errorFoundStep = fieldToStepMap[field];
                } else if (fieldToStepMap[field] && errorFoundStep === 1) {
                    // If no earlier error, but current field is in a later step
                    errorFoundStep = fieldToStepMap[field];
                }
            });

            // If a specific error was found on a later step, jump to that step
            if (errorFoundStep > 1) {
                currentStep = errorFoundStep;
                showStep(currentStep);
            }
            // After showing the correct step, re-apply required attributes for that step
            showStep(currentStep);

            // Trigger input change events for dynamic fields if old input exists
            // This ensures spouse_name, other_language, and work experience fields show correctly
            maritalStatus.dispatchEvent(new Event('change'));
            langOtherCheckbox.dispatchEvent(new Event('change'));
            workedInNepalYes.dispatchEvent(new Event('change'));
            workedInNepalNo.dispatchEvent(new Event('change'));
            beenAbroadYes.dispatchEvent(new Event('change'));
            beenAbroadNo.dispatchEvent(new Event('change'));
            appliedBeforeYes.dispatchEvent(new Event('change'));
            appliedBeforeNo.dispatchEvent(new Event('change'));
            document.querySelectorAll('input[name="hear_about_us"]').forEach(radio => radio.dispatchEvent(new Event(
                'change')));
        @endif
    </script>
@endsection
