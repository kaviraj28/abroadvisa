<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Member;
use App\Models\Project;
use App\Models\Review;
use App\Models\Services;
use App\Models\Setting;
use Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $settings = Setting::pluck('value', 'key');
        $reviews = Review::where('status', 1)->get();
        $teams = Member::where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get();
        $services = Services::where('status', 1)->get();
        $projects = Project::where('status', 1)->get();
        return view('admin.setting.edit', compact(['settings', 'reviews', 'services', 'teams', 'faqs', 'projects']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $siteSettings = Setting::pluck('value', 'key');

        $siteSetting = $request->all();
        foreach ($siteSetting as $key => $value) {
            $setting->updateOrCreate(['key' => $key,], [
                'key' => $key,
                'value' => $value,
            ]);
        }

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }
}
