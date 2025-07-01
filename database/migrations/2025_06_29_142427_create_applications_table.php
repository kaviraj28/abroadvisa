<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id(); // Personal Information
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('interested_country')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile_no')->nullable(); // Stored as string to preserve formatting/leading zeros
            $table->string('whatsapp_no')->nullable();
            $table->boolean('copy_mobile_no')->default(false); // Checkbox for copying mobile number
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable(); // Only required if married, handled by app logic
            $table->string('citizenship_no')->nullable();
            $table->string('issue_district')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('email_address')->unique(); // Assuming email should be unique

            // Address Details
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->integer('ward_no')->nullable();
            $table->string('village_tole_chowk')->nullable();

            // Family Details
            $table->string('father_name')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('other_relative_name')->nullable();
            $table->string('other_relative_contact')->nullable();
            $table->string('relative_relation')->nullable();

            // Passport Details
            $table->string('passport_no')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expire_date')->nullable();
            $table->string('passport_upload')->nullable(); // Store file path or name

            // Police Report
            $table->string('police_report_upload')->nullable(); // Store file path or name

            // Language Known
            $table->boolean('lang_nepali')->default(false);
            $table->boolean('lang_english')->default(false);
            $table->boolean('lang_hindi')->default(false);
            $table->boolean('lang_other')->default(false);
            $table->string('other_language')->nullable(); // Only if 'Other' is checked

            // Education Details
            $table->string('education_level')->nullable();
            $table->string('edu_level_doc_upload')->nullable(); // Store file path or name

            // Driving License Details
            $table->string('license_no')->nullable();
            $table->string('license_category')->nullable();
            $table->date('license_issue_date')->nullable();
            $table->date('license_expire_date')->nullable();
            $table->string('license_upload')->nullable(); // Store file path or name

            // Work Experience (Nepal)
            $table->string('worked_in_nepal')->nullable(); // 'yes' or 'no'
            $table->string('nepal_company')->nullable();
            $table->string('nepal_company_address')->nullable();
            $table->string('nepal_post')->nullable();
            $table->string('nepal_working_period')->nullable(); // Store as string "YYYY-MM-DD to YYYY-MM-DD"
            $table->string('nepal_work_cert_upload')->nullable(); // Store file path or name

            // Additional Details: Abroad Experience
            $table->string('been_abroad')->nullable(); // 'yes' or 'no'
            $table->string('abroad_country')->nullable();
            $table->string('abroad_company')->nullable();
            $table->string('abroad_post')->nullable();
            $table->string('abroad_working_period')->nullable(); // Store as string "YYYY-MM-DD to YYYY-MM-DD"
            $table->string('abroad_work_cert_upload')->nullable(); // Store file path or name

            // Additional Details: Previous Application
            $table->string('applied_before')->nullable(); // 'yes' or 'no'
            $table->string('applied_country')->nullable();
            $table->string('agent_manpower')->nullable();
            $table->date('applied_when')->nullable();

            // Where did you hear about this Prime European Company?
            $table->string('hear_about_us')->nullable();
            $table->string('other_source')->nullable(); // Only if 'Other' is checked

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
