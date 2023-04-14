@extends('layouts.backend')

@section('title')
Calender Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Calender Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.admission.calender.index') }}">Calender
                                    List</a></li>
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
                        <div class="card rounded-0 card-outline card-primary">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Calender Edit</h3>
                                <a href="#myModal" data-toggle="modal" class="btn btn-sm btn-primary"><i
                                        class="fas fa-plus"></i> Add
                                    Event</a>
                            </div>

                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Event</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{ route('admin.admission.calender.event.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="year_id" value="{{ $year->id }}">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Month <sup class="text-danger">* </sup> :</label>
                                                    <select name="month" required
                                                        class="form-control form-control-sm rounded-0 @error('month') is-invalid @enderror">
                                                        <option value="">Select Month</option>
                                                        <option value="1">Janunary</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Octobor</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                    @error('month')
                                                        <div class="text-danger font-italic">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Date <sup class="text-danger">* </sup> :</label>
                                                    <input type="text" required name="date"
                                                        placeholder="Enter date..." value="{{ old('date') }}"
                                                        class="form-control rounded-0 form-control-sm @error('date') is-invalid @enderror">
                                                    @error('date')
                                                        <div class="text-danger font-italic">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Event <sup class="text-danger">* </sup> :</label>
                                                    <input type="text" required name="event"
                                                        placeholder="Enter event..." value="{{ old('event') }}"
                                                        class="form-control rounded-0 form-control-sm @error('event') is-invalid @enderror">
                                                    @error('event')
                                                        <div class="text-danger font-italic">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.admission.calender.update', $year->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 text-md-right">
                                                <label>Year <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="number" required name="year" placeholder="Enter year..."
                                                    value="{{ $year->year }}"
                                                    class="form-control rounded-0 form-control-sm @error('year') is-invalid @enderror">
                                                @error('year')
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
                                                <label>Status <sup class="text-danger">* </sup> :</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="status" required
                                                    class="form-control form-control-sm rounded-0 @error('status') is-invalid @enderror">
                                                    <option {{ $year->status == 1 ? 'selected' : '' }} value="1">
                                                        Active
                                                    </option>
                                                    <option {{ $year->status == 0 ? 'selected' : '' }} value="0">
                                                        Inactive
                                                    </option>
                                                </select>
                                                @error('status')
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

                                            </div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-sm btn-primary"><i
                                                        class="fas fa-save"></i>
                                                    Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr class="my-5">
                                <table class="table table-bordered text-center table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th width="20%">Month</th>
                                            <th width="20%">Date</th>
                                            <th width="50%">Event</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group as $val)
                                            @php
                                                $count = 1;
                                                $row = 0;
                                                foreach ($cal as $cals) {
                                                    if ($val->month == $cals->month) {
                                                        $row++;
                                                    }
                                                }
                                            @endphp
                                            @foreach ($cal as $item)
                                                @if ($val->month == $item->month)
                                                    <tr>
                                                        @if ($count == 1)
                                                            <td rowspan="{{ $row }}">
                                                                @if ($val->month == 1)
                                                                    Janunary
                                                                @elseif($val->month == 2)
                                                                    February
                                                                @elseif($val->month == 3)
                                                                    March
                                                                @elseif($val->month == 4)
                                                                    April
                                                                @elseif($val->month == 5)
                                                                    May
                                                                @elseif($val->month == 6)
                                                                    June
                                                                @elseif($val->month == 7)
                                                                    July
                                                                @elseif($val->month == 8)
                                                                    August
                                                                @elseif($val->month == 9)
                                                                    September
                                                                @elseif($val->month == 10)
                                                                    Octobor
                                                                @elseif($val->month == 11)
                                                                    November
                                                                @elseif($val->month == 12)
                                                                    December
                                                                @endif- {{ $year->year }}
                                                            </td>
                                                        @endif
                                                        <td>{{ $item->date }}</td>
                                                        <td>{{ $item->event }}</td>
                                                        <td>
                                                            <a title="Edit" href="#event-{{ $item->id }}"
                                                                data-toggle="modal" class="text-info mx-1"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a title="Delete"
                                                                onclick="return confirm('Are you sure to Delete?')"
                                                                href="{{ route('admin.admission.calender.event.delete', $item->id) }}"
                                                                class="text-danger mx-1"><i
                                                                    class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal" id="event-{{ $item->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add Event</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <form
                                                                    action="{{ route('admin.admission.calender.event.update', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="year_id"
                                                                        value="{{ $year->id }}">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Month <sup class="text-danger">* </sup>
                                                                                :</label>
                                                                            <select name="month" required
                                                                                class="form-control form-control-sm rounded-0 @error('month') is-invalid @enderror">
                                                                                <option value="">Select Month
                                                                                </option>
                                                                                <option
                                                                                    {{ $item->month == 1 ? 'selected' : '' }}
                                                                                    value="1">Janunary</option>
                                                                                <option
                                                                                    {{ $item->month == 2 ? 'selected' : '' }}
                                                                                    value="2">February</option>
                                                                                <option
                                                                                    {{ $item->month == 3 ? 'selected' : '' }}
                                                                                    value="3">March</option>
                                                                                <option
                                                                                    {{ $item->month == 4 ? 'selected' : '' }}
                                                                                    value="4">April</option>
                                                                                <option
                                                                                    {{ $item->month == 5 ? 'selected' : '' }}
                                                                                    value="5">May</option>
                                                                                <option
                                                                                    {{ $item->month == 6 ? 'selected' : '' }}
                                                                                    value="6">June</option>
                                                                                <option
                                                                                    {{ $item->month == 7 ? 'selected' : '' }}
                                                                                    value="7">July</option>
                                                                                <option
                                                                                    {{ $item->month == 8 ? 'selected' : '' }}
                                                                                    value="8">August</option>
                                                                                <option
                                                                                    {{ $item->month == 9 ? 'selected' : '' }}
                                                                                    value="9">September</option>
                                                                                <option
                                                                                    {{ $item->month == 10 ? 'selected' : '' }}
                                                                                    value="10">Octobor</option>
                                                                                <option
                                                                                    {{ $item->month == 11 ? 'selected' : '' }}
                                                                                    value="11">November</option>
                                                                                <option
                                                                                    {{ $item->month == 12 ? 'selected' : '' }}
                                                                                    value="12">December</option>
                                                                            </select>
                                                                            @error('month')
                                                                                <div class="text-danger font-italic">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Date <sup class="text-danger">* </sup>
                                                                                :</label>
                                                                            <input type="text" required name="date"
                                                                                placeholder="Enter date..."
                                                                                value="{{ $item->date }}"
                                                                                class="form-control rounded-0 form-control-sm @error('date') is-invalid @enderror">
                                                                            @error('date')
                                                                                <div class="text-danger font-italic">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Event <sup class="text-danger">* </sup>
                                                                                :</label>
                                                                            <input type="text" required name="event"
                                                                                placeholder="Enter event..."
                                                                                value="{{ $item->event }}"
                                                                                class="form-control rounded-0 form-control-sm @error('event') is-invalid @enderror">
                                                                            @error('event')
                                                                                <div class="text-danger font-italic">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Event</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
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
