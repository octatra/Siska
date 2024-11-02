<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Data Mahasiswa</h3>
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
                    <a href="{{ route('admin.mahasiwa.create') }}" class="btn btn-sm btn-primary ms-3">
                        <i data-feather="plus-circle"></i> Tambah Mahasiswa
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIM / Email</th>
                                    <th>Program Studi</th>
                                    <th>Tahun Angakatan</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $indeks => $items)
                                    <tr>
                                        <th scope="row">{{ $indeks + 1 }}</th>
                                        <td>{{ $items->name }}</td>
                                        <td>{{ $items->nim ?? $items->email }}</td>
                                        <td>{{ $items->program_studi ?? '-' }}</td>
                                        <td>{{ $items->tahun_angkatan }}</td>
                                        <td>
                                            <a href="{{ route('admin.mahasiwa.edit', ['id' => $items->id]) }}"
                                                class="btn btn-sm btn-outline-warning waves-effect waves-light"><i
                                                    data-feather="edit"></i></a>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger waves-effect waves-light"><i
                                                    data-feather="trash-2"></i></button>
                                            {{-- <button type="button"
                                            class="btn btn-sm btn-outline-primary waves-effect waves-light"><i
                                                data-feather="eye"></i></button> --}}
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
