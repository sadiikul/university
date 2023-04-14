@extends('layouts.backend')

@section('title')
Custom JS Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Custom JS Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.custom.edit') }}"> Custom JS</a>
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
                                <h3 class="card-title">Edit Custom JS</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.custom.update', $custom->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>In Head <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body p-0">
                                                    <textarea rows="10" name="head" class="form-control rounded-0 form-control-sm @error('head') is-invalid @enderror">{{ $custom->head }}</textarea>
                                                    @error('head')
                                                        <div class="text-danger font-italic">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Before Body Start <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body p-0">
                                                    <textarea rows="10" name="body_start" class="form-control rounded-0 form-control-sm @error('body_start') is-invalid @enderror">{{ $custom->body_start }}</textarea>
                                                    @error('body_start')
                                                        <div class="text-danger font-italic">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>After Body End <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body p-0">
                                                    <textarea name="body_end" rows="10" class=" form-control rounded-0 form-control-sm @error('body_end') is-invalid @enderror">{{ $custom->body_end }}</textarea>
                                                    @error('body_end')
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
