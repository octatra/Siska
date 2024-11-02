<?php

namespace App\Livewire\Admin\Alumni;

use App\Models\User;
use Livewire\Component;

class Alumni extends Component
{
    public function render()
    {
        $data = User::where('role', 'Alumni')->paginate(10);
        return view('livewire.admin.alumni.alumni', ['data' => $data]);
    }
}
