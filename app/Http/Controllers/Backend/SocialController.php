<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{

    // Social icon index page
    public function index()
    {
        $social = Social::orderBy('id', 'desc')->get();
        return view('backend.setting.social.index', compact('social'));
    }

    // Social icon create page
    public function create()
    {
        return view('backend.setting.social.create');
    }

    // Social icon store
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'link' => 'required'
        ]);
        try {
            Social::create($request->all());
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Social icon edit page
    public function edit($id)
    {
        try {
            $social = Social::findorfail($id);
            return view('backend.setting.social.edit', compact('social'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Social icon update
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required',
            'link' => 'required'
        ]);
        try {
            Social::find($id)->update($request->all());
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.social.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Social icon delete
    public function destroy($id)
    {
        try {
            Social::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
