  <?php include('../../layout/header.php') ?>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <div class="card shadow p-3">
          <h3 class="text-center">Edit Data</h3>
          <hr>

          <div class="d-grid justify-content-center">
            <img alt="No Image" style="width: 12rem;" id="photo_barang">
          </div>

          <form action="<?= base_url ?>controller/Controller.php" method="post">
            <input type="hidden" name="rute" id="rute" value="update_data_barang">
            <input type="hidden" name="id" id="id">
            <div class="form-group mb-3">
              <label for="photo">Foto Barang</label>
              <input type="file" class="form-control" name="photo" id="photo">
            </div>
            <div class="form-group mb-3">
              <label for="kode_barang">Kode Barang</label>
              <input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly>
            </div>
            <div class="form-group mb-3">
              <label for="name">Nama Barang</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group mb-3">
              <label for="stock">Stok</label>
              <input type="number" class="form-control" name="stock" id="stock">
            </div>
            <div class="form-group mb-3">
              <label for="purchase_price">Harga Beli</label>
              <input type="number" class="form-control" name="purchase_price" id="purchase_price">
            </div>
            <div class="form-group mb-3">
              <label for="sell_price">Harga Jual</label>
              <input type="number" class="form-control" name="sell_price" id="sell_price">
            </div>
            <div class="d-grid gap-3">
              <button class="btn btn-success" name="edit">Submit</button>
              <a href="<?= base_url ?>/views/items/items.php" class="btn btn-danger">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    const canvasImg = document.getElementById('photo_barang')
    const photo = document.getElementById('photo')
    photo.addEventListener('change', (e) => {
      canvasImg.src = URL.createObjectURL(photo.files[0])
    })
    $(document).ready(function() {
      const urlParam = new URLSearchParams(window.location.search)
      $.ajax({
        url: `<?= base_url ?>controller/ItemController.php`,
        method: 'POST',
        data: {
          rute: 'data_single_barang',
          id: urlParam.get('id')
        },
        success: function(res) {
          const data = JSON.parse(res)
          $('#photo_barang').attr("src", `<?= base_url ?>assets/upload/${data.photo}`)
          // $('#photo').val(data.photo)
          $('#kode_barang').val(data.item_code)
          $('#name').val(data.name)
          $('#stock').val(data.stock)
          $('#purchase_price').val(data.purchase_price)
          $('#sell_price').val(data.sell_price)
          $('#id').val(urlParam.get('id'))
        },
        error: function(err) {
          console.error(err)
        }
      })
    })
  </script>

  <?php include('../../layout/footer.php') ?>