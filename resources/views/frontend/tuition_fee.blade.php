@extends('layouts.frontend')

@section('title')
    Tuition Fees -
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
    <section class="mt-5 section-bottom">
        <div class="container">
            <div class="notice_box border">
                <div class="title">
                    <h4>Tuiton Fees</h4>
                </div>
                <div class="card-body px-5">
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

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($item->list as $value)
                                <div class="accordion-item tuition mb-2">
                                    <h2 class="accordion-header" id="flush-{{ $value->id }}">
                                        <button class="accordion-button tuition collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne-{{ $value->id }}" aria-expanded="false"
                                            aria-controls="flush-collapseOne-{{ $value->id }}">
                                            {{ $value->name }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne-{{ $value->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-{{ $value->id }}" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <table class="table table-striped fee">
                                                <thead class="thead">
                                                    <tr>
                                                        <th width="50%">Particulars</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($value->fee as $item)
                                                        <tr>
                                                            <td>{{ $item->particular }}</td>
                                                            <td>{{ $item->fee }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
