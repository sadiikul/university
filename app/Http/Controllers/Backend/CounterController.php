<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CounterController extends Controller
{
    // Counter edit page
    public function edit()
    {
        try {
            $counter = Counter::findorfail(1);
            return view('backend.counter.edit', compact('counter'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Counter data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'faculty' => 'required',
            'program' => 'required',
            'graduates' => 'required'
        ]);
        try {
            $affairs = Counter::find($id);
            $affairs->update([
                'title' => $request->input('title'),
                'desc' => $request->input('description'),
                'faculty' => $request->input('faculty'),
                'program' => $request->input('program'),
                'graduates' => $request->input('graduates')
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
