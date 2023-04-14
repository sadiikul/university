<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Administration;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdministrationController extends Controller
{
    // use Trait
    use UseOfTrait;

    // Administration index page
    public function index()
    {
        $member = Administration::orderBy('id', 'desc')->get();
        return view('backend.management.administration.index', compact('member'));
    }

    // Administration create page
    public function create()
    {
        return view('backend.management.administration.create');
    }

    // Administration store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        try {
            Administration::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'desc' => $this->description($request->input('description')),
                'status' => $request->input('status'),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Administration edit page
    public function edit($id)
    {
        try {
            $member = Administration::findorfail($id);
            return view('backend.management.administration.edit', compact('member'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Administration data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        try {
            $member = Administration::find($id);
            $member->update([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'desc' => $this->description($request->input('description')),
                'status' => $request->input('status'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.management.administration.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Administration delete
    public function destroy($id)
    {
        try {
            Administration::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
