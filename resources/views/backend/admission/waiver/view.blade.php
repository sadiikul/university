@extends('layouts.backend')

@section('title')
Feedback Detail
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Feedback Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.admission.waiver.feedback') }}">Feedback</a></li>
                            <li class="breadcrumb-item active">Detail</li>
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
                                <h3 class="card-title">Feedback Detail</h3>
                                <a href="{{ route('admin.admission.waiver.feedback') }}" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    class="table table-bordered table-striped table-responsive-sm data_tables">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $feedback->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $feedback->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $feedback->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>{{ $feedback->subject }}</td>
                                        </tr>
                                        <tr>
                                            <th>SSC</th>
                                            <td>{{ $feedback->ssc }}</td>
                                        </tr>
                                        <tr>
                                            <th>HSC</th>
                                            <td>{{ $feedback->hsc }}</td>
                                        </tr>
                                        <tr>
                                            <th>Extra Curriculum</th>
                                            <td>{{ $feedback->extra }}</td>
                                        </tr>
                                    </tbody>
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
