<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Data User</h3>
                    <div class="mx-auto"></div>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary waves-effect waves-light"><i
                            data-feather="plus-circle"></i> Tambah
                        User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Users</td>
                                    <td>User@gmail.com</td>
                                    <td>Admin</td>
                                    <td>
                                        <a href="{{ route('admin.user.edit') }}"
                                            class="btn btn-sm btn-outline-warning waves-effect waves-light"><i
                                                data-feather="edit"></i></a>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger waves-effect waves-light"><i
                                                data-feather="trash-2"></i></button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary waves-effect waves-light"><i
                                                data-feather="eye"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
    </div>
</div>
