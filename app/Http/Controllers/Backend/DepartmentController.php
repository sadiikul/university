<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // use Trait
    use UseOfTrait;

    // Department index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('department.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $department = Department::orderBy('id', 'desc')->get();
        return view('backend.academics.department.index', compact('department'));
    }

    // Department create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('department.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        return view('backend.academics.department.create');
    }

    // Department store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments,name',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            Department::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'thumb' => $this->imageUpload($request->file('thumbnail'), 'uploads/department/', 700, 350),
                'status' => $request->input('status'),
                'meta_title' => $request->input('meta_title'),
                'meta_tag' => $request->input('meta_tag'),
                'meta_desc' => $request->input('meta_description'),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Department edit page
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('department.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $depart = Department::findorfail($id);
            return view('backend.academics.department.edit', compact('depart'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Department data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $id,
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {

            $dep = Department::find($id);
            $dep->update([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'status' => $request->input('status'),
                'meta_title' => $request->input('meta_title'),
                'meta_tag' => $request->input('meta_tag'),
                'meta_desc' => $request->input('meta_description'),
            ]);
            if ($request->hasFile('thumbnail')) {
                if (file_exists($path = public_path($dep->thumb))) {
                    unlink($path);
                }
                $dep->thumb = $this->imageUpload($request->file('thumbnail'), 'uploads/department/', 700, 350);
                $dep->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.academics.department.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Department delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('department.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $dep = Department::findorfail($id);
            if (file_exists($path = public_path($dep->thumb))) {
                unlink($path);
            }
            $dep->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
