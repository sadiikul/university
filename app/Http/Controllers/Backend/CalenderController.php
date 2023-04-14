<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calender;
use App\Models\CalenderYear;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CalenderController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    // Calender index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('calender.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $year = CalenderYear::orderBy('id', 'desc')->get();
        return view('backend.admission.calender.index', compact('year'));
    }

    // Calender create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('calender.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        return view('backend.admission.calender.create');
    }

    // Calender store
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|unique:calender_years',
            'status' => 'required'
        ]);
        try {
            $yearId = CalenderYear::create($request->all());
            $year = CalenderYear::all();
            if ($request->status == 1) {
                foreach ($year as $item) {
                    if ($yearId->id !== $item->id) {
                        $update = CalenderYear::find($item->id);
                        $update->status = '0';
                        $update->update();
                    }
                }
            }
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }


    // Calender edit page
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('calender.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $year = CalenderYear::findorfail($id);
        $cal = Calender::where('year_id', $id)->get();
        $group = Calender::where('year_id', $id)->select('month')->orderby('month', 'asc')->get()->unique('month');
        return view('backend.admission.calender.edit', compact('year', 'cal', 'group'));
    }

    // Calender update
    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|unique:calender_years,year,' . $id,
            'status' => 'required'
        ]);
        try {
            $yearId = CalenderYear::find($id);
            $yearId->update($request->all());
            $year = CalenderYear::all();
            if ($request->status == 1) {
                foreach ($year as $item) {
                    if ($yearId->id !== $item->id) {
                        $update = CalenderYear::find($item->id);
                        $update->status = '0';
                        $update->update();
                    }
                }
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Calender store
    public function eventStore(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'month' => 'required',
            'event' => 'required',
        ]);
        try {
            Calender::create($request->all());
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Calender update
    public function eventUpdate(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'month' => 'required',
            'event' => 'required',
        ]);
        try {
            Calender::find($id)->update($request->all());
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function eventDestroy($id)
    {
        try {
            Calender::find($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('calender.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            CalenderYear::find($id)->delete();
            foreach (Calender::where('year_id', $id)->get() as $value) {
                Calender::find($value->id)->delete();
            }
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
