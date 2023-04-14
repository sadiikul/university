@extends('layouts.backend')

@section('title')
Website Content Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Website Content Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.content.edit') }}"> Website Content</a>
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
                                <h3 class="card-title">Edit Website Content</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.content.update', $content->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Theme Color <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="input-group my-colorpicker2">
                                                    <input type="text" name="theme" required
                                                        value="{{ $content->theme }}" class="form-control">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i
                                                                style="color: {{ $content->theme }}"
                                                                class="fas fa-square"></i></span>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Slider Autoplay <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="slide" required
                                                    class="form-control form-control-sm rounded-0 @error('slide') is-invalid @enderror">
                                                    <option {{ $content->slide == 1 ? 'selected' : '' }} value="1">
                                                        ON
                                                    </option>
                                                    <option {{ $content->slide == 0 ? 'selected' : '' }} value="0">
                                                        OFF
                                                    </option>
                                                </select>
                                                @error('slide')
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
                                                <label>Google Map <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea required name="map" class="form-control rounded-0 form-control-sm @error('map') is-invalid @enderror" rows="10">{{ $content->map }}</textarea>
                                                @error('map')
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
