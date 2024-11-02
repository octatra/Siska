<?php

namespace App\Livewire\Admin\Mahasiswa;

use App\Models\User;
use Livewire\Component;

class MahasiswaEdit extends Component
{
    public $mahasiswaId;
    public $nama, $nim, $username, $program_studi, $tahun_angkatan, $password;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'nim' => 'required|numeric|digits:8|unique:mahasiswas,nim',
        'username' => 'required|email|unique:mahasiswas,username',
        'program_studi' => 'required',
        'tahun_angkatan' => 'required',
        'password' => 'required|min:10',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $mahasiswa = User::findOrFail($id);
            $this->mahasiswaId = $mahasiswa->id;
            $this->nama = $mahasiswa->name;
            $this->nim = $mahasiswa->nim;
            $this->username = $mahasiswa->email;
            $this->program_studi = $mahasiswa->program_studi;
            $this->tahun_angkatan = $mahasiswa->tahun_angkatan;
        }
    }

    public function updatedNim($value)
    {
        $this->username = $value; // Set username otomatis sesuai NIM
    }

    public function save()
    {
        $this->validate();

        if ($this->mahasiswaId) {
            $mahasiswa = User::findOrFail($this->mahasiswaId);
            $mahasiswa->update($this->getFormData());
        } else {
            Mahasiswa::create($this->getFormData());
        }
        return redirect()->route('admin.mahasiwa');
    }

    private function getFormData()
    {
        return [
            'nama' => $this->nama,
            'nim' => $this->nim,
            'username' => $this->username,
            'program_studi' => $this->program_studi,
            'tahun_angkatan' => $this->tahun_angkatan,
            'password' => bcrypt($this->password),
        ];
    }

    public function render()
    {
        return view('livewire.admin.mahasiswa.mahasiswa-edit');
    }
}
