@extends('layouts.frontend')

@section('title')
    {{ $page->title }}-
@endsection

@section('content')
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title px-4">
                    <h4>{{ $page->title }}</h4>
                </div>
                <div class="card-body">
                    <div class="edit_desc">
                        {!! $page->desc !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
