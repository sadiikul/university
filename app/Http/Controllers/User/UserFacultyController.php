<?php

namespace App\Http\Controllers\User;

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

class UserFacultyController extends Controller
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
        $faculty = Faculty::where('dept_id', $this->user->dept_id)->orderBy('id', 'desc')->get();
        return view('user.faculty.index', compact('faculty'));
    }

    // Faculty create page
    public function create()
    {
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.faculty.create', compact('program'));
    }

    // Faculty store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            Faculty::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dept_id' => $this->user->dept_id,
                'desig' => $request->input('designation'),
                'program_id' => json_encode($request->input('program')),
                'img' => $this->imageUpload($request->file('image'), 'uploads/faculty/', 500, 500),
                'status' => $request->input('status'),
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

    // Faculty edit page
    public function edit($id)
    {
        try {
            $faculty = Faculty::findorfail($id);
            $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
            return view('user.faculty.edit', compact('program', 'faculty'));
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
            'designation' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $faculty = Faculty::find($id);
            $faculty->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dept_id' => $this->user->dept_id,
                'desig' => $request->input('designation'),
                'program_id' => json_encode($request->input('program')),
                'status' => $request->input('status'),
                'desc' => $request->input('description')
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($faculty->img))) {
                    unlink($path);
                }
                $faculty->img = $this->imageUpload($request->file('image'), 'uploads/faculty/', 500, 500);
                $faculty->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('user.faculty.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty delete
    public function destroy($id)
    {
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

