<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\ClientRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreClientAgreementRequest;

class ClientRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientRegistration = ClientRegistration::oldest('name')->paginate(20);
        return view('admin.clientRegistration.index', compact('clientRegistration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clientRegistration.create');
    }

    public function store(StoreClientRequest $request)
    {
        $input = $request->all();
        $slug = make_slug(date('YmdHis') . '-' . str()->random(10) . '-' . $request->cname);
        $client =  ClientRegistration::create($input);
        $client->update(['slug' => $slug]);
        return redirect()->route('clientRegistration.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientRegistration $clientRegistration)
    {
        return view('admin.clientRegistration.show', compact('clientRegistration'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientRegistration $clientRegistration)
    {
        $clientRegistration->delete();
        return redirect()->route('clientRegistration.index')->with('message', 'Delete Successfully');
    }

    public function clientregistration(StoreClientAgreementRequest $request)
    {
        if ($request->has('cid')) {
            $slug = make_slug(date('YmdHis') . '-' . str()->random(10) . '-' . $request->cname);
            $client = ClientRegistration::where('slug', $request->get('cid'))->first();
            $client->update($request->all());
            $client->update(['slug' => $slug]);
            return redirect()->route('thankyou')->with(['content' => $client]);
        } else {
            $slug = make_slug(date('YmdHis') . '-' . str()->random(10) . '-' . $request->cname);
            $client = ClientRegistration::create($request->all());
            $client->update(['slug' => $slug]);
            return redirect()->route('thankyou')->with(['content' => $client]);
            return Response::json(['success' => 'Thank You!! Your Registration has been Submitted.']);
        }
    }

    public function printPdf(ClientRegistration $clientRegistration)
    {
        $content = ClientRegistration::where('id', $clientRegistration->id)->whereStatus(1)->first();
        $pdf = PDF::loadView('frontend.client.print', compact('content'));
        return  $pdf->stream(
            make_slug($content->cname) . '.pdf',
            array("Attachment" => false)
        );
    }
}
