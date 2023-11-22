<?php
include('../config/config.php');
include('../model/ItemModel.php');

$c = new ItemModel;
switch ($_POST['rute']) {
    // Bagian Items
  case 'tambah_barang':
    $data = [
      'item_code' => $_POST['item_code'],
      'name' => $_POST['name'],
      'stock' => $_POST['qty'],
      'purchase_price' => $_POST['purchase_price'],
      'sell_price' => $_POST['sell_price'],
      'photo' => $_FILES['photo']['name']
    ];
    $c->storeToItem($data);
    header("location:" . base_url . "views/items/items.php");
    break;

  case 'tampil_data_item':
    $data = $c->getAllDataItems();
    echo json_encode($data);
    break;

  case 'hapus_data_item':
    $data = $c->hapusDataItem($_POST['id']);
    header("location:" . base_url . "views/items/items.php");
    break;

  case 'update_data_barang':
    $data = [
      'id' => $_POST['id'],
      'name' => $_POST['name'],
      'stock' => $_POST['stock'],
      'purchase_price' => $_POST['purchase_price'],
      'sell_price' => $_POST['sell_price'],
    ];
    $c->updateToItem($data);
    header("location:" . base_url . "views/items/items.php");
    break;

  case 'data_single_barang':
    $data = $c->getDataItemsRow($_POST['id']);
    echo json_encode($data);
    break;

    // Print
  case 'print_selection':
    $data = $c->getDataItemsRowByCode($_POST['kode_barang']);
    echo json_encode($data);
    break;
}
