@extends('layouts.frontend')

@section('title')
    Admission -
@endsection

@section('content')
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title">
                    <h4>Admission</h4>
                </div>
                <div class="card-body">
                    <div class="wiggle">
                        <a target="_blank" href="http://119.148.8.225:9381/admission/" class="button"><b><i class="fas fa-hand-point-right"></i> APPLY NOW</b></a>
                    </div>
                    <img src="{{ asset($admission->img) }}" class="img-fluid w-100" alt="admission page">
                </div>
            </div>
        </div>
    </section>
@endsection
