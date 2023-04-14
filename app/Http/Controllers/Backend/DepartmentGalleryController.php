<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentGallery;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DepartmentGalleryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('department_gallery.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $gallery = DepartmentGallery::orderBy('id', 'desc')->with('dept')->get();
        return view('backend.academics.gallery.index', compact('gallery'));
    }

    // Gallery create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('department_gallery.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.academics.gallery.create', compact('dept'));
    }

    // Gallery store
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
        ]);
        try {
            DepartmentGallery::create([
                'dept_id' => $request->input('department'),
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
        if (is_null($this->user) || !$this->user->can('department_gallery.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $gallery = DepartmentGallery::findorfail($id);
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
