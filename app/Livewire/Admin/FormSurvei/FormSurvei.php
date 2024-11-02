<?php

namespace App\Livewire\Admin\FormSurvei;

use App\Models\Survei;
use Livewire\Component;

class FormSurvei extends Component
{
    public function render()
    {
        $data = Survei::paginate(10);
        return view('livewire.admin.form-survei.form-survei', ['data' => $data]);
    }
}
