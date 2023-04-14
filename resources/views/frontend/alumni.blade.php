@extends('layouts.frontend')

@section('title')
    Alumni -
@endsection

@section('content')
    <section class="section-bottom mt-4">
        <div class="container">
            <h4 class="fw-bold">OUR SUCCESSFUL ALUMNI</h4>
            <div class="row custom_row">
                @foreach ($alumni as $item)
                    <div class="col-6 col-md-4">
                        <div class="user_box">
                            <img src="{{ asset($item->img) }}" width="100" alt="{{ $item->name }}">
                            <h4 class="fw-bold">{{ $item->name }}</h4>
                            <p class="m-0 fw-light">{{ $item->dept->name }}</p>
                            <p class="m-0 fw-light">{{ $item->batch }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($alumni) > 15)
                <div class="text-center mt-4">
                    <h3 class="fw-bolder">See More</h3>
                    <div class="pagin">
                        {{ $alumni->links('frontend.paginator.paginator') }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
