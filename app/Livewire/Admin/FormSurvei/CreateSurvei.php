<?php

namespace App\Livewire\Admin\FormSurvei;

use App\Models\PertanyaanSurvei;
use App\Models\Survei;
use Livewire\Component;

class CreateSurvei extends Component
{
    public $daftarPertanyaan = [];
    public $tahun_priode;
    public $tahun_priode_akhir;
    public $target_survei;
    public $status_survei;

    public function mount()
    {
        $this->tambahPertanyaan();
    }

    public function tambahPertanyaan()
    {
        $this->daftarPertanyaan[] = [
            'teks' => '',
            'jenis' => 'teks', // jenis default
            'pilihan' => ['', '', '', ''], // pilihan default untuk pilihan ganda
        ];
    }

    public function hapusPertanyaan($indeks)
    {
        unset($this->daftarPertanyaan[$indeks]);
        $this->daftarPertanyaan = array_values($this->daftarPertanyaan); // reset indeks
    }

    public function store()
    {
        // Validasi input
        $this->validate([
            'tahun_priode' => 'required',
            'tahun_priode_akhir' => 'required',
            'target_survei' => 'required',
            'status_survei' => 'required|in:Aktif,Tidak Aktif',
            'daftarPertanyaan.*.teks' => 'required|string',
            'daftarPertanyaan.*.jenis' => 'required|in:teks,pilihan_ganda',
            'daftarPertanyaan.*.pilihan' => 'array',
            'daftarPertanyaan.*.pilihan.*' => 'nullable|string',
        ]);

        // Menyimpan data survei
        $survei = Survei::create([
            'priode_survei' => $this->tahun_priode . '-' . $this->tahun_priode_akhir,
            'target_survei' => $this->target_survei,
            'status_survei' => $this->status_survei,
        ]);

        // Menyimpan setiap pertanyaan survei
        foreach ($this->daftarPertanyaan as $pertanyaanData) {
            $pertanyaan = PertanyaanSurvei::create([
                'id_survei' => $survei->id,
                'pertanyaan' => $pertanyaanData['teks'],
                'jenis_pertanyaan' => $pertanyaanData['jenis'],
                'opsi1' => $pertanyaanData['jenis'] === 'pilihan_ganda' ? $pertanyaanData['pilihan'][0] : null,
                'opsi2' => $pertanyaanData['jenis'] === 'pilihan_ganda' ? $pertanyaanData['pilihan'][1] : null,
                'opsi3' => $pertanyaanData['jenis'] === 'pilihan_ganda' ? $pertanyaanData['pilihan'][2] : null,
                'opsi4' => $pertanyaanData['jenis'] === 'pilihan_ganda' ? $pertanyaanData['pilihan'][3] : null,
            ]);
        }

        $this->resetForm();
        return redirect()->route('admin.form-survei');
        // Memberikan pesan sukses dan reset input
        // session()->flash('message', 'Survei berhasil ditambahkan.');
    }

    public function resetForm()
    {
        $this->tahun_priode = '';
        $this->tahun_priode_akhir = '';
        $this->target_survei = '';
        $this->status_survei = '';
        $this->daftarPertanyaan = [];
        $this->tambahPertanyaan();
    }

    public function render()
    {
        return view('livewire.admin.form-survei.create-survei');
    }
}
