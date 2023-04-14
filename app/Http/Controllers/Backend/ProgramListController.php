<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\ProgramCategory;
use App\Models\ProgramList;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProgramListController extends Controller
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

    // Program index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('program_list.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $program = ProgramList::orderBy('id', 'desc')->with('dept', 'cate')->get();
        return view('backend.program.list.index', compact('program'));
    }

    // Program create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('program_list.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $depart = Department::orderBy('id', 'desc')->get();
        $cate = ProgramCategory::orderBy('id', 'desc')->get();
        return view('backend.program.list.create', compact('depart', 'cate'));
    }

    // Program data store
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'category' => 'required',
            'name' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required',
            'description' => 'required',
        ]);
        try {
            ProgramList::create([
                'dept_id' => $request->input('department'),
                'cate_id' => $request->input('category'),
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'thumb' => $this->imageUpload($request->file('thumbnail'), 'uploads/program/', 1920, 950),
                'status' => $request->input('status'),
                'desc' => $this->description($request->input('description')),
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

    // Program edit page
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('program_list.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $program = ProgramList::findorfail($id);
        $depart = Department::orderBy('id', 'desc')->get();
        $cate = ProgramCategory::orderBy('id', 'desc')->get();
        return view('backend.program.list.edit', compact('program', 'depart', 'cate'));
    }

    // Program data store
    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => 'required',
            'category' => 'required',
            'name' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required',
            'description' => 'required',
        ]);
        try {
            $program = ProgramList::find($id);
            $program->update([
                'dept_id' => $request->input('department'),
                'cate_id' => $request->input('category'),
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'status' => $request->input('status'),
                'desc' => $this->description($request->input('description')),
                'meta_title' => $request->input('meta_title'),
                'meta_tag' => $request->input('meta_tag'),
                'meta_desc' => $request->input('meta_description'),
            ]);
            if ($request->hasFile('thumbnail')) {
                if (file_exists($path = public_path($program->thumb))) {
                    unlink($path);
                }
                $program->thumb = $this->imageUpload($request->file('thumbnail'), 'uploads/program/', 1920, 950);
                $program->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.program.list.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Program delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('program_list.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $program = ProgramList::findorfail($id);
            if (file_exists($path = public_path($program->thumb))) {
                unlink($path);
            }
            $program->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
