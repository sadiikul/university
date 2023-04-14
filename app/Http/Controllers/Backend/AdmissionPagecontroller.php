<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdmissionPage;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdmissionPagecontroller extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    use UseOfTrait;

    public function edit()
    {
        if (is_null($this->user) || !$this->user->can('admission_page.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $img = AdmissionPage::findorfail(1);
        return view('backend.admission.page', compact('img'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg,webp'
        ]);
        try {
            $img = AdmissionPage::find(1);
            if ($request->hasFile('image')) {
                if (file_exists($path = public_path($img->img))) {
                    unlink($path);
                }
                $img->img = $this->imageUpload($request->file('image'), 'uploads/admission/', 1400, 2200);
                $img->update();
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
