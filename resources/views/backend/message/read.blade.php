@extends('layouts.backend')

@section('title')
Read
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Read</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.message.inbox') }}">Inbox</a></li>
                            <li class="breadcrumb-item active">Read</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary rounded-0 card-outline">
                <div class="card-header">
                    <h3 class="card-title">Read Mail</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.message.inbox') }}" class="btn btn-sm btn-info"><i
                            class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5>Name : {{ $message->name }}</h5>
                        <h5>Subject : {{ $message->subject }}</h5>
                        <h6>From: support@adminlte.io
                            <span class="mailbox-read-time float-right"> {{ date('d M. Y H:i:s A',strtotime($message->created_at)) }}</span>
                        </h6>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <p>{{ $message->message }}</p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
            </div>
        </section>
    </div>
@endsection
