<?php

namespace App\Livewire\Admin\FormSurvei;

use App\Models\Survei;
use Livewire\Component;

class DetailSurvei extends Component
{
    public $surveiId;
    public $data;

    public function mount($id)
    {
        $this->surveiId = $id;
        $this->data = Survei::with('pertanyaanSurvei')->find($this->surveiId);
        // dd($this->data); // Uncomment untuk debugging
    }

    public function render()
    {
        return view('livewire.admin.form-survei.detail-survei');
    }
}
