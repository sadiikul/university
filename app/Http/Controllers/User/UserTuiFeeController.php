<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProgramList;
use App\Models\TuitionFee;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserTuiFeeController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // Subject credit index page
    public function index()
    {
        $list = ProgramList::where('dept_id', $this->user->dept_id)->where('status', 1)->with('tuition')->get();
        return view('user.program.tuition_fee.index', compact('list'));
    }

    // Subject credit create page
    public function create()
    {
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.tuition_fee.create', compact('program'));
    }

    // Subject credit data store
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'title' => 'required',
            'fee' => 'required',
        ]);
        try {
            TuitionFee::create([
                'program_id' => $request->input('program'),
                'particular' => $request->input('title'),
                'fee' => $request->input('fee'),
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
        $tuition = TuitionFee::findorfail($id);
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.tuition_fee.edit', compact('program', 'tuition'));
    }

    // Subject credit update
    public function update(Request $request, $id)
    {
        $request->validate([
            'program' => 'required',
            'title' => 'required',
            'fee' => 'required',
        ]);
        try {
            TuitionFee::find($id)->update([
                'program_id' => $request->input('program'),
                'particular' => $request->input('title'),
                'fee' => $request->input('fee'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('user.program.tuition.index');
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
            TuitionFee::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
