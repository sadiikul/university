<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Marquee;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MarqueeController extends Controller
{
    public function edit()
    {
        $marquee = Marquee::findorfail(1);
        return view('backend.setting.marquee.edit', compact('marquee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required',
            'status' => 'required',
        ]);
        try {
            Marquee::find($id)->update([
                'text' => $request->input('text'),
                'status' => $request->input('status')
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
