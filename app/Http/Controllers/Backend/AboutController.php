<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutHead;
use App\Trait\UseOfTrait;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    //use trait
    use UseOfTrait;

    // About Head
    public function head()
    {
        $head = AboutHead::findorfail(1);
        return view('backend.about.head.edit', compact('head'));
    }

    // About update
    public function headUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
        ]);
        try {
            $head = AboutHead::find($id);
            $head->update([
                'desc' => $this->description($request->input('description')),
            ]);
            if ($request->hasFile('thumbnail')) {
                if (file_exists($path = public_path($head->img))) {
                    unlink($path);
                }
                $head->img = $this->imageUpload($request->file('thumbnail'), 'uploads/about/', 550, 180);
                $head->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // About index page
    public function index()
    {
        $section = About::orderBy('id', 'desc')->get();
        return view('backend.about.section.index', compact('section'));
    }

    // About create page
    public function create()
    {
        return view('backend.about.section.create');
    }

    // About store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        try {
            About::create([
                'title' => $request->input('title'),
                'desc' => $request->input('description')
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // About edit page
    public function edit($id)
    {
        try {
            $section = About::findorfail($id);
            return view('backend.about.section.edit', compact('section'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // About data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        try {
            $section = About::find($id);
            $section->update([
                'title' => $request->input('title'),
                'desc' => $request->input('description')
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.about.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // About delete
    public function destroy($id)
    {
        try {
            About::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
