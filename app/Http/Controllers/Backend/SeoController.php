<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeoController extends Controller
{
    public function edit()
    {
        $seo = Seo::findorfail(1);
        return view('backend.setting.seo.edit', compact('seo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'meta_desc' => 'required',
            'meta_tag' => 'required',
        ]);
        try {
            Seo::find($id)->update([
                'title' => $request->input('title'),
                'meta_desc' => $request->input('meta_desc'),
                'meta_tag' => $request->input('meta_tag'),
            ]);
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
