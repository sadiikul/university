@extends('layouts.frontend')

@section('title')
    Institute of School-
@endsection

@section('content')
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title px-4">
                    <h4>{{ $ins->title }}</h4>
                </div>
                <div class="card-body">
                    <div class="row my-4">
                        <div class="col-md-4">
                            <h3>Office of the Dean</h3>
                            <div class="user_box mt-0">
                                <div>
                                    <img src="{{ asset($ins->img) }}" class="img-fluid" alt="{{ $ins->name }}">
                                </div>
                                <h4 class="fw-bold mt-3">{{ $ins->name }}</h4>
                                <p class="m-0 fw-light">{{ $ins->desig }}</p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6 mt-4">
                            @php
                                if ($ins->dept_id !== 'null') {
                                    $item = json_decode($ins->dept_id);
                                } else {
                                    $item = [];
                                }
                                
                            @endphp
                            @foreach ($item as $items)
                                @foreach ($dept as $val)
                                    @if ($items == $val->id)
                                        <div class="mb-3">
                                            <h4><a href="{{ route('department', $val->slug) }}" class="text-primary"><i class="fas fa-clipboard-list"></i>
                                                    {{ $val->name }}</a></h4>
                                            <ul class="dep__list">
                                                @foreach ($val->program as $data)
                                                    <li><a href="{{ route('program', ['name' => $val->slug, 'slug' => $data->slug]) }}">{{ $loop->iteration }}) {{ $data->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
