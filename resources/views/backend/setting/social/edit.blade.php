@extends('layouts.backend')

@section('title')
Social Link Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Social Link Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.social.index') }}">Social Link</a></li>
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
                                <h3 class="card-title">Edit Social Link</h3>
                                <a href="{{ route('admin.social.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.social.update', $social->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Social Icon <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="icon" required
                                                    class="form-control form-control-sm rounded-0 @error('icon') is-invalid @enderror">
                                                    <option value="">Select Icon</option>
                                                    <option {{ $social->icon == 'fab fa-facebook' ? 'selected':'' }} value="fab fa-facebook"><i class="fab fa-facebook"></i> Facebook</option>
                                                    <option {{ $social->icon == 'fab fa-twitter' ? 'selected':'' }} value="fab fa-twitter"><i class="fab fa-twitter"></i> Twitter</option>
                                                    <option {{ $social->icon == 'fab fa-linkedin' ? 'selected':'' }} value="fab fa-linkedin"><i class="fab fa-linkedin"></i> Linkedin</option>
                                                    <option {{ $social->icon == 'fab fa-whatsapp-square' ? 'selected':'' }} value="fab fa-whatsapp-square"><i class="fab fa-whatsapp-square"></i> Whatsapp</option>
                                                    <option {{ $social->icon == 'fab fa-instagram' ? 'selected':'' }} value="fab fa-instagram"><i class="fab fa-instagram"></i> Instagram</option>
                                                    <option {{ $social->icon == 'fab fa-viber' ? 'selected':'' }} value="fab fa-viber"><i class="fab fa-viber"></i> Viber</option>
                                                    <option {{ $social->icon == 'fab fa-google' ? 'selected':'' }} value="fab fa-google"><i class="fab fa-google"></i> Google</option>
                                                    <option {{ $social->icon == 'fab fa-youtube' ? 'selected':'' }} value="fab fa-youtube"><i class="fab fa-youtube"></i> Youtube</option>
                                                </select>
                                                @error('department')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 text-md-right">
                                                    <label>Link :</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="link" placeholder="Enter link..."
                                                        value="{{ $social->link }}"
                                                        class="form-control rounded-0 form-control-sm @error('link') is-invalid @enderror">
                                                    @error('link')
                                                        <div class="text-danger font-italic">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
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
