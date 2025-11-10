<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view ('auth.register');
    }

    // Memproses Registrasi
    public function register(Request $request)
    {
        // Validasi data yang dimasukkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan pengguna baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Mengautentikasi pengguna yang baru mendaftar
        auth()->login($user);

        // Alihkan pengguna ke dashboard atau halaman lain
        return redirect()->route('products.index'); // Ganti dengan rute yang sesuai
    }
}

