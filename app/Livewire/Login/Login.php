<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $role = '';

    protected $rules = [
        'email' => 'required',
        'password' => 'required|min:6',
        'role' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = auth()->user();
            // Cek jika role yang dipilih saat login tidak sesuai dengan user yang ditemukan
            if ($user->role !== $this->role) {
                Auth::logout();
                session()->flash('error', 'Hak akses tidak valid.');
                $this->reset();
                return;
            }

            // Regenerate session untuk keamanan
            session()->regenerate();
            // Redirect berdasarkan peran
            switch ($user->role) {
                case 'Admin':
                    return redirect()->route('admin.dashboard');
                case 'Mahasiswa':
                    return redirect()->route('mahasiswa.dashboard');
                case 'Alumni':
                    return redirect()->route('alumni.dashboard');
                default:
                    Auth::logout();
                    session()->flash('error', 'Role tidak ditemukan.');
                    return;
            }
        } else {
            $this->reset();
            session()->flash('error', 'Email atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.login.login')->layout('layouts.login.login');
    }
}
