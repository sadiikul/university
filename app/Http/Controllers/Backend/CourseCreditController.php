<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseCredit;
use App\Models\ProgramList;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseCreditController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // Course credit index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('credit_hour.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $course = CourseCredit::orderBy('id', 'desc')->with('program')->get();
        return view('backend.program.course_creadit.index', compact('course'));
    }

    // Course credit create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('credit_hour.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.program.course_creadit.create', compact('program'));
    }

    // Course credit data store
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'area' => 'required',
        ]);
        try {
            CourseCredit::create([
                'program_id' => $request->input('program'),
                'area' => $request->input('area'),
                'no' => $request->input('no'),
                'hour' => $request->input('hour'),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Course credit edit page
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('credit_hour.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $course = CourseCredit::findorfail($id);
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.program.course_creadit.edit', compact('program', 'course'));
    }

    // Course credit update
    public function update(Request $request, $id)
    {
        $request->validate([
            'program' => 'required',
            'area' => 'required',
        ]);
        try {
            CourseCredit::find($id)->update([
                'program_id' => $request->input('program'),
                'area' => $request->input('area'),
                'no' => $request->input('no'),
                'hour' => $request->input('hour'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.program.course.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Course credit delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('credit_hour.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            CourseCredit::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
