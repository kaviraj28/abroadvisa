@extends('layouts.frontend.master')

@section('content')
    <style>
        .form-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border: 1px solid #dee2e6;
        }

        .section-title {
            text-align: center;
            color: #007bff;
            margin-bottom: 25px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form-group label {
            font-weight: 500;
            color: #495057;
        }

        .asterisk {
            color: red;
        }

        /* Custom styles for select fields and general inputs to match overall design */
        .form-control,
        .custom-select {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .form-check-label {
            margin-left: 0.5rem;
        }

        .form-check-inline {
            margin-right: 1.5rem;
        }

        .ct-margin {
            margin-top: 160px;
        }
    </style>
    <div class="container ct-margin">
        <div class="form-section">
            <h4 class="section-title">Main Applicant Data</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="nepaliFirstName">पहिलो नाम <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="nepaliFirstName" type="text" value="बिनोद">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="nepaliMiddleName">बीचको नाम</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="nepaliMiddleName" type="text" value="बहादुर">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="nepaliLastName">थर <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="nepaliLastName" type="text" value="यादव">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="nepaliDateOfBirth">जन्म मिति <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="nepaliDateOfBirth" type="date" value="2053-01-21">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="nepaliBirthPlace">जन्म स्थान <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="nepaliBirthPlace">
                                <option value="Morang/मोरङ" selected>Morang/मोरङ</option>
                                <option value="Kathmandu/काठमाडौं">Kathmandu/काठमाडौं</option>
                                <option value="Pokhara/पोखरा">Pokhara/पोखरा</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="citizenshipType">नागरिकताको किसिम <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="citizenshipType">
                                <option value="Citizenship by Descent/वंशज" selected>Citizenship by Descent/वंशज</option>
                                <option value="Citizenship by Birth/जन्मसिद्ध">Citizenship by Birth/जन्मसिद्ध</option>
                                <option value="Naturalized Citizenship/अंगीकृत">Naturalized Citizenship/अंगीकृत</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="nepaliIssueDistrict">जारी जिल्ला <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="nepaliIssueDistrict">
                                <option value="Morang/मोरङ" selected>Morang/मोरङ</option>
                                <option value="Kathmandu/काठमाडौं">Kathmandu/काठमाडौं</option>
                                <option value="Pokhara/पोखरा">Pokhara/पोखरा</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="mobileNoGeneral">Mobile No. <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="mobileNoGeneral" type="text" value="+977-98XXXXXXXX">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="spouseName">पति/पत्नीको नाम</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="spouseName" type="text" placeholder="Spouse Name Fill space">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="firstName">First Name <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="firstName" type="text" value="BINOD">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="middleName">Middle Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="middleName" type="text" value="BAHADUR">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="lastName">Last Name <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="lastName" type="text" value="YADAV">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="dateOfBirth">Date of Birth <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="dateOfBirth" type="date" value="1996-05-13">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="citizenshipNumber">नागरिकता नं. <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="citizenshipNumber" type="text" value="७८१२३-०३-२१७४४">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="issueDate">जारी मिति <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="issueDate" type="date" value="2079-09-03">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="interestedCountry">Interested Country <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="interestedCountry">
                                <option value="" selected disabled>Select Country</option>
                                <option value="Greece">Greece</option>
                                <option value="Germany">Germany</option>
                                <option value="Portugal">Portugal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="whatsAppNo">WhatsApp No. <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="whatsAppNo" type="text" value="+977-98XXXXXXXX">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="emailAddress">Email Address <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="emailAddress" type="email"
                                placeholder="example@email.com">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="age">Age (उमेर)</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="age" type="text" value="AUTO CALCULATED" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Additional Information</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="gender">लिंग <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="gender">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="fatherStatus">पितृत्वको स्थिती <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="fatherStatus">
                                <option value="KNOWN" selected>KNOWN</option>
                                <option value="UNKNOWN">UNKNOWN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="educationLevel">शैक्षिक योग्यता <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="educationLevel">
                                <option value="Primary/प्राथमिक तह (कक्षा १-५)">Primary/प्राथमिक तह (कक्षा १-५)</option>
                                <option value="Lower Secondary/निम्न माध्यामिक तह (कक्षा ८)" selected>Lower Secondary/निम्न
                                    माध्यामिक तह (कक्षा ८)</option>
                                <option value="Secondary माध्यामिक तह (SLC/SEE)">Secondary माध्यामिक तह (SLC/SEE)</option>
                                <option value="Higher Secondary/उच्च माध्यामिक तह (PLUS 2)">Higher Secondary/उच्च माध्यामिक
                                    तह (PLUS 2)</option>
                                <option value="Intermediate प्रमाणपत्र तह (CTEVT)">Intermediate प्रमाणपत्र तह (CTEVT)
                                </option>
                                <option value="Bachelor's Degree स्नातक तह">Bachelor's Degree स्नातक तह</option>
                                <option value="Master's Degree स्नाकोत्तर तह">Master's Degree स्नाकोत्तर तह</option>
                                <option value="Master of Philosophy/दर्शनशास्त्रमा स्राकोत्तर">Master of
                                    Philosophy/दर्शनशास्त्रमा स्राकोत्तर</option>
                                <option value="Doctor of Philosophy/विद्यावारिधी">Doctor of Philosophy/विद्यावारिधी
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="educationDocUpload">Upload Edu Doc</label>
                        <div class="col-sm-8">
                            <input class="form-control-file" id="educationDocUpload" type="file">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="caste">जात / जाति <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="caste">
                                <option value="Yadav/यादव" selected>Yadav/यादव</option>
                                <option value="Brahmin/ब्राम्हण">Brahmin/ब्राम्हण</option>
                                <option value="Chhetri/क्षेत्री">Chhetri/क्षेत्री</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="maritalStatus">वैवाहिक स्थिती <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="maritalStatus">
                                <option value="Married/विवाहित" selected>Married/विवाहित</option>
                                <option value="Single/अविवाहित">Single/अविवाहित</option>
                                <option value="Divorced/विच्छेदित">Divorced/विच्छेदित</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="occupation">ब्यवसाय <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="occupation">
                                <option value="Student/विद्यार्थी" selected>Student/विद्यार्थी</option>
                                <option value="Employed/रोजगार">Employed/रोजगार</option>
                                <option value="Unemployed/बेरोजगार">Unemployed/बेरोजगार</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="religion">धर्म <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="religion">
                                <option value="Hindu/हिन्दु" selected>Hindu/हिन्दु</option>
                                <option value="Buddhist/बौद्ध">Buddhist/बौद्ध</option>
                                <option value="Christian/ईसाई">Christian/ईसाई</option>
                                <option value="Islam/इस्लाम">Islam/इस्लाम</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="languageKnown">Language Known <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="langNepali" type="checkbox" value="Nepali">
                                <label class="form-check-label" for="langNepali">Nepali (नेपाली)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="langEnglish" type="checkbox" value="English">
                                <label class="form-check-label" for="langEnglish">English (अंग्रेजी)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="langHindi" type="checkbox" value="Hindi">
                                <label class="form-check-label" for="langHindi">Hindi (हिन्दी)</label>
                            </div>
                            <div class="form-group mt-2">
                                <input class="form-control" id="langOther" type="text"
                                    placeholder="Other (अन्य) add garera language lekhna milne">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Applicant's Permanent Address</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="phoneNo">फोन नं.</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="phoneNo" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="province">प्रदेश<span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="province">
                                <option value="Bagmati/बागमती" selected>Bagmati/बागमती</option>
                                <option value="Koshi/कोशी">Koshi/कोशी</option>
                                <option value="Madhesh/मधेश">Madhesh/मधेश</option>
                                <option value="Gandaki/गण्डकी">Gandaki/गण्डकी</option>
                                <option value="Lumbini/लुम्बिनी">Lumbini/लुम्बिनी</option>
                                <option value="Karnali/कर्णाली">Karnali/कर्णाली</option>
                                <option value="Sudurpashchim/सुदूरपश्चिम">Sudurpashchim/सुदूरपश्चिम</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="municipality">गा.पा./न.पा. <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="municipality">
                                <option value="Panchkhal Municipality/पाँचखाल नगरपालिका" selected>Panchkhal
                                    Municipality/पाँचखाल नगरपालिका</option>
                                <option value="Dhulikhel Municipality/धुलिखेल नगरपालिका">Dhulikhel Municipality/धुलिखेल
                                    नगरपालिका</option>
                                <option value="Banepa Municipality/बनेपा नगरपालिका">Banepa Municipality/बनेपा नगरपालिका
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="villageToleNepali">गाउँ टोल <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="villageToleNepali" type="text" value="साताहि राहाार">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="mobileNo">मोबाइल नं.</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="mobileNo" type="text" value="9863220256">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="district">जिल्ला<span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="district">
                                <option value="Kavrepalanchok/काभ्रेपलाञ्चोक" selected>Kavrepalanchok/काभ्रेपलाञ्चोक
                                </option>
                                <option value="Kathmandu/काठमाडौं">Kathmandu/काठमाडौं</option>
                                <option value="Bhaktapur/भक्तपुर">Bhaktapur/भक्तपुर</option>
                                <option value="Lalitpur/ललितपुर">Lalitpur/ललितपुर</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="wardNo">वडा नं. <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="wardNo" type="text" value="०९">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="villageToleEnglish">Village/Tole<span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="villageToleEnglish" type="text" value="SATHIGHAR">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Family Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="fatherName">Father's Name (बुबाको नाम) <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="fatherName" type="text" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="motherName">Mother's Name (आमाको नाम) <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="motherName" type="text" placeholder="Full Name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="otherRelativeName">Other Relative (अन्य
                            नातेदार)</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="otherRelativeName" type="text" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="otherRelativeContact">Contact No. (सम्पर्क नं.) <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="otherRelativeContact" type="text" value="+977">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="otherRelativeRelation">Relation (नाता साईनो) <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="otherRelativeRelation">
                                <option value="Brother (दाजु)" selected>Brother (दाजु)</option>
                                <option value="Sister (बहिनी)">Sister (बहिनी)</option>
                                <option value="Uncle (काका)">Uncle (काका)</option>
                                <option value="Aunt (काकी)">Aunt (काकी)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Passport Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="passportNo">Passport No. (राहदानी नं.) <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="passportNo" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="passportIssueDate">Issue Date. (म्याद जारी मिति) <span
                                class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="passportIssueDate" type="date">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="passportExpireDate">Expire Date. (म्याद समाप्त मिति)
                            <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" id="passportExpireDate" type="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Police Report</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="policeReportUpload">Upload Police Report (पुलिस
                            रिपोर्ट) <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control-file" id="policeReportUpload" type="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Driving License Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="licenseNo">License No. (लाइसेन्स नं.)</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="licenseNo" type="text">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="licenseIssueDate">Issue Date. (म्याद जारी
                            मिति)</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="licenseIssueDate" type="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="licenseCategory">Category. (वर्गिकरण.)</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="licenseCategory" type="text">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="licenseExpireDate">Expire Date. (म्याद समाप्त
                            मिति)</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="licenseExpireDate" type="date">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="licenseUpload">Upload License</label>
                        <div class="col-sm-8">
                            <input class="form-control-file" id="licenseUpload" type="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Work Experience</h4>
            <div class="row">
                <div class="col-12">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label">Have you worked in Nepal or not? (नेपालमा काम गर्नु भएको छ
                            वा छैन ?)<span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="workedInNepalYes" type="radio"
                                    name="workedInNepal" value="Yes">
                                <label class="form-check-label" for="workedInNepalYes">Yes (छ)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="workedInNepalNo" type="radio" name="workedInNepal"
                                    value="No" checked>
                                <label class="form-check-label" for="workedInNepalNo">No (छैन)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="companyNameNepal">Company Name (कंपनीको नाम):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="companyNameNepal" type="text">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="postNepal">Post (पद):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="postNepal" type="text"
                                placeholder="e.g. Driver: Heavy Truck Driver">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="workingPeriodNepalFrom">Working Period (From):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="workingPeriodNepalFrom" type="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="companyAddressNepal">Company Address (कंपनीको
                            ठेगाना):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="companyAddressNepal" type="text">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="workingPeriodNepalTo">Working Period (To):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="workingPeriodNepalTo" type="date">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="workExperienceCertificateNepal">Upload
                            Certificate:</label>
                        <div class="col-sm-8">
                            <input class="form-control-file" id="workExperienceCertificateNepal" type="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4 class="section-title">Abroad Experience & Application History</h4>
            <div class="row">
                <div class="col-12">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label">1. Have you ever been abroad before ? (के तपाई पहिला विदेश
                            जानुभएको छ ?)<span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="beenAbroadYes" type="radio" name="beenAbroad"
                                    value="Yes">
                                <label class="form-check-label" for="beenAbroadYes">Yes (छ)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="beenAbroadNo" type="radio" name="beenAbroad"
                                    value="No" checked>
                                <label class="form-check-label" for="beenAbroadNo">No (छैन)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="countryAbroad">Country Name (देशको नाम):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="countryAbroad" type="text">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="postAbroad">Post (पद):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="postAbroad" type="text"
                                placeholder="e.g. Driver: Heavy Truck Driver">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="workingPeriodAbroadFrom">Working Period
                            (From):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="workingPeriodAbroadFrom" type="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="companyAbroad">Company Name (कंपनीको नाम):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="companyAbroad" type="text">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="workingPeriodAbroadTo">Working Period (To):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="workingPeriodAbroadTo" type="date">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="workExperienceCertificateAbroad">Upload
                            Certificate:</label>
                        <div class="col-sm-8">
                            <input class="form-control-file" id="workExperienceCertificateAbroad" type="file">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">
            <div class="row">
                <div class="col-12">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label">2. Have you applied Europe or Other Country before ? (के
                            तपाईले पहिले युरोप वा अन्य देशमा आवेदन दिनुभएको थियो ?)<span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="appliedEuropeYes" type="radio"
                                    name="appliedEurope" value="Yes">
                                <label class="form-check-label" for="appliedEuropeYes">Yes (छ)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="appliedEuropeNo" type="radio" name="appliedEurope"
                                    value="No" checked>
                                <label class="form-check-label" for="appliedEuropeNo">No (छैन)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="appliedCountry">Country Name (देशको नाम):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="appliedCountry" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="agentManpowerName">Agent/ Manpower Name (एजेन्ट /
                            मेनपावरको नाम):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="agentManpowerName" type="text">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label" for="whenApplied">When did you applied? (कहिले आवेदन दिनु
                            भएको थियो ?):</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="whenApplied" type="date">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">
            <div class="row">
                <div class="col-12">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-4 col-form-label">3. Where did you hear about this Prime European
                            Company?<span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="hearFacebook" type="checkbox" value="Facebook">
                                <label class="form-check-label" for="hearFacebook">Facebook (फेसबुक)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="hearInstagram" type="checkbox" value="Instagram">
                                <label class="form-check-label" for="hearInstagram">Instagram (इन्टाग्राम)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="hearWhatsapp" type="checkbox" value="Whatsapp">
                                <label class="form-check-label" for="hearWhatsapp">Whatsapp (वाएप)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="hearFriendsFamilies" type="checkbox"
                                    value="Friends/families">
                                <label class="form-check-label" for="hearFriendsFamilies">Friends/families
                                    (साथीभाई/परिवार)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
