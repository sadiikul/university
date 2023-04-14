<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Affairs;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AffairsController extends Controller
{
    // use Trait
    use UseOfTrait;

    // Faculty index page
    public function index()
    {
        $affairs = Affairs::orderBy('id', 'desc')->get();
        return view('backend.affairs.index', compact('affairs'));
    }

    // Faculty create page
    public function create()
    {
        return view('backend.affairs.create');
    }

    // Faculty store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            Affairs::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'desig' => $request->input('designation'),
                'img' => $this->imageUpload($request->file('image'), 'uploads/affairs/', 500, 500),
                'status' => $request->input('status')
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty edit page
    public function edit($id)
    {
        try {
            $affairs = Affairs::findorfail($id);
            return view('backend.affairs.edit', compact('affairs'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $affairs = Affairs::find($id);
            $affairs->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'desig' => $request->input('designation'),
                'status' => $request->input('status')
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($affairs->img))) {
                    unlink($path);
                }
                $affairs->img = $this->imageUpload($request->file('image'), 'uploads/affairs/', 500, 500);
                $affairs->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.affairs.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty delete
    public function destroy($id)
    {
        try {
            $affairs = Affairs::findorfail($id);
            if (file_exists($path = public_path($affairs->img))) {
                unlink($path);
            }
            $affairs->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
