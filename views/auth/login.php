<?php session_start() ?>
<?php include("../../config/config.php") ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-primary-subtle">
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-lg-5">


        <div class="d-grid justify-content-center mb-3">
          <h3>PT. Toko Sempurna</h3>
          <img src="<?= base_url ?>assets/toko.png" alt="Toko" class="mx-auto" style="width: 12rem;">
        </div>

        <div class="card shadow-lg p-3">
          <h3 class="text-center">Silahkan Login</h3>
          <form action="<?= base_url ?>controller/LoginController.php" method="post">
            <input type="hidden" name="rute" id="rute" value="cek_login">
            <div class="form-group mb-3">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-sm btn-success">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>