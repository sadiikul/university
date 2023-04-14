@extends('layouts.frontend')

@section('title')
    Vice Chancellor -
@endsection

@section('content')
    <section class="section-bottom mt-4">
        <div class="container">
            <h4 class="fw-bold text-uppercase">vice chancellor</h4>
            <div class="card card-body vice_cha_box">
                <div class="row">
                    <div class="col-md-4">
                        <div class="vice__img">
                            <img src="{{ asset($member->img) }}" class="img-fluid w-100" alt="{{ $member->name }}">
                        </div>
                    </div>
                    <div class="col-md-8 mt-4 mt-md-0">
                        <h4 class="fw-bold">{{ $member->name }}</h4>
                        <p class="m-0 fw-light">{{ $member->desig }}</p>
                        <p class="m-0 fw-light">{{ $member->email }}</p>
                        <div class="mt-2">
                            <p>{{ $member->short }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4 editor_desc">
                {!! $member->long !!}
            </div>
        </div>
    </section>
@endsection
