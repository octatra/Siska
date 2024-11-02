<?php

namespace App\Livewire\Admin\Mahasiswa;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class MahasiswaCreate extends Component
{
    public $nama, $nim, $program_studi, $tahun_angkatan, $username, $password;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'nim' => 'required|numeric|unique:users,nim',
        'program_studi' => 'required|string',
        'tahun_angkatan' => 'required',
        'username' => 'required',
        'password' => [
            'required'
        ],
    ];

    public function updatedNim($value)
    {
        $this->username = $value;
    }

    public function submit()
    {
        $validatedData = $this->validate();
        // Simpan data ke database
        User::create([
            'name' => $this->nama,
            'nim' => $this->nim,
            'role' => 'Mahasiswa',
            'program_studi' => $this->program_studi,
            'tahun_angkatan' => $this->tahun_angkatan,
            'email' => $this->username,
            'password' => Hash::make($this->password),
        ]);
        return redirect()->route('admin.mahasiwa');
    }

    public function render()
    {
        return view('livewire.admin.mahasiswa.mahasiswa-create');
    }
}
