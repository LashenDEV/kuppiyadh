<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //get uploads as same id
    function index($id)
    {
        $curr = Subject::find($id);
        $items = Subject::find($id)->resources()->paginate(7);
        return view('uploads.resources', compact('items', 'curr'));
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
            return view('addSubject', compact('items'));
        }
    }
}
