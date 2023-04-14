<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProgramList;
use App\Models\SubjectDetails;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSubDeController extends Controller
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
        $list = ProgramList::where('dept_id', $this->user->dept_id)->where('status', 1)->with('subject')->get();
        return view('user.program.subject_details.index', compact('list'));
    }

    // Subject credit create page
    public function create()
    {
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.subject_details.create', compact('program'));
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
        $subject = SubjectDetails::findorfail($id);
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.subject_details.edit', compact('program', 'subject'));
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
            return redirect()->route('user.program.subject.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Subject credit delete
    public function destroy($id)
    {
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
