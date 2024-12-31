<?php

namespace App\Http\Controllers;
use App\Models\{Student, Department, Course, Session};
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::query();

        if ($request->filled('department_id')) {
            $students->where('department_id', $request->department_id);
        }

        if ($request->filled('course_id')) {
            $students->where('course_id', $request->course_id);
        }

        if ($request->filled('session_id')) {
            $students->where('session_id', $request->session_id);
        }

        return view('students.index', [
            'students' => $students->get(),
            'departments' => Department::all(),
            'courses' => Course::all(),
            'sessions' => Session::all(),
        ]);
    }
}
