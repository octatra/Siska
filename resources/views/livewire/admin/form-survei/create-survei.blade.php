<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Create Survei</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store" novalidate>
                        <div class="form-group d-flex">
                            <div class="form-group mb-3 flex-grow-1 me-2">
                                <label>Priode Kuisioner</label>
                                <select id="tahun-priode" wire:model.defer="tahun_priode" class="form-select" required>
                                    <option hidden>Pilih Tahun</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('tahun_priode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 flex-grow-1">
                                <label>-</label>
                                <select id="tahun-priode-2" wire:model.defer="tahun_priode_akhir" class="form-select"
                                    required>
                                    <option hidden>Pilih Tahun</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('tahun_priode_akhir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="daftar-pertanyaan">
                                @foreach ($daftarPertanyaan as $indeks => $pertanyaan)
                                    <div class="pertanyaan mb-4 border p-3">
                                        <div class="form-group">
                                            <label for="teks-pertanyaan-{{ $indeks }}">Pertanyaan
                                                {{ $indeks + 1 }}</label>
                                            <input type="text" id="teks-pertanyaan-{{ $indeks }}"
                                                wire:model.defer="daftarPertanyaan.{{ $indeks }}.teks"
                                                class="form-control" placeholder="Masukkan pertanyaan">
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="jenis-pertanyaan-{{ $indeks }}">Jenis Pertanyaan</label>
                                            <select id="jenis-pertanyaan-{{ $indeks }}"
                                                wire:model="daftarPertanyaan.{{ $indeks }}.jenis"
                                                class="form-select">
                                                <option value="teks">Jawaban Singkat</option>
                                                <option value="pilihan_ganda">Pilihan Ganda</option>
                                            </select>
                                        </div>

                                        <!-- Menampilkan input pilihan ganda jika jenis adalah pilihan ganda -->
                                        @if ($daftarPertanyaan[$indeks]['jenis'] === 'pilihan_ganda')
                                            <div class="mt-3">
                                                <label>Pilihan Jawaban:</label>
                                                @foreach ($daftarPertanyaan[$indeks]['pilihan'] as $indeksPilihan => $pilihan)
                                                    <div class="input-group mb-2">
                                                        <input type="text"
                                                            wire:model.defer="daftarPertanyaan.{{ $indeks }}.pilihan.{{ $indeksPilihan }}"
                                                            class="form-control"
                                                            placeholder="Pilihan {{ $indeksPilihan + 1 }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <button type="button" class="btn btn-danger mt-2"
                                            wire:click="hapusPertanyaan({{ $indeks }})">
                                            Hapus Pertanyaan
                                        </button>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-primary mt-3" wire:click="tambahPertanyaan">Tambah
                                Pertanyaan</button>
                        </div>

                        <div class="form-group mb-3">
                            <label>Target Survei</label>
                            <select wire:model="target_survei" class="form-select" required>
                                <option hidden>Pilih Status</option>
                                <option value="Mahasiswa">Mahasiswa Aktif</option>
                                <option value="Alumni">Alumni</option>
                            </select>
                            @error('status_survei')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select wire:model="status_survei" class="form-select" required>
                                <option hidden>Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            @error('status_survei')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>

                        @if (session()->has('message'))
                            <div class="alert alert-success mt-3">
                                {{ session('message') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-slot name="scripts">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tahunAngkatanSelect = document.getElementById('tahun-angkatan');
            const currentYear = new Date().getFullYear(); // Tahun saat ini
            const startYear = 2000; // Tahun mulai

            // Mengisi dropdown tahun secara dinamis
            for (let year = currentYear; year >= startYear; year--) {
                const option = document.createElement('option');
                option.value = year;
                option.text = year;
                tahunAngkatanSelect.add(option);
            }

            const nimInput = document.getElementById('nim-input');
            const usernameInput = document.getElementById('username-input');

            // Isi username otomatis dengan nilai NIM
            nimInput.addEventListener('input', function() {
                if (nimInput.value.length > 10) {
                    nimInput.value = nimInput.value.slice(0, 10);
                }
                usernameInput.value = nimInput.value;
            });
        });
    </script>
</x-slot>
