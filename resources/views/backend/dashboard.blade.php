@extends('layouts.backend')

@php
    $user = Auth::user();
@endphp

@section('title')
    Dashboard
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if ($user->can('dashboard.view'))
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-school"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Department</span>
                                    <span class="info-box-number">{{ $dept }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-university"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Program</span>
                                    <span class="info-box-number">{{ $program }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fab fa-searchengin"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">R&D Post Total</span>
                                    <span class="info-box-number">{{ $rnd }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Faculty</span>
                                    <span class="info-box-number">{{ $faculty }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-user-graduate"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Alumni</span>
                                    <span class="info-box-number">{{ $alumni }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-secondary"><i class="fas fa-clipboard-list"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Notice</span>
                                    <span class="info-box-number">{{ $notice }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-dark"><i class="fas fa-clipboard-list"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Today Notice</span>
                                    <span class="info-box-number">{{ $noticeToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light"><i class="fas fa-newspaper"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">News & Event</span>
                                    <span class="info-box-number">{{ $event }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-newspaper"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Today News & Event</span>
                                    <span class="info-box-number">{{ $eventToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-layer-group"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Seminar</span>
                                    <span class="info-box-number">{{ $seminar }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-layer-group"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Today Seminar</span>
                                    <span class="info-box-number">{{ $seminarToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-certificate"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Club Post</span>
                                    <span class="info-box-number">{{ $club }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-dark"><i class="fas fa-user-tie"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">International Affairs</span>
                                    <span class="info-box-number">{{ $affairs }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-secondary"><i class="far fa-star"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Career Post</span>
                                    <span class="info-box-number">{{ $careerPost }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-th-list"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Apply</span>
                                    <span class="info-box-number">{{ $careerForm }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-th-list"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Today Apply</span>
                                    <span class="info-box-number">{{ $careerFormToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-users-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Subscriber</span>
                                    <span class="info-box-number">{{ $subscriber }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Todays Message</span>
                                    <span class="info-box-number">{{ $messageToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-star"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Waiver Feedback</span>
                                    <span class="info-box-number">{{ $waiver }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-secondary"><i class="fas fa-handshake"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Partner</span>
                                    <span class="info-box-number">{{ $partner }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                @endif
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
