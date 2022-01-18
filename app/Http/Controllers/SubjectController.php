<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubject(Request $request){
        $data = new Subject();
        $data->subject_name = $request->subject_name;
        $data->save();
        return  redirect()->back();
    }

    public function viewSubjects(){
        $items = Subject::all();
        return view('addSubject',compact('items'));
    }
}
