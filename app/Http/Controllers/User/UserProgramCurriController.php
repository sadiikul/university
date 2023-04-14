<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProgramCurriculum;
use App\Models\ProgramList;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserProgramCurriController extends Controller
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

    // Curriculum index page
    public function index()
    {
        $list = ProgramList::where('dept_id', $this->user->dept_id)->where('status', 1)->with('curr')->get();
        return view('user.program.curriculum.index', compact('list'));
    }

    // Curriculum create page
    public function create()
    {
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.curriculum.create', compact('program'));
    }

    // Curriculum data store
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'description' => 'required'
        ]);
        try {
            ProgramCurriculum::create([
                'program_id' => $request->input('program'),
                'desc' => $this->description($request->input('description')),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Curriculum edit page
    public function edit($id)
    {
        $curri = ProgramCurriculum::findorfail($id);
        $program = ProgramList::where('dept_id', $this->user->dept_id)->where('status', '1')->orderBy('id', 'desc')->get();
        return view('user.program.curriculum.edit', compact('program', 'curri'));
    }

    // Curriculum update
    public function update(Request $request, $id)
    {
        $request->validate([
            'program' => 'required',
            'description' => 'required'
        ]);
        try {
            ProgramCurriculum::find($id)->update([
                'program_id' => $request->input('program'),
                'desc' => $this->description($request->input('description')),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('user.program.curriculum.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Curriculum delete
    public function destroy($id)
    {
        try {
            ProgramCurriculum::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
