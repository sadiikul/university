@extends('layouts.backend')

@section('title')
Inbox
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Inbox</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card card-primary rounded-0 card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>
                            <!-- /.card-tools -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach ($message as $item)
                                        <tr style="background-color: @if($item->seen == '0') #ececec @endif">
                                            <td class="mailbox-name"><a href="{{ route('admin.message.read',$item->id) }}">{{ $item->name }}</a></td>
                                            <td class="mailbox-subject">{{ $item->subject }}
                                            </td>
                                            <td class="mailbox-date">{{ $item->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a title="Delete" onclick="return confirm('Are you sure to Delete?')"
                                                        href="{{ route('admin.message.destroy', $item->id) }}"
                                                        class="text-danger mx-1"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-0">
                        <div class="mailbox-controls">
                            <div class="float-right">
                                {{ $message->links('pagination::bootstrap-5') }}
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection
