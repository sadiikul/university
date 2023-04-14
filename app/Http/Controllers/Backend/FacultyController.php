<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\ProgramList;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FacultyController extends Controller
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

    // Faculty index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('faculty.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $faculty = Faculty::orderBy('id', 'desc')->with('dept')->get();
        return view('backend.faculty.index', compact('faculty'));
    }

    // Faculty create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('faculty.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.faculty.create', compact('program', 'dept'));
    }

    // Faculty store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'position' => 'required',
            'from' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            Faculty::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dept_id' => $request->input('department'),
                'designation' => $request->input('designation'),
                'desc' => $request->input('description'),
                'publication' => $request->input('publication'),
                'achievements' => $request->input('achievements'),
                'position' => $request->input('position'),
                'from' => $request->input('from'),
                'program_id' => json_encode($request->input('program')),
                'img' => $this->imageUpload($request->file('image'), 'uploads/faculty/', 500, 500),
                'status' => $request->input('status'),
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
        if (is_null($this->user) || !$this->user->can('faculty.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $faculty = Faculty::findorfail($id);
            $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
            $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
            return view('backend.faculty.edit', compact('program', 'dept', 'faculty'));
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
            'department' => 'required',
            'designation' => 'required',
            'position' => 'required',
            'from' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $faculty = Faculty::find($id);
            $faculty->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dept_id' => $request->input('department'),
                'desc' => $request->input('description'),
                'designation' => $request->input('designation'),
                'publication' => $request->input('publication'),
                'achievements' => $request->input('achievements'),
                'position' => $request->input('position'),
                'from' => $request->input('from'),
                'program_id' => json_encode($request->input('program')),
                'status' => $request->input('status'),
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($faculty->img))) {
                    unlink($path);
                }
                $faculty->img = $this->imageUpload($request->file('image'), 'uploads/faculty/', 500, 500);
                $faculty->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.faculty.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('faculty.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $faculty = Faculty::findorfail($id);
            if (file_exists($path = public_path($faculty->img))) {
                unlink($path);
            }
            $faculty->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
