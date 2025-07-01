<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::latest()->paginate(20);
        return view('admin.application.index', compact('applications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return view('admin.application.show', compact('application'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        removeFile($application->passport_upload);
        removeFile($application->license_upload);
        removeFile($application->visa_upload);
        removeFile($application->work_cert_upload);
        removeFile($application->abroad_work_cert_upload);
        $application->delete();
        return redirect()->route('application.index')->with('message', 'Delete Successfully');
    }
}