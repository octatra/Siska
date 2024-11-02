<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Tambah Mahasiwa</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save" novalidate>
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
                            <select id="tahun-angkatan-select" wire:model.defer="tahun_angkatan" class="form-select"
                                required>
                                <option hidden>Pilih Tahun Angkatan</option>
                            </select>
                            @error('tahun_angkatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Tahun Lulus</label>
                            <select id="tahun-lulus-select" wire:model.defer="tahun_lulus" class="form-select" required>
                                <option hidden>Pilih Tahun Lulus</option>
                            </select>
                            @error('tahun_lulus')
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
            const nimInput = document.getElementById('nim-input');
            const usernameInput = document.getElementById('username-input');

            // Sinkronisasi NIM dengan username
            nimInput.addEventListener('input', function() {
                if (nimInput.value.length > 10) {
                    nimInput.value = nimInput.value.slice(0, 10); // Batasi hingga 10 digit
                }
                usernameInput.value = nimInput.value; // Isi otomatis username
            });

            function populateYearOptions(selectElementId) {
                const selectElement = document.getElementById(selectElementId);
                const currentYear = new Date().getFullYear();
                const startYear = 2000;

                // Kosongkan dropdown sebelum mengisi ulang
                selectElement.innerHTML = '<option hidden>Pilih Tahun</option>';

                // Tambahkan opsi tahun dari 2000 hingga tahun saat ini
                for (let year = currentYear; year >= startYear; year--) {
                    const option = document.createElement('option');
                    option.value = year;
                    option.text = year;
                    selectElement.appendChild(option);
                }
            }

            // Panggil saat pertama kali DOM siap
            populateYearOptions('tahun-angkatan-select');
            populateYearOptions('tahun-lulus-select');

            // Pastikan isi dropdown tetap setelah render ulang oleh Livewire
            Livewire.hook('message.processed', () => {
                populateYearOptions('tahun-angkatan-select');
                populateYearOptions('tahun-lulus-select');
            });
        });
    </script>
</x-slot>
