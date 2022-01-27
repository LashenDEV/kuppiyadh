<?php

namespace App\Http\Controllers;

use App\Models\Uploads;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('userDashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('adminDashboard');
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

    public function viewUsers()
    {
        $users = User::paginate(10);
        return view('showUsers', compact('users'));
    }


}
