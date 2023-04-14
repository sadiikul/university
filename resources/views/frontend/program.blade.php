@extends('layouts.frontend')

@section('meta_desc')
    {{ $program->meta_desc }}
@endsection
@section('meta_tag')
    {{ $program->meta_tag }}
@endsection
@section('title')
    {{ $program->meta_title }}
@endsection
@section('rel')
    <link href="{{ route('program', ['name' => $name, 'slug' => $program->slug]) }}" rel="canonical">
@endsection

@section('content')
    <section>
        <div class="program_banner">
            <h1>{{ $program->name }}</h1>
            <img src="{{ asset($program->thumb) }}" class="img-fulid w-100" alt="{{ $program->name }}">
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="section_title">
                <h4>Introduction</h4>
            </div>
            <div class="editor_desc">
                {!! $program->desc !!}
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="section_title">
                <h4>Advisors to the Program</h4>
            </div>
            <div class="swiper faculties">
                <div class="swiper-wrapper">
                    @foreach ($faculty as $item)
                        @php
                            if ($item->program_id !== 'null') {
                                $user = json_decode($item->program_id);
                            } else {
                                $user = [];
                            }
                            
                        @endphp
                        @foreach ($user as $id)
                            @if ($id == $program->id)
                                <div class="swiper-slide">
                                    <div class="user_box">
                                        <img src="{{ asset($item->img) }}" width="100" alt="{{ $item->name }}">
                                        <h4 class="fw-bold">{{ $item->name }}</h4>
                                        <p class="m-0 fw-light">Advisor</p>
                                        <p class="m-0 fw-light">{{ $item->email }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            @foreach ($schedule as $item)
                <div class="row">
                    <div class="col-md-6 duration">
                        <h4>Duration</h4>
                        <p class="m-0">{{ $item->semester }}</p>
                        <p class="m-0">{{ $item->year }}</p>
                    </div>
                    <div class="col-md-6 course_fee">
                        <h4>Course & Credit</h4>
                        <p class="m-0">{{ $item->course }}</p>
                        <p class="m-0">{{ $item->credit }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="section_title">
                <h4>Curriculum</h4>
            </div>
            <div class="row">
                @foreach ($curri as $item)
                    <div class="col-md-6 my-1">
                        <div class="editor_desc">
                            {!! $item->desc !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="section_title">
                <h4>Courses & Credit hours</h4>
            </div>
            <table class="table table-striped fee">
                <thead class="thead">
                    <tr>
                        <th width="35%">Areas</th>
                        <th>No. of Course</th>
                        <th>Credit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course as $item)
                        <tr>
                            <td>{{ $item->area }}</td>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->hour }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="section_title">
                <h4>subject details</h4>
            </div>
            <table class="table table-striped fee">
                <thead class="thead">
                    <tr>
                        <th width="35%">Title & Description of Course</th>
                        <th>Credits</th>
                        <th>Prerequisite</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sub as $item)
                        <tr>
                            <td><b>{{ $item->name }}</b> <br>
                                {!! $item->desc !!}
                            </td>
                            <td>{{ $item->credit }}</td>
                            <td>{{ $item->prere }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="section_title">
                <h4>Tuition and Fees</h4>
            </div>
            <table class="table table-striped fee">
                <thead class="thead">
                    <tr>
                        <th width="50%">Particulars</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fee as $item)
                        <tr>
                            <td>{{ $item->particular }}</td>
                            <td>{{ $item->fee }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="section-bottom mt-5">
        <div class="container text-center">
            <a target="_blank" href="http://119.148.8.225:9381/admission/" class="apply__btn">Apply</a>
        </div>
    </section>
@endsection
