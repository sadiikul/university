@extends('layouts.backend')

@section('title')
Home Page Customize Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Home Page Customize Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.customize.edit') }}"> Home Page Customize</a>
                            </li>
                            <li class="breadcrumb-item active">Edit {{ env('MAIL_USERNAME') }}</li>
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
                                <h3 class="card-title">Edit Home Page Customize</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.customize.update', $customize->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Academics Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="academics" required
                                                        class="form-control @if($customize->academics == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->academics == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->academics == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Admission Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="admission" required
                                                        class="form-control @if($customize->admission == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->admission == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->admission == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Management Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="management" required
                                                        class="form-control @if($customize->management == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->management == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->management == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Seminar Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="seminar" required
                                                        class="form-control @if($customize->seminar == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->seminar == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->seminar == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Notice Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="notice" required
                                                        class="form-control @if($customize->notice == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->notice == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->notice == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Social Page Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="social_page" required
                                                        class="form-control @if($customize->social_page == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->social_page == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->social_page == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="News Event Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="news_event" required
                                                        class="form-control @if($customize->news_event == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->news_event == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->news_event == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Counter Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="counter" required
                                                        class="form-control @if($customize->counter == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->counter == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->counter == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Gallery Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="gallery" required
                                                        class="form-control @if($customize->gallery == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->gallery == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->gallery == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Clubs Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="clubs" required
                                                        class="form-control @if($customize->clubs == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->clubs == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->clubs == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <input type="text" readonly disabled value="Recruiter & Partner Section" class="form-control form-control-sm rounded-0">
                                                <div class="input-group-append">
                                                    <select name="partner" required
                                                        class="form-control @if($customize->partner == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $customize->partner == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $customize->partner == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
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
