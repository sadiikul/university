@extends('layouts.frontend')

@section('title')
    Program -
@endsection

@section('content')
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title px-4">
                    <h4>Programs</h4>
                </div>
                <div class="card-body">
                    @foreach ($program as $item)
                        @php
                            $count = 0;
                            foreach ($item->list as $value) {
                                $count++;
                            }
                        @endphp
                        @if ($count > 0)
                            <h4 class="mt-3">{{ $item->name }}</h4>
                        @endif

                        <div class="editor_desc">
                            <ul>
                                @foreach ($item->list as $value)
                                    <li><a
                                            href="{{ route('program', ['name' => $item->slug, 'slug' => $value->slug]) }}">{{ $value->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
