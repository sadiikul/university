@extends('layouts.backend')

@section('title')
    Faculty Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Faculty Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.faculty.index') }}">Faculty</a></li>
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
                                <h3 class="card-title">Edit Faculty</h3>
                                <a href="{{ route('admin.faculty.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.faculty.update', $faculty->id) }}" method="POST"
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
                                                        <option {{ $item->id == $faculty->dept_id ? 'selected' : '' }}
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
                                                <label>Advisor :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="select2" name="program[]" multiple="multiple"
                                                    data-placeholder="Select advisor for program" style="width: 100%;">
                                                    @php
                                                        $advisor = json_decode($faculty->program_id);
                                                    @endphp
                                                    @foreach ($program as $item)
                                                        <option
                                                            @if ($faculty->program_id !== 'null') @foreach ($advisor as $user){{ $item->id == $user ? 'selected' : '' }}@endforeach @endif
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('program')
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
                                                <label>Position <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="position" required
                                                    class="form-control form-control-sm rounded-0 @error('position') is-invalid @enderror">
                                                    <option value="">Select Position</option>
                                                    <option {{ $faculty->position == 1 ? 'selected' : '' }} value="1">
                                                        Top</option>
                                                    <option {{ $faculty->position == 0 ? 'selected' : '' }} value="0">
                                                        Bottom</option>
                                                </select>
                                                @error('position')
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
                                                <label>Name <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="name" placeholder="Enter name..."
                                                    value="{{ $faculty->name }}"
                                                    class="form-control rounded-0 form-control-sm @error('name') is-invalid @enderror">
                                                @error('name')
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
                                                <label>Designation <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="designation" placeholder="Enter designation..."
                                                    value="{{ $faculty->designation }}"
                                                    class="form-control rounded-0 form-control-sm @error('designation') is-invalid @enderror">
                                                @error('designation')
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
                                                <label>From <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="from" placeholder="Enter from..."
                                                    value="{{ $faculty->from }}"
                                                    class="form-control rounded-0 form-control-sm @error('from') is-invalid @enderror">
                                                @error('from')
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
                                                <label>Email :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="email" placeholder="optional"
                                                    value="{{ $faculty->email }}"
                                                    class="form-control rounded-0 form-control-sm @error('email') is-invalid @enderror">
                                                @error('email')
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
                                                <label>Image <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" data-default-file="{{ asset($faculty->img) }}"
                                                    name="image" class="dropify" data-height="100">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 500 * 500)
                                                </div>
                                                @error('image')
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
                                                    <option {{ $faculty->status == 1 ? 'selected' : '' }} value="1">
                                                        Active
                                                    </option>
                                                    <option {{ $faculty->status == 0 ? 'selected' : '' }} value="0">
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
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right"><label>Description :</label></div>
                                            <div class="col-md-9">
                                                <textarea name="description" class="form-control form-control-sm rounded-0" rows="5" placeholder="Enter your text...." rows="8">{{ $faculty->desc }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right"><label>Publication :</label></div>
                                            <div class="col-md-9">
                                                <textarea name="publication" class="form-control form-control-sm rounded-0" rows="5" placeholder="Enter your text...." rows="8">{{ $faculty->publication }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right"><label>Achievements
                                                    :</label></div>
                                            <div class="col-md-9">
                                                <textarea name="achievements" class="form-control form-control-sm rounded-0" rows="5"
                                                    placeholder="Enter your text...." rows="8">{{ $faculty->achievements }}</textarea>
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
@endsection
