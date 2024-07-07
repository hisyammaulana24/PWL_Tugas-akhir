<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Debugging: Tambahkan log untuk melihat apakah kode mencapai titik ini
        \Log::info('Validasi berhasil, melanjutkan ke pembuatan pengguna.');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Debugging: Tambahkan log untuk melihat apakah pengguna berhasil dibuat
        \Log::info('Pengguna berhasil dibuat: ' . $user->id);

        auth()->login($user);

        // Debugging: Tambahkan log untuk melihat apakah pengguna berhasil login
        \Log::info('Pengguna berhasil login: ' . $user->id);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name);
    }
}
