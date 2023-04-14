@extends('layouts.frontend')

@section('content')
    <!-- Home slider -->
    <section>
        <div class="swiper slides mySwiper">
            <div class="swiper-wrapper">
                @foreach ($slider as $item)
                    <div class="swiper-slide slides">
                        <img src="{{ asset($item->img) }}" class="img-fluid w-100" alt="slider">
                        @if ($item->title !== null)
                            <div class="slider_content">
                                <h1>{{ $item->title }}</h1>
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

    <!-- Academics section -->
    @if ($customize->academics == 1)
        <section class="section-gap academic">
            <div class="container">
                <div class="section_title">
                    <h4>Academics</h4>
                    <p>our departments</p>
                </div>
                <div class="custom_row row">
                    @foreach ($dept as $item)
                        <div class="col-6 col-md-3 my-1">
                            <div class="department">
                                <a href="{{ route('department', $item->slug) }}"></a>
                                <div class="thumbnail">
                                    <img src="{{ asset($item->thumb) }}" class="img-fluid" alt="{{ $item->name }}">
                                </div>
                                <div class="content">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Admission section -->
    @if ($customize->admission == 1)
        <section class="section-gap admission">
            <div class="container">
                <div class="section_title">
                    <h4 class="text-white">admission</h4>
                </div>
                <div class="row custom_row">
                    <div class="col-md-3 my-1">
                        <div class="department">
                            <a href="{{ route('program.list') }}"></a>
                            <div class="thumbnail">
                                <img src="{{ asset($admission->program) }}" class="img-fluid" alt="Program">
                            </div>
                            <div class="content">
                                <h5>Program</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row custom_row">
                            <div class="col-6 col-md-4 my-1">
                                <div class="department">
                                    <a href="{{ route('admission') }}"></a>
                                    <div class="thumbnail">
                                        <img src="{{ asset($admission->admission) }}" class="img-fluid" alt="Admission">
                                    </div>
                                    <div class="content">
                                        <h5>Admission</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 my-1">
                                <div class="department">
                                    <a href="{{ route('tuition') }}"></a>
                                    <div class="thumbnail">
                                        <img src="{{ asset($admission->tuition) }}" class="img-fluid" alt="Tuition & Fees">
                                    </div>
                                    <div class="content">
                                        <h5>Tuition & Fees</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 my-1">
                                <div class="department">
                                    <a href="{{ route('foreign') }}"></a>
                                    <div class="thumbnail">
                                        <img src="{{ asset($admission->foreign) }}" class="img-fluid"
                                            alt="Tuition Fees for Foreign Student">
                                    </div>
                                    <div class="content">
                                        <h5>Tuition Fees for Foreign Student</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 my-1">
                                <div class="department">
                                    <a href="{{ route('waiver') }}"></a>
                                    <div class="thumbnail">
                                        <img src="{{ asset($admission->scholarship) }}" class="img-fluid"
                                            alt="Schoolarship & Waiver">
                                    </div>
                                    <div class="content">
                                        <h5>Schoolarship & Waiver.</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 my-1">
                                <div class="department">
                                    <a href="{{ route('accommodation') }}"></a>
                                    <div class="thumbnail">
                                        <img src="{{ asset($admission->accommodation) }}" class="img-fluid"
                                            alt="Accommodation">
                                    </div>
                                    <div class="content">
                                        <h5>Accommodation</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 my-1">
                                <div class="department">
                                    <a href="{{ route('calender') }}"></a>
                                    <div class="thumbnail">
                                        <img src="{{ asset($admission->calender) }}" class="img-fluid"
                                            alt="Academic Calendar">
                                    </div>
                                    <div class="content">
                                        <h5>Academic Calendar</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Management section -->
    @if ($customize->management == 1)
        <section class="section-gap management">
            <div class="container">
                <div class="section_title">
                    <h4 class="text-white">Management</h4>
                </div>
                <div class="row custom_row">
                    <div class="col-6 col-md-4 my-1">
                        <div class="department">
                            <a href="{{ route('board') }}"></a>
                            <div class="thumbnail">
                                <img src="{{ asset($manage->member) }}" class="img-fluid" alt="Board of Trustees">
                            </div>
                            <div class="content">
                                <h5>Board of Trustees.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-1">
                        <div class="department">
                            <a href="{{ route('syndicate') }}"></a>
                            <div class="thumbnail">
                                <img src="{{ asset($manage->syndicate) }}" class="img-fluid" alt="Syndicate">
                            </div>
                            <div class="content">
                                <h5>Syndicate.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-1">
                        <div class="department">
                            <a href="{{ route('council') }}"></a>
                            <div class="thumbnail">
                                <img src="{{ asset($manage->council) }}" class="img-fluid" alt="Academic Council">
                            </div>
                            <div class="content">
                                <h5>Academic Council.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-1">
                        <div class="department">
                            <a href="{{ route('vice') }}"></a>
                            <div class="thumbnail">
                                <img src="{{ asset($manage->vice) }}" class="img-fluid" alt="Vice Chancellor.">
                            </div>
                            <div class="content">
                                <h5>Vice Chancellor.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-1">
                        <div class="department">
                            <a href="{{ route('pro') }}"></a>
                            <div class="thumbnail">
                                <img src="{{ asset($manage->pro_vice) }}" class="img-fluid" alt="Pro Vice Chancellor.">
                            </div>
                            <div class="content">
                                <h5>Pro Vice Chancellor.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-1">
                        <div class="department">
                            <a href="{{ route('administration') }}"></a>
                            <div class="thumbnail">
                                <img src="{{ asset($manage->adminis) }}" class="img-fluid" alt="Administration">
                            </div>
                            <div class="content">
                                <h5>Administration.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Seminar section -->
    @if ($customize->seminar == 1)
        @if (count($seminar) > 0)
            <section class="section-gap seminar">
                <div class="container">
                    <div class="section_title d-flex justify-content-between">
                        <h4 class="text-white">seminar</h4>
                        <a href="{{ route('seminar') }}" class="text-white">View all <i
                                class="fa-solid fa-angles-right"></i></a>
                    </div>
                    <div class="swiper seminar_slider">
                        <div class="swiper-wrapper">
                            @foreach ($seminar as $item)
                                <div class="swiper-slide">
                                    <div class="department">
                                        <a href="{{ route('seminar.details', $item->slug) }}"></a>
                                        <div class="thumbnail">
                                            <img src="{{ asset($item->thumb) }}" class="img-fluid"
                                                alt="{{ $item->title }}">
                                        </div>
                                        <div class="content">
                                            <h5>{{ $item->title }} </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    <!-- Notice board section -->
    @if ($customize->notice == 1)
        @if (count($notice) > 0)
            <section class="section-gap academic">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="notice_box">
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
    @endif

    <!-- social section -->
    @if ($customize->social_page == 1)
	<!--<section class="section-gap admission">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-4 my-1">
                        <div class="badge-base LI-profile-badge" data-locale="en_US" data-size="large"
                            data-theme="light" data-type="HORIZONTAL" data-vanity="cse-sagor" data-version="v1"></div>
                            <script src="https://platform.linkedin.com/badges/js/profile.js" async defer type="text/javascript"></script>
                    </div>
                    <div class="col-6 col-md-4 my-1">
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=439289901186135"
                            width="100%" height="240" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                    <div class="col-6 col-md-4 my-1">
                        <a class="twitter-timeline" data-height="240" data-theme="light"
                            href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </section>-->
    @endif

    <!-- News/Event section -->
    @if ($customize->news_event == 1)
        @if (count($event) > 0)
            <section class="section-gap news_event">
                <div class="container">
                    <div class="section_title d-flex justify-content-between">
                        <h4 class="text-white">news & event</h4>
                        <a href="{{ route('event') }}" class="text-white">View all <i
                            class="fa-solid fa-angles-right"></i></a>
                    </div>
                    <div class="swiper newsevent">
                        <div class="swiper-wrapper">
                            @foreach ($event as $item)
                                <div class="swiper-slide">
                                    <a href="{{ route('event.details',$item->slug) }}">
                                        <img src="{{ asset($item->thumb) }}" class="img-fluid"
                                            alt="{{ $item->title }}">
                                        <div class="news_event_content">
                                            <h5>{{ $item->title }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    <!-- partner section -->
    @if ($customize->partner == 1)
        @if (count($partner) > 0)
            <section class="section-gap partner">
                <div class="container">
                    <div class="section_title">
                        <h4 class="text-white">Our Top Recruiters and partners</h4>
                    </div>
                    <div class="swiper partner_slider">
                        <div class="swiper-wrapper">
                            @foreach ($partner as $item)
                                <div class="swiper-slide">
                                    <img src="{{ asset($item->img) }}" class="img-fluid w-100"
                                        alt="{{ $item->name }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    <!-- counter section -->
    @if ($customize->counter == 1)
        <section class="section-gap counter">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-white border-end border-2 pe-4">
                        <h3 class="fw-bold">{{ $counter->title }}</h3>
                        <p class="fw-light">{{ $counter->desc }}</p>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="row text-white">
                            <div class="col-4 text-center">
                                <h5>Total</h5>
                                <h3 class="fw-bolder">{{ $counter->faculty }}+</h3>
                                <p>Faculties</p>
                            </div>
                            <div class="col-4 text-center">
                                <h5>Total</h5>
                                <h3 class="fw-bolder">{{ $counter->program }}+</h3>
                                <p>Program</p>
                            </div>
                            <div class="col-4 text-center">
                                <h5>Graduates</h5>
                                <h3 class="fw-bolder">{{ $counter->graduates }}+</h3>
                                <p>Faculties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- gallery section -->
    @if ($customize->gallery == 1)
        <section class="section-gap news_event">
            <div class="container">
                <div class="section_title">
                    <h4 class="text-white">Gallery</h4>
                </div>
                <div class="swiper gallery">
                    <div class="swiper-wrapper">
                        @foreach ($gallery as $item)
                            <div class="swiper-slide">
                                <a class="elem" href="{{ asset($item->img) }}"
                                    data-lcl-thumb="{{ asset($item->img) }}">
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
    @endif

    <!-- clubs section -->
    @if ($customize->clubs == 1)
        @if (count($clubs) > 0)
            <section class="section-gap management">
                <div class="container">
                    <div class="section_title d-flex justify-content-between">
                        <h4 class="text-white">clubs</h4>
                        <a href="{{ route('club') }}" class="text-white">View all <i
                            class="fa-solid fa-angles-right"></i></a>
                    </div>
                    <div class="swiper seminar_slider">
                        <div class="swiper-wrapper">
                            @foreach ($clubs as $item)
                                <div class="swiper-slide">
                                    <div class="department">
                                        <a href="{{ route('club.details',$item->slug) }}"></a>
                                        <div class="thumbnail">
                                            <img src="{{ asset($item->thumb) }}" class="img-fluid"
                                                alt="{{ $item->title }}">
                                        </div>
                                        <div class="content">
                                            <h5>{{ $item->title }} </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        @endif
    @endif
@endsection
