<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ResgisterSchoolController extends Controller
{
    public function index()
    {
        return view('frontend.register.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'founded_year' => 'required|string',
            'authority_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'position' => 'required|string',
            'student_amount' => 'required|numeric',
            'image' => 'required|image',
            'document' => 'required|file|mimes:pdf',
        ]);

        DB::beginTransaction();

        try {
            // Create a new school profile
            $school = new School();
            $school->name = $request->input('name');
            $school->founded_year = $request->input('founded_year');
            $school->student_amount = $request->input('student_amount');

            $imagePath = $request->file('image')->store('public/schools');
            $imageName = basename($imagePath);
            $school->image = $imageName;

            $documentPath = $request->file('document')->store('public/schooldocuments');
            $documentName = basename($documentPath);
            $school->document = $documentName;

            // Save the school to get the ID
            $school->save();

            // Create a new user
            $user = new User();
            $user->name = $request->input('authority_name');
            $user->email = $request->input('email');
            $user->position = $request->input('position');
            // Assign the school_id
            $user->school_id = $school->id;
            $user->password = Hash::make($request->input('password'));
            $user->save();

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withError('Registration failed: ' . $e->getMessage())->withInput();
        }
    }
}
