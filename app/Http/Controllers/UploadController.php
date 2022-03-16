<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use App\Models\Subject;
use App\Models\Uploads;
use App\Models\ViewStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

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
        $upload = Uploads::all();
        $notices = Notices::latest()->get();
        $items = Uploads::orderBy('created_at', 'DESC')->get();
        $subjects = Subject::all();
        if (Auth::user()->hasRole('user')) {
            return view('User.userDashboard', compact('subjects', 'upload', 'notices'));
        } elseif (Auth::user()->hasRole('admin')) {
            return view('Admin.adminDashboard', compact('items', 'subjects', 'upload'));
        }
    }

    public function download(Request $request, $id)
    {
        $data = Uploads::find($id);
        ViewStatus::create([
            'user_id' => Auth::user()->id,
            'material_id' => $data->id,
        ]);
        return response()->download(public_path('storage/' . $data->file));
    }

    public function view($id)
    {
        $data = Uploads::find($id);
        $status = ViewStatus::where([['user_id', Auth::user()->id], ['material_id', $data->id]])->first();

        if (!$status) {
            ViewStatus::create([
                'user_id' => Auth::user()->id,
                'material_id' => $data->id,
            ]);
        }
        return view('Admin.Uploads.view', compact('data'));

    }

    public function edit($id)
    {
        $subjects = Subject::all();
        $upload = Uploads::find($id);
        return view('Admin.Uploads.editUpload', compact('subjects', 'upload'));
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

    public function link($id)
    {
        $data = Uploads::find($id);
        $status = ViewStatus::where([['user_id', Auth::user()->id], ['material_id', $data->id]])->first();

        if (!$status) {
            ViewStatus::create([
                'user_id' => Auth::user()->id,
                'material_id' => $data->id,
            ]);
        }

        return Redirect::to($data->link);
    }
}
