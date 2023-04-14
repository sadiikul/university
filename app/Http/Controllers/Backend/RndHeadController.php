<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RndHead;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RndHeadController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    //use trait
    use UseOfTrait;

    // R&D Head
    public function edit()
    {
        if (is_null($this->user) || !$this->user->can('rnd.head')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $head = RndHead::findorfail(1);
        return view('backend.rnd.head.edit',compact('head'));
    }

    // R&D update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
        ]);
        try {
            $head = RndHead::find($id);
            $head->update([
                'title' => $request->input('title'),
                'desc' => $request->input('description'),
            ]);
            if ($request->hasFile('thumbnail')) {
                if (file_exists($path = public_path($head->thumb))) {
                    unlink($path);
                }
                $head->thumb = $this->imageUpload($request->file('thumbnail'), 'uploads/rnd/', 550, 180);
                $head->update();
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
