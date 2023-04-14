<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function edit()
    {
        $mail = Mail::findorfail(1);
        return view('backend.setting.mail.edit', compact('mail'));
    }

    public function update(Request $request, $id)
    {
        try {
            Mail::find($id)->update($request->all());
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
