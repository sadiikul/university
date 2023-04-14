<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserNoticeController extends Controller
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

    public function index()
    {
        $notice = Notice::where('dept_id', $this->user->dept_id)->orderBy('id', 'desc')->get();
        return view('user.notice.index', compact('notice'));
    }

    public function create()
    {
        return view('user.notice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content_type' => 'required',
            'status' => 'required'
        ]);
        try {
            $notice = new Notice();
            $notice->title = $request->input('title');
            $notice->type = 'department';
            $notice->content_type = $request->input('content_type');
            $notice->dept_id = $this->user->dept_id;

            if ($request->input('content_type') == 'text') {
                $notice->text = $this->description($request->input('text'));
            }

            if ($request->input('content_type') == 'image') {
                $notice->file = $this->imageUpload($request->file('image'), 'uploads/notice/', 1400, 2200);
            }

            if ($request->input('content_type') == 'pdf') {
                if ($request->hasFile('pdf')) {
                    $file = $request->file('pdf');
                    $pdfName = substr(md5(time()), 0, 20) . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/notice/', $pdfName);
                    $notice->file = 'uploads/notice/' . $pdfName;
                }
            }
            $notice->status = $request->input('status');
            $notice->save();
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $notice = Notice::findorfail($id);
        return view('user.notice.edit', compact('notice'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content_type' => 'required',
            'status' => 'required'
        ]);
        try {
            $notice = Notice::find($id);
            $notice->title = $request->input('title');
            $notice->type = 'department';
            $notice->content_type = $request->input('content_type');
            $notice->dept_id = $this->user->dept_id;

            if ($request->input('content_type') == 'text') {
                $notice->text = $this->description($request->input('text'));
            }

            if ($request->input('content_type') == 'image') {
                if ($request->hasFile('image')) {
                    if ($notice->file !== null) {
                        if (file_exists($path = public_path($notice->file))) {
                            unlink($path);
                        }
                    }
                    $notice->file = $this->imageUpload($request->file('image'), 'uploads/notice/', 1400, 2200);
                }
            }

            if ($request->input('content_type') == 'pdf') {
                if ($request->hasFile('pdf')) {
                    if ($notice->file !== null) {
                        if (file_exists($path = public_path($notice->file))) {
                            unlink($path);
                        }
                    }
                    $file = $request->file('pdf');
                    $pdfName = substr(md5(time()), 0, 20) . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/notice/', $pdfName);
                    $notice->file = 'uploads/notice/' . $pdfName;
                }
            }
            $notice->status = $request->input('status');
            $notice->update();
            Toastr::success('Data update successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $notice = Notice::findorfail($id);
            if ($notice->file !== null) {
                if (file_exists($path = public_path($notice->file))) {
                    unlink($path);
                }
            }
            $notice->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
