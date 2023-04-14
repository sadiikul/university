<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontContactController extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }

            Message::create($request->all());
            Toastr::success('Thank you for your message', 'Success');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::error($error->getMessage());
            return redirect()->back();
        }
    }

    public function subs(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
            }

            Subscriber::create($request->all());
            Toastr::success('Thank you for Subscription', 'Success');
            return redirect()->back();
        } catch (Exception $error) {
            Toastr::error($error->getMessage());
            return redirect()->back();
        }
    }
}
