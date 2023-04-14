@extends('layouts.frontend')

@section('title')
    IQAC-
@endsection

@section('content')
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title px-4">
                    <h4>IQAC</h4>
                </div>
                <div class="card-body">
                    <div class="editor_desc">
                        {!! $iqac->desc !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
