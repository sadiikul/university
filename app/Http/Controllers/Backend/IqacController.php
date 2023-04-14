<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Iqac;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IqacController extends Controller
{
    use UseOfTrait;
    // Counter edit page
    public function edit()
    {
        try {
            $iqac = Iqac::findorfail(1);
            return view('backend.iqac.edit', compact('iqac'));
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // Counter data update
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        try {
            $iqac = Iqac::find($id);
            $iqac->update([
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
