@extends('layouts.backend')
{{-- @php
$user = Auth::user();
@endphp --}}

@section('title')
    Role Create
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Role Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                        <div class="card rounded-0 card-outline card-primary">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Add Role</h3>
                                <a href="{{ route('admin.role.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" action="{{ route('admin.role.store') }}" method="POST">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Name<sup class="text-danger">*</sup> :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" required value="{{ old('name') }}"
                                                        name="name" class="form-control rounded-0 form-control-sm" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Email<sup class="text-danger">*</sup> :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="email" required value="{{ old('email') }}"
                                                        name="email" class="form-control rounded-0 form-control-sm" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Phone<sup class="text-danger">*</sup> :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" required value="{{ old('phone') }}"
                                                        name="phone" class="form-control rounded-0 form-control-sm" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Password<sup class="text-danger">*</sup> :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="password" required name="password" class="form-control rounded-0 form-control-sm"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Confirm Password<sup class="text-danger">*</sup> :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="password" required name="password_confirmation"
                                                        class="form-control rounded-0 form-control-sm" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Roles<sup class="text-danger">*</sup> :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select name="roles[]" class="select2 form-control"
                                                        multiple="multiple">
                                                        @foreach ($roles as $item)
                                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="card-footer text-right">
                                        <button type="reset" class="btn btn-sm btn-danger"><i
                                                class="fas fa-sync"></i>
                                            Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>
                                            Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
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
