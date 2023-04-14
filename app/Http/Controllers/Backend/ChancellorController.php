<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProViceChancellor;
use App\Models\ViceChancellor;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChancellorController extends Controller
{
    use UseOfTrait;

    public function viceEdit()
    {
        $vice = ViceChancellor::findorfail(1);
        return view('backend.management.vice', compact('vice'));
    }

    public function proEdit()
    {
        $pro = ProViceChancellor::findorfail(1);
        return view('backend.management.pro', compact('pro'));
    }

    public function viceUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'short' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'long' => 'required'
        ]);
        try {
            $member = ViceChancellor::find($id);
            $member->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'desig' => $request->input('designation'),
                'short' => $request->input('short'),
                'long' => $this->description($request->input('long'))
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($member->img))) {
                    unlink($path);
                }
                $member->img = $this->imageUpload($request->file('image'), 'uploads/member/', 500, 500);
                $member->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function proUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'short' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'long' => 'required'
        ]);
        try {
            $member = ProViceChancellor::find($id);
            $member->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'desig' => $request->input('designation'),
                'short' => $request->input('short'),
                'long' => $this->description($request->input('long'))
            ]);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($member->img))) {
                    unlink($path);
                }
                $member->img = $this->imageUpload($request->file('image'), 'uploads/member/', 500, 500);
                $member->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
