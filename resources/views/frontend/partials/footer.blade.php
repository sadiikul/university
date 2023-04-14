@if ($marquees->status == 1)
    <div class="marquee">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-3 col-md-2">
                    <h3 class="m-0 fw-bolder">News</h3>
                </div>
                <div class="col-9 col-md-10">
                    <marquee behavior="scroll" direction="left">{{ $marquees->text }}</marquee>
                </div>
            </div>
            <span class="material-symbols-outlined close">
                cancel
            </span>
            <span class="material-symbols-outlined open d-none">
                arrow_drop_up
            </span>
        </div>
    </div>
@endif

<footer>
    <div class="section-gap admission text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset($logos->footer) }}" width="200" alt="logo">
                    <div class="mt-5">
                        <h6>Connect with us :</h6>
                        <ul class="social__icon">
                            @foreach ($socials as $item)
                                <li><a href="{{ $item->link }}"><i class="{{ $item->icon }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 mt-4 mt-md-0">
                    <h5>CONTACT</h5>
                    <h6 class="m-0 mt-3">{{ $contacts->first_phone_title }}</h6>
                    <p class="m-0 fw-light">{{ $contacts->first_phone }}</p>

                    <h6 class="m-0 mt-3">{{ $contacts->second_phone_title }}</h6>
                    <p class="m-0 fw-light">{{ $contacts->second_phone }}</p>

                    <h6 class="m-0 mt-3">{{ $contacts->email_title }}</h6>
                    <p class="m-0 fw-light">{{ $contacts->email }}</p>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <h5>ADDRESS</h5>
                    <h6 class="m-0 mt-3">{{ $contacts->first_address_title }}</h6>
                    <p class="m-0 fw-light">{{ $contacts->first_address }}</p>

                    <h6 class="m-0 mt-3">{{ $contacts->second_address_title }}</h6>
                    <p class="m-0 fw-light">{{ $contacts->second_address }}</p>

                    <h6 class="m-0 mt-3">{{ $contacts->third_address_title }}</h6>
                    <p class="m-0 fw-light">{{ $contacts->third_address }}</p>
                </div>
                <div class="col-md-3 mt-4 mt-md-0">
                    <h5>USEFULL LINK</h5>
                    <ul class="useful_link">
                        @foreach ($pages as $item)
                            <li><a href="{{ route('page',$item->slug) }}" class="d-flex align-items-center">
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                    <span>{{ $item->title }}</span></a>
                            </li>
                        @endforeach
                        <li><a href="{{ route('career') }}" class="d-flex align-items-center">
                                <span class="material-symbols-outlined">
                                    keyboard_double_arrow_right
                                </span>
                                <span>Career at SUB</span></a>
                        </li>
                        <li><a href="{{ route('alumni') }}" class="d-flex align-items-center">
                                <span class="material-symbols-outlined">
                                    keyboard_double_arrow_right
                                </span>
                                <span>Alumni</span></a>
                        </li>
                        <li><a href="{{ route('about') }}" class="d-flex align-items-center">
                                <span class="material-symbols-outlined">
                                    keyboard_double_arrow_right
                                </span>
                                <span>About Us</span></a>
                        </li>
                        <li><a href="{{ route('contact') }}" class="d-flex align-items-center">
                                <span class="material-symbols-outlined">
                                    keyboard_double_arrow_right
                                </span>
                                <span>Contact</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <form action="{{ route('sub.store') }}" method="POST">
                @csrf
                <div class="input-group subscription">
                    <input type="email" required name="email" class="form-control form-control-lg rounded-0">
                    <button type="submit">EMAIL SUBSCRIBTION</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <p class="py-2 m-0">COPYRIGHT © {{ date('Y', strtotime(now())) }}, STATE UNIVERSITY OF BANGLADESH. ALL
                RIGHTS RESERVED.</p>
            <span class="text-sm">Developed by - <a target="_blank" class="text-primary"
                    href="https://hrventureai.com">HR Venture</a></span>
        </div>
    </div>
</footer>
