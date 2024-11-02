<?php

use App\Http\Middleware\RoleMiddleware;
use App\Livewire\Admin\Alumni\Alumni;
use App\Livewire\Admin\Alumni\AlumniCreate;
use App\Livewire\Admin\Dasboard\Dashboard;
use App\Livewire\Admin\FormSurvei\CreateSurvei;
use App\Livewire\Admin\FormSurvei\DetailSurvei;
use App\Livewire\Admin\FormSurvei\FormSurvei;
use App\Livewire\Admin\Mahasiswa\Mahasiswa;
use App\Livewire\Admin\Mahasiswa\MahasiswaCreate;
use App\Livewire\Admin\Mahasiswa\MahasiswaEdit;
use App\Livewire\Admin\Pengajuan\DokumenLainnya;
use App\Livewire\Admin\Pengajuan\KartuHasilStudi;
use App\Livewire\Admin\Pengajuan\SertifikatAkreditasi;
use App\Livewire\Admin\Pengajuan\SuratKeteranganLulus;
use App\Livewire\Admin\Pengajuan\SuratRekomendasi;
use App\Livewire\Admin\Pengajuan\TranskipNilai;
use App\Livewire\Admin\PengajuanLain\PengajuanDiterima;
use App\Livewire\Admin\PengajuanLain\PengajuanDitolak;
use App\Livewire\Admin\User\CreateUser;
use App\Livewire\Admin\User\EditUser;
use App\Livewire\Admin\User\User;
use App\Livewire\Login\Login;
use App\Livewire\Mahasiwa\Dashboard\DashboardMahasiswa;
use App\Livewire\Mahasiwa\FormSurvei\FormSurveiMahasiwa;
use App\Livewire\Mahasiwa\Pengajuan\PengajuanMahasiwa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    Route::middleware(RoleMiddleware::class . ':Admin')->group(function () {
        Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/admin/user', User::class)->name('admin.user');
        Route::get('/admin/user/create', CreateUser::class)->name('admin.user.create');
        Route::get('/admin/user/edit', EditUser::class)->name('admin.user.edit');

        Route::get('/admin/mahasiwa', Mahasiswa::class)->name('admin.mahasiwa');
        Route::get('/admin/mahasiwa/create', MahasiswaCreate::class)->name('admin.mahasiwa.create');
        Route::get('/admin/mahasiwa/edit/{id}', MahasiswaEdit::class)->name('admin.mahasiwa.edit');

        Route::get('/admin/alumni', Alumni::class)->name('admin.alumni');
        Route::get('/admin/alumni/create', AlumniCreate::class)->name('admin.alumni.create');
        Route::get('/admin/alumni/edit/{id}', Alumni::class)->name('admin.alumni.edit');

        Route::get('/admin/pengajuan/khs', KartuHasilStudi::class)->name('admin.pengajuan.khs');
        Route::get('/admin/pengajuan/skl', SuratKeteranganLulus::class)->name('admin.pengajuan.skl');
        Route::get('/admin/pengajuan/sertifikat-akreditasi', SertifikatAkreditasi::class)->name('admin.pengajuan.sertifikat-akreditasi');
        Route::get('/admin/pengajuan/transkip-nilai', TranskipNilai::class)->name('admin.pengajuan.transkip-nilai');
        Route::get('/admin/pengajuan/surat-rekomendasi', SuratRekomendasi::class)->name('admin.pengajuan.surat-rekomendasi');
        Route::get('/admin/pengajuan/dokumen-lainnya', DokumenLainnya::class)->name('admin.pengajuan.dokumen-lainnya');

        Route::get('/admin/pengajuan/ditolak', PengajuanDitolak::class)->name('admin.pengajuan.ditolak');
        Route::get('/admin/pengajuan/diterima', PengajuanDiterima::class)->name('admin.pengajuan.diterima');

        Route::get('/admin/form-survei/', FormSurvei::class)->name('admin.form-survei');
        Route::get('/admin/form-survei/create', CreateSurvei::class)->name('admin.form-survei.create');
        Route::get('/admin/form-survei/detail/{id}', DetailSurvei::class)->name('admin.form-survei.detail');
    });

    Route::get('/mahasiswa/dashboard', DashboardMahasiswa::class)->name('mahasiswa.dashboard');
    Route::get('/alumni/dashboard', DashboardMahasiswa::class)->name('alumni.dashboard');
    Route::get('/mahasiswa/pengajuan', PengajuanMahasiwa::class)->name('mahasiswa.pengajuan');
    Route::get('/mahasiswa/survei', FormSurveiMahasiwa::class)->name('mahasiswa.survei');
});
