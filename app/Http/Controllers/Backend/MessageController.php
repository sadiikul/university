<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function inbox()
    {
        $message = Message::orderBy('id', 'desc')->paginate(10);
        return view('backend.message.inbox', compact('message'));
    }

    public function read($id)
    {
        $message = Message::findorfail($id);
        $message->update([
            'seen' => '1'
        ]);
        return view('backend.message.read', compact('message'));
    }

    public function destroy($id)
    {
        try {
            Message::findorfail($id)->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
