<?php

include("../core/Database.php");

class ItemModel extends Database
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllDataItems()
  {
    $this->db->query("SELECT * FROM items");
    return $this->db->resultSet();
  }

  public function storeToItem($data)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $x = explode('.', $data['photo']);
    $extension = strtolower(end($x));
    for ($i = 0; $i < 20; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    $file_tmp = $_FILES['photo']['tmp_name'];
    $new_photo = "$randomString.$extension";
    move_uploaded_file($file_tmp, "../assets/upload/$new_photo");
    // var_dump($new_photo);
    // die();

    $query = "INSERT INTO items VALUES (null, :item_code, :nama_barang, :stock, :purchase_price, :sell_price, :photo)";
    $this->db->query($query);
    $this->db->bind('item_code', $data['item_code']);
    $this->db->bind('nama_barang', $data['name']);
    $this->db->bind('stock', $data['stock']);
    $this->db->bind('purchase_price', $data['purchase_price']);
    $this->db->bind('sell_price', $data['sell_price']);
    $this->db->bind('photo', $new_photo);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataItem($id)
  {
    $this->db->query("SELECT * FROM items WHERE id=:id");
    $this->db->bind('id', $id);
    $item = $this->db->single();
    $imgPath = "../assets/upload/" . $item['photo'];
    unlink($imgPath);
    $this->db->query("DELETE FROM items WHERE id=:id");
    $this->db->bind('id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getDataItemsRow($id)
  {
    $this->db->query("SELECT * FROM items WHERE id=:id");
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function updateToItem($data)
  {
    $query = "UPDATE items SET name=:nama_barang, stock=:stock, purchase_price=:purchase_price, sell_price=:sell_price WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('nama_barang', $data['name']);
    $this->db->bind('stock', $data['stock']);
    $this->db->bind('purchase_price', $data['purchase_price']);
    $this->db->bind('sell_price', $data['sell_price']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getDataItemsRowByCode($data)
  {
    $this->db->query("SELECT * FROM items WHERE item_code=:item_code");
    $this->db->bind('item_code', $data);
    return $this->db->single();
  }
}
