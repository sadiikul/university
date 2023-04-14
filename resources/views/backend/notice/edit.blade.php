@extends('layouts.backend')

@section('title')
Notice Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Notice Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.notice.index') }}">Notice</a></li>
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
                                <h3 class="card-title">Edit Notice</h3>
                                <a href="{{ route('admin.notice.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.notice.update', $notice->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Title <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="title" placeholder="Enter title..."
                                                    value="{{ $notice->title }}"
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
                                                <label>Type <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="type" required
                                                    class="form-control form-control-sm rounded-0 @error('type') is-invalid @enderror">
                                                    <option value="">Select Type</option>
                                                    <option {{ $notice->type === 'admin' ? 'selected':'' }} value="admin">Admin</option>
                                                    <option {{ $notice->type === 'department' ? 'selected':'' }} value="department">Department</option>
                                                </select>
                                                @error('type')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="depart" class="form-group @if($notice->type == 'admin') d-none @endif">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Department <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="department"
                                                    class="form-control form-control-sm rounded-0 @error('department') is-invalid @enderror">
                                                    <option value="">Select Department</option>
                                                    @foreach ($dept as $item)
                                                        <option {{ $notice->dept_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                <label>Content Type <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="content_type" required
                                                    class="form-control form-control-sm rounded-0 @error('content_type') is-invalid @enderror">
                                                    <option value="">Select Content</option>
                                                    <option {{ $notice->content_type == 'text' ? 'selected':'' }} value="text">Text</option>
                                                    <option {{ $notice->content_type == 'image' ? 'selected':'' }} value="image">Image</option>
                                                    <option {{ $notice->content_type == 'pdf' ? 'selected':'' }} value="pdf">PDF</option>
                                                </select>
                                                @error('content_type')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="text" class="form-group @if($notice->content_type !== 'text') d-none @endif">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Text <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="text" class="long" rows="10">{{ $notice->text }}</textarea>
                                                @error('text')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="img" class="form-group @if($notice->content_type !== 'image') d-none @endif">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Image <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" data-default-file="{{ asset($notice->file) }}" name="image" class="dropify" data-height="1000">
                                                {{-- <div class="text-muted font-italic">
                                                    (Prefer Size : 500 * 500)
                                                </div> --}}
                                                @error('image')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pdf" class="form-group @if($notice->content_type !== 'pdf') d-none @endif">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>PDF <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" name="pdf"
                                                    class="form-control form-control-sm rounded-0 @error('pdf') is-invalid @enderror">
                                                    <iframe src="{{ asset($notice->file) }}" frameborder="0" class="mt-2" width="100%" height="600px"></iframe>
                                                @error('pdf')
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
                                                    <option {{ $notice->status == 1 ? 'selected' : '' }} value="1">Active
                                                    </option>
                                                    <option {{ $notice->status == 0 ? 'selected' : '' }} value="0">
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
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-right">
                                    <button type="reset" class="btn btn-sm btn-danger"><i
                                            class="fas fa-sync"></i>
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
            $('select[name="type"]').on('change', function() {
                let check = $(this).children("option:selected").val();
                if (check === 'department') {
                    $('#depart').removeClass('d-none');
                } else {
                    $('#depart').addClass('d-none');
                }
            })

            $('select[name="content_type"]').on('change', function() {
                let check = $(this).children("option:selected").val();
                if (check === 'text') {
                    $('#text').removeClass('d-none');
                    $('#img').addClass('d-none');
                    $('#pdf').addClass('d-none');
                } else if (check === 'image') {
                    $('#text').addClass('d-none');
                    $('#img').removeClass('d-none');
                    $('#pdf').addClass('d-none');
                } else if (check === 'pdf') {
                    $('#text').addClass('d-none');
                    $('#img').addClass('d-none');
                    $('#pdf').removeClass('d-none');
                } else {
                    $('#text').addClass('d-none');
                    $('#img').addClass('d-none');
                    $('#pdf').addClass('d-none');
                }
            })
        })
    </script>
@endsection
@endsection
