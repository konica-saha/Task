<?php

namespace App\Http\Controllers;

use App\Models\{Student, Department, Course, Session};
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->filled('session_id')) {
            $query->where('session_id', $request->session_id);
        }

      
        $students = $query->get();
        $departments = Department::all();
        $courses = Course::all();
        $sessions = Session::all();

        return view('students.index', compact('students', 'departments', 'courses', 'sessions'));
    }
}
