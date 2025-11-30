<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class StudentController extends Controller
{
    // 🏠 Home Page
    public function index()
    {
        return view('index');
    }

    // 📝 Registration Page
    public function showRegister()
    {
        return view('student.register');
    }

    // 🔐 Register Store
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'username'  => 'required|alpha_dash|unique:students',
            'email'     => 'required|email|unique:students',
            'phone'     => 'required|numeric',
            'password'  => 'required|confirmed|min:6',
        ]);


        // Create new student
        $student = Student::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => 'student', // default role
        ]);

        return redirect()->route('login')->with('success', 'Registration Successful!');
    }

    // 🔓 Login Page
    public function showLogin()
    {
        return view('student.login');
    }

    // 🧾 Login Store
    public function login(Request $request)
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

        Auth::guard('student')->attempt($credentials);

        // ✅ Check if "Remember Me" is checked
        $remember = $request->has('remember');


        if(Auth::guard('student')->attempt($credentials, $remember)){
            return redirect()->route('dashboard')->with('success', 'Login Successful!');
        }


        return back()->withErrors([
            'auth' => 'Invalid credentials.',
        ])->onlyInput('auth');
    }

    // 👤 Dashboard Page
    public function Dashboard()
    {
        $student = Auth::guard('student')->user();
        return view('student.dashboard', compact('student'));
    }

    // 👤 Profile Page
    public function profile()
    {
        $student = Auth::guard('student')->user();
        return view('student.profile', compact('student'));
    }

    // ✏️ Edit Profile
    public function editProfile()
    {
        $student = Auth::guard('student')->user();
        return view('student.profileEdit', compact('student'));
    }
     // ✏️ Update Profile
    public function updateProfile(Request $request)
    {
         $request->validate([
            'name'      => 'required|string|max:100',
            'phone'     => 'required|numeric',
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $student = Auth::guard('student')->user();

        $fileName = $student->photo; // keep old photo by default

        // File upload (if new file provided)
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            $oldPath = public_path('media/student/' . $student->photo);
            if ($student->photo && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload new photo
            $fileName = $this->fileUpload($request->file('photo'), 'media/student/');
        }

        // Update Auth student
        $student ->update([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'photo'    => $fileName,
        ]);

        return redirect()->route('profile')->with('success', 'Profile Updated Successful!');
    }

    // 🚪 Delete Account
    public function deleteProfile(Request $request)
    {
        $student = Auth::guard('student')->user();

        // Delete photo if exists
        $oldPath = public_path('media/student/' . $student->photo);
        if ($student->photo && file_exists($oldPath)) {
            unlink($oldPath);
        }

        Auth::guard('student')->logout();

        $student->delete();

        return redirect()->route('home')->with('success', 'Account Deleted successfully!');
    }

    // 🚪 Logout
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
