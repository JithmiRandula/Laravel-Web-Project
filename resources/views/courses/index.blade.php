@extends('layouts.frontend')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Success Message Section -->
            @if (session('status'))
                <div class="alert alert-success shadow-lg rounded-lg mb-4">
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif

            <!-- Courses List Card -->
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-gradient-to-r from-indigo-600 to-indigo-800 text-black">
                    <h4>Courses List
                    <a href="{{ url('courses/create') }}" class="btn btn-primary float-end shadow-sm">Add Course</a>
                    <a href="{{ url('dashboard') }}" class="btn btn-secondary float-end me-2 shadow-sm">Back</a>
                    </h4>
                </div>

                <div class="card-body bg-light">
                    <!-- Courses Table -->
                    <table class="table table-hover table-striped">
                        <thead class="bg-indigo-100 text-indigo-700">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr class="hover:bg-indigo-50 transition duration-300">
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ Str::limit($course->description, 40) }}</td>
                                    <td>
                                        <span class="badge {{ $course->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $course->status == 1 ? 'Visible' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Course">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Course">
                                            <i class="bi bi-eye"></i> Show
                                        </a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Course">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $courses->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 
@push('scripts')
<script>
    // Tooltip Initialization
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>
@endpush
