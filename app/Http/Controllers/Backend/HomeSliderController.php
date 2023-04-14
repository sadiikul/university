<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeSliderController extends Controller
{
    // use trait
    use UseOfTrait;

    // Slider index page
    public function index()
    {
        $slider = HomeSlider::orderBy('id', 'desc')->get();
        return view('backend.setting.slider.index', compact('slider'));
    }

    // Slider create page
    public function create()
    {
        return view('backend.setting.slider.create');
    }

    // Slider store
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            HomeSlider::create([
                'title' => $request->input('title'),
                'img' => $this->imageUpload($request->file('image'), 'uploads/slider/', 1920, 950),
                'status' => $request->input('status')
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
        try {
            $slider = HomeSlider::findorfail($id);
            return view('backend.setting.slider.edit', compact('slider'));
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
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $slider = HomeSlider::find($id);
            $slider->update([
                'title' => $request->input('title'),
                'status' => $request->input('status')
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($slider->img))) {
                    unlink($path);
                }
                $slider->img = $this->imageUpload($request->file('image'), 'uploads/slider/', 1920, 950);
                $slider->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.slider.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Slider delete
    public function destroy($id)
    {
        try {
            $slider = HomeSlider::findorfail($id);
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
