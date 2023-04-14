<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriberController extends Controller
{
    public function index()
    {
        $subs = Subscriber::orderBy('id', 'desc')->get();
        return view('backend.subscriber.index', compact('subs'));
    }

    public function destroy($id)
    {
        try {
            Subscriber::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
