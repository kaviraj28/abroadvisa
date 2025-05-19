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
        $partners = Partner::where('status', 1)->oldest('order')->get();
        $services = Services::where('status', 1)->oldest('order')->limit(8)->get();
        $counters = Counter::oldest('order')->get();
        $blogs = News::where('status', 1)->latest()->limit(3)->get();
        $reviews = Review::where('status', 1)->oldest('order')->limit(8)->get();
        $progress = Progress::where('status', 1)->oldest('order')->get();
        $popups = Popup::where('status', 1)->oldest('order')->get();
        $technology = Technology::where('status', 1)->oldest('order')->get();

        $homeprojects = Services::where('status', 1)->oldest('order')->whereHas('projects')
            ->with(['projects' => function ($query) {
                $query->limit(5);
            }])
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->name => $category->projects->toArray()];
            });

        return view('frontend.home.index', compact(['partners', 'blogs', 'counters', 'progress', 'popups', 'reviews', 'services', 'homeprojects', 'technology']));
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

    public function pricingsingle($slug)
    {
        $content = Pricing::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $pricing = Pricing::where('status', 1)->where('id', '!=', $content->id)->limit(3)->get();
            return view('frontend.pricing.show', compact(['content', 'pricing']));
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

            // Extract H2 and H3 tags from the description
            $html = $content->description;
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
            libxml_clear_errors();

            $xpath = new DOMXPath($dom);
            $h2Tags = $xpath->query('//h2');

            $tableOfContents = [];
            $counter = 1;

            foreach ($h2Tags as $h2) {
                $h2_id = 'heading-' . $counter;
                $h2->setAttribute('id', $h2_id);

                $h2_entry = [
                    'id' => $h2_id,
                    'title' => trim($h2->textContent),
                    'subheadings' => []
                ];

                // Find following sibling H3 tags
                $nextNode = $h2->nextSibling;
                $count = 1;
                while ($nextNode) {
                    if ($nextNode->nodeName === 'h2') {
                        break; // Stop at next H2
                    }
                    if ($nextNode->nodeName === 'h3') {
                        $h3_id = 'subheading-' . $counter . '-' . $count;
                        $nextNode->setAttribute('id', $h3_id);

                        $h2_entry['subheadings'][] = [
                            'id' => $h3_id,
                            'title' => trim($nextNode->textContent),
                        ];
                        $count++;
                    }
                    $nextNode = $nextNode->nextSibling;
                }

                $tableOfContents[] = $h2_entry;

                $counter++;
            }

            // Save the modified HTML
            $updatedHtml = $dom->saveHTML();

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

            // Pass data to the view
            return view('frontend.blog.show', compact('content', 'blogs', 'tableOfContents', 'updatedHtml', 'previousPost', 'nextPost'));
        } else {
            return redirect()->route('error');
        }
    }

    public function clientregistrationsingle($id)
    {
        $content = ClientRegistration::where('slug', $id)->first();
        if ($content) {
            if ($content->status == 0) {
                return view('frontend.client.show', compact(['content']));
            } else {
                return redirect()->route('thankyou')->with(['content' => $content]);
            }
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
    public function careersingle($slug)
    {
        $content = Careers::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $careers = Careers::where('status', 1)->where('id', '!=', $content->id)->limit(6)->get();
            if ($content->deadline) {
                $diff = now()->diffInDays($content->deadline);
                switch ($diff) {
                    case $diff < 8:
                        $deadline = $diff . ' Days';
                        break;

                    case $diff > 7 && $diff < 15:
                        $deadline = '2 Weeks';
                        break;

                    case $diff > 14 && $diff < 22:
                        $deadline = '3 Weeks';
                        break;

                    case $diff > 21 && $diff < 29:
                        $deadline = '4 Weeks';
                        break;

                    case $diff > 29 && $diff < 36:
                        $deadline = '5 Weeks';
                        break;

                    case $diff > 35 && $diff < 43:
                        $deadline = '6 Weeks';
                        break;

                    case $diff > 42 && $diff < 50:
                        $deadline = '7 Weeks';
                        break;

                    default:
                        $deadline = '8+ Weeks';
                }
            } else {
                $deadline = '';
            }
            $blogs = News::where('status', 1)->limit(5)->get();
            return view('frontend.careers.show', compact(['content', 'careers', 'deadline', 'blogs']));
        } else {
            return redirect()->route('error');
        }
    }
}
