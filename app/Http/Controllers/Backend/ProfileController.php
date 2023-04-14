<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Trait\UseOfTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    use UseOfTrait;

    public function edit()
    {
        return view('backend.profile.edit');
    }

    public function passwordEdit()
    {
        return view('backend.profile.password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'img' => 'mimes:png,jpg,jpeg',
            'phone' => 'required',
        ]);
        try {
            $user = User::find(Auth::id());
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ]);
            if ($request->hasFile('image')) {
                if ($user->img !== null) {
                    if (file_exists($path = public_path($user->img))) {
                        unlink($path);
                    }
                }
                $user->img = $this->imageUpload($request->file('image'), 'uploads/profile/', 500, 500);
                $user->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request)
    {
        try {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed'
            ]);

            $user = User::find(Auth::id());
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                Toastr::success("Password Changed Successfully!");
                return redirect()->route('login');
            } else {
                Toastr::error("Password doesn't match!");
                return redirect()->back();
            }
        } catch (\Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
