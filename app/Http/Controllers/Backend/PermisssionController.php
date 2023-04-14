<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisssionController extends Controller
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
        // if (is_null($this->user) || !$this->user->can('role.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        $roles = Role::where('id', '!=', 1)->get();
        return view('backend.permission.index', compact('roles'));
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('role.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        $group = User::getGroupName();
        $allPermissions = Permission::get();
        $total = count($group) + count($allPermissions);
        return view('backend.permission.create', compact('group', 'allPermissions', 'total'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'role' => 'required|unique:roles,name',
            ],
            [
                'role.required' => 'The role name field is require'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $role = Role::create(['name' => $request->input('role')]);
        $permission = $request->input('permission');
        if (!empty($permission)) {
            $role->syncPermissions($permission);
        }
        Toastr::success('Permission create successful!!');
        return redirect()->back();
    }

    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('user.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        if ($id != 1) {
            $group = User::getGroupName();
            $allPermissions = Permission::get();
            $total = count($group) + count($allPermissions);
            $roles = Role::findorfail($id);
            return view('backend.permission.edit', compact('group', 'allPermissions', 'total', 'roles'));
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'role' => 'required',
            ],
            [
                'role.required' => 'The role name field is require'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $role = Role::find($id);
        $permission = $request->input('permission');
        if (!empty($permission)) {
            $role->syncPermissions($permission);
        }
        Toastr::success('Permission update successful!!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        // if (is_null($this->user) || !$this->user->can('user.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }
        $role = Role::find($id);
        if (!is_null($role)) {
            $role->delete();
        }
        Toastr::success('Role delete successful!!');
        return redirect()->back();
    }
}

