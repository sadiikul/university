<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // User index page
    public function index()
    {
        $user = User::where('role', 2)->orderBy('id', 'desc')->with('dept')->get();
        return view('backend.user.index', compact('user'));
    }

    // User create page
    public function create()
    {
        $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.user.create', compact('dept'));
    }

    // User store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);
        try {
            User::create([
                'role' => 2,
                'name' => $request->input('name'),
                'dept_id' => $request->input('department'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'status' => $request->input('status'),
                'password' => Hash::make($request->input('password'))
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // User edit page
    public function edit($id)
    {
        try {
            $user = User::findorfail($id);
            $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
            return view('backend.user.edit', compact('dept', 'user'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // User data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'department' => 'required',
            'status' => 'required'
        ]);
        try {
            User::find($id)->update([
                'name' => $request->input('name'),
                'dept_id' => $request->input('department'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'status' => $request->input('status')
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.user.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // User delete
    public function destroy($id)
    {
        try {
            User::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function login($id)
    {
        try {
            if (Auth::loginUsingId($id)) {
                Toastr::success('Welcome to your Dashboard', 'Success');
                return redirect()->route('user.dashboard');
            }
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
