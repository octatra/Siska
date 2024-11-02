<?php

namespace App\Livewire\Admin\Alumni;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AlumniCreate extends Component
{
    public $nama, $nim, $program_studi, $tahun_angkatan, $tahun_lulus, $username, $password;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'nim' => 'required|numeric|unique:users,nim',
        'program_studi' => 'required|string',
        'tahun_angkatan' => 'required',
        'tahun_lulus' => 'required',
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
            'role' => 'Alumni',
            'program_studi' => $this->program_studi,
            'tahun_angkatan' => $this->tahun_angkatan,
            'tahun_lulus' => $this->tahun_lulus,
            'email' => $this->username,
            'password' => Hash::make($this->password),
        ]);
        return redirect()->route('admin.alumni');
    }

    public function render()
    {
        return view('livewire.admin.alumni.alumni-create');
    }
}
