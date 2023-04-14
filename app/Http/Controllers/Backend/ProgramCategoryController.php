<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProgramCategory;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProgramCategoryController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // Category index page
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('program_category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $cate = ProgramCategory::orderBy('id', 'desc')->get();
        return view('backend.program.category.index', compact('cate'));
    }

    // Category create page
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('program_category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        return view('backend.program.category.create');
    }

    // Category store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:program_categories,name',
            'status' => 'required'
        ]);
        try {
            ProgramCategory::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'status' => $request->input('status'),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Category edit
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('program_category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            $cate = ProgramCategory::findorfail($id);
            return view('backend.program.category.edit', compact('cate'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Category udpate
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:program_categories,name,' . $id,
            'status' => 'required'
        ]);
        try {
            ProgramCategory::find($id)->update([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'status' => $request->input('status'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.program.category.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Category delete
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('program_category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        try {
            ProgramCategory::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
