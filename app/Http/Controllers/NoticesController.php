<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function view()
    {
        $items = Notices::latest()->get();
        return view('Admin.Notices.addNotice', compact('items'));
    }

    public function add(Request $request)
    {
        Notices::create($request->all());
        return redirect()->back()->with('success', 'Notices Added Successfully');
    }

    public function delete($id)
    {
        Notices::find($id)->delete();
        return redirect()->back()->with('success', 'Notices Deleted Successfully');
    }

    public function edit($id)
    {
        $notice = Notices::find($id);
        return view('Admin.Notices.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        Notices::find($id)->update($request->all());
        return redirect()->route('dashboard.notices')->with('success', 'Notices Updated Successfully');
    }
}
