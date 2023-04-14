@extends('layouts.frontend')

@section('title')
{{ $list->title }} -
@endsection

@section('content')
    <section class="section-gap pt-4">
        <div class="container">
            <div class="section_title mt-4">
                <h4>{{ $list->title }}</h4>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger my-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <ul class="nav nav-pills career mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Application</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Details</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $list->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" required name="name" placeholder="Your Full Name"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" required name="email" placeholder="Your email"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" required name="phone" placeholder="Your phone"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" required name="address" placeholder="Your address"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Joining Date</label>
                                    <input type="text" required name="joining_date" placeholder="Your joining date"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Expected Salary</label>
                                    <input type="text" required name="expected_salary" placeholder="Your expected salary"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Experience</label>
                                    <input type="text" required name="experience" placeholder="Your experience"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <input type="text" required name="message" placeholder="Message"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Portfolio Link (optional)</label>
                                    <input type="text" name="portfolio_link" placeholder="(exam:google docs, website link, etc)"
                                        class="form-control border-0 border-bottom border-2 rounded-0 bg-transparent">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 upload__file">
                                    <h5>Upload Resume</h5>
                                    <p>Drag and Drop files here or click Upload File. <br> Max File size is (5Mb) and types
                                        os PDF</p>
                                    <input type="file" required class="upload__files" name="resume">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 upload__file">
                                    <h5>Upload Cover Letter (Optional)</h5>
                                    <p>Drag and Drop files here or click Upload File. <br> Max File size is (5Mb) and types
                                        os PDF</p>
                                    <input type="file" class="upload__files" name="cover">
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
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="editor_desc">
                                {!! $list->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
