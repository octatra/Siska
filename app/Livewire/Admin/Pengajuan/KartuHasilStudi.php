<?php

namespace App\Livewire\Admin\Pengajuan;

use App\Models\Pengajuan;
use Livewire\Component;

class KartuHasilStudi extends Component
{
    public $jenis_pengajuan, $tujuan_pengajuan, $email, $status, $tanggapan, $showModal = false;

    public function closeModal()
    {
        $this->showModal = false; // Menyembunyikan modal
    }

    public function update($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        // Update status dan tanggapan
        $pengajuan->update([
            'status' => $this->status,
            'tanggapan' => $this->tanggapan, // Jika ada tanggapan
        ]);

        // Tutup modal dan reset input
        $this->closeModal();
        $this->reset();

        // Tambahkan flash message atau notifikasi jika perlu
        session()->flash('message', 'Status pengajuan berhasil diperbarui.');
    }

    public function render()
    {
        $data = Pengajuan::where('status', 'Menunggu')
            ->where('jenis_pengajuan', 'Kartu Hasil Studi')
            ->paginate(10);

        return view('livewire.admin.pengajuan.kartu-hasil-studi', ['data' => $data]);
    }
}
