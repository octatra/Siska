<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Pengajuan Yang Diterima</h3>
                    <div class="mx-auto"></div>

                    <!-- Form Search -->
                    <form method="GET" class="d-flex align-items-center" style="width: 300px;">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari Mahasiswa..."
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="search"></i>
                            </button>
                        </div>
                    </form>
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
                                                    class="btn btn-md btn-outline-primary waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#rubahStatus{{ $items->id }}">Cek
                                                    Pengajuan</button>
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
                                    <div id="rubahStatus{{ $items->id }}" class="modal fade" tabindex="-1"
                                        aria-labelledby="rubahStatusLabel{{ $items->id }}" aria-hidden="true"
                                        data-bs-scroll="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rubahStatusLabel{{ $items->id }}">
                                                        Rubah Status Pengajuan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form wire:submit.prevent="update({{ $items->id }})" method="POST">
                                                    <div class="modal-body">
                                                        <p><strong>Jenis Pengajuan :</strong>
                                                            {{ $items->jenis_pengajuan }}</p>
                                                        <p><strong>Tujuan Pengajuan :</strong>
                                                            {{ $items->tujuan_pengajuan }}</p>
                                                        <p><strong>Tanggapan :</strong>
                                                            {{ $items->tanggapan ?? '-' }}
                                                        </p>
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
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Pilih
                                                                Status</label>
                                                            <select wire:model="status" class="form-select" required>
                                                                <option value="" hidden>Pilih Status...
                                                                </option>
                                                                <option value="Diterima">Diterima</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                            </select>
                                                            @error('status')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="tanggapan">Tanggapan</label>
                                                            <textarea id="tanggapan" wire:model="tanggapan" class="form-control" rows="4" required></textarea>
                                                            @error('tanggapan')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Simpan</button>
                                                    </div>
                                                </form>
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

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('statusUpdated', () => {
            var modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                // Hide the modal if open
                if (modal.classList.contains('show')) {
                    var modalInstance = bootstrap.Modal.getInstance(modal);
                    modalInstance.hide();
                }
            });
        });
    });
</script>
