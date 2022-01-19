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
        $items = Subject::find($id)->resources;
        return view('downloads', compact('items'));
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
