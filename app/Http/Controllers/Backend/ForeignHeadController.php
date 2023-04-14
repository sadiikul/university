<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ForeignHead;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ForeignHeadController extends Controller
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
        if (is_null($this->user) || !$this->user->can('foreign.head')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $head = ForeignHead::findorfail(1);
        return view('backend.admission.foreign.heading', compact('head'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short' => 'required',
            'description' => 'required',
            'img' => 'mimes:png,jpg,jpeg,webp',
            'multiple.*' => 'mimes:png,jpg,jpeg,webp'
        ]);
        try {
            $head = ForeignHead::find($id);
            $head->update([
                'title' => $request->input('title'),
                'short' => $request->input('short'),
                'desc' => $this->description($request->input('description'))
            ]);
            if ($request->hasFile('img')) {
                if (file_exists($path = public_path($head->img))) {
                    unlink($path);
                }
                $head->img = $this->imageUpload($request->file('img'), 'uploads/foreign/', 500, 300);
            }
            if ($request->hasFile('multiple')) {
                $img = json_decode($head->multiple);
                foreach ($img as $item) {
                    if (file_exists(public_path($item))) {
                        unlink($item);
                    }
                }
                $head->multiple = $this->imageUpload($request->file('multiple'), 'uploads/foreign/', 300, 130);
            }
            $head->update();
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
