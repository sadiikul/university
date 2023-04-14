@extends('layouts.frontend')

@section('title')
    Board of Trustees -
@endsection

@section('content')
    <section class="section-bottom mt-4">
        <div class="container">
            <h4 class="fw-bold text-uppercase">board of trustiees</h4>
            @foreach ($member as $item)
                @if ($item->position == 1)
                    <div class="card card-body vice_cha_box">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="vice__img">
                                    <img src="{{ asset($item->img) }}" class="img-fluid w-100" alt="{{ $item->name }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4 class="fw-bold">{{ $item->name }}</h4>
                                <p class="m-0 fw-light">{{ $item->designation }}</p>
                                <p class="m-0 fw-light">{{ $item->email }}</p>
                                <div class="mt-2">
                                    <p>{{ $item->desc }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
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
