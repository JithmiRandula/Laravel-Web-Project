@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        
        <div class="w-1/4 bg-white shadow-lg sm:rounded-lg p-6 mr-6 h-auto md:h-[80vh]">
            <h2 class="text-xl font-bold mb-6 text-[#1E3A8A]">Dashboard Menu</h2>
            <ul class="space-y-6">
                <li><a href="{{ url('/profile') }}" class="block text-[#1E3A8A] hover:text-[#3B82F6] transition duration-300">Profile</a></li>
                <li><a href="{{ url('/courses') }}" class="block text-[#1E3A8A] hover:text-[#3B82F6] transition duration-300">My Courses</a></li>
                <li><a href="{{ url('/settings') }}" class="block text-[#1E3A8A] hover:text-[#3B82F6] transition duration-300">Settings</a></li>
                <li><a href="{{ url('/notifications') }}" class="block text-[#1E3A8A] hover:text-[#3B82F6] transition duration-300">Notifications</a></li>
                <li><a href="{{ url('/help') }}" class="block text-[#1E3A8A] hover:text-[#3B82F6] transition duration-300">Help</a></li>
                <li class="flex items-center">
                    <a href="#" id="chatboxButton" class="bg-gradient-to-r from-[#34D399] to-[#10B981] text-white py-2 px-4 w-full flex items-center justify-center font-semibold rounded-lg shadow-lg hover:shadow-xl hover:bg-gradient-to-r hover:from-[#10B981] hover:to-[#059669] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11c0 .535-.214 1.055-.595 1.436C7.476 13.524 7 15.04 7 16.5V17a2 2 0 002 2h6a2 2 0 002-2v-.5c0-1.46-.476-2.976-1.405-4.064A2.002 2.002 0 0015 11H9zm6-4a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        Chatbox
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Dashboard Content -->
        <div class="w-3/4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 bg-gradient-to-r from-[#3B82F6] to-[#1E3A8A] text-white rounded-t-lg">
                <h1 class="text-3xl font-bold mb-2">Welcome to Your Dashboard</h1>
                <p class="text-xl opacity-80">You're logged in and ready to explore!</p>
            </div>

            <!-- Courses List Section -->
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $courses = [
                        ['name' => 'Introduction to Programming', 'image' => '4.jpg'],
                        ['name' => 'Advanced JavaScript', 'image' => '5.jpg'],
                        ['name' => 'Web Development Basics', 'image' => '6.jpeg'],
                        ['name' => 'React for Beginners', 'image' => '7.jpg'],
                        ['name' => 'Full Stack Web Development', 'image' => '8.jpeg'],
                        ['name' => 'UI/UX Design Principles', 'image' => '9.jpeg']
                    ];
                @endphp

                @foreach($courses as $course)
                <div class="bg-[#F3F4F6] rounded-lg shadow-lg p-6 hover:bg-[#E5E7EB] transition duration-300 transform hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-[#1E3A8A] text-xl font-semibold">{{ $course['name'] }}</h3>
                    </div>
                    <img src="{{ asset('images/' . $course['image']) }}" alt="{{ $course['name'] }} image" class="w-full h-40 object-cover mb-4 rounded-lg">
                    <p class="text-gray-700 mb-4">This course will provide an in-depth understanding of {{ $course['name'] }} and help you advance your knowledge in the field.</p>
                    <a href="#" class="text-[#2563EB] hover:text-[#1E40AF] font-semibold transition duration-300">View Details</a>
                </div>
                @endforeach
            </div>

            <!-- Add Course Button -->
            <div class="text-center mt-8">
                <a href="{{ url('courses/create') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-[#2563EB] to-[#1E40AF] text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:bg-[#1E40AF] transition duration-300 transform hover:scale-105">Add Courses</a>
            </div>
        </div>
    </div>
</div>
@endsection
