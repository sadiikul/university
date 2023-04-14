<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Institute;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class InstituteController extends Controller
{
    // use Trait
    use UseOfTrait;

    // Faculty index page
    public function index()
    {
        $ins = Institute::orderBy('id', 'desc')->get();
        return view('backend.academics.institute.index', compact('ins'));
    }

    // Faculty create page
    public function create()
    {
        $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
        return view('backend.academics.institute.create', compact('dept'));
    }

    // Faculty store
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            Institute::create([
                'name' => $request->input('name'),
                'title' => $request->input('institute'),
                'slug' => Str::slug($request->input('institute')),
                'desig' => $request->input('designation'),
                'dept_id' => json_encode($request->input('department')),
                'img' => $this->imageUpload($request->file('image'), 'uploads/institute/', 500, 500),
                'status' => $request->input('status'),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            Toastr::error($error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty edit page
    public function edit($id)
    {
        try {
            $ins = Institute::findorfail($id);
            $dept = Department::where('status', '1')->orderBy('id', 'desc')->get();
            return view('backend.academics.institute.edit', compact('dept', 'ins'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'designation' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $ins = Institute::find($id);
            $ins->update([
                'name' => $request->input('name'),
                'title' => $request->input('institute'),
                'slug' => Str::slug($request->input('institute')),
                'desig' => $request->input('designation'),
                'dept_id' => json_encode($request->input('department')),
                'status' => $request->input('status'),
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($ins->img))) {
                    unlink($path);
                }
                $ins->img = $this->imageUpload($request->file('image'), 'uploads/institute/', 500, 500);
                $ins->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.academics.institute.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Faculty delete
    public function destroy($id)
    {
        try {
            $ins = Institute::findorfail($id);
            if (file_exists($path = public_path($ins->img))) {
                unlink($path);
            }
            $ins->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
