@extends('layouts.backend')
{{-- @php
$user = Auth::user();
@endphp --}}

@section('title')
    Permission Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Permission Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                        <div class="card rounded-0 card-outline card-primary">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit Permission</h3>
                                <a href="{{ route('admin.permission.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.permission.update', $roles->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="role" value="{{ $roles->name }}"
                                                    class="form-control rounded-0 form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-all"
                                                    {{ \App\Models\User::roleHasPermissions($roles, $allPermissions) ? 'checked' : '' }}>
                                                <label for="checkbox-all" class="custom-control-label">All</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($group as $item)
                                                @php
                                                    $permissions = \App\Models\User::getpermissionsByGroupName($item->name);
                                                @endphp
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox"
                                                                onclick="clickCheckbox('role-{{ $i }}-manage',this)"
                                                                class="custom-control-input"
                                                                id="group-{{ $i }}-checkbox"
                                                                {{ \App\Models\User::roleHasPermissions($roles, $permissions) ? 'checked' : '' }}>
                                                            <label for="group-{{ $i }}-checkbox"
                                                                class="custom-control-label">{{ ucfirst($item->name) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 role-{{ $i }}-manage">
                                                        @foreach ($permissions as $permission)
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox"
                                                                    onclick="checkByGroup('role-{{ $i }}-manage','group-{{ $i }}-checkbox',{{ count($permissions) }})"
                                                                    name="permission[]" value="{{ $permission->id }}"
                                                                    class="custom-control-input"
                                                                    id="checkbox-{{ $permission->id }}"
                                                                    {{ $roles->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                                <label for="checkbox-{{ $permission->id }}"
                                                                    class="custom-control-label">{{ $permission->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <br>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
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
@section('script')
    @include('backend.permission.script')
@endsection
@endsection
