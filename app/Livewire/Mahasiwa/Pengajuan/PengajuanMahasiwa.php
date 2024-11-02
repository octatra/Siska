<?php

namespace App\Livewire\Mahasiwa\Pengajuan;

use App\Models\HasilSurvei;
use App\Models\Pengajuan;
use App\Models\Survei;
use Livewire\Component;

class PengajuanMahasiwa extends Component
{
    public $jenis_pengajuan, $dokumen_lainnya, $tujuan_pengajuan, $email, $showModal = false;
    public $surveiId;

    protected $rules = [
        'jenis_pengajuan' => 'required|string|max:255',
        'tujuan_pengajuan' => 'required|string|max:255',

    ];

    public function mount()
    {
        $surveiId = Survei::with('pertanyaanSurvei')->latest()->first(); // Mengambil survei terakhir beserta pertanyaannya

        $this->surveiId = $surveiId->id;

        // Cek apakah ada hasil survei untuk pengguna yang sedang login
        $hasilSurvei = HasilSurvei::where('id_user', auth()->id())
            ->where('id_survei', $this->surveiId)
            ->first();
        // Jika tidak ada hasil survei, redirect ke halaman lain
        if (!$hasilSurvei) {
            return redirect()->route('mahasiswa.survei'); // Ganti dengan rute yang sesuai
        }
    }

    public function closeModal()
    {
        $this->showModal = false; // Menyembunyikan modal
    }

    public function submit()
    {
        $validatedData = $this->validate();
        // Simpan data ke database
        Pengajuan::create([
            'id_user' => auth()->user()->id,
            'jenis_pengajuan' => $this->jenis_pengajuan,
            'dokumen_lainnya' => $this->dokumen_lainnya,
            'tujuan_pengajuan' => $this->tujuan_pengajuan,
            'email' => $this->email ?? null,
            'status' => 'Menunggu',
        ]);
        $this->closeModal();
        $this->reset();
    }

    public function render()
    {
        $data = Pengajuan::where('id_user', auth()->user()->id)->paginate(10);
        return view('livewire.mahasiwa.pengajuan.pengajuan-mahasiwa', ['data' => $data]);
    }
}
