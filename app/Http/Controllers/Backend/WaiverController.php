<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WaiverFeedback;
use App\Models\WaiverHead;
use App\Models\WaiverSection;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WaiverController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    use UseOfTrait;

    public function head()
    {
        if (is_null($this->user) || !$this->user->can('waiver.head')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $head = WaiverHead::findorfail(1);
        return view('backend.admission.waiver.heading', compact('head'));
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('waiver.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $section = WaiverSection::orderBy('id', 'desc')->get();
        return view('backend.admission.waiver.index', compact('section'));
    }

    public function feedback()
    {
        if (is_null($this->user) || !$this->user->can('waiver_feedback.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $feedback = WaiverFeedback::orderBy('id', 'desc')->get();
        return view('backend.admission.waiver.feedback', compact('feedback'));
    }

    public function view($id)
    {
        if (is_null($this->user) || !$this->user->can('waiver_feedback.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $feedback = WaiverFeedback::findorfail($id);
        return view('backend.admission.waiver.view', compact('feedback'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('waiver.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        return view('backend.admission.waiver.create');
    }

    public function headUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        try {
            WaiverHead::find($id)->update([
                'desc' => $this->description($request->input('description')),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required',
            'ssc' => 'required',
            'hsc' => 'required',
            'percentage' => 'required',
        ]);
        try {
            WaiverSection::create([
                'section' => $request->input('section'),
                'ssc' => $request->input('ssc'),
                'hsc' => $request->input('hsc'),
                'percentage' => $request->input('percentage')
            ]);
            Toastr::success('Data create successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'section' => 'required',
            'ssc' => 'required',
            'hsc' => 'required',
            'percentage' => 'required',
        ]);
        try {
            WaiverSection::find($id)->update([
                'section' => $request->input('section'),
                'ssc' => $request->input('ssc'),
                'hsc' => $request->input('hsc'),
                'percentage' => $request->input('percentage')
            ]);
            Toastr::success('Data create successfull!!!');
            return redirect()->route('admin.admission.waiver.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('waiver.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $section = WaiverSection::findorfail($id);
        return view('backend.admission.waiver.edit', compact('section'));
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('waiver.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            WaiverSection::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function feedbackDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('waiver_feedback.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            WaiverFeedback::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
