@extends('layouts.backend')
@php
    $user = Auth::user();
@endphp
@section('title')
    R&D Post List
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">R&D Post List</h1>
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
                                <h3 class="card-title">R&D Post Table</h3>
                                @if ($user->can('rnd.create'))
                                    <a href="{{ route('admin.rnd.post.create') }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-plus"></i> Add Post</a>
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
                                            <th>Title</th>
                                            <th>Status</th>
                                            @if ($user->can('rnd.edit') || $user->can('rnd.delete'))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($post as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset($item->thumb) }}" width="80"
                                                        alt="{{ $item->title }}"></td>
                                                <td>{{ $item->dept->name }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    <span
                                                        class="badge 
                                                @if ($item->status == '1') badge-success
                                                @else
                                                badge-danger @endif
                                                ">{{ $item->status == '1' ? 'active' : 'inactive' }}</span>
                                                </td>
                                                @if ($user->can('rnd.edit') || $user->can('rnd.delete'))
                                                    <td>
                                                        @if ($user->can('rnd.edit'))
                                                            <a title="Edit"
                                                                href="{{ route('admin.rnd.post.edit', $item->id) }}"
                                                                class="text-info mx-1"><i class="fas fa-edit"></i></a>
                                                        @endif
                                                        @if ($user->can('rnd.delete'))
                                                            <a title="Delete"
                                                                onclick="return confirm('Are you sure to Delete?')"
                                                                href="{{ route('admin.rnd.post.destroy', $item->id) }}"
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
                                            <th>Title</th>
                                            <th>Status</th>
                                            @if ($user->can('rnd.edit') || $user->can('rnd.delete'))
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
