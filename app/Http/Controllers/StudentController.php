<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $students = Student::orderBy('id', 'desc')->paginate(15);
        return view('admin.students.index', compact('students'));
    }
    public function create(Request $request, Student $students)
    {
        $this->authorize($students, 'create');
        return view('admin.students.create');
    }
}
