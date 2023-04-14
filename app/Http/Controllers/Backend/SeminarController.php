<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SeminarController extends Controller
{
    //use trait
    use UseOfTrait;

    // Seminar index page
    public function index()
    {
        $post = Seminar::orderBy('id', 'desc')->get();
        return view('backend.seminar.index', compact('post'));
    }

    // Seminar create page
    public function create()
    {
        return view('backend.seminar.create');
    }

    // Seminar data store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required',
        ]);
        try {
            Seminar::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'status' => $request->input('status'),
                'desc' => $this->description($request->input('description')),
                'meta_title' => $request->input('meta_title'),
                'meta_tag' => $request->input('meta_tag'),
                'meta_desc' => $request->input('meta_description'),
                'thumb' => $this->imageUpload($request->file('thumbnail'), 'uploads/seminar/', 700, 350),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Seminar edit page
    public function edit($id)
    {
        $post = Seminar::findorfail($id);
        return view('backend.seminar.edit', compact('post'));
    }

    // Seminar update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required',
        ]);
        try {
            $post = Seminar::find($id);
            $post->update([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'status' => $request->input('status'),
                'desc' => $this->description($request->input('description')),
                'meta_title' => $request->input('meta_title'),
                'meta_tag' => $request->input('meta_tag'),
                'meta_desc' => $request->input('meta_description')
            ]);
            if ($request->hasFile('thumbnail')) {
                if (file_exists($path = public_path($post->thumb))) {
                    unlink($path);
                }
                $post->thumb = $this->imageUpload($request->file('thumbnail'), 'uploads/seminar/', 700, 350);
                $post->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.seminar.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Seminar delete
    public function destroy($id)
    {
        try {
            $post = Seminar::findorfail($id);
            if (file_exists($path = public_path($post->thumb))) {
                unlink($path);
            }
            $post->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
