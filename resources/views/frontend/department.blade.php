@extends('layouts.frontend')

@section('meta_desc')
    {{ $dept->meta_desc }}
@endsection
@section('meta_tag')
    {{ $dept->meta_tag }}
@endsection
@section('title')
    {{ $dept->meta_title }}-
@endsection
@section('rel')
    <link href="{{ route('department', $dept->slug) }}" rel="canonical">
@endsection

@section('content')
    <!-- Home slider -->
    <section>
        <div class="swiper slides mySwiper">
            <div class="swiper-wrapper">
                @foreach ($slider as $item)
                    <div class="swiper-slide slides">
                        <img src="{{ asset($item->img) }}" class="img-fluid w-100" alt="slider">
                        @if ($item->show == 1)
                            <div class="slider_content">
                                <h1>{{ $dept->name }}</h1>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="slider_btn_hover">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">
            @if (count($head) > 0)
                <div class="card card-body vice_cha_box">
                    @foreach ($head as $item)
                        @if ($item->desig == 1)
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="vice__img">
                                        <img src="{{ asset($item->img) }}" class="img-fluid w-100" alt="img">
                                    </div>
                                </div>
                                <div class="col-md-8 mt-4 mt-md-0">
                                    <h4 class="fw-bold">{{ $item->name }}</h4>
                                    <p class="m-0 fw-light">Department Head</p>
                                    <p class="m-0 fw-light">{{ $item->email }}</p>
                                    <div class="mt-2">
                                        <p>{{ $item->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @if (count($rd) > 0)
        <section class="mt-5">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h4 class="fw-bold text-uppercase">Research & Development</h4>
                    <a href="{{ route('rnd', $dept->slug) }}">View all <i class="fa-solid fa-angles-right"></i></a>
                </div>
                <div class="row custom_row">
                    @foreach ($rd as $item)
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
            </div>
        </section>
    @endif

    @if (count($faculty) > 0)
        <section class="mt-5">
            <div class="container">
                <h4 class="fw-bold text-uppercase">department Faculties</h4>
                <div class="swiper faculties">
                    <div class="swiper-wrapper">
                        @foreach ($faculty as $item)
                            <div class="swiper-slide">
                                <div class="user_box">
                                    <img src="{{ asset($item->img) }}" width="100" alt="profile">
                                    <h4 class="fw-bold">{{ $item->name }}</h4>
                                    <p class="m-0 fw-light">Teacher</p>
                                    <p class="m-0 fw-light">{{ $item->email }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    @if (count($cate) > 0)
        <section class="mt-4">
            <div class="container">
                <div class="section_title">
                    <h4>Program</h4>
                </div>
                @foreach ($cate as $item)
                    @php
                        $count = 0;
                        foreach ($item->list as $value) {
                            if ($value->dept_id == $dept->id) {
                                $count++;
                            }
                        }
                    @endphp
                    @if ($count > 0)
                        <h5 class="mt-3">{{ $item->name }}</h5>
                    @endif

                    <div class="custom_row row">
                        @foreach ($item->list as $value)
                            @if ($value->dept_id == $dept->id)
                                <div class="col-6 col-md-3 my-1">
                                    <div class="department">
                                        <a
                                            href="{{ route('program', ['name' => $item->slug, 'slug' => $value->slug]) }}"></a>
                                        <div class="thumbnail">
                                            <img src="{{ asset($value->thumb) }}" class="img-fluid" alt="img">
                                        </div>
                                        <div class="content">
                                            <h5>{{ $value->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if (count($notice) > 0)
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="notice_box border">
                            <div class="title">
                                <h4>Notice Board</h4>
                            </div>
                            <div class="notice_content">
                                <ul>
                                    @foreach ($notice as $item)
                                        <li>
                                            <a href="{{ route('notice', $item->id) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (count($alumni) > 0)
        <section class="mt-5">
            <div class="container">
                <div class="section_title">
                    <h4>notable alumni</h4>
                </div>
                <div class="swiper faculties">
                    <div class="swiper-wrapper">
                        @foreach ($alumni as $item)
                            <div class="swiper-slide">
                                <div class="user_box">
                                    <img src="{{ asset($item->img) }}" width="100" alt="profile">
                                    <h4 class="fw-bold">{{ $item->name }}</h4>
                                    <p class="m-0 fw-light">{{ $item->dept->name }}</p>
                                    <p class="m-0 fw-light">{{ $item->batch }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    <!-- gallery section -->
    <section class="section-bottom mt-3">
        <div class="container">
            <div class="section_title">
                <h4>Gallery</h4>
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
