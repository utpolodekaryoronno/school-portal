<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{


    // 📝 Registration Page
    public function showRegisterStaff()
    {
        return view('staff.register');
    }

    // 🔐 Register Store
    public function registerStaff(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'username'  => 'required|alpha_dash|unique:staff',
            'email'     => 'required|email|unique:staff',
            'phone'     => 'required|numeric',
            'role'     => 'required',
            'password'  => 'required|confirmed|min:6',
        ]);


        // Create new staff
        $staff = Staff::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.staff')->with('success', 'Registration Successful!');
    }

    // 🔓 Login Page
    public function showLoginStaff()
    {
        return view('staff.login');
    }

    // 🧾 Login Store
    public function loginStaff(Request $request)
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



        Auth::guard('staff')->attempt($credentials);



        if (Auth::guard('staff')->attempt($credentials)) {

            $staff = Auth::guard('staff')->user();

            if ($staff->role === 'accountant') {
                return redirect()->route('accountant.dashboard')->with('success', 'Login Successful!');
            }

            return redirect()->route('staff.dashboard')->with('success', 'Login Successful!');
        }



        return back()->withErrors([
            'auth' => 'Invalid credentials.',
        ])->onlyInput('auth');
    }

    // 👤 Profile Page
    public function profileStaff()
    {
        return view('staff.profile');
    }
     // ✏️ Edit Profile
    public function editStaff()
    {
        $staff = Auth::guard('staff')->user();
        return view('staff.profileEdit', compact('staff'));
    }
     // ✏️ Update Profile
    public function updateStaff(Request $request)
    {
         $request->validate([
            'name'      => 'required|string|max:100',
            'phone'     => 'required|numeric',
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $staff = Auth::guard('staff')->user();

        $fileName = $staff->photo; // keep old photo by default

        // File upload (if new file provided)
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            $oldPath = public_path('media/staff/' . $staff->photo);
            if ($staff->photo && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload new photo
            $fileName = $this->fileUpload($request->file('photo'), 'media/staff/');
        }

        // Update Auth Staff
        $staff ->update([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'photo'    => $fileName,
        ]);

        return redirect()->route('profile.staff')->with('success', 'Profile Updated Successful!');
    }


    // 👤 Accountant Deshboard
    public function Accountant()
    {
        if (Auth::guard('staff')->user()->role !== 'accountant') {
            return redirect()->route('staff.dashboard');
        }

        return view('staff.accountant.dashboard');
    }

    // 👤 Staff Deshboard
    public function StaffDashboard()
    {
        if (Auth::guard('staff')->user()->role === 'accountant') {
            return redirect()->route('accountant.dashboard');
        }

        return view('staff.dashboard');
    }


    // 🚪 Delete Account
    public function deleteStaff(Request $request)
    {
        $staff = Auth::guard('staff')->user();

        // Delete photo if exists
        $oldPath = public_path('media/staff/' . $staff->photo);
        if ($staff->photo && file_exists($oldPath)) {
            unlink($oldPath);
        }

        Auth::guard('staff')->logout();

        $staff->delete();

        return redirect()->route('home')->with('success', 'Account Deleted successfully!');
    }


    // 🚪 Logout
    public function logoutStaff(Request $request)
    {
        Auth::guard('staff')->logout();

        return redirect()->route('login.staff')->with('success', 'Logged out successfully.');
    }
}
