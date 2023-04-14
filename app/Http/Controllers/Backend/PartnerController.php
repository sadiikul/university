<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    // use trait
    use UseOfTrait;

    // Partner index page
    public function index()
    {
        $partner = Partner::orderBy('id', 'desc')->get();
        return view('backend.partner.index', compact('partner'));
    }

    // Partner create page
    public function create()
    {
        return view('backend.partner.create');
    }

    // Partner store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
        ]);
        try {
            Partner::create([
                'name' => $request->input('name'),
                'img' => $this->imageUpload($request->file('image'), 'uploads/partner/', 180, 100)
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Partner edit page
    public function edit($id)
    {
        try {
            $partner = Partner::findorfail($id);
            return view('backend.partner.edit', compact('partner'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Partner update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
        ]);
        try {
            $partner = Partner::find($id);
            $partner->update([
                'name' => $request->input('name')
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($partner->img))) {
                    unlink($path);
                }
                $partner->img = $this->imageUpload($request->file('image'), 'uploads/partner/', 180, 100);
                $partner->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.partner.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Partner delete
    public function destroy($id)
    {
        try {
            $partner = Partner::findorfail($id);
            if (file_exists($path = public_path($partner->img))) {
                unlink($path);
            }
            $partner->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
