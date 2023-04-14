@extends('layouts.frontend')

@section('title')
    Academic Council -
@endsection

@section('content')
    <section>
        <div class="sliders">
            <img src="{{ asset($management->council) }}" class="img-fluid w-100" alt="img">
        </div>
    </section>

    <section class="pb-3 pt-5">
        <div class="container">
            <div class="editor_desc">
                {!! $head->desc !!}
            </div>
        </div>
    </section>

    <section class="section-bottom">
        <div class="container">
            <table class="table table-striped fee">
                <thead class="thead">
                    <tr>
                        <th width="35%">Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>{{ $item->department }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
