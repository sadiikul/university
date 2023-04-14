<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Affairs;
use App\Models\Alumni;
use App\Models\CareerForm;
use App\Models\CareerPost;
use App\Models\Club;
use App\Models\Department;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\Message;
use App\Models\Notice;
use App\Models\Partner;
use App\Models\ProgramList;
use App\Models\RndPost;
use App\Models\Seminar;
use App\Models\Subscriber;
use App\Models\WaiverFeedback;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    // Admin Dashboard Page
    public function index()
    {
        $dept = Department::count();
        $program = ProgramList::count();
        $rnd = RndPost::count();
        $faculty = Faculty::count();
        $alumni = Alumni::count();
        $notice = Notice::count();
        $event = Event::count();
        $seminar = Seminar::count();
        $club = Club::count();
        $affairs = Affairs::count();
        $careerPost = CareerPost::count();
        $careerForm = CareerForm::count();
        $subscriber = Subscriber::count();
        $waiver = WaiverFeedback::count();
        $partner = Partner::count();
        $messageToday = Message::whereDate('updated_at', '>=', date('Y-m-d'))->count();
        $careerFormToday = CareerForm::whereDate('updated_at', '>=', date('Y-m-d'))->count();
        $seminarToday = Seminar::whereDate('updated_at', '>=', date('Y-m-d'))->count();
        $eventToday = Event::whereDate('updated_at', '>=', date('Y-m-d'))->count();
        $noticeToday = Notice::whereDate('updated_at', '>=', date('Y-m-d'))->count();
        //return $dept;
        return view('backend.dashboard', compact('dept', 'program', 'rnd', 'faculty', 'alumni', 'notice', 'event', 'seminar', 'club', 'affairs', 'careerPost', 'careerForm', 'subscriber', 'waiver', 'partner', 'messageToday', 'careerFormToday', 'seminarToday', 'eventToday', 'noticeToday'));
    }

    // Auth Logout
    public function logout()
    {
        Auth::logout();
        Toastr::success('You are Successfuly Logout!!');
        return redirect()->route('home');
    }
}
