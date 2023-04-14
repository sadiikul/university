@extends('layouts.frontend')

@section('meta_desc')
    {{ $seminar->meta_desc }}
@endsection
@section('meta_tag')
    {{ $seminar->meta_tag }}
@endsection
@section('title')
    {{ $seminar->meta_title }}
@endsection
@section('rel')
    <link href="{{ route('seminar.details', $seminar->slug) }}" rel="canonical">
@endsection

@section('content')
    <section class="section-gap pt-4">
        <div class="container">
            <img src="{{ asset($seminar->thumb) }}" class="img-fluid w-100" alt="{{ $seminar->title }}">
            <div class="mt-5">
                <h4>{{ $seminar->title }}</h4>
                    <div class="editor_desc">
                        {!! $seminar->desc !!}
                    </div>
            </div>
        </div>
    </section>
@endsection
