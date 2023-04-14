@extends('layouts.backend')

@section('title')
R&D Post Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">R&D Post Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.rnd.post.index') }}">R&D Post</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.message')
                        <div class="card rounded-0 card-outline card-primary">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit R&D Post</h3>
                                <a href="{{ route('admin.rnd.post.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.rnd.post.update', $post->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Department <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="department" required
                                                    class="form-control form-control-sm rounded-0 @error('department') is-invalid @enderror">
                                                    @foreach ($dept as $item)
                                                        <option {{ $item->id == $post->dept_id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('department')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Title <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="title" placeholder="Enter title..."
                                                    value="{{ $post->title }}"
                                                    class="form-control rounded-0 form-control-sm @error('title') is-invalid @enderror">
                                                @error('title')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Topic <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea required name="topic" class="medium">{{ $post->topic }}</textarea>
                                                @error('topic')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Short Description <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea required name="short" class="form-control rounded-0 form-control-sm @error('short') is-invalid @enderror"
                                                    rows="5">{{ $post->short }}</textarea>
                                                @error('short')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Description <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea required name="description" class="long" rows="5">{{ $post->desc }}</textarea>
                                                @error('description')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Thumbnail <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" name="thumbnail" class="dropify" data-height="100"
                                                    data-default-file="{{ asset($post->thumb) }}">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 700 * 400)
                                                </div>
                                                @error('thumbnail')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Status <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="status" required
                                                    class="form-control form-control-sm rounded-0 @error('status') is-invalid @enderror">
                                                    <option {{ $post->status == 1 ? 'selected' : '' }} value="1">
                                                        Active
                                                    </option>
                                                    <option {{ $post->status == 0 ? 'selected' : '' }} value="0">
                                                        Inactive
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="allow__seo"
                                        style="display: {{ $post->meta_title === null && $post->meta_tag === null && $post->meta_desc === null ? 'none' : 'block' }}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 text-md-right">
                                                    <label>Meta Title :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="meta_title"
                                                        placeholder="Enter meta title..." value="{{ $post->meta_title }}"
                                                        class="form-control rounded-0 form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 text-md-right">
                                                    <label>Meta Tag :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="meta_tag" placeholder="Enter meta tag..."
                                                        value="{{ $post->meta_tag }}"
                                                        class="form-control rounded-0 form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 text-md-right">
                                                    <label>Meta Description :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea name="meta_description" class="form-control rounded-0" placeholder="Enter meta description..."
                                                        rows="5">{{ $post->meta_desc }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-9">
                                                <input type="checkbox"
                                                    {{ $post->meta_title === null && $post->meta_tag === null && $post->meta_desc === null ? '' : 'checked' }}
                                                    id="allow">
                                                <label class="font-weight-normal" for="allow"> Allow SEO</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-right">
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fas fa-sync"></i>
                                        Reset</button>
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>
                                        Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@section('script')
    <script>
        $(function() {
            $('input[type="checkbox"]').on('change', function() {
                let check = $(this).prop('checked');
                if (check) {
                    $('#allow__seo').css('display', 'block');
                } else {
                    $('#allow__seo').css('display', 'none');
                }
            })
        })
    </script>
@endsection
@endsection
