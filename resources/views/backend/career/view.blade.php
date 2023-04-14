@extends('layouts.backend')

@section('title')
Candidate Detail
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Candidate Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.career.list') }}">Candidate</a></li>
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
                                <h3 class="card-title">Candidate Detail</h3>
                                <a href="{{ route('admin.career.list') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-responsive-sm data_tables">
                                    <tbody>
                                        <tr>
                                            <th>Job Title</th>
                                            <td>{{ $list->post->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $list->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $list->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $list->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $list->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Joining Date</th>
                                            <td>{{ $list->joining_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Expected Salary</th>
                                            <td>{{ $list->expected_salary }}</td>
                                        </tr>
                                        <tr>
                                            <th>Experience</th>
                                            <td>{{ $list->experience }}</td>
                                        </tr>
                                        <tr>
                                            <th>Message</th>
                                            <td>{{ $list->message }}</td>
                                        </tr>
                                        <tr>
                                            <th>Portfolio Link</th>
                                            <td>
                                                @if ($list->portfolio_link !== null)
                                                    {{ $list->portfolio_link }}
                                                @else
                                                    No
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Resume</th>
                                            <td><a target="_blank" class="btn btn-sm btn-info"
                                                    href="{{ asset($list->resume) }}">Click</a></td>
                                        </tr>
                                        <tr>
                                            <th>Cover Letter</th>
                                            <td>
                                                @if ($list->cover !== null)
                                                    <a target="_blank" class="btn btn-sm btn-info" href="{{ asset($list->cover) }}">Click</a>
                                                @else
                                                    No
                                                @endif
                                            </td>
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
