@extends('layouts.backend')

@section('title')
Foreign Student
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Foreign Student</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.admission.foreign.head') }}">Foreign
                                    Student</a></li>
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
                                <h3 class="card-title">Foreign Student</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.admission.foreign.head.update', $head->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Title <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="title" placeholder="Enter title..."
                                                    value="{{ $head->title }}"
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
                                                <label>Short Description <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="short" class="form-control rounded-0 form-control-sm" rows="5">{{ $head->short }}</textarea>
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
                                                <label>Long Description <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="description" class="long" rows="5">{{ $head->desc }}</textarea>
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
                                                <label>Image <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" name="img" class="dropify" data-height="100"
                                                    data-default-file="{{ asset($head->img) }}">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 500 * 300)
                                                </div>
                                                @error('img')
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
                                                <label>Multiple Image <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" multiple name="multiple[]"
                                                    class="form-control rounded-0 form-control-sm">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 150 * 100)
                                                </div>
                                                @php
                                                    $img = json_decode($head->multiple);
                                                @endphp
                                                <div class="row">
                                                    @foreach ($img as $item)
                                                        <div class="col-2">
                                                            <img src="{{ asset($item) }}" alt="img"
                                                                class="img-fluid w-100">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @error('multiple')
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
