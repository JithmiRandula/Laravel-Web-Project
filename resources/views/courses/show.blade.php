@extends('courses.layouts')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-gradient-to-r from-indigo-600 to-indigo-800 text-black">
                    <h4>Course Details
                        <a href="{{ url('courses') }}" class="btn btn-danger float-end shadow-sm">Back</a>
                    </h4>
                </div>
                <div class="card-body bg-light rounded-lg">
                    <div class="mb-4">
                        <label class="form-label fs-5">Course Name</label>
                        <p class="fs-4 fw-bold text-primary">{{ $courses->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fs-5">Description</label>
                        <p class="text-muted">{!! nl2br(e($courses->description)) !!}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fs-5">Status</label>
                        <p>
                            <span class="badge {{ $courses->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                {{ $courses->status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('courses.edit', $courses->id) }}" class="btn btn-warning shadow-sm">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
