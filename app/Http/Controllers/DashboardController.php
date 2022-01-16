<?php

namespace App\Http\Controllers;

use App\Models\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('userDashboard');
        } elseif (Auth::user()->hasRole('blogwriter')) {
            return view('blogwriterDashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('dashboard');
        }
    }

    public function myProfile()
    {
        return view('myProfile');
    }

    public function createPost()
    {
        return view('postCreate');
    }

    public function addSubject()
    {
        return view('addSubject');
    }

    public function store(Request $request)
    {
        $data = new Uploads();
        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('storage',$filename);
        $data->file = $filename;
        $data->subject_id = $request->subject_id;
        $data->file_name = $request->file_name;
        $data->save();
        return  redirect()->back();
    }

}
