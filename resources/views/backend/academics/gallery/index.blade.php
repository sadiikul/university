@extends('layouts.backend')
@php
    $user = Auth::user();
@endphp
@section('title')
    Gallery List
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gallery List</h1>
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
                                <h3 class="card-title">Gallery Table</h3>
                                @if ($user->can('department_gallery.create'))
                                    <a href="{{ route('admin.academics.gallery.create') }}"
                                        class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add
                                        Image</a>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    class="table table-bordered text-center table-striped table-responsive-sm data_tables">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Department</th>
                                            @if ($user->can('department_gallery.delete'))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gallery as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset($item->img) }}" width="80"
                                                        alt="{{ $item->dept->name }}"></td>
                                                <td>{{ $item->dept->name }}</td>
                                                @if ($user->can('department_gallery.delete'))
                                                    <td>
                                                        <a title="Delete"
                                                            onclick="return confirm('Are you sure to Delete?')"
                                                            href="{{ route('admin.academics.gallery.destroy', $item->id) }}"
                                                            class="text-danger mx-1"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Department</th>
                                            @if ($user->can('department_gallery.delete'))
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
