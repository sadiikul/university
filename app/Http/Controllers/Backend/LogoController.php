<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoController extends Controller
{
    use UseOfTrait;

    public function edit()
    {
        $logo = Logo::findorfail(1);
        return view('backend.setting.logo.logo', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'header' => 'mimes:png,jpg,jpeg,webp',
            'footer' => 'mimes:png,jpg,jpeg,webp',
            'favicon' => 'mimes:png,jpg,jpeg,webp',
        ]);
        try {
            $logo = Logo::find($id);
            if ($request->hasFile('header')) {
                if (file_exists($path = public_path($logo->header))) {
                    unlink($path);
                }
                $logo->header = $this->imageUpload($request->file('header'), 'uploads/logo/', 350, 100);
            }
            if ($request->hasFile('footer')) {
                if (file_exists($path = public_path($logo->footer))) {
                    unlink($path);
                }
                $logo->footer = $this->imageUpload($request->file('footer'), 'uploads/logo/', 350, 100);
            }
            if ($request->hasFile('favicon')) {
                if (file_exists($path = public_path($logo->fav))) {
                    unlink($path);
                }
                $logo->fav = $this->imageUpload($request->file('favicon'), 'uploads/logo/', 50, 50);
            }
            $logo->update();
            Toastr::success('Logo update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
