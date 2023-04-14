@extends('layouts.backend')
@php
    $user = Auth::user();
@endphp
@section('title')
    Program List
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Program List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List</li>
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
                                <h3 class="card-title">Program Table</h3>
                                @if ($user->can('program_list.create'))
                                    <a href="{{ route('admin.program.list.create') }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-plus"></i> Add
                                        Program</a>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    class="table table-bordered text-center table-striped table-responsive-sm data_tables">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Thumbnail</th>
                                            <th>Department</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            @if ($user->can('program_list.edit') || $user->can('program_list.delete'))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($program as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset($item->thumb) }}" width="80"
                                                        alt="{{ $item->name }}"></td>
                                                <td>{{ $item->dept->name }}</td>
                                                <td>{{ $item->cate->name }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td>
                                                    <span
                                                        class="badge 
                                                @if ($item->status == '1') badge-success
                                                @else
                                                badge-danger @endif
                                                ">{{ $item->status == '1' ? 'active' : 'inactive' }}</span>
                                                </td>
                                                @if ($user->can('program_list.edit') || $user->can('program_list.delete'))
                                                    <td>
                                                        @if ($user->can('program_list.edit'))
                                                            <a title="Edit"
                                                                href="{{ route('admin.program.list.edit', $item->id) }}"
                                                                class="text-info mx-1"><i class="fas fa-edit"></i></a>
                                                        @endif
                                                        @if ($user->can('program_list.delete'))
                                                            <a title="Delete"
                                                                onclick="return confirm('Are you sure to Delete?')"
                                                                href="{{ route('admin.program.list.destroy', $item->id) }}"
                                                                class="text-danger mx-1"><i
                                                                    class="fas fa-trash-alt"></i></a>
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Thumbnail</th>
                                            <th>Department</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            @if ($user->can('program_list.edit') || $user->can('program_list.delete'))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </tfoot>
                                </table>
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
