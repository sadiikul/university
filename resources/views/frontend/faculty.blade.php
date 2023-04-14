@extends('layouts.frontend')

@section('title')
    Faculty Team -
@endsection

@section('content')
    <section class="section-bottom mt-4">
        <div class="container">
            <h4 class="fw-bold">OUR FACULTY</h4>
            <div class="row custom_row">
                @foreach ($faculty as $item)
                    <div class="col-6 col-md-4">
                        <div class="user_box">
                            <img src="{{ asset($item->img) }}" width="100" alt="{{ $item->name }}">
                            <h4 class="fw-bold">{{ $item->name }}</h4>
                            <p class="m-0 fw-light">{{ $item->dept->name }}</p>
                            <p class="m-0 fw-light">
                                @if ($item->desig === 1)
                                    Head of Department
                                @else
                                    Teacher
                                @endif
                            </p>
                            <p class="m-0 fw-light">{{ $item->email }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($faculty) > 15)
                <div class="text-center mt-4">
                    <h3 class="fw-bolder">See More</h3>
                    <div class="pagin">
                        {{ $faculty->links('frontend.paginator.paginator') }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
