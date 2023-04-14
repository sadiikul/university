<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProgramList;
use App\Models\SubjectDetails;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubjectDetailController extends Controller
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
        if (is_null($this->user) || !$this->user->can('subject_details.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $subject = SubjectDetails::orderBy('id', 'desc')->with('program')->get();
        return view('backend.program.subject_details.index', compact('subject'));
    }

    // Subject credit create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('subject_details.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.program.subject_details.create', compact('program'));
    }

    // Subject credit data store
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'title' => 'required',
        ]);
        try {
            SubjectDetails::create([
                'program_id' => $request->input('program'),
                'name' => $request->input('title'),
                'desc' => $this->description($request->input('description')),
                'credit' => $request->input('credit'),
                'prere' => $request->input('prerequisite'),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Subject credit edit page
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('subject_details.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $subject = SubjectDetails::findorfail($id);
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.program.subject_details.edit', compact('program', 'subject'));
    }

    // Subject credit update
    public function update(Request $request, $id)
    {
        $request->validate([
            'program' => 'required',
            'title' => 'required',
        ]);
        try {
            SubjectDetails::find($id)->update([
                'program_id' => $request->input('program'),
                'name' => $request->input('title'),
                'desc' => $this->description($request->input('description')),
                'credit' => $request->input('credit'),
                'prere' => $request->input('prerequisite'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.program.subject.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Subject credit delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('subject_details.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            SubjectDetails::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
