<?php

namespace App\Http\Controllers;

use DOMXPath;
use DOMDocument;
use App\Models\Faq;
use App\Models\News;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Branch;
use App\Models\Member;
use App\Models\Review;
use App\Models\Careers;
use App\Models\Counter;
use App\Models\Partner;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\Progress;
use App\Models\Services;
use App\Models\Technology;
use App\Models\ClientRegistration;

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

        return view('frontend.home.index', compact(['blogs', 'counters', 'progress', 'popups', 'reviews', 'services']));
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
                $projects = Services::where('status', 1)->oldest('order')->whereHas('projects')
                    ->with(['projects' => function ($query) {
                        $query->limit(5);
                    }])
                    ->get()
                    ->mapWithKeys(function ($category) {
                        return [$category->name => $category->projects->toArray()];
                    });
                return view('frontend.page.project', compact(['content', 'projects']));
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
                $all_projects = Project::where('status', 1)->get();

                return response()->view('frontend.page.sitemap', compact(['all_blogs', 'all_pages', 'all_servs', 'all_projects']))->header('Content-Type', 'text/xml');
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
            $services = Services::where('status', 1)->where('id', '!=', $content->id)->limit(6)->get();
            $roadmapChunks = $content->roadmap->chunk(ceil($content->roadmap->count() / 2));
            $pricing = Pricing::where('status', 1)->where('services', $content->id)->limit(3)->get();
            return view('frontend.service.show', compact(['content', 'services', 'pricing', 'roadmapChunks']));
        } else {
            return redirect()->route('error');
        }
    }
}
