<?php

namespace App\Http\Controllers\Admin;

use App\Models\Recruitments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RecruitmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recruitment = Recruitments::latest()->paginate(20);
        return view('admin.recruitments.index', compact('recruitment'));
    }

    public function show(Recruitments $recruitment)
    {
        return view('admin.recruitments.show', compact('recruitment'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruitments $recruitment)
    {
        removeFile($recruitment->file);
        $recruitment->delete();
        return redirect()->route('recruitments.index')->with('message', 'Delete Successfully');
    }

    public function recruitment(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'file' => 'required|max:50000|mimes:doc,pdf,docx,png,jpg,jpeg',
            'message' => 'required',
        ]);

        if ($validator->passes()) {
            $input['file'] = fileUpload($request, 'file', 'recruitment');
            Recruitments::create($input);
            return Response::json(['success' => 'Your enquiry has been Submitted']);
        }

        return Response::json(['errors' => $validator->errors()]);
    }
}
