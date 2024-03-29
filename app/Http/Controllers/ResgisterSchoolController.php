<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ResgisterSchoolController extends Controller
{
    public function index()
    {
        return view('frontend.school.register');
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
            Auth::login($user);
            Session::put('name',$school->name);
            return redirect($school->name.'/user-dashboard/'.$user->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withError('Registration failed: ' . $e->getMessage())->withInput();
        }
    }
    public function dashboard($name,$id)
    {
        $school = School::where('id',$id)->with('users')->first();
        return view('frontend.school.dashboard', compact('school','name'));
    }
    public function edit($name,$id)
    {
        $school = School::FindOrFail($id);
        return view('frontend.school.edit', compact('school','name'));
    }

    public function update(Request $request, $name,$id)
    {
        $school = School::findOrFail($id);
        
        // Validate the request data after retrieving the school instance
        $request->validate([
            'name' => 'required|string',
            'founded_year' => 'required|string',
            'authority_name' => 'required|string',
            'email' => 'required', // Ensure unique email, excluding the current user's email
            'position' => 'required|string',
            'student_amount' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            // Update school details
            $school->name = $request->input('name');
            $school->founded_year = $request->input('founded_year');
            $school->student_amount = $request->input('student_amount');

            if ($request->hasFile('image')) {
                if ($school->image) {
                    Storage::delete('public/schools/' . $school->image);
                }
                $imagePath = $request->file('image')->store('public/schools/');
                $imageName = basename($imagePath);
                $school->image = $imageName;
            }

            if ($request->hasFile('document')) {
                if ($school->document) {
                    Storage::delete('public/schooldocuments/' . $school->document);
                }
                $documentPath = $request->file('document')->store('public/schooldocuments/');
                $documentName = basename($documentPath);
                $school->document = $documentName;
            }

            // Save the updated school details
            $school->save();

            if($school->users)
            {
                
                $user = User::findOrFail($school->users->first()->id);
                $user->update([
                    'name' => $request['authority_name'],
                    'email' => $request['email'],
                    'position' => $request['position'],
                ]);
            }
            DB::commit();

            return redirect($school->name.'/user-dashboard/'.$school->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withError('Failed to update school details: ' . $e->getMessage())->withInput();
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
