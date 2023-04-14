<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeGallery;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeGalleryController extends Controller
{
    // use trait
    use UseOfTrait;

    // Gallery index page
    public function index()
    {
        $gallery = HomeGallery::orderBy('id', 'desc')->get();
        return view('backend.setting.gallery.index', compact('gallery'));
    }

    // Gallery create page
    public function create()
    {
        return view('backend.setting.gallery.create');
    }

    // Gallery store
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,webp',
        ]);
        try {
            HomeGallery::create([
                'img' => $this->imageUpload($request->file('image'), 'uploads/gallery/', 1024, 600)
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Gallery delete
    public function destroy($id)
    {
        try {
            $gallery = HomeGallery::findorfail($id);
            if (file_exists($path = public_path($gallery->img))) {
                unlink($path);
            }
            $gallery->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
