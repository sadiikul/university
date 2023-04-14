@extends('layouts.frontend')

@section('meta_desc')
    {{ $event->meta_desc }}
@endsection
@section('meta_tag')
    {{ $event->meta_tag }}
@endsection
@section('title')
    {{ $event->meta_title }}
@endsection
@section('rel')
    <link href="{{ route('event.details', $event->slug) }}" rel="canonical">
@endsection

@section('content')
    <section class="section-gap pt-4">
        <div class="container">
            <img src="{{ asset($event->thumb) }}" class="img-fluid w-100" alt="{{ $event->title }}">
            <div class="mt-5">
                <h4>{{ $event->title }}</h4>
                    <div class="editor_desc">
                        {!! $event->desc !!}
                    </div>
            </div>
        </div>
    </section>
@endsection
