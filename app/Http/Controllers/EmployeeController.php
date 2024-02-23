<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index()
    {
        $userschoolId = Auth::user()->school_id;
        $school = School::where('id',$userschoolId)->pluck('image');
        $image = $school[0];
        $employees = Employee::where('school_id',$userschoolId)->get();
        
        return view('frontend.employee.index',compact('employees','image'));
    }
    public function create($name,$id)
    {
        $userschoolId = Auth::user()->school_id;
        $employees = Employee::where('school_id',$userschoolId)->get();
        return view('frontend.employee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'emp_no' => 'required|string',
            'nrc' => 'required|string',
            'date' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'image' => 'required',
        ]);
        
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->emp_no = $request->input('emp_no');
        $employee->nrc = $request->input('nrc');
        $employee->date = $request->input('date');
        $employee->position = $request->input('position');
        $employee->department = $request->input('department');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->address = $request->input('address');
        $employee->school_id = auth()->user()->school_id;

        $imagePath = $request->file('image')->store('public/employee');
        $imageName = basename($imagePath);
        $employee->image = $imageName;

        $employee->save();
        $school = Session::get('name');
        return redirect()->route('employee',['name'=>$school,'id'=>auth()->user()->id]);
    }
}
