@extends('layouts.backend')

@section('title')
Menu Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Menu Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.edit') }}"> Menu</a>
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
                                <h3 class="card-title">Edit Menu</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" required value="{{ $menu->home }}" class="form-control form-control-sm rounded-0"
                                                    name="home">
                                                <div class="input-group-append">
                                                    <select name="home_status" required
                                                        class="form-control @if($menu->home_status == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $menu->home_status == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $menu->home_status == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" required value="{{ $menu->academic }}" class="form-control form-control-sm rounded-0"
                                                    name="academic">
                                                <div class="input-group-append">
                                                    <select name="academic_status" required
                                                        class="form-control @if($menu->academic_status == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $menu->academic_status == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $menu->academic_status == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" required value="{{ $menu->admission }}" class="form-control form-control-sm rounded-0"
                                                    name="admission">
                                                <div class="input-group-append">
                                                    <select name="admission_status" required
                                                        class="form-control @if($menu->admission_status == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $menu->admission_status == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $menu->admission_status == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" required value="{{ $menu->management }}" class="form-control form-control-sm rounded-0"
                                                    name="management">
                                                <div class="input-group-append">
                                                    <select name="management_status" required
                                                        class="form-control @if($menu->management_status == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $menu->management_status == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $menu->management_status == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" required value="{{ $menu->rnd }}" class="form-control form-control-sm rounded-0"
                                                    name="rnd">
                                                <div class="input-group-append">
                                                    <select name="rnd_status" required
                                                        class="form-control @if($menu->rnd_status == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $menu->rnd_status == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $menu->rnd_status == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" required value="{{ $menu->affair }}" class="form-control form-control-sm rounded-0"
                                                    name="affair">
                                                <div class="input-group-append">
                                                    <select name="affair_status" required
                                                        class="form-control @if($menu->affair_status == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $menu->affair_status == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $menu->affair_status == '0' ? 'selected':'' }} value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="input-group">
                                                <input type="text" required value="{{ $menu->event }}" class="form-control form-control-sm rounded-0"
                                                    name="event">
                                                <div class="input-group-append">
                                                    <select name="event_status" required
                                                        class="form-control @if($menu->event_status == '1') bg-success @else bg-danger @endif form-control-sm rounded-0">
                                                        <option {{ $menu->event_status == '1' ? 'selected':'' }} value="1">Active</option>
                                                        <option {{ $menu->event_status == '0' ? 'selected':'' }} value="0">Inactive</option>
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
