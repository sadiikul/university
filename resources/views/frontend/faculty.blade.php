@extends('layouts.frontend')

@section('title')
Department -
@endsection

@section('content')
<section class="section-bottom mt-4">
    <div class="container">
        <h4 class="fw-bold mb-3">All Department</h4>
        <div class="row custom_row">
            @foreach ($departments as $department)

            <div class="editor_desc">
                <ul>
                    <li>
                        <a href="{{route('departmentWiseFaculty', $department->id)}}">{{$department->name}}</a>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
