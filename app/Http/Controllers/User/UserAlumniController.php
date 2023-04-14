<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Department;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAlumniController extends Controller
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

    // Alumni index page
    public function index()
    {
        $student = Alumni::where('dept_id', $this->user->dept_id)->orderBy('id', 'desc')->get();
        return view('user.alumni.index', compact('student'));
    }

    // Alumni create page
    public function create()
    {
        return view('user.alumni.create');
    }

    // Alumni store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'batch' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            Alumni::create([
                'name' => $request->input('name'),
                'dept_id' => $this->user->dept_id,
                'batch' => $request->input('batch'),
                'img' => $this->imageUpload($request->file('image'), 'uploads/alumni/', 500, 500),
                'status' => $request->input('status')
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Alumni edit page
    public function edit($id)
    {
        try {
            $student = Alumni::findorfail($id);
            return view('user.alumni.edit', compact('student'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Alumni data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'batch' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $student = Alumni::find($id);
            $student->update([
                'name' => $request->input('name'),
                'dept_id' => $this->user->dept_id,
                'batch' => $request->input('batch'),
                'status' => $request->input('status')
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($student->img))) {
                    unlink($path);
                }
                $student->img = $this->imageUpload($request->file('image'), 'uploads/alumni/', 500, 500);
                $student->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('user.alumni.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Alumni delete
    public function destroy($id)
    {
        try {
            $student = Alumni::findorfail($id);
            if (file_exists($path = public_path($student->img))) {
                unlink($path);
            }
            $student->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
