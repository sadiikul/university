@extends('layouts.backend')

@section('title')
Contact & Address Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Contact & Address Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contact.edit') }}"> Contact & Address</a>
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
                        <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card rounded-0 card-outline card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Edit {{ $contact->first_phone_title }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <input type="text" name="first_phone_title"
                                                    placeholder="Enter first_phone_title..."
                                                    value="{{ $contact->first_phone_title }}"
                                                    class="form-control rounded-0 form-control-sm @error('first_phone_title') is-invalid @enderror">
                                                @error('first_phone_title')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>First Number :</label>
                                                <input type="text" name="first_phone"
                                                    placeholder="Enter first_phone..." value="{{ $contact->first_phone }}"
                                                    class="form-control rounded-0 form-control-sm @error('first_phone') is-invalid @enderror">
                                                @error('first_phone')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Second Number :</label>
                                                <input type="text" name="second_phone"
                                                    placeholder="Enter second_phone..." value="{{ $contact->second_phone }}"
                                                    class="form-control rounded-0 form-control-sm @error('second_phone') is-invalid @enderror">
                                                @error('second_phone')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card rounded-0 card-outline card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Edit {{ $contact->second_phone_title }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <input type="text" name="second_phone_title"
                                                    placeholder="Enter second_phone_title..."
                                                    value="{{ $contact->second_phone_title }}"
                                                    class="form-control rounded-0 form-control-sm @error('second_phone_title') is-invalid @enderror">
                                                @error('second_phone_title')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Third Number :</label>
                                                <input type="text" name="third_phone"
                                                    placeholder="Enter third_phone..." value="{{ $contact->third_phone }}"
                                                    class="form-control rounded-0 form-control-sm @error('third_phone') is-invalid @enderror">
                                                @error('third_phone')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Fourth Number :</label>
                                                <input type="text" name="fourth_phone"
                                                    placeholder="Enter fourth_phone..."
                                                    value="{{ $contact->fourth_phone }}"
                                                    class="form-control rounded-0 form-control-sm @error('fourth_phone') is-invalid @enderror">
                                                @error('fourth_phone')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card rounded-0 card-outline card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Edit {{ $contact->email_title }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <input type="text" name="email_title"
                                                    placeholder="Enter email_title..." value="{{ $contact->email_title }}"
                                                    class="form-control rounded-0 form-control-sm @error('email_title') is-invalid @enderror">
                                                @error('email_title')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="text" name="email" placeholder="Enter email..."
                                                    value="{{ $contact->email }}"
                                                    class="form-control rounded-0 form-control-sm @error('email') is-invalid @enderror">
                                                @error('email')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card rounded-0 card-outline card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Edit {{ $contact->first_address_title }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <input type="text" name="first_address_title"
                                                    placeholder="Enter first_address_title..."
                                                    value="{{ $contact->first_address_title }}"
                                                    class="form-control rounded-0 form-control-sm @error('first_address_title') is-invalid @enderror">
                                                @error('first_address_title')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Address :</label>
                                                <textarea name="first_address"
                                                    class="form-control rounded-0 form-control-sm @error('first_address') is-invalid @enderror" rows="5">{{ $contact->first_address }}</textarea>
                                                @error('first_address')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card rounded-0 card-outline card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Edit {{ $contact->second_address_title }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <input type="text" name="second_address_title"
                                                    placeholder="Enter second_address_title..."
                                                    value="{{ $contact->second_address_title }}"
                                                    class="form-control rounded-0 form-control-sm @error('second_address_title') is-invalid @enderror">
                                                @error('second_address_title')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Address :</label>
                                                <textarea name="second_address"
                                                    class="form-control rounded-0 form-control-sm @error('second_address') is-invalid @enderror" rows="5">{{ $contact->second_address }}</textarea>
                                                @error('second_address')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card rounded-0 card-outline card-primary">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Edit {{ $contact->third_address_title }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <input type="text" name="third_address_title"
                                                    placeholder="Enter third_address_title..."
                                                    value="{{ $contact->third_address_title }}"
                                                    class="form-control rounded-0 form-control-sm @error('third_address_title') is-invalid @enderror">
                                                @error('third_address_title')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Address :</label>
                                                <textarea name="third_address"
                                                    class="form-control rounded-0 form-control-sm @error('third_address') is-invalid @enderror" rows="5">{{ $contact->third_address }}</textarea>
                                                @error('third_address')
                                                    <div class="text-danger font-italic">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>
                                    Update</button>
                            </div>
                        </form>
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
