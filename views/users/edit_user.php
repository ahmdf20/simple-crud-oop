  <?php include('../../layout/header.php') ?>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <div class="card shadow p-3">
          <h3 class="text-center">Edit Data</h3>
          <hr>
          <form action="<?= base_url ?>controller/UserController.php" method="post">
            <input type="hidden" name="rute" id="rute" value="update_data_user">
            <input type="hidden" name="id" id="id">
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
            <div class="d-grid gap-3">
              <button class="btn btn-success" name="tambah">Submit</button>
              <a href="<?= base_url ?>views/users/users.php" class="btn btn-danger">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      const urlParam = new URLSearchParams(window.location.search)
      $.ajax({
        url: `<?= base_url ?>controller/UserController.php`,
        method: 'POST',
        data: {
          rute: 'data_single_user',
          id: urlParam.get('id')
        },
        success: function(res) {
          const data = JSON.parse(res)
          $('#username').val(data.username)
          $('#id').val(urlParam.get('id'))
        },
        error: function(err) {
          console.error(err)
        }
      })
    })
  </script>

  <?php include('../../layout/footer.php') ?>