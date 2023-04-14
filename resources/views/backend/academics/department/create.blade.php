@extends('layouts.backend')

@php
    $user = Auth::user();
@endphp

@section('title')
    Department Create
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Department Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.academics.department.index') }}">Department</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                                <h3 class="card-title">Add Department</h3>
                                <a href="{{ route('admin.academics.department.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.academics.department.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Department Name <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="name" placeholder="Enter name..."
                                                    value="{{ old('name') }}"
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
                                                <label>Thumbnail <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" required name="thumbnail" class="dropify"
                                                    data-height="100">
                                                <div class="text-muted font-italic">
                                                    (Prefer Size : 700 * 350)
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
                                                    <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active
                                                    </option>
                                                    <option {{ old('status') == 0 ? 'selected' : '' }} value="0">
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
                                    <div id="allow__seo" style="display: none">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 text-md-right">
                                                    <label>Meta Title :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="meta_title"
                                                        placeholder="Enter meta title..." value="{{ old('meta_title') }}"
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
                                                        value="{{ old('meta_tag') }}"
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
                                                    <textarea name="meta_description" value="{{ old('meta_description') }}"class="form-control rounded-0"
                                                        placeholder="Enter meta description..." rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-9">
                                                <input type="checkbox" id="allow">
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
                                        Save</button>
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
