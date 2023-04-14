@extends('layouts.frontend')

@section('title')
    Notice Board -
@endsection

@section('content')
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title px-4">
                    <h4>Notice Board : {{ $notice->title }}</h4>
                </div>
                <div class="card-body">
                    @if ($notice->content_type == 'text')
                        <div class="editor_desc">
                            {!! $notice->text !!}
                        </div>
                    @elseif($notice->content_type == 'pdf')
                        <iframe src="{{ asset($notice->file) }}" frameborder="0" class="mt-2" width="100%"
                            height="1000px"></iframe>
                    @elseif($notice->content_type == 'image')
                        <img src="{{ asset($notice->file) }}" class="img-fluid w-100" alt="notice">
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
