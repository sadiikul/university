<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CouncilHead;
use App\Models\CouncilMember;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouncilController extends Controller
{
    // use Trait
    use UseOfTrait;

    // Council index page
    public function index()
    {
        $member = CouncilMember::orderBy('id', 'desc')->get();
        return view('backend.management.council.index', compact('member'));
    }

    // Syndicate create page
    public function create()
    {
        return view('backend.management.council.create');
    }

    // Syndicate create page
    public function head()
    {
        $head = CouncilHead::findorfail(1);
        return view('backend.management.council.head', compact('head'));
    }

    // Syndicate create page
    public function headUpdate(Request $request)
    {
        try {
            $member = CouncilHead::find(1);
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
            'designation' => 'required',
            'department' => 'required',
        ]);
        try {
            CouncilMember::create([
                'name' => $request->input('name'),
                'designation' => $request->input('designation'),
                'department' => $request->input('department'),
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
            $member = CouncilMember::findorfail($id);
            return view('backend.management.council.edit', compact('member'));
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
            'designation' => 'required',
            'department' => 'required',
        ]);
        try {
            $member = CouncilMember::find($id);
            $member->update([
                'name' => $request->input('name'),
                'designation' => $request->input('designation'),
                'department' => $request->input('department'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->route('admin.management.council.index');
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
            $member = CouncilMember::findorfail($id);
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
