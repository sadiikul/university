@extends('layouts.user')

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
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.faculty.index') }}">Faculty</a></li>
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
                                <a href="{{ route('user.faculty.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('user.faculty.update', $faculty->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
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
                                                        <option @if($faculty->program_id !== 'null') @foreach ($advisor as $user){{ $item->id == $user ? 'selected':'' }}@endforeach @endif value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                <label>Designation <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="designation" required
                                                    class="form-control form-control-sm rounded-0 @error('designation') is-invalid @enderror">
                                                    <option value="">Select designation</option>
                                                    <option {{ $faculty->desig == 1 ? 'selected' : '' }} value="1">Head
                                                        of Department</option>
                                                    <option {{ $faculty->desig == 0 ? 'selected' : '' }} value="0">
                                                        Teacher</option>
                                                </select>
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
                                                <label>Email <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="email" placeholder="Enter email..."
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
                                    <div id="desc">
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
            var desc =
                '<div class="form-group"><div class="row"><div class="col-md-2 text-md-right"><label>Description :</label></div><div class="col-md-9"><textarea required name="description" class="form-control rounded-0 form-control-sm" placeholder="Enter your text...." rows="8">{{ $faculty->desc }}</textarea></div></div></div>';

            $("select[name='designation']").change(function() {
                let val = $(this).children("option:selected").val();
                if (val == 1) {
                    $('#desc').html(desc);
                } else {
                    $('#desc').html('');
                }
            })

            if ({{ $faculty->desig }} == 1) {
                $('#desc').html(desc);
            }
        })
    </script>
@endsection
@endsection
