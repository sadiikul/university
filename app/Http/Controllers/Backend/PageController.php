<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Trait\UseOfTrait;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PageController extends Controller
{
    use UseOfTrait;

    // Page index page
    public function index()
    {
        $page = Page::orderBy('id', 'desc')->get();
        return view('backend.setting.page.index', compact('page'));
    }

    // Page create page
    public function create()
    {
        return view('backend.setting.page.create');
    }

    // Page store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        try {
            Page::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'desc' => $this->description($request->input('description')),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Page edit page
    public function edit($id)
    {
        try {
            $page = Page::findorfail($id);
            return view('backend.setting.page.edit', compact('page'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Page update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        try {
            Page::find($id)->update([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'desc' => $this->description($request->input('description')),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.page.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Page delete
    public function destroy($id)
    {
        try {
            Page::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
