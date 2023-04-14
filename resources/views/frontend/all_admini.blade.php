@extends('layouts.frontend')

@section('title')
    Administration -
@endsection

@section('content')
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title px-4">
                    <h4>Administration</h4>
                </div>
                <div class="card-body">
                    <div class="editor_desc">
                        <ul>
                            @foreach ($adminis as $item)
                                <li class="my-1"><a href="{{ route('admini',$item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
