<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{


    // 📝 Registration Page
    public function showRegisterTeacher()
    {
        return view('teacher.register');
    }

    // 🔐 Register Store
    public function registerTeacher(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'username'  => 'required|alpha_dash|unique:staff',
            'email'     => 'required|email|unique:staff',
            'phone'     => 'required|numeric',
            'password'  => 'required|confirmed|min:6',
        ]);


        // Create new teacher
        $teacher = Teacher::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'role'     => 'teacher', // default role
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.teacher')->with('success', 'Registration Successful!');
    }

    // 🔓 Login Page
    public function showLoginTeacher()
    {
        return view('teacher.login');
    }

    // 🧾 Login Store
    public function loginTeacher(Request $request)
    {
       $credentials = $request->validate([
            'auth'    => 'required',
            'password' => 'required|min:6',
        ]);

        // login with valid email or phone or username
        if(filter_var($credentials['auth'], FILTER_VALIDATE_EMAIL)){
            $credentials['email'] = $request->auth;
            unset($credentials['auth']);
        }elseif (preg_match('/^[0-9]{11}$/', $request->auth)){
            $credentials['phone'] = $request -> auth;
            unset($credentials['auth']);
        }else{
            $credentials['username'] = $request->auth;
            unset($credentials['auth']);
        }



        Auth::guard('teacher')->attempt($credentials);


        if(Auth::guard('teacher')->attempt($credentials)){
            return redirect()->route('dashboard.teacher')->with('success', 'Login Successful!');
        }


        return back()->withErrors([
            'auth' => 'Invalid credentials.',
        ])->onlyInput('auth');
    }

    // 👤 Dashboard Page
    public function dashboardTeacher()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('teacher.dashboard', compact('teacher'));
    }

    // 👤 Profile Page
    public function profileTeacher()
    {
        return view('teacher.profile');
    }

     // ✏️ Edit Profile
    public function EditTeacher()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('teacher.profileEdit', compact('teacher'));
    }

     // ✏️ Update Profile
    public function UpdateTeacher(Request $request)
    {
         $request->validate([
            'name'      => 'required|string|max:100',
            'phone'     => 'required|numeric',
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $teacher = Auth::guard('teacher')->user();

        $fileName = $teacher->photo; // keep old photo by default

        // File upload (if new file provided)
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            $oldPath = public_path('media/teacher/' . $teacher->photo);
            if ($teacher->photo && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload new photo
            $fileName = $this->fileUpload($request->file('photo'), 'media/teacher/');
        }

        // Update Auth teacher
        $teacher ->update([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'photo'    => $fileName,
        ]);

        return redirect()->route('profile.teacher')->with('success', 'Profile Updated Successful!');
    }


    // 🚪 Delete Account
    public function DeleteTeacher(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        // Delete photo if exists
        $oldPath = public_path('media/teacher/' . $teacher->photo);
        if ($teacher->photo && file_exists($oldPath)) {
            unlink($oldPath);
        }

        Auth::guard('teacher')->logout();

        $teacher->delete();

        return redirect()->route('home')->with('success', 'Account Deleted successfully!');
    }



    // 🚪 Logout
    public function logoutTeacher(Request $request)
    {
        Auth::guard('teacher')->logout();

        return redirect()->route('login.teacher')->with('success', 'Logged out successfully.');
    }
}
