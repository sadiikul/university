<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Management;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagementController extends Controller
{
    // use trait
    use UseOfTrait;

    public function edit()
    {
        $thumb = Management::findorfail(1);
        return view('backend.management.thumbnail', compact('thumb'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'member' => 'mimes:png,jpg,jpeg,webp',
            'syndicate' => 'mimes:png,jpg,jpeg,webp',
            'council' => 'mimes:png,jpg,jpeg,webp',
            'vice' => 'mimes:png,jpg,jpeg,webp',
            'pro_vice' => 'mimes:png,jpg,jpeg,webp',
            'administration' => 'mimes:png,jpg,jpeg,webp',
        ]);
        try {
            $thumb = Management::find(1);
            if ($request->hasFile('member')) {
                if (file_exists($path = public_path($thumb->member))) {
                    unlink($path);
                }
                $thumb->member = $this->imageUpload($request->file('member'), 'uploads/management/', 700, 350);
            }
            if ($request->hasFile('syndicate')) {
                if (file_exists($path = public_path($thumb->syndicate))) {
                    unlink($path);
                }
                $thumb->syndicate = $this->imageUpload($request->file('syndicate'), 'uploads/management/', 700, 350);
            }
            if ($request->hasFile('council')) {
                if (file_exists($path = public_path($thumb->council))) {
                    unlink($path);
                }
                $thumb->council = $this->imageUpload($request->file('council'), 'uploads/management/', 700, 350);
            }
            if ($request->hasFile('vice')) {
                if (file_exists($path = public_path($thumb->vice))) {
                    unlink($path);
                }
                $thumb->vice = $this->imageUpload($request->file('vice'), 'uploads/management/', 700, 350);
            }
            if ($request->hasFile('pro_vice')) {
                if (file_exists($path = public_path($thumb->pro_vice))) {
                    unlink($path);
                }
                $thumb->pro_vice = $this->imageUpload($request->file('pro_vice'), 'uploads/management/', 700, 350);
            }
            if ($request->hasFile('administration')) {
                if (file_exists($path = public_path($thumb->adminis))) {
                    unlink($path);
                }
                $thumb->adminis = $this->imageUpload($request->file('administration'), 'uploads/management/', 700, 350);
            }
            $thumb->update();
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
