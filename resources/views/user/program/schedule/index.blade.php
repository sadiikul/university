@extends('layouts.user')

@section('title')
    Schedule List
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Schedule List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
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
                                <h3 class="card-title">Schedule Table</h3>
                                <a href="{{ route('user.program.schedule.create') }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-plus"></i> Add
                                    Schedule</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    class="table table-bordered text-center table-striped table-responsive-sm data_tables">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Program</th>
                                            <th>Semester</th>
                                            <th>Year</th>
                                            <th>Courses</th>
                                            <th>Credit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $val)
                                            @foreach ($val->schedule as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->program->name }}</td>
                                                    <td>{{ $item->semester }}</td>
                                                    <td>{{ $item->year }}</td>
                                                    <td>{{ $item->course }}</td>
                                                    <td>{{ $item->credit }}</td>
                                                    <td>
                                                        <a title="Edit"
                                                            href="{{ route('user.program.schedule.edit', $item->id) }}"
                                                            class="text-info mx-1"><i class="fas fa-edit"></i></a>
                                                        <a title="Delete"
                                                            onclick="return confirm('Are you sure to Delete?')"
                                                            href="{{ route('user.program.schedule.destroy', $item->id) }}"
                                                            class="text-danger mx-1"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Program</th>
                                            <th>Semester</th>
                                            <th>Year</th>
                                            <th>Courses</th>
                                            <th>Credit</th>
                                            <th>Action</th>
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
