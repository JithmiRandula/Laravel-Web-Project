<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::paginate(10);
        return view('courses.index', [
            'courses' => $courses
        ]);

        return response()->json($courses);
    }

    public function dashboard()
{
    $courses = Course::all(); 
    return view('dashboard', compact('courses'));  
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);

        Courses::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1:0,
        ]);

        return redirect('/courses')->with('status','Courses Created Successfully');
    }    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the course by its ID
        $courses = Courses::findOrFail($id);
    
        // Pass the single course to the view
        return view('courses.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courses $courses)
    {
       
        return view('courses.edit' , compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courses $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);
    
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);
    
        return redirect('/courses')->with('status', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Courses::findOrFail($id); 
        $course->delete(); 
    
        return redirect('/courses')->with('status', 'Course Deleted Successfully');
    }
}