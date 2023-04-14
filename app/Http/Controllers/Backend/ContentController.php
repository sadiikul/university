<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    public function edit()
    {
        $content = Content::findorfail(1);
        return view('backend.setting.content.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'theme' => 'required',
            'slide' => 'required',
            'map' => 'required',
        ]);
        try {
            Content::find($id)->update($request->all());
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
