@extends('layouts.frontend')

@section('title')
    Academic Calender -
@endsection

@section('content')
    <section class="section-bottom mt-4">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h4 class="fw-bold text-uppercase">Academic Calender</h4>
            </div>
            <table class="table text-center table-striped fee">
                <thead class="thead">
                    <tr>
                        <th width="20%">Month</th>
                        <th width="20%">Date</th>
                        <th width="50%">Event</th>
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
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
