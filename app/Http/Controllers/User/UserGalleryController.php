<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentGallery;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserGalleryController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // use trait
    use UseOfTrait;

    // Gallery index page
    public function index()
    {
        $gallery = DepartmentGallery::where('dept_id', $this->user->dept_id)->orderBy('id', 'desc')->with('dept')->get();
        return view('user.academics.gallery.index', compact('gallery'));
    }

    // Gallery create page
    public function create()
    {
        return view('user.academics.gallery.create');
    }

    // Gallery store
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,webp',
        ]);
        try {
            DepartmentGallery::create([
                'dept_id' => $this->user->dept_id,
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
            $gallery = DepartmentGallery::where('dept_id', $this->user->dept_id)->findorfail($id);
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
