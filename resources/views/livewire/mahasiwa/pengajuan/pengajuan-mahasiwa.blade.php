<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Data Pengajuan</h3>
                    <div class="mx-auto"></div>

                    <!-- Form Search -->
                    <div class="me-2">
                        <form method="GET" class="d-flex align-items-center" style="width: 300px;">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari Mahasiswa..." value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">
                                    <i data-feather="search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-outline-primary waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#pengajuan"><i data-feather="plus"></i> Buat
                            Pengajuan</button>
                        <!-- Modal -->
                        <div id="pengajuan" class="modal fade @if ($showModal) show @endif"
                            tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="{{ !$showModal ? 'true' : 'false' }}" data-bs-scroll="true" wire:ignore>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Buat Pengajuan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close" wire:click="closeModal"></button>
                                    </div>
                                    <form id="pristine-valid-example" wire:submit.prevent="submit" novalidate
                                        method="post">
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Pilih Pengajuan</label>
                                                <select id="pengajuanSelect" wire:model="jenis_pengajuan"
                                                    class="form-select" required onchange="toggleDokumenInput()">
                                                    <option hidden>Pilih Pengajuan</option>
                                                    <option value="Kartu Hasil Studi">Kartu Hasil Studi</option>
                                                    <option value="Surat Keterangan Lulus">Surat Keterangan Lulus
                                                    </option>
                                                    <option value="Sertifikat Akreditasi">Sertifikat Akreditasi</option>
                                                    <option value="Transkip Nilai">Transkip Nilai</option>
                                                    <option value="Surat Rekomendasi Jurusan">Surat Rekomendasi Jurusan
                                                    </option>
                                                    <option value="Dokumen Lainnya">Dokumen Lainnya</option>
                                                </select>
                                                @error('jenis_pengajuan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div id="dokumenInput" class="form-group mb-3" style="display: none;">
                                                <label for="dokumenLainnya">Masukkan Dokumen Lainnya</label>
                                                <input type="text" id="dokumenLainnya" wire:model="dokumen_lainnya"
                                                    name="dokumenLainnya" class="form-control"
                                                    placeholder="Masukkan nama dokumen">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="deskripsi">Tujuan Pengajuan</label>
                                                <textarea id="deskripsi" wire:model="tujuan_pengajuan" name="deskripsi" class="form-control" rows="4" required></textarea>
                                                @error('tujuan_pengajuan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-check mb-3">
                                                <input type="checkbox" id="emailCheckbox" class="form-check-input"
                                                    onchange="toggleEmailInput()">
                                                <label for="emailCheckbox" class="form-check-label">Kirim ke
                                                    Email</label>
                                            </div>

                                            <div id="emailInput" class="form-group mb-3" style="display: none;">
                                                <label for="email">Masukkan Email</label>
                                                <input type="email" id="email" wire:model="email" name="email"
                                                    class="form-control" placeholder="contoh@email.com">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Buat</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end preview-->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Pengajuan</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status Pengajuan</th>
                                    <th width="30%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $indeks => $items)
                                    <tr>
                                        <th scope="row">{{ $indeks + 1 }}</th>
                                        <td>{{ $items->jenis_pengajuan }}</td>
                                        <td>{{ $items->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            @if ($items->status == 'Diterima')
                                                <span class="btn btn-sm btn-success">Diterima</span>
                                            @elseif ($items->status == 'Ditolak')
                                                <span class="btn btn-sm btn-danger">Ditolak</span>
                                            @else
                                                <span class="btn btn-sm btn-warning">Menunggu</span>
                                            @endif
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-md btn-outline-danger waves-effect waves-light">Hapus</button>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#myModal{{ $items->id }}"><i
                                                        data-feather="eye"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- sample modal content -->
                                    <div id="myModal{{ $items->id }}" class="modal fade" tabindex="-1"
                                        aria-labelledby="myModalLabel{{ $items->id }}" aria-hidden="true"
                                        data-bs-scroll="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel{{ $items->id }}">
                                                        Detail Pengajuan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Jenis Pengajuan :</strong> {{ $items->jenis_pengajuan }}
                                                    </p>
                                                    <p><strong>Tujuan Pengajuan :</strong>
                                                        {{ $items->tujuan_pengajuan }}</p>
                                                    <p><strong>Tanggapan :</strong>
                                                        {{ $items->tanggapan ?? '-' }}</p>
                                                    <p><strong>Status :</strong>
                                                        @if ($items->status == 'Diterima')
                                                            <span class="btn btn-sm btn-success">Diterima</span>
                                                        @elseif ($items->status == 'Ditolak')
                                                            <span class="btn btn-sm btn-danger">Ditolak</span>
                                                        @else
                                                            <span class="btn btn-sm btn-warning">Menunggu</span>
                                                        @endif
                                                    </p>
                                                    @if ($items->status == 'Diterima')
                                                        <p><strong>Tanggal Diterima :</strong>
                                                            {{ $items->updated_at->format('d-m-Y') }}</p>
                                                    @endif
                                                    <p><strong>Tanggal Pengajuan :</strong>
                                                        {{ $items->created_at->format('d-m-Y') }}</p>
                                                    @if ($items->email)
                                                        <p><strong>Email :</strong> {{ $items->email }}</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-slot name="scripts">
    <script>
        const emailCheckbox = document.getElementById('emailCheckbox');
        const emailInput = document.getElementById('emailInput');

        // Event listener untuk checkbox
        emailCheckbox.addEventListener('change', function() {
            if (this.checked) {
                emailInput.style.display = 'block'; // Tampilkan input email
            } else {
                emailInput.style.display = 'none'; // Sembunyikan input email
            }
        });

        const pengajuanSelect = document.getElementById('pengajuanSelect');
        const dokumenInput = document.getElementById('dokumenInput');

        // Event listener untuk menampilkan input dokumen lainnya
        pengajuanSelect.addEventListener('change', function() {
            if (this.value === 'Dokumen Lainnya') {
                dokumenInput.style.display = 'block'; // Tampilkan input dokumen lainnya
            } else {
                dokumenInput.style.display = 'none'; // Sembunyikan input jika bukan 'Dokumen Lainnya'
            }
        });
    </script>
</x-slot>
