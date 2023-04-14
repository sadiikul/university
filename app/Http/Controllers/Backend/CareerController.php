<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CareerForm;
use App\Models\CareerPost;
use Illuminate\Http\Request;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    // use Trait
    use UseOfTrait;

    // Career index page
    public function index()
    {
        $career = CareerPost::orderBy('id', 'desc')->get();
        return view('backend.career.index', compact('career'));
    }

    // Career create page
    public function create()
    {
        return view('backend.career.create');
    }

    // Career store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'job_type' => 'required',
            'deadline' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        try {
            if ($request->deadline >= date('Y-m-d', strtotime(now()))) {
                CareerPost::create([
                    'title' => $request->input('title'),
                    'slug' => Str::slug($request->input('title')),
                    'job_type' => $request->input('job_type'),
                    'deadline' => $request->input('deadline') . date(" H:i:s"),
                    'status' => $request->input('status'),
                    'description' => $this->description($request->input('description'))
                ]);
                Toastr::success('Data created successfull!!!');
                return redirect()->back();
            }
            Toastr::error('Invalid date given!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Career edit page
    public function edit($id)
    {
        try {
            $career = CareerPost::findorfail($id);
            return view('backend.career.edit', compact('career'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Career data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'job_type' => 'required',
            'deadline' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        try {
            if ($request->deadline >= date('Y-m-d', strtotime(now()))) {
                $career = CareerPost::find($id);
                $career->update([
                    'title' => $request->input('title'),
                    'slug' => Str::slug($request->input('title')),
                    'job_type' => $request->input('job_type'),
                    'deadline' => $request->input('deadline') . date(" H:i:s"),
                    'status' => $request->input('status'),
                    'description' => $this->description($request->input('description'))
                ]);
                Toastr::success('Data update successfull!!!');
                return redirect()->route('admin.career.index');
            }
            Toastr::error('Invalid date given!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Career delete
    public function destroy($id)
    {
        try {
            CareerPost::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function list()
    {
        $list = CareerForm::orderBy('id', 'desc')->with('post')->get();
        return view('backend.career.list', compact('list'));
    }

    public function view($id)
    {
        $list = CareerForm::with('post')->findorfail($id);
        $list->update(['status' => 1]);
        return view('backend.career.view', compact('list'));
    }

    // Career delete
    public function listDelete($id)
    {
        try {
            $list = CareerForm::findorfail($id);
            if (file_exists($path = public_path($list->resume))) {
                unlink($path);
            }
            if ($list->cover !== null) {
                if (file_exists($path = public_path($list->cover))) {
                    unlink($path);
                }
            }
            $list->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
