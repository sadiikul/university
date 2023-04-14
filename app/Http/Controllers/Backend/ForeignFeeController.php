<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ForeigFee;
use App\Models\ProgramList;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ForeignFeeController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    // Fee index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('foreign.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $fee = ForeigFee::orderBy('id', 'desc')->with('program')->get();
        return view('backend.admission.foreign.index', compact('fee'));
    }

    // Fee create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('foreign.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.admission.foreign.create', compact('program'));
    }

    // Fee data store
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'credit' => 'required',
            'duration' => 'required',
            'fee' => 'required',
        ]);
        try {
            ForeigFee::create([
                'program_id' => $request->input('program'),
                'credit' => $request->input('credit'),
                'duration' => $request->input('duration'),
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

    // Fee edit page
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('foreign.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $fee = ForeigFee::findorfail($id);
        $program = ProgramList::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.admission.foreign.edit', compact('program', 'fee'));
    }

    // Fee update
    public function update(Request $request, $id)
    {
        $request->validate([
            'program' => 'required',
            'credit' => 'required',
            'duration' => 'required',
            'fee' => 'required',
        ]);
        try {
            ForeigFee::find($id)->update([
                'program_id' => $request->input('program'),
                'credit' => $request->input('credit'),
                'duration' => $request->input('duration'),
                'fee' => $request->input('fee'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.admission.foreign.fee.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Fee delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('foreign.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            ForeigFee::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
