@extends('layouts.backend')

@section('title')
Mail Config Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Mail Config Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.mail.edit') }}"> Mail Config</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
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
                        @include('layouts.message')
                        <div class="card rounded-0 card-outline card-primary">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit Mail Config</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.mail.update', $mail->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Mail Transport <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="transport" placeholder="Enter transport..."
                                                    value="{{ $mail->transport }}"
                                                    class="form-control rounded-0 form-control-sm @error('transport') is-invalid @enderror">
                                                @error('transport')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Mail Host <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="host" placeholder="Enter host..."
                                                    value="{{ $mail->host }}"
                                                    class="form-control rounded-0 form-control-sm @error('host') is-invalid @enderror">
                                                @error('host')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Mail Port <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="port" placeholder="Enter transport..."
                                                    value="{{ $mail->port }}"
                                                    class="form-control rounded-0 form-control-sm @error('port') is-invalid @enderror">
                                                @error('port')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Mail Username <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="username" placeholder="Enter username..."
                                                    value="{{ $mail->username }}"
                                                    class="form-control rounded-0 form-control-sm @error('username') is-invalid @enderror">
                                                @error('username')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Mail Password <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="password" placeholder="Enter password..."
                                                    value="{{ $mail->password }}"
                                                    class="form-control rounded-0 form-control-sm @error('password') is-invalid @enderror">
                                                @error('password')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Mail Encryption <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="encryption" placeholder="Enter encryption..."
                                                    value="{{ $mail->encryption }}"
                                                    class="form-control rounded-0 form-control-sm @error('encryption') is-invalid @enderror">
                                                @error('encryption')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Mail From <sup class="text-danger">* </sup>:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="from" placeholder="Enter from..."
                                                    value="{{ $mail->from }}"
                                                    class="form-control rounded-0 form-control-sm @error('from') is-invalid @enderror">
                                                @error('from')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-right">
                                    <button type="reset" class="btn btn-sm btn-danger"><i
                                            class="fas fa-sync"></i>
                                        Reset</button>
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>
                                        Update</button>
                                </div>
                            </form>
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
