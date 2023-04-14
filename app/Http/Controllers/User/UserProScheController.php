<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProgramList;
use App\Models\ProgramSchedule;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserProScheController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // Schedule index page
    public function index()
    {
        $list = ProgramList::where('dept_id', $this->user->dept_id)->where('status', 1)->with('schedule')->get();
        return view('user.program.schedule.index', compact('list'));
    }

    // Schedule create page
    public function create()
    {
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.schedule.create', compact('program'));
    }

    // Schedule data store
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'semester' => 'required',
            'year' => 'required',
            'course' => 'required',
            'credit' => 'required',
        ]);
        try {
            $check = ProgramSchedule::where('program_id', $request->input('program'))->first();
            if (!$check) {
                ProgramSchedule::create([
                    'program_id' => $request->input('program'),
                    'semester' => $request->input('semester'),
                    'year' => $request->input('year'),
                    'course' => $request->input('course'),
                    'credit' => $request->input('credit'),
                ]);
                Toastr::success('Data created successfull!!!');
                return redirect()->back();
            }
            Toastr::error('This program schedule is already exits!!');
            Session::flash('type', 'error');
            Session::flash('message', 'This program schedule is already exits!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Schedule edit page
    public function edit($id)
    {
        $schedule = ProgramSchedule::findorfail($id);
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.schedule.edit', compact('program', 'schedule'));
    }

    // Schedule data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required',
            'year' => 'required',
            'course' => 'required',
            'credit' => 'required',
        ]);
        try {
            ProgramSchedule::find($id)->update([
                'semester' => $request->input('semester'),
                'year' => $request->input('year'),
                'course' => $request->input('course'),
                'credit' => $request->input('credit'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('user.program.schedule.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Schedule delete
    public function destroy($id)
    {
        try {
            ProgramSchedule::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
