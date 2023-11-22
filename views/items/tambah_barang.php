<?php include("../../layout/header.php") ?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 90vh; margin-top: 1rem; margin-bottom: 1rem;">
        <div class="col-md-6">
            <div class="card shadow p-3">
                <div class="d-flex justify-content-between">
                    <h3 class="text-center">Input Barang</h3>
                    <a href="<?= base_url ?>/views/items/items.php" class="btn-close bg-danger p-2"></a>
                </div>
                <hr>

                <div class="d-grid justify-content-center">
                    <img src="<?= base_url ?>assets/no_image_startup.png" alt="No Image" style="width: 12rem;" id="photo_barang">
                </div>

                <form action="<?= base_url ?>controller/ItemController.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="rute" id="rute" value="tambah_barang">
                    <div class="form-group mb-3">
                        <label for="photo">Foto Barang</label>
                        <input type="file" class="form-control" name="photo" id="photo" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="item_code">Kode Barang</label>
                        <input type="text" class="form-control" name="item_code" id="item_code" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Nama Barang</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="qty">Stok</label>
                        <input type="number" class="form-control" name="qty" id="qty">
                    </div>
                    <div class="form-group mb-3">
                        <label for="purchase_price">Harga Beli</label>
                        <input type="number" class="form-control" name="purchase_price" id="purchase_price">
                    </div>
                    <div class="form-group mb-3">
                        <label for="sell_price">Harga Jual</label>
                        <input type="number" class="form-control" name="sell_price" id="sell_price">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" name="tambah">Submit</button>
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
        $.ajax({
            url: `<?= base_url ?>controller/ItemController.php`,
            method: 'POST',
            data: {
                rute: 'tampil_data_item',
            },
            success: function(res) {
                const data = JSON.parse(res)
                $('#item_code').val(`BRG${data.length+1}`)
                // console.log(data.length);
            },
            error: function(err) {
                console.error(err)
            }
        })
    })
</script>

<?php include("../../layout/footer.php") ?>