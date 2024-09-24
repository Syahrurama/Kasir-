<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function indexSuperAdmin(Request $request)
    {
        return view('Page_login.login_super_admin');
    }
    public function indexAdmin(Request $request)
    {
        return view('page_login.login_admin');
    }

    public function indexPetugas(Request $request)
    {
        return view('login_Petugas');
    }


    public function indexreg(Request $request)
    {
        return view('register');
    }


    public function register(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|unique:users,name',
        'password'=> 'required|min:6',
    ]);

    // If validation passes, create the new user
    $user = User::create([
        'name' => $validatedData['name'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'superadmin',
        'status' => 'inactive',
    ]);

    // Redirect to the login page with a success message
    return redirect('login')->with('success', 'Registration successful. Waiting Super Admin To Active Account');
}


  public function loginSuperAdmin(Request $request)
{
    $credentials = $request->validate([
        'name' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $role = Auth::user()->role;
        
        // Perhatikan case-sensitive pada role SuperAdmin
        if ($role == 'superadmin') {
            return redirect('dashboard')->with('success', 'Login berhasil.');
        }
    }
    
    Auth::logout();
    return redirect('loginSuperAdmin')->with('error', 'Nama pengguna atau Password tidak valid.');
}


    
    public function loginAdmin(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    

            // Cek apakah user adalah admin
            if ($user->role == 'admin') {
                return redirect('dashboardadmin')->with('success', 'Login berhasil.');
            }
        }
    
        return redirect()->route('loginAdmin')->with('error', 'Nama pengguna atau password salah.');
    }
    
    
    
    public function loginPetugas(Request $request){
        $credentials = $request->validate([
            'name' => ['required',],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $role = Auth::user()->role;
                switch ($role){
                    case 'Petugas':
                        return redirect('dashboard');
                }
        }
        Auth::logout();
        return redirect('loginPetugas')->with('error', 'Invalid email or password.');

    }

    // public function logout ()
    // {
    //     auth()->user()->tokens()->delete();
    //     return response([
    //         'message' => 'Logout Success'
    //     ],200);
    // }

    // public function user()
    // {
    //    return response([
    //     'user' => auth()->user()
    //    ], 200); 
    // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_awal');
    }
}