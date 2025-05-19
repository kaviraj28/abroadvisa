<?php

namespace App\Http\Controllers\Admin;

use App\Models\Roadmap;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;

class RoadmapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roadmap = Roadmap::oldest('name')->paginate(20);
        return view('admin.roadmap.index', compact('roadmap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Services::whereStatus(1)->get();
        return view('admin.roadmap.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $roadmap =  Roadmap::create($input);
        return redirect()->route('roadmap.edit', $roadmap->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Roadmap $roadmap)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roadmap $roadmap)
    {
        $category = Services::whereStatus(1)->get();
        return view('admin.roadmap.edit', compact(['roadmap', 'category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Roadmap $roadmap)
    {
        $input = $request->all();
        $roadmap->update($input);
        return redirect()->route('roadmap.edit', $roadmap->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roadmap $roadmap)
    {
        $roadmap->delete();
        return redirect()->route('roadmap.index')->with('message', 'Delete Successfully');
    }
}
