<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        // if (is_null($this->user) || !$this->user->can('user.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        $data = User::where('id','!=',1)->where('role',1)->get();
        return view('backend.permission.role.index', compact('data'));
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('user.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        $roles = Role::where('id', '!=', 1)->get();
        return view('backend.permission.role.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        // Create New User
        $user = new User();
        $user->name = $request->name;
        $user->role = 1;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        Toastr::success('Role create successful!!!');
        return redirect()->back();
    }

    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('user.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        if ($id != 1) {
            $data = User::findorfail($id);
            $roles = Role::where('id', '!=', 1)->get();
            return view('backend.permission.role.edit', compact('data', 'roles'));
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        // Create New User
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        Toastr::success('Role update successful!!!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        // if (is_null($this->user) || !$this->user->can('user.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        User::findorfail($id)->delete();
        Toastr::success('Data delete successful!!!');
        return redirect()->back();
    }
}
