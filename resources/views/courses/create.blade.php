@extends('layouts.frontend')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-to-r from-indigo-700 to-indigo-900 text-black">
                    <h4>Create Course
                    <a href="{{ url('dashboard') }}" class="btn btn-primary float-end me-2 shadow-sm border-0">Back</a>
                    </h4>
                </div>

                <div class="card-body bg-light">
                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf

                        <!-- Course Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label text-gray-700">Course Name</label>
                            <input type="text" name="name" id="name" class="form-control shadow-sm" placeholder="Enter Course Name"/>
                            @error('name') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Course Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label text-gray-700">Course Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control shadow-sm" placeholder="Enter Course Description"></textarea>
                            @error('description') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Status Checkbox -->
                        <div class="mb-4">
                            <label class="form-label text-gray-700">Status</label><br/>
                            <input type="checkbox" name="status" checked style="width: 25px; height: 25px;"/>
                            <span class="ms-2">Visible (checked) / Hidden (unchecked)</span>
                            @error('status') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4 text-center">
                            <button type="submit" class="btn btn-primary px-5 py-2 rounded-full shadow-lg">Save Course</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
