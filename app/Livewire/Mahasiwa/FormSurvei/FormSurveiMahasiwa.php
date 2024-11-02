<?php

namespace App\Livewire\Mahasiwa\FormSurvei;

use App\Models\HasilSurvei;
use App\Models\JawabanSurvei;
use App\Models\Survei;
use Livewire\Component;

class FormSurveiMahasiwa extends Component
{
    public $surveiId;
    public $data;

    public $responses = [];

    public function mount()
    {
        $this->data = Survei::with('pertanyaanSurvei')
            ->where('target_survei', auth()->user()->role)
            ->latest()
            ->first(); // Mengambil survei terakhir beserta pertanyaannya
        // dd($this->data); // Uncomment untuk debugging
        $this->surveiId = $this->data->id;

        $hasilSurvei = HasilSurvei::where('id_user', auth()->id())
            ->where('id_survei', $this->surveiId)
            ->first();
        // Jika tidak ada hasil survei, redirect ke halaman lain
        if ($hasilSurvei) {
            return redirect()->route('mahasiswa.pengajuan'); // Ganti dengan rute yang sesuai
        }
    }

    public function submitSurvey()
    {
        // Validasi input
        $this->validate([
            'responses.*' => 'required|string', // Pastikan setiap jawaban terisi
        ]);

        // Simpan hasil survei
        $hasilSurvei = HasilSurvei::create([
            'id_user' => auth()->id(), // Ambil ID pengguna yang sedang login
            'id_survei' => $this->surveiId,
        ]);

        // Simpan jawaban
        foreach ($this->responses as $pertanyaanId => $jawaban) {
            JawabanSurvei::create([
                'id_hasil_survei' => $hasilSurvei->id,
                'jawaban_survei' => $jawaban,
            ]);
        }

        // Reset jawaban setelah menyimpan
        $this->responses = [];

        // Notifikasi atau pengalihan setelah berhasil
        session()->flash('message', 'Survei berhasil dikirim!');
        return redirect()->route('mahasiswa.pengajuan');
    }

    public function render()
    {
        return view('livewire.mahasiwa.form-survei.form-survei-mahasiwa');
    }
}
