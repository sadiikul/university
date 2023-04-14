<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdmissionController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // use trait
    use UseOfTrait;

    public function thumbnail()
    {
        if (is_null($this->user) || !$this->user->can('admission_thumbnail.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $thumb = Admission::findorfail(1);
        return view('backend.admission.thumbnail', compact('thumb'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'program' => 'mimes:png,jpg,jpeg,webp',
            'admission' => 'mimes:png,jpg,jpeg,webp',
            'tuition' => 'mimes:png,jpg,jpeg,webp',
            'foreign' => 'mimes:png,jpg,jpeg,webp',
            'scholarship' => 'mimes:png,jpg,jpeg,webp',
            'accommodation' => 'mimes:png,jpg,jpeg,webp',
            'calendar' => 'mimes:png,jpg,jpeg,webp',
        ]);
        try {
            $thumb = Admission::find(1);
            if ($request->hasFile('program')) {
                if (file_exists($path = public_path($thumb->program))) {
                    unlink($path);
                }
                $thumb->program = $this->imageUpload($request->file('program'), 'uploads/admission/', 405, 430);
            }
            if ($request->hasFile('admission')) {
                if (file_exists($path = public_path($thumb->admission))) {
                    unlink($path);
                }
                $thumb->admission = $this->imageUpload($request->file('admission'), 'uploads/admission/', 700, 350);
            }
            if ($request->hasFile('tuition')) {
                if (file_exists($path = public_path($thumb->tuition))) {
                    unlink($path);
                }
                $thumb->tuition = $this->imageUpload($request->file('tuition'), 'uploads/admission/', 700, 350);
            }
            if ($request->hasFile('foreign')) {
                if (file_exists($path = public_path($thumb->foreign))) {
                    unlink($path);
                }
                $thumb->foreign = $this->imageUpload($request->file('foreign'), 'uploads/admission/', 700, 350);
            }
            if ($request->hasFile('scholarship')) {
                if (file_exists($path = public_path($thumb->scholarship))) {
                    unlink($path);
                }
                $thumb->scholarship = $this->imageUpload($request->file('scholarship'), 'uploads/admission/', 700, 350);
            }
            if ($request->hasFile('accommodation')) {
                if (file_exists($path = public_path($thumb->accommodation))) {
                    unlink($path);
                }
                $thumb->accommodation = $this->imageUpload($request->file('accommodation'), 'uploads/admission/', 700, 350);
            }
            if ($request->hasFile('calendar')) {
                if (file_exists($path = public_path($thumb->calender))) {
                    unlink($path);
                }
                $thumb->calender = $this->imageUpload($request->file('calendar'), 'uploads/admission/', 700, 350);
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
