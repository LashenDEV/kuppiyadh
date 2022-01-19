<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $data = new Uploads();
        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('storage', $filename);
        $data->file = $filename;
        $data->subject_id = $request->subject_id;
        $data->file_name = $request->file_name;
        $data->save();
        return redirect()->back();
    }

    public function show()
    {
        $items = Uploads::all();
        $subjects = Subject::all();
        if (Auth::user()->hasRole('user')) {
            return view('userDashboard', compact('subjects'));
        } elseif (Auth::user()->hasRole('admin')) {
            return view('adminDashboard', compact('items'));
        }
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('storage/' . $file));
    }

    public function view($id)
    {
        $data = Uploads::find($id);
        return view('view', compact('data'));
    }

}
