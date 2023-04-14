@extends('layouts.backend')
@php
    $user = Auth::user();
@endphp
@section('title')
Feedback List
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Feedback List</h1>
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
                                <h3 class="card-title">Feedback Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    class="table table-bordered text-center table-striped table-responsive-sm data_tables">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                           @if ($user->can('waiver_feedback.view') || $user->can('waiver_feedback.delete'))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedback as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($user->can('waiver_feedback.view'))
                                                    <a title="Edit"
                                                        href="{{ route('admin.admission.waiver.view', $item->id) }}"
                                                        class="text-info mx-1"><i class="fas fa-eye"></i></a>
                                                        @endif
                                                        @if ($user->can('waiver_feedback.delete'))
                                                    <a title="Delete" onclick="return confirm('Are you sure to Delete?')"
                                                        href="{{ route('admin.admission.waiver.feedbackDelete', $item->id) }}"
                                                        class="text-danger mx-1"><i class="fas fa-trash-alt"></i></a>
                                                        @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            @if ($user->can('waiver_feedback.view') || $user->can('waiver_feedback.delete'))
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
