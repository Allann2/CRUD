<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        // dd($students);
        return view("student.index", [
            'studentList'=> $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'email' => 'required|email',
        'age' => 'required|integer',
        'phone' => 'required',
        '_token',
    ]);

    Student::create($request->all());

    return redirect()->route('student.index')->with('success', 'Student added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // dd($student);
        $student -> delete();
        return redirect()->intended(route('student.index'));
    }
}
