<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Form Survei</h3>
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
                    <a href="{{ route('admin.form-survei.create') }}" class="btn btn-sm btn-primary ms-3">
                        <i data-feather="plus-circle"></i> Tambah Mahasiswa
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Priode Survei</th>
                                    <th>Jumlah Pertanyaan</th>
                                    <th>Ditujukan Untuk</th>
                                    <th>Status</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $indeks => $items)
                                    <tr>
                                        <th scope="row">{{ $indeks + 1 }}</th>
                                        <td>
                                            {{ $items->priode_survei }}
                                        </td>
                                        <td>
                                            10
                                        </td>
                                        <td>
                                            {{ $items->target_survei }}
                                        </td>
                                        <td>
                                            {{ $items->status_survei }}
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{ route('admin.form-survei.detail', ['id' => $items->id]) }}"
                                                    class="btn btn-sm btn-outline-primary waves-effect waves-light"><i
                                                        data-feather="eye"></i></a>
                                            </div> <!-- end preview-->

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
