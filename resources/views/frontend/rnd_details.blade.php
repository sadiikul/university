@extends('layouts.frontend')

@section('meta_desc')
    {{ $rnd->meta_desc }}
@endsection
@section('meta_tag')
    {{ $rnd->meta_tag }}
@endsection
@section('title')
    {{ $rnd->meta_title }}
@endsection
@section('rel')
    <link href="{{ route('rnd.details', $rnd->slug) }}" rel="canonical">
@endsection

@section('content')
    <section class="section-gap pt-4">
        <div class="container">
            <img src="{{ asset($rnd->thumb) }}" class="img-fluid w-100" alt="{{ $rnd->title }}">
            <div class="mt-5">
                <div class="clearfix">
                    <div class="col-md-4 float-start mb-4 me-md-4">
                        <div class="topic">
                            <h5>Topic</h5>
                            <div class="editor_desc">
                                {!! $rnd->topic !!}
                            </div>
                        </div>
                    </div>
                    <h4>{{ $rnd->title }}</h4>
                    <div class="editor_desc">
                        {!! $rnd->desc !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
