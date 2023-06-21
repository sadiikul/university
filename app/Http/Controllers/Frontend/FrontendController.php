<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutHead;
use App\Models\Accommodation;
use App\Models\Administration;
use App\Models\Admission;
use App\Models\AdmissionPage;
use App\Models\Affairs;
use App\Models\Alumni;
use App\Models\BoardMember;
use App\Models\Calender;
use App\Models\CalenderYear;
use App\Models\CareerForm;
use App\Models\CareerPost;
use App\Models\Club;
use App\Models\CouncilHead;
use App\Models\CouncilMember;
use App\Models\Counter;
use App\Models\CourseCredit;
use App\Models\Customize;
use App\Models\Department;
use App\Models\DepartmentGallery;
use App\Models\DepartmentSlider;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\ForeigFee;
use App\Models\ForeignHead;
use App\Models\HomeGallery;
use App\Models\HomeSlider;
use App\Models\Institute;
use App\Models\Iqac;
use App\Models\Management;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Partner;
use App\Models\ProgramCategory;
use App\Models\ProgramCurriculum;
use App\Models\ProgramList;
use App\Models\ProgramSchedule;
use App\Models\ProViceChancellor;
use App\Models\RndGallery;
use App\Models\RndPost;
use App\Models\Seminar;
use App\Models\SubjectDetails;
use App\Models\SyndicateHead;
use App\Models\SyndicateMember;
use App\Models\TuitionFee;
use App\Models\ViceChancellor;
use App\Models\WaiverFeedback;
use App\Models\WaiverHead;
use App\Models\WaiverSection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    // Frontend Home Page
    public function index()
    {
        $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
        $slider = HomeSlider::where('status', '1')->orderBy('id', 'desc')->get();
        $customize = Customize::firstorfail();
        $admission = Admission::firstorfail();
        $manage = Management::firstorfail();
        $seminar = Seminar::where('status', '1')->limit(10)->orderBy('id', 'desc')->get();
        $clubs = Club::where('status', '1')->limit(10)->orderBy('id', 'desc')->get();
        $notice = Notice::where('status', 1)->limit(10)->orderBy('id', 'desc')->get();
        $event = Event::where('status', 1)->limit(10)->orderBy('id', 'desc')->get();
        $gallery = HomeGallery::limit(20)->orderBy('id', 'desc')->get();
        $partner = Partner::orderBy('id', 'desc')->get();
        $counter = Counter::firstorfail();
        return view('frontend.home', compact('dept', 'slider', 'customize', 'admission', 'manage', 'seminar', 'notice', 'event', 'partner', 'counter', 'gallery', 'clubs'));
    }

    // Department page
    public function department($slug)
    {
        $dept = Department::whereSlug($slug)->firstorfail();
        $slider = DepartmentSlider::where(['dept_id' => $dept->id, 'status' => '1'])->orderBy('id', 'desc')->get();
        $head = Faculty::where(['dept_id' => $dept->id, 'desig' => 1, 'status' => 1])->orderBy('id', 'desc')->get();
        $faculty = Faculty::where(['dept_id' => $dept->id, 'desig' => 0, 'status' => 1])->orderBy('id', 'desc')->get();
        $rd = RndPost::where(['dept_id' => $dept->id, 'status' => 1])->orderBy('id', 'desc')->limit(3)->get();
        $cate = ProgramCategory::where(['status' => 1])->with('list')->orderBy('id', 'desc')->get();
        $notice = Notice::where(['dept_id' => $dept->id, 'status' => 1])->limit(10)->orderBy('id', 'desc')->get();
        $alumni = Alumni::where(['dept_id' => $dept->id, 'status' => 1])->limit(10)->orderBy('id', 'desc')->with('dept')->get();
        $gallery = DepartmentGallery::where(['dept_id' => $dept->id])->limit(20)->orderBy('id', 'desc')->get();
        return view('frontend.department', compact('slider', 'dept', 'head', 'rd', 'faculty', 'cate', 'notice', 'alumni', 'gallery'));
    }

    public function rnd($slug)
    {
        $dept = Department::whereSlug($slug)->firstorfail();
        $rnd = RndPost::where(['dept_id' => $dept->id, 'status' => '1'])->orderBy('id', 'desc')->paginate(9);
        $gallery = RndGallery::limit(20)->orderBy('id', 'desc')->get();
        return view('frontend.rnd', compact('rnd', 'gallery'));
    }

    public function rndAll()
    {
        $rnd = RndPost::where(['status' => '1'])->orderBy('id', 'desc')->paginate(9);
        $gallery = RndGallery::limit(20)->orderBy('id', 'desc')->get();
        return view('frontend.rnd', compact('rnd', 'gallery'));
    }

    public function rndDetails($slug)
    {
        $rnd = RndPost::whereSlug($slug)->firstorfail();
        return view('frontend.rnd_details', compact('rnd'));
    }

    public function program($name, $slug)
    {
        $program = ProgramList::whereSlug($slug)->firstorfail();
        $curri = ProgramCurriculum::where('program_id', $program->id)->orderBy('id', 'desc')->get();
        $faculty = Faculty::where(['status' => 1])->orderBy('id', 'desc')->get();
        $schedule = ProgramSchedule::where('program_id', $program->id)->get();
        $course = CourseCredit::where('program_id', $program->id)->get();
        $sub = SubjectDetails::where('program_id', $program->id)->get();
        $fee = TuitionFee::where('program_id', $program->id)->get();
        return view('frontend.program', compact('program', 'faculty', 'schedule', 'curri', 'course', 'sub', 'fee', 'name'));
    }

    public function notice($id)
    {
        $notice = Notice::findorfail($id);
        return view('frontend.notice', compact('notice'));
    }

    public function iqac()
    {
        $iqac = Iqac::firstorfail();
        return view('frontend.iqac', compact('iqac'));
    }

    public function programList()
    {
        $program = ProgramCategory::where(['status' => 1])->with('list')->orderBy('id', 'desc')->get();
        return view('frontend.program_list', compact('program'));
    }

    public function faculty()
    {
        $departments = Department::where(['status' => '1'])->paginate(15);
        return view('frontend.faculty', compact('departments'));
    }

    public function departmentWiseFaculty(Department $department)
    {
        $faculty = Faculty::with('dept')->where(['status' => '1'])->where('dept_id', $department->id)->paginate(15);
        // return $faculty;
        return view('frontend.department-wise-faculty', compact('faculty'));
    }

    public function tuition()
    {
        $program = ProgramCategory::where(['status' => 1])->with('list.fee')->orderBy('id', 'desc')->get();
        return view('frontend.tuition_fee', compact('program'));
    }

    public function admission()
    {
        $admission = AdmissionPage::firstorfail();
        return view('frontend.admission', compact('admission'));
    }

    public function accommodation()
    {
        $head = Accommodation::firstorfail();
        return view('frontend.accommodation', compact('head'));
    }

    public function foreign()
    {
        $foreign = ForeigFee::with('program')->get();
        $admission = Admission::firstorfail();
        $head = ForeignHead::firstorfail();
        return view('frontend.foreign', compact('foreign', 'admission', 'head'));
    }

    public function waiver()
    {
        $waiver = WaiverSection::get();
        $admission = Admission::firstorfail();
        $head = WaiverHead::firstorfail();
        return view('frontend.waiver', compact('waiver', 'admission', 'head'));
    }

    // Waiver Feedback Store
    public function waiverStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'ssc' => 'required',
                'hsc' => 'required',
                'extra' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }

            WaiverFeedback::create($request->all());
            Toastr::success('Thank you for submit');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::error($error->getMessage());
            return redirect()->back();
        }
    }

    public function board()
    {
        $member = BoardMember::where(['status' => 1])->orderBy('id', 'desc')->get();
        return view('frontend.board_of_trustes', compact('member'));
    }

    public function calender()
    {
        $year = CalenderYear::where('status', '1')->firstorfail();
        $cal = Calender::where('year_id', $year->id)->get();
        $group = Calender::where('year_id', $year->id)->select('month')->orderby('month', 'asc')->get()->unique('month');
        return view('frontend.calender', compact('year', 'cal', 'group'));
    }

    public function syndicate()
    {
        $member = SyndicateMember::where(['status' => 1])->orderBy('id', 'desc')->get();
        $management = Management::firstorfail();
        $head = SyndicateHead::firstorfail();
        return view('frontend.syndicate', compact('member', 'management', 'head'));
    }

    public function council()
    {
        $member = CouncilMember::orderBy('id', 'desc')->get();
        $management = Management::firstorfail();
        $head = CouncilHead::firstorfail();
        return view('frontend.council', compact('member', 'management', 'head'));
    }

    public function vice()
    {
        $member = ViceChancellor::firstorfail();
        return view('frontend.vice', compact('member'));
    }

    public function pro()
    {
        $member = ProViceChancellor::firstorfail();
        return view('frontend.pro', compact('member'));
    }

    public function admini($slug)
    {
        $adminis = Administration::whereSlug($slug)->firstorfail();
        return view('frontend.admini', compact('adminis'));
    }

    public function administration()
    {
        $adminis = Administration::where(['status' => '1'])->orderBy('id', 'desc')->get();
        return view('frontend.all_admini', compact('adminis'));
    }

    public function seminar()
    {
        $seminar = Seminar::where(['status' => '1'])->orderBy('id', 'desc')->paginate(9);
        return view('frontend.seminar', compact('seminar'));
    }

    public function seminarDetails($slug)
    {
        $seminar = Seminar::whereSlug($slug)->firstorfail();
        return view('frontend.seminar_details', compact('seminar'));
    }

    public function event()
    {
        $event = Event::where(['status' => '1'])->orderBy('id', 'desc')->paginate(9);
        return view('frontend.event', compact('event'));
    }

    public function eventDetails($slug)
    {
        $event = Event::whereSlug($slug)->firstorfail();
        return view('frontend.event_details', compact('event'));
    }

    public function club()
    {
        $club = Club::where(['status' => '1'])->orderBy('id', 'desc')->paginate(9);
        return view('frontend.club', compact('club'));
    }

    public function clubDetails($slug)
    {
        $club = Club::whereSlug($slug)->firstorfail();
        return view('frontend.club_details', compact('club'));
    }

    public function affairs()
    {
        $affairs = Affairs::where(['status' => '1'])->orderBy('id', 'desc')->paginate(12);
        return view('frontend.affairs', compact('affairs'));
    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->firstorfail();
        return view('frontend.other', compact('page'));
    }

    public function about()
    {
        $head = AboutHead::firstorfail();
        $section = About::all();
        return view('frontend.about', compact('section', 'head'));
    }



    public function alumni()
    {
        $alumni = Alumni::where(['status' => '1'])->with('dept')->orderBy('id', 'desc')->paginate(15);
        return view('frontend.alumni', compact('alumni'));
    }

    public function career()
    {
        $list = CareerPost::where('deadline', '>=', date('Y-m-d H:i:s'))->where('status', '1')->orderBy('id', 'desc')->paginate(12);
        return view('frontend.career', compact('list'));
    }

    public function careerDetails($slug)
    {
        $list = CareerPost::whereSlug($slug)->where('deadline', '>=', date('Y-m-d H:i:s'))->where('status', '1')->firstorfail();
        return view('frontend.career_details', compact('list'));
    }

    public function institute($slug)
    {
        $ins = Institute::whereSlug($slug)->firstorfail();
        $dept = Department::where('status', 1)->with('program')->get();
        return view('frontend.institute', compact('ins', 'dept'));
    }

    public function careerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'joining_date' => 'required',
            'expected_salary' => 'required',
            'experience' => 'required',
            'message' => 'required',
            'portfolio_link' => 'required',
            'resume' => 'required|mimes:pdf|max:5000',
        ]);
        try {
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $resumeName = substr(md5(time()), 0, 20) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/career/', $resumeName);
            }
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $coverName = substr(md5(time()), 0, 20) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/career/', $coverName);
                $cover = 'uploads/career/' . $coverName;
            } else {
                $cover = null;
            }

            CareerForm::create([
                'post_id' => $request->input('post_id'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'joining_date' => $request->input('joining_date'),
                'expected_salary' => $request->input('expected_salary'),
                'experience' => $request->input('experience'),
                'message' => $request->input('message'),
                'portfolio_link' => $request->input('portfolio_link'),
                'resume' => 'uploads/career/' . $resumeName,
                'cover' => $cover,
                'status' => '0'
            ]);
            Toastr::success('Thank you', 'success');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::error($error->getMessage());
            return redirect()->back();
        }
    }
}
