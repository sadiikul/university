@extends('layouts.backend')
@php
    $user = Auth::user();
@endphp
@section('title')
    Course Credit & Hour List
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Course Credit & Hour List</h1>
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
                                <h3 class="card-title">Course Credit & Hour Table</h3>
                                @if ($user->can('credit_hour.create'))
                                    <a href="{{ route('admin.program.course.create') }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-plus"></i> Add
                                        Course Credit & Hour</a>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    class="table table-bordered text-center table-striped table-responsive-sm data_tables">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Program</th>
                                            <th>Areas</th>
                                            <th>No. of Courses</th>
                                            <th>Credit Hour</th>
                                            @if ($user->can('credit_hour.edit') || $user->can('credit_hour.delete'))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->program->name }}</td>
                                                <td>{{ $item->area }}</td>
                                                <td>{{ $item->no }}</td>
                                                <td>{{ $item->hour }}</td>
                                                @if ($user->can('credit_hour.edit') || $user->can('credit_hour.delete'))
                                                    <td>
                                                        @if ($user->can('credit_hour.edit'))
                                                            <a title="Edit"
                                                                href="{{ route('admin.program.course.edit', $item->id) }}"
                                                                class="text-info mx-1"><i class="fas fa-edit"></i></a>
                                                        @endif
                                                        @if ($user->can('credit_hour.delete'))
                                                            <a title="Delete"
                                                                onclick="return confirm('Are you sure to Delete?')"
                                                                href="{{ route('admin.program.course.destroy', $item->id) }}"
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
                                            <th>Program</th>
                                            <th>Areas</th>
                                            <th>No. of Courses</th>
                                            <th>Credit Hour</th>
                                            @if ($user->can('credit_hour.edit') || $user->can('credit_hour.delete'))
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
