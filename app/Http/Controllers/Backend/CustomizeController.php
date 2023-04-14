<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customize;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Session;

class CustomizeController extends Controller
{
    public function edit()
    {
        $customize = Customize::findorfail(1);
        return view('backend.setting.customize.edit', compact('customize'));
    }

    public function update(Request $request, $id)
    {
        try {
            Customize::find($id)->update($request->all());
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
