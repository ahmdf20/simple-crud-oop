<?php include('../config/config.php') ?>
<?php
session_start();
if ($_SESSION['username'] == null) {
  header("location:" . base_url . "views/auth/login.php");
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">SIMPLE CRUD AHMAD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url ?>index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url ?>views/users/users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url ?>views/items/items.php">Items</a>
          </li>
        </ul>
      </div>
      <div class="float-end">
        <div class="dropdown">
          <button class="btn btn-sm bg-transparent text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['username'] ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" id="btn_logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="d-grid justify-content-center align-items-center" style="height: 80vh;">
    <div class="col-md">
      <h1>Selamat datang <?= $_SESSION['username'] ?>!</h1>
    </div>
  </div>

  <script>
    $('#btn_logout').click(function() {
      if (confirm('Apakah anda ingin logout?')) {
        $.ajax({
          url: `<?= base_url ?>controller/LoginController.php`,
          method: 'POST',
          data: {
            rute: 'logout'
          },
          success: function(res) {
            window.location = `<?= base_url ?>views/auth/login.php`
          },
          error: function(err) {
            console.error(err)
          }
        })
      } else {
        // Nothing
      }
    })
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>