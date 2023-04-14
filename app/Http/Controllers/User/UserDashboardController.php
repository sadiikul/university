<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Faculty;
use App\Models\Notice;
use App\Models\ProgramList;
use App\Models\RndPost;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
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
        $program = ProgramList::where('dept_id', $this->user->dept_id)->count();
        $rnd = RndPost::where('dept_id', $this->user->dept_id)->count();
        $faculty = Faculty::where('dept_id', $this->user->dept_id)->count();
        $alumni = Alumni::where('dept_id', $this->user->dept_id)->count();
        $notice = Notice::where('dept_id', $this->user->dept_id)->count();
        $noticeToday = Notice::where('dept_id', $this->user->dept_id)->whereDate('updated_at', '>=', date('Y-m-d'))->count();
        return view('user.dashboard', compact('program', 'rnd', 'faculty', 'alumni', 'notice', 'noticeToday'));
    }

    // Auth Logout
    public function logout()
    {
        Auth::logout();
        Toastr::success('You are Successfuly Logout!!');
        return redirect()->route('home');
    }
}
