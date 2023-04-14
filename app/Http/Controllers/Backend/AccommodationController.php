<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Trait\UseOfTrait;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccommodationController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    use UseOfTrait;

    // Accommodation Head
    public function edit()
    {
        if (is_null($this->user) || !$this->user->can('accommodation.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $head = Accommodation::findorfail(1);
        return view('backend.admission.accommodation.edit', compact('head'));
    }

    // Accommodation update
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        try {
            $head = Accommodation::find($id);
            $head->update([
                'desc' => $this->description($request->input('description')),
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
