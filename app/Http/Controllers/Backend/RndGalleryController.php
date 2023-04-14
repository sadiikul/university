<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RndGallery;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RndGalleryController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    //use trait
    use UseOfTrait;

    // Subject credit index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('rnd_gallery.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $gallery = RndGallery::orderBy('id', 'desc')->get();
        return view('backend.rnd.gallery.index', compact('gallery'));
    }

    // Subject credit create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('rnd_gallery.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        return view('backend.rnd.gallery.create');
    }

    // Subject credit data store
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,webp'
        ]);
        try {
            RndGallery::create([
                'img' => $this->imageUpload($request->file('image'), 'uploads/gallery/', 1024, 600),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }


    // Subject credit delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('rnd_gallery.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $img = RndGallery::findorfail($id);
            if (file_exists($path = public_path($img->img))) {
                unlink($path);
            }
            $img->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
