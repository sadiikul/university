@extends('layouts.frontend')

@section('title')
    Contact -
@endsection

@section('content')
    <section class="section-gap">
        <div class="container">
            <div class="contact__box">
                <div class="row">
                    <div class="col-md-8 pe-md-5">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="seen" value="0">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" required placeholder="Your Full Name"
                                    class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" required placeholder="Your e-mail"
                                    class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" required placeholder="Your subject"
                                    class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <input type="text" name="message" required placeholder="Your message"
                                    class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                            </div>
                            <div class="mb-3 text-end">
                                <button class="apply__btn border-0" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 ps-md-5 mt-4 mt-md-0">
                        <h5>ADDRESS</h5>
                        <h6 class="m-0 pt-2">{{ $contacts->first_address_title }}</h6>
                        <p class="m-0 fw-light">{{ $contacts->first_address }}</p>

                        <h6 class="m-0 pt-2">{{ $contacts->second_address_title }}</h6>
                        <p class="m-0 fw-light">{{ $contacts->second_address }}</p>

                        <h6 class="m-0 pt-2">{{ $contacts->third_address_title }}</h6>
                        <p class="m-0 fw-light">{{ $contacts->third_address }}</p>

                        <h6 class="m-0 mt-3">{{ $contacts->first_phone_title }}</h6>
                        <p class="m-0 fw-light">{{ $contacts->first_phone }}</p>

                        <h6 class="m-0 mt-3">{{ $contacts->second_phone_title }}</h6>
                        <p class="m-0 fw-light">{{ $contacts->second_phone }}</p>

                        <h6 class="m-0 mt-3">{{ $contacts->email_title }}</h6>
                        <p class="m-0 fw-light">{{ $contacts->email }}</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        {!! $contents->map !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
