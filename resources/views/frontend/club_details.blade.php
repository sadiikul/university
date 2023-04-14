@extends('layouts.frontend')

@section('meta_desc')
    {{ $club->meta_desc }}
@endsection
@section('meta_tag')
    {{ $club->meta_tag }}
@endsection
@section('title')
    {{ $club->meta_title }}
@endsection
@section('rel')
    <link href="{{ route('club.details', $club->slug) }}" rel="canonical">
@endsection

@section('content')
    <section class="section-gap pt-4">
        <div class="container">
            <img src="{{ asset($club->thumb) }}" class="img-fluid w-100" alt="{{ $club->title }}">
            <div class="mt-5">
                <h4>{{ $club->title }}</h4>
                    <div class="editor_desc">
                        {!! $club->desc !!}
                    </div>
            </div>
        </div>
    </section>
@endsection
