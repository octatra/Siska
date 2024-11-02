<?php

namespace App\Livewire\Admin\Mahasiswa;

use App\Models\User;
use Livewire\Component;

class Mahasiswa extends Component
{
    public function render()
    {
        $data = User::where('role', 'Mahasiswa')->paginate(10);
        return view('livewire.admin.mahasiswa.mahasiswa', ['data' => $data]);
    }
}
