<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required'
        ]);

        $data = new Uploads();
        $file = $request->file;
        if ($file != null) {

            $filename = $request->file_name . '.' . $file->getClientOriginalExtension();
            $request->file->move('storage', $filename);
            $data->file = $filename;
        }
        $data->link = $request->link;
        $data->subject_id = $request->subject_id;
        $data->file_name = $request->file_name;
        $data->save();
        return redirect()->back();
    }

    public function show()
    {
        $upload = Uploads::find(2);
        $items = Uploads::orderBy('created_at', 'DESC')->paginate(3);
        $subjects = Subject::all();
        if (Auth::user()->hasRole('user')) {
            return view('userDashboard', compact('subjects'));
        } elseif (Auth::user()->hasRole('admin')) {
            return view('adminDashboard', compact('items', 'subjects', 'upload'));
        }
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('storage/' . $file));
    }

    public function view($id)
    {
        $data = Uploads::find($id);
        return view('uploads.view', compact('data'));
    }

    public function edit($id)
    {
        $subjects = Subject::all();
        $upload = Uploads::find($id);
        return view('uploads.editUpload', compact('subjects', 'upload'));
    }

    public function update(Request $request, $id)
    {

        $data = Uploads::find($id);
        $file = $request->file;
        if ($file != null) {
            $file_path = 'storage/' . $data->file;
            FILE::delete($file_path);
            $filename = $request->file_name . '.' . $file->getClientOriginalExtension();
            $request->file->move('storage', $filename);
            $data->file = $filename;
        }
        $data->link = $request->link;
        $data->subject_id = $request->subject_id;
        $data->file_name = $request->file_name;
        $data->update();
        return redirect('/dashboard')->with('status', 'Updated Successfully');
    }

    public function delete($id)
    {
        $upload = Uploads::find($id);

        $file_path = 'storage/' . $upload->file;
        FILE::delete($file_path);

        $upload->delete();
        return redirect('/dashboard')->with('status', 'Deleted Successfully');
    }

}
