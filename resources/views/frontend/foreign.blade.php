@extends('layouts.frontend')

@section('title')
    Tuiton Fee for Foreign Student -
@endsection

@section('content')
    <section class="section-bottom mt-4">
        <div class="container">
            <div class="banner">
                <img src="{{ asset($admission->foreign) }}" class="img-fluid w-100 rounded" alt="img">
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="editor_desc">
                            {!! $head->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-gap foreign">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset($head->img) }}" class="img-fluid" alt="img">
                </div>
                <div class="col-md-7 p-4">
                    <h5>{{ $head->title }}</h5>
                    <p>{{ $head->short }}</p>
                </div>
            </div>
            <hr>
            @php
                $img = json_decode($head->multiple);
            @endphp
            <div class="swiper partner_slider">
                <div class="swiper-wrapper">
                    @foreach ($img as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset($item) }}" class="img-fluid w-100" alt="img">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <hr>
        </div>
    </section>

    <section class="section-gap">
        <div class="container">
            <table class="table table-striped fee">
                <thead class="thead">
                    <tr>
                        <th width="35%">Program</th>
                        <th>Credit</th>
                        <th>Duration</th>
                        <th>Fee</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foreign as $item)
                        <tr>
                            <td>{{ $item->program->name }}</td>
                            <td>{{ $item->credit }}</td>
                            <td>{{ $item->duration }}</td>
                            <td>{{ $item->fee }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
