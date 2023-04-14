<?php

namespace App\Http\Controllers\User;

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

class UserProgramListController extends Controller
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
        $program = ProgramList::where('dept_id', $this->user->dept_id)->orderBy('id', 'desc')->get();
        return view('user.program.list.index', compact('program'));
    }

    // Program create page
    public function create()
    {
        $cate = ProgramCategory::orderBy('id', 'desc')->get();
        return view('user.program.list.create', compact('cate'));
    }

    // Program data store
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required',
            'description' => 'required',
        ]);
        try {
            ProgramList::create([
                'dept_id' => $this->user->dept_id,
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
        $program = ProgramList::where('dept_id', $this->user->dept_id)->findorfail($id);
        $cate = ProgramCategory::orderBy('id', 'desc')->get();
        return view('user.program.list.edit', compact('program','cate'));
    }

    // Program data store
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required',
            'description' => 'required',
        ]);
        try {
            $program = ProgramList::find($id);
            $program->update([
                'dept_id' => $this->user->dept_id,
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
            return redirect()->route('user.program.list.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Program delete
    public function destroy($id)
    {
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
