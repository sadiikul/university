@extends('layouts.user')

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
                <div class="row">
                    <div class="col-sm-6 col-12">
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
                    <div class="col-sm-6 col-12">
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
                    <div class="col-sm-6 col-12">
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
                    <div class="col-sm-6 col-12">
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
                    <div class="col-sm-6 col-12">
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
                    <div class="col-sm-6 col-12">
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
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
