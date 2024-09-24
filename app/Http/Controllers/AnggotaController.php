<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('Page_Super_Admin.page_Anggota', compact('users'));

    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|unique:users,name',
            'password'=> 'required|min:6',
            'role' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at'=>now(),
        ]);
        return redirect()->route('page_anggota.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        // Mengambil data user berdasarkan id
        $staff = User::findOrFail($id);
        
        // Mengirim data user ke view 'page_anggota.edit'
        return view('page_anggota.edit', compact('staff'));
    }
    
    


    public function update(Request $request, $id)
    {

        $staff = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $staff->id,
            'password' => 'required|min:6',          
        ]);

        $staff->update([
            'name' => $request->name,
            'password' => $request->password,
            'updated_at' => now(),
        ]);

        return back();
    }

    

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return back();
    }
} 