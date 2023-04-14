@extends('layouts.backend')

@section('title')
Logo Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Logo Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.logo.edit') }}"> Logo</a>
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
                                <h3 class="card-title">Edit Logo</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.logo.update', $logo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Header Logo <sup class="text-danger">* </sup> :</label>
                                                <input type="file" name="header" class="dropify" data-height="100"
                                                    data-default-file="{{ asset($logo->header) }}">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 350 * 100)
                                                </div>
                                                @error('header')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Footer Logo <sup class="text-danger">* </sup> :</label>
                                                <input type="file" name="footer" class="dropify" data-height="100"
                                                    data-default-file="{{ asset($logo->footer) }}">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 350 * 100)
                                                </div>
                                                @error('footer')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fav Icon <sup class="text-danger">* </sup> :</label>
                                                <input type="file" name="favicon" class="dropify" data-height="100"
                                                    data-default-file="{{ asset($logo->fav) }}">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 50 * 50)
                                                </div>
                                                @error('favicon')
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
@endsection
