<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('frontend.student.index');
    }
    public function create()
    {
        return view('frontend.student.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'student_no' => 'required|string',
            'nrc' => 'required|string',
            'date' => 'required',
            'batch' => 'required|string',
            'education' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'image' => 'required|string',
        ]);

        $student = new Student();
        $student->name = $request->input('name');
        $student->student_no = $request->input('student_no');
        $student->nrc = $request->input('nrc');
        $student->date = $request->input('date');
        $student->education = $request->input('education');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');

        $imagePath = $request->file('image')->store('public/students');
        $imageName = basename($imagePath);
        $student->image = $imageName;

        $student->save();
        return redirect()->with('student');
    }
}
