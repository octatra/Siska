<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                    <form id="pristine-valid-example" novalidate method="post">
                        <div class="form-group">
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" required data-pristine-required-message="Please Enter a username"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group mb-3">
                                <label>Username (required)</label>
                                <input type="email" required data-pristine-required-message="Please Enter a username"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group mb-3">
                                <label>Password (required)</label>
                                <input type="password" id="pwd" required
                                    data-pristine-required-message="Please Enter a password"
                                    data-pristine-pattern= "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/"
                                    data-pristine-pattern-message="Minimum 8 characters, at least one uppercase letter, one lowercase letter and one number"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select">
                                <option hidden>Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
