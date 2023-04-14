@extends('layouts.frontend')

@section('title')
    Research & Development -
@endsection

@section('content')
    <section class="mt-4">
        <div class="container">
            <div class="banner text-white">
                <div class="banner_content">
                    <h3>{{ $rnd_heads->title }}</h3>
                    <div class="col-md-6">
                        <p>{{ $rnd_heads->desc }}</p>
                    </div>
                </div>
                <div class="banner_img">
                    <img src="{{ asset($rnd_heads->thumb) }}" class="img-fluid w-100 rounded" alt="{{ $rnd_heads->title }}">
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h4 class="fw-bold text-uppercase">Research & Development</h4>
            </div>
            <div class="row custom_row">
                @foreach ($rnd as $item)
                    <div class="col-md-4 my-2">
                        <div class="card">
                            <a href="{{ route('rnd.details', $item->slug) }}">
                                <img src="{{ asset($item->thumb) }}" class="img-fluid" alt="slider">
                                <div class="news_event_content">
                                    <div class="my-2 d-flex align-items-center">
                                        <span class="material-symbols-outlined me-1">
                                            timer
                                        </span>
                                        <span>{{ date('d M Y h:i A', strtotime($item->created_at)) }}</span>
                                    </div>
                                    <h5>{{ $item->title }}</h5>
                                    <p class="pt-2">{!! Str::limit($item->short, 150, ' ...') !!}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($rnd) > 9)
                <div class="text-center mt-4">
                    <h3 class="fw-bolder">See More</h3>
                    <div class="pagin">
                        {{ $rnd->links('frontend.paginator.paginator') }}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- gallery section -->
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="section_title">
                <h4>R & D Gallery</h4>
            </div>
            <div class="swiper gallery">
                <div class="swiper-wrapper">
                    @foreach ($gallery as $item)
                        <div class="swiper-slide">
                            <a class="elem" href="{{ asset($item->img) }}" data-lcl-thumb="{{ asset($item->img) }}">
                                <span style="background-image: url({{ asset($item->img) }});"></span>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
@endsection
