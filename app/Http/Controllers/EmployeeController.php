<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('frontend.employee.index');
    }
    public function create()
    {
        return view('frontend.employee.create');
    }
}
