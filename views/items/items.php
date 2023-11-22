<?php include('../../layout/header.php') ?>
<div class="container">
  <div class="row mt-2">
    <div class="col-lg">
      <h4 class="text-center">Tabel Items</h4>
      <hr>
      <div class="d-flex gap-3 mb-3">
        <a href="<?= base_url ?>views/items/tambah_barang.php" class="btn btn-sm btn-success">Tambah Data</a>
        <button class="btn btn-sm btn-secondary" onclick="tampil_print()">Print All</button>
        <div class="input-group" style="width: 15rem;">
          <input type="text" name="print_one" id="print_one" class="form-control">
          <button class="input-group-text bg-secondary text-white" id="print_selection">Print</button>
        </div>
      </div>
      <div id="tabel_barang">
        <table class="table table-responsive table-stripped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>QTY</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Foto</th>
              <th>Action</th>
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
    $('#print_selection').click(function() {
      let data = $('#print_one').val()
      print_satuan(data)
    })

    load_data()

    function load_data() {
      $.ajax({
        url: `<?= base_url ?>controller/ItemController.php`,
        method: 'POST',
        data: {
          rute: 'tampil_data_item',
        },
        success: function(res) {
          let html;
          const data = JSON.parse(res)
          $('#item_code').val(`BRG${data.length+1}`)
          // console.log(data.length);
          data.forEach((item, index) => {
            html += `<tr>
              <td>${index+1}</td>
              <td>${item.item_code}</td>
              <td>${item.name}</td>
              <td>${item.stock}</td>
              <td>Rp. ${Intl.NumberFormat('id-ID').format(item.purchase_price)}</td>
              <td>Rp. ${Intl.NumberFormat('id-ID').format(item.sell_price)}</td>
              <td>
                <img src="<?= base_url ?>assets/upload/${item.photo}" alt="Photo of ${item.name}" style="width: 12rem;">
              </td>
              <td>
                <a href='<?= base_url ?>views/items/edit_barang.php?id=${item.id}' class='btn btn-sm btn-warning'>Edit</a>
                <a class='btn btn-sm btn-danger' onclick="handleDelete(${item.id})">Delete</a>
              </td>
              </tr>`
          })
          $('#canvas').html(html)
        },
        error: function(err) {
          console.error(err)
        }
      })
    }


  })

  function tampil_print() {
    let body = document.body.innerHTML
    let tabel = document.getElementById('tabel_barang').innerHTML
    const htmlPrint = `
    <center>
    <h3>Tabel Barang</h3>
    <hr>
    <table>
    ${tabel}
    </table>
    </center>
    `
    document.body.innerHTML = htmlPrint
    window.print()
    document.body.innerHTML = body
  }

  function print_satuan(data) {
    $.ajax({
      url: `<?= base_url ?>controller/ItemController.php`,
      method: 'POST',
      data: {
        rute: 'print_selection',
        kode_barang: data
      },
      success: function(res) {
        const item = JSON.parse(res)
        const body = document.body.innerHTML
        const htmlPrint = `
        <center>
          <h3>Tabel Barang Satuan</h3>
        </center>
        <hr>
        <table>
          <tbody>
            <tr>
              <th>Kode Barang</th>
              <th>:</th>
              <th>${item.item_code}</th>
            </tr>
            <tr>
              <th>Nama Barang</th>
              <th>:</th>
              <th>${item.name}</th>
            </tr>
            <tr>
              <th>Stok Barang</th>
              <th>:</th>
              <th>${item.stock}</th>
            </tr>
            <tr>
              <th>Harga Beli</th>
              <th>:</th>
              <th>Rp. ${Intl.NumberFormat('id-ID').format(item.purchase_price)}</th>
            </tr>
            <tr>
              <th>Harga Jual</th>
              <th>:</th>
              <th>Rp. ${Intl.NumberFormat('id-ID').format(item.sell_price)}</th>
            </tr>
          </tbody>
        </table>
        `
        document.body.innerHTML = htmlPrint
        window.print()
        document.body.innerHTML = body
      },
      error: function(err) {
        console.error(err)
      }
    })

  }

  function handleDelete(x) {
    if (confirm("Apakah anda yakin ingin menghapus data ini?") == true) {
      $.ajax({
        url: `<?= base_url ?>controller/ItemController.php`,
        method: 'POST',
        data: {
          rute: 'hapus_data_item',
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