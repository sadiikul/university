@extends('layouts.frontend')

@section('title')
    Job Post -
@endsection

@section('content')
    <section class="section-bottom mt-4">
        <div class="container">
            <div class="section_title mt-4">
                <h4>career</h4>
            </div>
            <div class="row custom_row">
                @foreach ($list as $item)
                    <div class="col-6 col-md-4 my-1">
                        <div class="card card-body text-center">
                            <h5>{{ $item->title }}</h5>
                            <p class="m-0 fw-light">{{ $item->job_type }}</p>
                            <p class="m-0">Deadline</p>
                            <p class="fw-light">{{ date('d-M-Y h:i:s A', strtotime($item->deadline)) }}</p>
                            <a href="{{ route('career.details', $item->slug) }}" class="apply__btn">Apply</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($list) > 12)
                <div class="text-center mt-4">
                    <h3 class="fw-bolder">See More</h3>
                    <div class="pagin">
                        {{ $list->links('frontend.paginator.paginator') }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
