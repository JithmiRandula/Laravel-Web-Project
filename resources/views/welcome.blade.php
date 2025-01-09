@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-[#1E3A8A] to-[#3B82F6] text-white">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="container mx-auto py-32 px-6 text-center relative z-10">
            <h1 class="text-5xl font-extrabold leading-tight mb-4 animate__animated animate__fadeInUp">
                Welcome to StudyMate
            </h1>
            <p class="text-xl font-light mb-8 animate__animated animate__fadeInUp animate__delay-1s">
                Explore a world of learning opportunities, from web development to design and more!
            </p>
            <div class="flex justify-center space-x-6">
                <!-- Login Button -->
                @guest
                    <a href="{{ route('login') }}" class="bg-[#1E3A8A] hover:bg-[#2563EB] text-white py-2 px-6 rounded-full text-lg font-medium transition duration-300 transform hover:scale-105">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-transparent border-2 border-white text-white py-2 px-6 rounded-full text-lg font-medium transition duration-300 transform hover:scale-105">
                        Register
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="bg-[#1E3A8A] hover:bg-[#2563EB] text-white py-2 px-6 rounded-full text-lg font-medium transition duration-300 transform hover:scale-105">
                        Dashboard
                    </a>
                    <a href="{{ route('logout') }}" class="bg-transparent border-2 border-white text-white py-2 px-6 rounded-full text-lg font-medium transition duration-300 transform hover:scale-105">
                        Logout
                    </a>
                @endguest
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-semibold mb-8">Our Features</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                <img src="{{ asset('images/1.jpg') }}" alt="Comprehensive Courses" class="w-50 h-40 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold mb-4">Comprehensive Courses</h3>
                <p class="text-lg">Access a wide range of learning materials for beginners and advanced learners alike.</p>
            </div>
            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                <img src="{{ asset('images/2.jpeg') }}" alt="Interactive Lessons" class="w-50 h-40 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold mb-4">Interactive Lessons</h3>
                <p class="text-lg">Engage in hands-on learning with interactive exercises and real-world projects.</p>
            </div>
            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                <img src="{{ asset('images/3.jpeg') }}" alt="Expert Mentors" class="w-50 h-40 mx-auto mb-4 rounded-lg object-cover">
                <h3 class="text-xl font-semibold mb-4">Expert Mentors</h3>
                <p class="text-lg">Learn from experienced mentors who provide feedback and guidance throughout your journey.</p>
            </div>
        </div>
    </div>
</section>


   
    <section class="bg-[#1E3A8A] text-white py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-8">What Our Learners Say</h2>
            <div class="flex overflow-hidden justify-center gap-6">
               
                <div class="bg-white text-[#1E3A8A] p-8 rounded-lg shadow-lg max-w-xs hover:shadow-2xl transform hover:scale-105">
                    <p class="italic mb-4">"This platform has been a game-changer for me. The courses are so informative and engaging!"</p>
                    <p class="font-bold">Sarah L.</p>
                    <p>Web Developer</p>
                </div>
               
                <div class="bg-white text-[#1E3A8A] p-8 rounded-lg shadow-lg max-w-xs hover:shadow-2xl transform hover:scale-105">
                    <p class="italic mb-4">"The interactive lessons and real-world projects helped me land my dream job!"</p>
                    <p class="font-bold">John D.</p>
                    <p>Software Engineer</p>
                </div>
               
                <div class="bg-white text-[#1E3A8A] p-8 rounded-lg shadow-lg max-w-xs hover:shadow-2xl transform hover:scale-105">
                    <p class="italic mb-4">"I love how the mentors are always available to guide me through difficult topics."</p>
                    <p class="font-bold">Emily R.</p>
                    <p>UX Designer</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 bg-gray-100 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-4">Ready to Get Started?</h2>
            <p class="text-lg mb-8">Join our community and take your learning journey to the next level!</p>
            <a href="{{ route('register') }}" class="bg-[#1E3A8A] hover:bg-[#2563EB] text-white py-3 px-8 rounded-full text-lg font-medium transition duration-300 transform hover:scale-105">
                Start Learning
            </a>
        </div>
    </section>
@endsection

@section('navbar')
    <!-- Navbar Section with Login & Register links -->
    <nav class="bg-[#1E3A8A] dark:bg-[#1E3A8A]/90 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-lg font-semibold">StudyMate </a>
            
            <div class="space-x-4">
                <!-- Check if the user is logged in and show login/register accordingly -->
                @guest
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                    <a href="{{ route('register') }}" class="text-white">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>
                    <a href="{{ route('logout') }}" class="text-white">Logout</a>
                @endguest
            </div>
        </div>
    </nav>
@endsection
