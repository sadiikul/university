@extends('layouts.frontend')

@section('title')
    News and Event -
@endsection

@section('content')

    <section class="mt-4 section-bottom">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h4 class="fw-bold text-uppercase">news & Event</h4>
            </div>
            <div class="row custom_row">
                @foreach ($event as $item)
                    <div class="col-md-4 my-2">
                        <div class="card">
                            <a href="{{ route('event.details',$item->slug) }}">
                                <img src="{{ asset($item->thumb) }}" class="img-fluid" alt="slider">
                                <div class="news_event_content">
                                    <div class="my-2 d-flex align-items-center">
                                        <span class="material-symbols-outlined me-1">
                                            timer
                                        </span>
                                        <span>{{ date('d M Y h:i A', strtotime($item->created_at)) }}</span>
                                    </div>
                                    <h5>{{ $item->title }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($event) > 9)
                <div class="text-center mt-4">
                    <h3 class="fw-bolder">See More</h3>
                    <div class="pagin">
                        {{ $event->links('frontend.paginator.paginator') }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
