@extends('layouts.backend')

@section('title')
Section Create
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Section Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.admission.waiver.index') }}">Section</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                                <h3 class="card-title">Add Section</h3>
                                <a href="{{ route('admin.admission.waiver.index') }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('admin.admission.waiver.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Section <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="section" placeholder="Enter section..."
                                                    value="{{ old('section') }}"
                                                    class="form-control rounded-0 form-control-sm @error('section') is-invalid @enderror">
                                                @error('section')
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
                                                <label>SSC <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="ssc"
                                                    placeholder="Enter ssc..." value="{{ old('ssc') }}"
                                                    class="form-control rounded-0 form-control-sm @error('ssc') is-invalid @enderror">
                                                @error('ssc')
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
                                                <label>HSC <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="hsc" placeholder="Enter hsc..."
                                                    value="{{ old('hsc') }}"
                                                    class="form-control rounded-0 form-control-sm @error('hsc') is-invalid @enderror">
                                                @error('hsc')
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
                                                <label>Percentage <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" required name="percentage" placeholder="Enter percentage..."
                                                    value="{{ old('percentage') }}"
                                                    class="form-control rounded-0 form-control-sm @error('percentage') is-invalid @enderror">
                                                @error('percentage')
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
                                        Save</button>
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

@section('script')
    <script>
        $(function() {
            var desc =
                '<div class="form-group"><div class="row"><div class="col-md-2 text-md-right"><label>Description :</label></div><div class="col-md-9"><textarea required name="description" class="form-control rounded-0 form-control-sm" placeholder="Enter your text...." rows="8"></textarea></div></div></div>';

            $("select[name='designation']").change(function() {
                let val = $(this).children("option:selected").val();
                if (val == 1) {
                    $('#desc').html(desc);
                } else {
                    $('#desc').html('');
                }
            })
        })
    </script>
@endsection
@endsection
