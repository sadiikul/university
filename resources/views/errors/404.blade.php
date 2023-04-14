@extends('layouts.frontend')

@section('content')
    <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <img src="{{ asset('assets/frontend/img/404.png') }}" class="img-fluid d-inline-block w-100" alt="404">
                    <h2 class="my-4">PAGE NOT FOUND</h2>
                    <a href="{{ route('home') }}" class="apply__btn"><i class="fas fa-home"></i> Go to Home</a>
                </div>
            </div>
        </div>
    </section>
@endsection
