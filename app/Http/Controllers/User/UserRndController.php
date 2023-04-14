<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RndPost;
use App\Trait\UseOfTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserRndController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    //use trait
    use UseOfTrait;

    // R&D Post index page
    public function index()
    {
        $post = RndPost::where('dept_id', $this->user->dept_id)->orderBy('id', 'desc')->get();
        return view('user.rnd.post.index', compact('post'));
    }

    // R&D Post create page
    public function create()
    {
        return view('user.rnd.post.create');
    }

    // R&D Post data store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short' => 'required',
            'description' => 'required',
            'topic' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp',
            'status' => 'required',
        ]);
        try {
            RndPost::create([
                'dept_id' => $this->user->dept_id,
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'topic' => $this->description($request->input('topic')),
                'status' => $request->input('status'),
                'short' => $request->input('short'),
                'desc' => $this->description($request->input('description')),
                'meta_title' => $request->input('meta_title'),
                'meta_tag' => $request->input('meta_tag'),
                'meta_desc' => $request->input('meta_description'),
                'thumb' => $this->imageUpload($request->file('thumbnail'), 'uploads/post/', 700, 400),
            ]);
            Toastr::success('Data created successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // R&D Post edit page
    public function edit($id)
    {
        $post = RndPost::findorfail($id);
        return view('user.rnd.post.edit', compact('post'));
    }

    // R&D Post update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'short' => 'required',
            'topic' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
            'status' => 'required',
        ]);
        try {
            $post = RndPost::find($id);
            $post->update([
                'dept_id' => $this->user->dept_id,
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'topic' => $this->description($request->input('topic')),
                'status' => $request->input('status'),
                'desc' => $this->description($request->input('description')),
                'meta_title' => $request->input('meta_title'),
                'meta_tag' => $request->input('meta_tag'),
                'short' => $request->input('short'),
                'meta_desc' => $request->input('meta_description')
            ]);
            if ($request->hasFile('thumbnail')) {
                if (file_exists($path = public_path($post->thumb))) {
                    unlink($path);
                }
                $post->thumb = $this->imageUpload($request->file('thumbnail'), 'uploads/post/', 700, 400);
                $post->update();
            }
            Toastr::success('Data update successfull!!!');
            return redirect()->route('user.rnd.post.index');
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    // R&D Post delete
    public function destroy($id)
    {
        try {
            $post = RndPost::findorfail($id);
            if (file_exists($path = public_path($post->thumb))) {
                unlink($path);
            }
            $post->delete();
            Toastr::success('Data delete successfull!!!');
            return redirect()->back();
        } catch (Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }
}
