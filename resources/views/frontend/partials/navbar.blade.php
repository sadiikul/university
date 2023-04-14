@if (count($events) >= 5)
    <div class="flash_news">
        <div class="d-flex">
            <div class="flash_news_title d-none arrow_close">
                <span class="material-symbols-outlined">
                    arrow_forward
                </span>
                <p>Flash News</p>
            </div>
            <div class="flash_news_title arrow_open">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
                <p>Flash News</p>
            </div>
            <ul class="news_list">
                @foreach ($events as $item)
                    <li><a href="{{ route('event.details', $item->slug) }}">{{ Str::limit($item->title, 22, '...') }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<header>
    <div class="top py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-5 col-md-7">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($logos->header) }}" width="200" alt="logo">
                    </a>
                </div>
                <div class="col-7 col-md-5">
                    <ul class="apply_list">
                        <li>
                            <a target="_blank" href="http://119.148.8.225:9381/admission/">Apply Now</a>
                        </li>
                        <li>
                            <a target="_blank" href="http://119.148.8.225:8020/apps/">Student Portal</a>
                        </li>
                        <li>
                            <a href="">Staff Portal</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <nav class="navbar py-2 navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav">
                    <span class="material-symbols-outlined text-white border border-white px-2 py-1 rounded">
                        menu
                    </span>
                </button>
                <ul class="apply_list2">
                    <li>
                        <a target="_blank" href="http://119.148.8.225:8020/apps/">Student Portal</a>
                    </li>
                    <li>
                        <a href="">Staff Portal</a>
                    </li>
                </ul>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav left">
                        @if ($menu->home_status == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ $menu->home }}</a>
                            </li>
                        @endif
                        @if ($menu->academic_status == 1)
                            <li class="nav-item">
                                <a class="nav-link drp_open" href="javascript:void(0)">
                                    <span>{{ $menu->academic }}</span>
                                    <i class="fa-sharp d-none d-lg-block fa-solid fa-caret-down fa-sm ms-1"></i>
                                </a>
                                <ul class="dropdown__menu main">
                                    <li>
                                        <a class="d-flex justify-content-between align-items-center drp_open"
                                            href="javascript:void(0)">
                                            <span>Institute of School</span>
                                            <i
                                                class="fa-sharp d-none d-lg-block fa-solid fa-caret-right fa-sm ms-1"></i>
                                        </a>
                                        <ul class="dropdown__menu sub">
                                            @foreach ($institute_menu as $item)
                                                <li><a
                                                        href="{{ route('institute', $item->slug) }}">{{ $item->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="d-flex justify-content-between align-items-center drp_open"
                                            href="javascript:void(0)">
                                            <span>Departments</span>
                                            <i
                                                class="fa-sharp d-none d-lg-block fa-solid fa-caret-right fa-sm ms-1"></i>
                                        </a>
                                        <ul class="dropdown__menu sub">
                                            @foreach ($department_menu as $item)
                                                <li><a
                                                        href="{{ route('department', $item->slug) }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('iqac') }}">
                                            <span>IQAC</span>
                                        </a></li>
                                    <li><a href="{{ route('faculty') }}">
                                            <span>Faculty</span>
                                        </a></li>
                                </ul>
                            </li>
                        @endif
                        @if ($menu->admission_status == 1)
                            <li class="nav-item">
                                <a class="nav-link drp_open" href="javascript:void(0)">
                                    <span>{{ $menu->admission }}</span>
                                    <i class="fa-sharp d-none d-lg-block fa-solid fa-caret-down fa-sm ms-1"></i>
                                </a>
                                <ul class="dropdown__menu main">
                                    <li><a href="{{ route('program.list') }}">Program</a></li>
                                    <li><a href="{{ route('admission') }}">Admission</a></li>
                                    <li><a href="{{ route('tuition') }}">Tuition & Fees</a></li>
                                    <li><a href="{{ route('foreign') }}">Tuition Fee for Foreign Student</a></li>
                                    <li><a href="{{ route('waiver') }}">Schoolarship & Waiver</a></li>
                                    <li><a href="{{ route('accommodation') }}">Accommodation</a></li>
                                    <li><a href="{{ route('calender') }}">Academic Calendar</a></li>
                                </ul>
                            </li>
                        @endif
                        @if ($menu->management_status == 1)
                            <li class="nav-item">
                                <a class="nav-link drp_open" href="javascript:void(0)">
                                    <span>{{ $menu->management }}</span>
                                    <i class="fa-sharp d-none d-lg-block fa-solid fa-caret-down fa-sm ms-1"></i>
                                </a>
                                <ul class="dropdown__menu main">
                                    <li><a href="{{ route('board') }}">Board of Trustees</a></li>
                                    <li><a href="{{ route('syndicate') }}">Syndicate</a></li>
                                    <li><a href="{{ route('council') }}">Academic Council</a></li>
                                    <li><a href="{{ route('vice') }}">Vice Chancellor</a></li>
                                    <li><a href="{{ route('pro') }}">Pro Vice Chancellor</a></li>
                                    <li>
                                        <a class="d-flex justify-content-between align-items-center drp_open"
                                            href="javascript:void(0)">
                                            <span>Administration</span>
                                            <i
                                                class="fa-sharp d-none d-lg-block fa-solid fa-caret-right fa-sm ms-1"></i>
                                        </a>
                                        <ul class="dropdown__menu sub">
                                            @foreach ($adminis_menu as $item)
                                                <li><a
                                                        href="{{ route('admini', $item->slug) }}">{{ $item->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav right">
                        @if ($menu->rnd_status == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rnd.all') }}">{{ $menu->rnd }}</a>
                            </li>
                        @endif
                        @if ($menu->affair_status == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('affairs') }}">{{ $menu->affair }}</a>
                            </li>
                        @endif
                        @if ($menu->event_status == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('event') }}">{{ $menu->event }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
