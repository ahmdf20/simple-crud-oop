<?php include('../../layout/header.php') ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card shadow p-3">
                <h3 class="text-center">Input Akun</h3>
                <hr>
                <form action="<?= base_url ?>controller/UserController.php" method="post">
                    <input type="hidden" name="rute" id="rute" value="tambah_user">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="roles">Roles</label>
                        <select name="roles" id="roles" class="form-control">
                            <option value="Admin">Administrator</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" name="tambah">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow p-3">
                <h4 class="text-center">Tabel Users</h4>
                <hr>
                <table class="table table-stripped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="canvas">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: `<?= base_url ?>controller/UserController.php`,
            method: 'POST',
            data: {
                rute: 'tampil_data_user',
            },
            success: function(res) {
                let html;
                const data = JSON.parse(res)
                data.forEach((user, index) => {
                    html += `<tr>
            <td>${index+1}</td>
            <td>${user.username}</td>
            <td>${user.roles}</td>
            <td>
            <a href='<?= base_url ?>views/users/edit_user.php?id=${user.id}' class='btn btn-sm btn-warning'>Edit</a>
            <a class='btn btn-sm btn-danger' onclick="handleDelete(${user.id})">Delete</a>
            </td>
            </tr>`
                })
                $('#canvas').html(html)
            },
            error: function(err) {
                console.error(err)
            }
        })

    })

    function handleDelete(x) {
        if (confirm("Apakah anda yakin ingin menghapus data ini?") == true) {
            $.ajax({
                url: `<?= base_url ?>controller/UserController.php`,
                method: 'POST',
                data: {
                    rute: 'hapus_data_user',
                    id: x
                },
                success: function(res) {
                    location.reload()
                },
                error: function(err) {
                    console.error(err)
                }
            })
        }
    }
</script>
<?php include('../../layout/footer.php') ?>