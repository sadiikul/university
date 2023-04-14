@extends('layouts.frontend')

@section('title')
    Syndicate -
@endsection

@section('content')
    <section>
        <div class="sliders">
            <img src="{{ asset($management->syndicate) }}" class="img-fluid w-100" alt="img">
        </div>
    </section>

    <section class="pb-3 pt-5">
        <div class="container">
            <div class="editor_desc">
                {!! $head->desc !!}
            </div>
        </div>
    </section>

    <section class="py-1">
        <div class="container">
            <div class="row">
                @foreach ($member as $item)
                    @if ($item->position == 1)
                        <div class="col-md-6 my-2">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset($item->img) }}" class="img-fluid w-100"
                                            alt="{{ $item->name }}">
                                    </div>
                                    <div class="col-md-8 pt-3 pt-md-0">
                                        <h4 class="fw-bold">{{ $item->name }}</h4>
                                        <p class="m-0 fw-light">{{ $item->designation }}</p>
                                        <p class="m-0 fw-light">{{ $item->email }}</p>
                                        <div class="mt-2">
                                            <p>{{ $item->desc }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-bottom">
        <div class="container">
            <div class="row custom_row">
                @foreach ($member as $item)
                    @if ($item->position != 1)
                        <div class="col-6 col-md-4">
                            <div class="user_box">
                                <img src="{{ asset($item->img) }}" width="100" alt="{{ $item->name }}">
                                <h4 class="fw-bold">{{ $item->name }}</h4>
                                <p class="m-0 fw-light">{{ $item->designation }}</p>
                                <p class="m-0 fw-light">{{ $item->email }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
