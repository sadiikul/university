<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentSlider;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DepartmentSliderController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // use trait
    use UseOfTrait;

    // Slider index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('department_slider.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $slider = DepartmentSlider::orderBy('id', 'desc')->with('dept')->get();
        return view('backend.academics.slider.index', compact('slider'));
    }

    // Slider create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('department_slider.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.academics.slider.create', compact('dept'));
    }

    // Slider store
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            DepartmentSlider::create([
                'dept_id' => $request->input('department'),
                'img' => $this->imageUpload($request->file('image'), 'uploads/slider/', 1920, 950),
                'status' => $request->input('status'),
                'show' => $request->input('show') == 'on' ? '1' : '0',
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Slider edit page
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('department_slider.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $slider = DepartmentSlider::findorfail($id);
            $depart = Department::where('status', '1')->orderBy('id', 'desc')->get();
            return view('backend.academics.slider.edit', compact('slider', 'depart'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Slider update
    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $slider = DepartmentSlider::find($id);
            $slider->update([
                'dept_id' => $request->input('department'),
                'status' => $request->input('status'),
                'show' => $request->input('show') == 'on' ? '1' : '0',
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($slider->img))) {
                    unlink($path);
                }
                $slider->img = $this->imageUpload($request->file('image'), 'uploads/slider/', 1920, 950);
                $slider->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.academics.slider.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Slider delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('department_slider.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $slider = DepartmentSlider::findorfail($id);
            if (file_exists($path = public_path($slider->img))) {
                unlink($path);
            }
            $slider->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
