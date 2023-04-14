<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProgramList;
use App\Models\TuitionFee;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TuitionFeeController extends Controller
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
        if (is_null($this->user) || !$this->user->can('tuition_fee.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $tuition = TuitionFee::orderBy('id', 'desc')->with('program')->get();
        return view('backend.program.tuition_fee.index', compact('tuition'));
    }

    // Subject credit create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('tuition_fee.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.program.tuition_fee.create', compact('program'));
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
        if (is_null($this->user) || !$this->user->can('tuition_fee.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $tuition = TuitionFee::findorfail($id);
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.program.tuition_fee.edit', compact('program', 'tuition'));
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
            return redirect()->route('admin.program.tuition.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Subject credit delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('tuition_fee.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
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
