@extends('layouts.frontend')

@section('title')
    Schoolarship and Waiver -
@endsection

@section('content')
    <section class="section-gap pt-4">
        <div class="container">
            <div class="banner">
                <img src="{{ asset($admission->scholarship) }}" class="img-fluid w-100 rounded" alt="img">
            </div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="editor_desc">
                            {!! $head->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <hr />
        </div>
    </section>

    <section class="section-gap">
        <div class="container">
            <table class="table table-striped fee text-center">
                <thead class="thead">
                    <tr>
                        <th width="35%">Section</th>
                        <th>SSC</th>
                        <th>HSC</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waiver as $item)
                        <tr>
                            <td>{{ $item->section }}</td>
                            <td>{{ $item->ssc }}</td>
                            <td>{{ $item->hsc }}</td>
                            <td>{{ $item->percentage }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="section-gap apply__form">
        <div class="container">
            <h4 class="text-center fw-bold">Fill up this form for waiver</h4>
            <form class="mt-5" action="{{ route('waiver.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" required placeholder="Your Full Name"
                                class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" required placeholder="Your phone"
                                class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" required placeholder="Your email"
                                class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" required placeholder="Your subject"
                                class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">SSC Result</label>
                            <input type="text" name="ssc" required placeholder="Your ssc result"
                                class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">HSC Result</label>
                            <input type="text" name="hsc" required placeholder="Your hsc result"
                                class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Extra Curriculam Activites</label>
                            <input type="text" name="extra" required placeholder="Your Activites"
                                class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 text-end">
                            <button class="apply__btn border-0" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
