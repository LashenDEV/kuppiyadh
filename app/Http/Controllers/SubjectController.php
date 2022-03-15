<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //get Uploads as same id
    function index($id)
    {
        $curr = Subject::find($id);
        $items = Subject::find($id)->resources()->orderBy('created_at', 'DESC')->paginate(7);
        return view('Admin.Uploads.resources', compact('items', 'curr'));
    }

    public function addSubject(Request $request)
    {
        $data = new Subject();
        $data->subject_name = $request->subject_name;
        $data->save();
        return redirect()->back();
    }

    public function viewSubjects()
    {
        $items = Subject::all();
        if (Auth::user()->hasRole('admin')) {
            return view('Admin.Subjects.addSubject', compact('items'));
        }
    }
}
