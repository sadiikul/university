<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Forgot;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Login page
    public function index()
    {
        return view('auth.login');
    }

    // Forgot password
    public function forgot()
    {
        return view('auth.forgot');
    }

    // Forgot password
    public function newPass($link)
    {
        $user = User::where('forget', $link)->firstorfail();
        return view('auth.confirm', compact('user'));
    }

    // login access
    public function access(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                if (Auth::user()->status == 1) {
                    if (Auth::user()->role == 1) {
                        Toastr::success('Welcome to your Dashboard', 'Success');
                        return redirect()->route('admin.dashboard');
                    }
                    Toastr::success('Welcome to your Dashboard', 'Success');
                    return redirect()->route('user.dashboard');
                }
                Auth::logout();
                Session::flash('type', 'warning');
                Session::flash('message', 'Your account has been desabled. Please contact with super admin...');
                return redirect()->route('login');
            }
            Toastr::error('Your email or password does not match our record');
            Session::flash('type', 'error');
            Session::flash('message', 'Your email or password does not match our record');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Search Email
    public function search(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }

            $user = User::where('email', $request->email)->first();
            if ($user) {
                $pass = Str::random(30);
                $user->update(['forget' => $pass]);
                Mail::to($user->email)->send(new Forgot($user, $pass));
                Session::flash('type', 'success');
                Session::flash('message', 'I will send reset password link to your email. Please check your email');
                return redirect()->back();
            }
            Toastr::error('Invalid Account');
            Session::flash('type', 'error');
            Session::flash('message', 'Invalid Account');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Password Update
    public function updatePass(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }

            $user = User::find($id);
            $user->update([
                'password' => Hash::make($request->input('password')),
                'forget' => null
            ]);
            if (Auth::loginUsingId($user->id)) {
                if (Auth::user()->status == 1) {
                    if (Auth::user()->role == 1) {
                        Toastr::success('Welcome to your Dashboard', 'Success');
                        return redirect()->route('admin.dashboard');
                    }
                    Toastr::success('Welcome to your Dashboard', 'Success');
                    return redirect()->route('user.dashboard');
                }
                Auth::logout();
                Session::flash('type', 'warning');
                Session::flash('message', 'Your account has been desabled. Please contact with super admin...');
                return redirect()->route('login');
            }
            Toastr::error('Something is wrong');
            Session::flash('type', 'error');
            Session::flash('message', 'Something is wrong');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type', 'error');
            session()->flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
