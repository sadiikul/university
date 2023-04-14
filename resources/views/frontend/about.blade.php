@extends('layouts.frontend')

@section('title')
    About Us -
@endsection

<style>
    button.accordion-button.tuition {
        background-color: #54537c !important;
        color: white !important;
    }

    .accordion-item.tuition.mb-2 {
        border: 1px solid #54537c;
    }

    .accordion-flush .accordion-item:first-child,
    .accordion-flush .accordion-item:last-child {
        border: 1px solid #54537c !important;
    }
</style>

@section('content')
    <section class="mt-4">
        <div class="container">
            <div class="banner">
                <img src="{{ asset($head->img) }}" class="img-fluid w-100 rounded" alt="img">
            </div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-12">
                        <h3 class="fw-bold text-uppercase">About Us.</h3>
                        <div class="edit_desc">
                            {!! $head->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        @foreach ($section as $item)
                            <div class="accordion-item mt-2">
                                <h2 class="accordion-header tuition" id="heading-{{ $item->id }}">
                                    <button class="accordion-button tuition" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $item->id }}"
                                        aria-controls="collapse-{{ $item->id }}">
                                        {{ $item->title }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $item->id }}"
                                    class="accordion-collapse collapse @if ($loop->first) show @endif"
                                    aria-labelledby="heading-{{ $item->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $item->desc }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
