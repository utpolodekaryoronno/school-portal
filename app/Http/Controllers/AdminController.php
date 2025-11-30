<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // show admin login
    public function showLoginAdmin(){
        return view('admin.login');
    }


       // 🧾 Login Store
    public function loginAdmin(Request $request)
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




        Auth::guard('admin')->attempt($credentials);


        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('dashboard.admin')->with('success', 'Login Successful!');
        }


        return back()->withErrors([
            'auth' => 'Invalid credentials.',
        ])->onlyInput('auth');
    }


      // 👤 Dashboard Page
    public function dashboardAdmin()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', compact('admin'));
    }

        // 👤 Profile Page
    public function profileAdmin()
    {
        return view('admin.profile');
    }

     // ✏️ Edit Profile
    public function EditAdmin()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profileEdit', compact('admin'));
    }

     // ✏️ Update Profile
    public function UpdateAdmin(Request $request)
    {
         $request->validate([
            'name'      => 'required|string|max:100',
            'phone'     => 'required|numeric',
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $admin = Auth::guard('admin')->user();

        $fileName = $admin->photo; // keep old photo by default

        // File upload (if new file provided)
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            $oldPath = public_path('media/admin/' . $admin->photo);
            if ($admin->photo && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload new photo
            $fileName = $this->fileUpload($request->file('photo'), 'media/admin/');
        }

        // Update Auth admin
        $admin ->update([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'photo'    => $fileName,
        ]);

        return redirect()->route('profile.admin')->with('success', 'Profile Updated Successful!');
    }



    // 🚪 Logout
    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('login.admin')->with('success', 'Logged out successfully.');
    }

}
