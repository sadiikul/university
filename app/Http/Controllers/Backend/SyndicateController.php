<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SyndicateHead;
use App\Models\SyndicateMember;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SyndicateController extends Controller
{
    // use Trait
    use UseOfTrait;

    // Syndicate index page
    public function index()
    {
        $member = SyndicateMember::orderBy('id', 'desc')->get();
        return view('backend.management.syndicate.index', compact('member'));
    }

    // Syndicate create page
    public function create()
    {
        return view('backend.management.syndicate.create');
    }

    // Syndicate create page
    public function head()
    {
        $head = SyndicateHead::findorfail(1);
        return view('backend.management.syndicate.head', compact('head'));
    }

    // Syndicate create page
    public function headUpdate(Request $request)
    {
        try {
            $member = SyndicateHead::find(1);
            $member->update([
                'desc' => $this->description($request->input('description'))
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Syndicate store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            SyndicateMember::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'designation' => $request->input('designation'),
                'position' => $request->input('position'),
                'img' => $this->imageUpload($request->file('image'), 'uploads/member/', 500, 500),
                'status' => $request->input('status'),
                'desc' => $request->input('description')
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Syndicate edit page
    public function edit($id)
    {
        try {
            $member = SyndicateMember::findorfail($id);
            return view('backend.management.syndicate.edit', compact('member'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Syndicate data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'position' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required'
        ]);
        try {
            $member = SyndicateMember::find($id);
            $member->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'designation' => $request->input('designation'),
                'position' => $request->input('position'),
                'status' => $request->input('status'),
                'desc' => $request->input('description')
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($member->img))) {
                    unlink($path);
                }
                $member->img = $this->imageUpload($request->file('image'), 'uploads/member/', 500, 500);
                $member->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.management.syndicate.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Syndicate delete
    public function destroy($id)
    {
        try {
            $member = SyndicateMember::findorfail($id);
            if (file_exists($path = public_path($member->img))) {
                unlink($path);
            }
            $member->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
