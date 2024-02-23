<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index($name,$id)
    {
        $userschoolId = Auth::user()->school_id;
        $school = School::where('id',$userschoolId)->pluck('image');
        $image = $school[0];
        $students = Student::where('school_id',$userschoolId)->get();
        return view('frontend.student.index',compact('students','name','image'));
    }
    public function create($name,$id)
    {
        $userschoolId = Auth::user()->school_id;
        $students = Student::where('school_id',$userschoolId)->get();
        return view('frontend.student.create',compact('students','name'));
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
            'image' => 'required',
        ]);

        $student = new Student();
        $student->name = $request->input('name');
        $student->student_no = $request->input('student_no');
        $student->nrc = $request->input('nrc');
        $student->date = $request->input('date');
        $student->batch = $request->input('batch');
        $student->education = $request->input('education');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->school_id = auth()->user()->school_id;

        $imagePath = $request->file('image')->store('public/students');
        $imageName = basename($imagePath);
        $student->image = $imageName;

        $student->save();
        $school = Session::get('name');
        return redirect()->route('student',['name'=>$school,'id'=>auth()->user()->id]);
    }
    public function show($name,$id,$stdId)
    {
        $student = Student::findOrFail($stdId);
        return view('frontend.student.detail',compact('student'));
    }
}
