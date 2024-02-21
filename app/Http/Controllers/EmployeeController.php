<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('frontend.employee.index',compact('employee'));
    }
    public function create()
    {
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

        $imagePath = $request->file('image')->store('public/employee');
        $imageName = basename($imagePath);
        $employee->image = $imageName;

        $employee->save();
        return redirect()->route('student');
    }
}
