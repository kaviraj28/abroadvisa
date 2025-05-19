<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Pricing;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\PricingItem;
use App\Models\Services;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricings = Pricing::oldest('order')->paginate(10);
        return view('admin.pricing.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Services::where('status', 1)->get();
        $servicePricing = Null;
        return view('admin.pricing.create', compact(['services', 'servicePricing']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $pricing =  Pricing::create($input);
        $pricing->update(['slug' => $slug]);

        foreach ($request->addmore as $key => $value) {
            if ($value['title'] && $value['description']) {
                PricingItem::create([
                    'name' => $value['title'],
                    'price' => $value['price'],
                    'info' => $value['info'],
                    'description' => $value['description'],
                    'pricing_id' => $pricing->id,
                ]);
            }
        }
        return redirect()->route('pricing.edit', $pricing->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Pricing $pricing)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pricing $pricing)
    {
        $services = Services::where('status', 1)->get();
        $servicePricing = $pricing->services ?? null;
        $pricingitem = $pricing->prices;

        return view('admin.pricing.edit', compact(['pricing', 'services', 'servicePricing', 'pricingitem']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Pricing $pricing)
    {
        $input = $request->all();

        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $input['seo_title'] = $request->seo_title ?? $request->name;

        $pricing->update($input);

        $pricing->prices()->delete();
        foreach ($request->addmore as $key => $value) {
            if ($value['title'] && $value['description']) {
                PricingItem::create([
                    'name' => $value['title'],
                    'price' => $value['price'],
                    'info' => $value['info'],
                    'description' => $value['description'],
                    'pricing_id' => $pricing->id,
                ]);
            }
        }
        return redirect()->route('pricing.edit', $pricing->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        $pricing->prices()->delete();
        return redirect()->route('pricing.index')->with('message', 'Delete Successfully');
    }
}
