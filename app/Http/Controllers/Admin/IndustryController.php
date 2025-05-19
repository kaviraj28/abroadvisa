<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industry = Industry::oldest('name')->paginate(20);
        return view('admin.industry.index', compact('industry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Services::whereStatus(1)->get();
        return view('admin.industry.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $industry =  Industry::create($input);
        return redirect()->route('industry.edit', $industry->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Industry $industry)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industry $industry)
    {
        $category = Services::whereStatus(1)->get();
        return view('admin.industry.edit', compact(['industry', 'category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Industry $industry)
    {
        $input = $request->all();
        $industry->update($input);
        return redirect()->route('industry.edit', $industry->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industry $industry)
    {
        $industry->delete();
        return redirect()->route('industry.index')->with('message', 'Delete Successfully');
    }
}
