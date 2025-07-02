<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\News;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Branch;
use App\Models\Member;
use App\Models\Review;
use App\Models\Careers;
use App\Models\Counter;
use App\Models\Country;
use App\Models\Partner;
use App\Models\Progress;
use App\Models\Services;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function home()
    {
        $services = Services::where('status', 1)->oldest('order')->limit(8)->get();
        $counters = Counter::oldest('order')->get();
        $blogs = News::where('status', 1)->latest()->limit(3)->get();
        $reviews = Review::where('status', 1)->oldest('order')->limit(8)->get();
        $progress = Progress::where('status', 1)->oldest('order')->get();
        $popups = Popup::where('status', 1)->oldest('order')->get();
        $countries = Country::where('status', 1)->oldest('order')->limit(8)->get();
        $faqs = Faq::where('status', 1)->oldest('order')->limit(5)->get();

        return view('frontend.home.index', compact(['blogs', 'counters', 'progress', 'popups', 'reviews', 'services', 'countries', 'faqs']));
    }

    public function appoint()
    {
        $countries = Country::where('status', 1)->oldest('order')->get();
        return view('frontend.page.appointment', compact(['countries']));
    }


    public function error()
    {
        return view('errors.404');
    }

    public function pagesingle($slug)
    {
        $content = Page::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            if ($content->template == 1) {

                return view('frontend.page.side', compact('content'));
            } elseif ($content->template == 2) {

                $reviews = Review::where('status', 1)->oldest('order')->limit(8)->get();
                $counters = Counter::oldest('order')->get();
                $progress = Progress::where('status', 1)->oldest('order')->get();
                return view('frontend.page.about', compact(['content', 'reviews', 'counters', 'progress']));
            } elseif ($content->template == 3) {

                $branchs = Branch::whereStatus(1)->oldest('order')->get();
                return view('frontend.page.contact', compact(['content', 'branchs']));
            } elseif ($content->template == 4) {
                $services = Services::where('status', 1)->oldest('order')->get();
                return view('frontend.page.service', compact(['content', 'services']));
            } elseif ($content->template == 5) {
                $countries = Country::where('status', 1)->oldest('order')->get();
                return view('frontend.page.country', compact(['content', 'countries']));
            } elseif ($content->template == 6) {

                $teams = Member::oldest('order')->get();
                return view('frontend.page.team', compact(['content', 'teams']));
            } elseif ($content->template == 7) {
                $reviews = Review::oldest('order')->get();
                return view('frontend.page.review', compact(['content', 'reviews']));
            } elseif ($content->template == 8) {
                $faqs = Faq::oldest('order')->get();
                return view('frontend.page.faq', compact(['content', 'faqs']));
            } elseif ($content->template == 9) {
                $partners = Partner::where('status', 1)->oldest('order')->get();
                return view('frontend.page.partner', compact(['content', 'partners']));
            } elseif ($content->template == 10) {
                $blogs = News::latest()->get();
                return view('frontend.page.blog', compact('content', 'blogs'));
            } elseif ($content->template == 11) {
                $careers = Careers::whereStatus(1)->latest()->get();
                return view('frontend.page.career', compact(['content', 'careers']));
            } elseif ($content->template == 12) {

                $all_blogs = News::get();
                $all_pages = Page::where('status', 1)->get();
                $all_servs = Services::where('status', 1)->get();
                $all_countrys = Country::where('status', 1)->get();

                return response()->view('frontend.page.sitemap', compact(['all_blogs', 'all_pages', 'all_servs', 'all_countrys']))->header('Content-Type', 'text/xml');
            } else {
                $blogs = News::where('status', 1)->limit(5)->get();

                return view(
                    'frontend.page.default',
                    compact(['content', 'blogs'])
                );
            }
        } else {
            return redirect()->route('error');
        }
    }
    public function blogsingle($slug)
    {
        $content = News::where('slug', $slug)->where('status', 1)->first();

        if ($content) {
            // Increment post view count
            if ($content->post_view === null) {
                $content->post_view = 1;
                $content->save();
            } else {
                $content->increment('post_view', 1);
            }

            // Fetch related blogs
            $blogs = News::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();

            // Get Previous Post
            $previousPost = News::where('status', 1)
                ->where('id', '<', $content->id)
                ->orderBy('id', 'desc')
                ->first();

            // Get Next Post
            $nextPost = News::where('status', 1)
                ->where('id', '>', $content->id)
                ->orderBy('id', 'asc')
                ->first();
            return view('frontend.blog.show', compact('content', 'blogs'));
        } else {
            return redirect()->route('error');
        }
    }

    public function servicesingle($slug)
    {
        $content = Services::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            return view('frontend.service.show', compact(['content']));
        } else {
            return redirect()->route('error');
        }
    }

    public function countrysingle($slug)
    {
        $content = Country::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            return view('frontend.country.show', compact(['content']));
        } else {
            return redirect()->route('error');
        }
    }

    public function applications(Request $request)
    {
        // Define validation rules for all fields, including file uploads
        $rules = [
            // Personal Information
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'interested_country' => 'required|string|max:255',
            'dob' => 'required|date',
            'mobile_no' => 'required|string', // Updated regex
            'whatsapp_no' => 'nullable|string', // Updated regex
            'copy_mobile_no' => 'nullable|boolean', // Updated for checkbox
            'gender' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'spouse_name' => 'nullable|string|max:255',
            'citizenship_no' => 'required|string|max:255',
            'issue_district' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'email_address' => 'required|string|email|max:255', // 'unique' rule removed for flexibility

            // Address Details
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'ward_no' => 'required|integer|min:1',
            'village_tole_chowk' => 'required|string|max:255',

            // Family Details
            'father_name' => 'required|string|max:255',
            'father_contact' => 'nullable|string', // Updated regex
            'mother_name' => 'required|string|max:255',
            'mother_contact' => 'nullable|string', // Updated regex
            'other_relative_name' => 'nullable|string|max:255',
            'other_relative_contact' => 'nullable|string', // Updated regex
            'relative_relation' => 'nullable|string|max:255',

            // Passport Details
            'passport_no' => 'required|string|max:255',
            'passport_issue_date' => 'required|date',
            'passport_expire_date' => 'required|date', // Added 'after' rule
            'passport_upload' => 'nullable|file|mimes:jpeg,png,pdf,jpg|max:200', // Updated for file upload

            // Police Report
            'police_report_upload' => 'nullable|file|mimes:jpeg,png,pdf,jpg|max:200', // Updated for file upload

            // Language Known
            'lang_nepali' => 'nullable|boolean', // Changed from sometimes
            'lang_english' => 'nullable|boolean', // Changed from sometimes
            'lang_hindi' => 'nullable|boolean', // Changed from sometimes
            'lang_other' => 'nullable|boolean', // Changed from sometimes
            'other_language' => 'nullable|string|max:255',

            // Education Details
            'education_level' => 'required|string|max:255',
            'edu_level_doc_upload' => 'nullable|file|mimes:jpeg,png,pdf,jpg|max:200', // Updated for file upload

            // Driving License Details
            'license_no' => 'nullable|string|max:255',
            'license_category' => 'nullable|string|max:255',
            'license_issue_date' => 'nullable|date',
            'license_expire_date' => 'nullable|date', // Added 'after' rule
            'license_upload' => 'nullable|file|mimes:jpeg,png,pdf,jpg|max:200', // Updated for file upload

            // Work Experience (Nepal)
            'worked_in_nepal' => 'required|string|in:yes,no',
            'nepal_company' => 'nullable|string|max:255',
            'nepal_company_address' => 'nullable|string|max:255',
            'nepal_post' => 'nullable|string|max:255',
            'nepal_working_period' => 'nullable|string|max:255',
            'nepal_work_cert_upload' => 'nullable|file|mimes:jpeg,png,pdf,jpg|max:200', // Updated for file upload

            // Additional Details: Abroad Experience
            'been_abroad' => 'required|string|in:yes,no',
            'abroad_country' => 'nullable|string|max:255',
            'abroad_company' => 'nullable|string|max:255',
            'abroad_post' => 'nullable|string|max:255',
            'abroad_working_period' => 'nullable|string|max:255',
            'abroad_work_cert_upload' => 'nullable|file|mimes:jpeg,png,pdf,jpg|max:200', // Updated for file upload

            // Additional Details: Previous Application
            'applied_before' => 'required|string|in:yes,no',
            'applied_country' => 'nullable|string|max:255',
            'agent_manpower' => 'nullable|string|max:255',
            'applied_when' => 'nullable|date',

            // Where did you hear about this Prime European Company?
            'hear_about_us' => 'required|string|max:255',
            'other_source' => 'nullable|string|max:255',
        ];

        // Custom error messages for better user feedback
        $messages = [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must be a valid email address.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
            'after' => 'The :attribute must be a date after :date.',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules, $messages);

        // Handle file uploads
        $uploadedFilePaths = [];
        $fileFields = [
            'passport_upload',
            'police_report_upload',
            'edu_level_doc_upload',
            'license_upload',
            'nepal_work_cert_upload',
            'abroad_work_cert_upload',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $uploadedFilePaths[$field] = fileUpload($request, $field, 'applications');
            } else {
                $uploadedFilePaths[$field] = null; // No file uploaded for this field
            }
        }

        // Merge uploaded file paths with validated data
        $dataToStore = array_merge($validatedData, $uploadedFilePaths);

        // Create a new Application instance and save it to the database
        // Ensure your Application model has fillable properties for all fields,
        // including the file upload paths (e.g., 'passport_upload', 'police_report_upload', etc.)
        try {
            $application = Application::create($dataToStore);
            // Redirect with a success message
            return redirect()->back()->with('success', 'Application created successfully.');
        } catch (\Exception $e) {
            // Handle database saving errors
            return redirect()->back()->withInput()->withErrors(['database_error' => 'An error occurred while saving your application: ' . $e->getMessage()]);
        }
    }
}
