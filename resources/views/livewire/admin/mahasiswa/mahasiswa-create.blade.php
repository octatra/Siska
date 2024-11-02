<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Tambah Mahasiwa</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit" novalidate>
                        <div class="form-group mb-3">
                            <label>Nama Mahasiswa</label>
                            <input type="text" wire:model="nama" class="form-control" required />
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>NIM</label>
                            <input type="number" id="nim-input" wire:model="nim" class="form-control" required
                                maxlength="10" />
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Program Studi</label>
                            <select wire:model="program_studi" class="form-select" required>
                                <option hidden>Pilih Program Studi</option>
                                <option value="Pemasaran">Pemasaran</option>
                                <option value="TKJ">TKJ</option>
                            </select>
                            @error('program_studi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Tahun Angkatan</label>
                            <select id="tahun-angkatan" wire:model.defer="tahun_angkatan" class="form-select" required>
                                <option hidden>Pilih Tahun Angkatan</option>
                            </select>
                            @error('tahun_angkatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text" id="username-input" wire:model.defer="username" class="form-control"
                                required readonly />
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" wire:model="password" class="form-control" required />
                            @error('password')
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
