<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Custom;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomController extends Controller
{
    public function edit()
    {
        $custom = Custom::findorfail(1);
        return view('backend.setting.custom.edit', compact('custom'));
    }

    public function update(Request $request, $id)
    {
        try {
            Custom::find($id)->update($request->all());
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
