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
            <a class="nav-link" aria-current="page" href="#">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Items</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <div class="card shadow p-3">
          <h3 class="text-center">Edit Data</h3>
          <hr>
          <form action="../controller/Controller.php" method="post">
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
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>