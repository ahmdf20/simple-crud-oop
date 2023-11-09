<?php

require('../model/Model.php');

$c = new Model;
switch ($_POST['rute']) {
  case 'tambah_user':
    $data = [
      'username' => $_POST['username'],
      'password' => $_POST['password'],
      'roles' => $_POST['roles']
    ];
    $c->storeToUser($data);
    header("location:../index.php");
    break;
  case 'tambah_barang':
    break;

  case 'tampil_data_user':
    $data = $c->getAllDataUsers();
    $html;
    foreach ($data as $key => $user) {
      $html = "<tr>
      <td>" . $key + 1 . "</td>
      <td>" . $user['username'] . "</td>
      <td>" . $user['roles'] . "</td>
      <td>
        <a class='btn btn-sm btn-warning' onclick='handleEdit(" . $user['id'] . ")'>Edit</a>
        <a class='btn btn-sm btn-danger' onclick='handleDelete(" . $user['id'] . ")'>Hapus</a>
      </td>
      </tr>";
      echo $html;
    };
    break;

  case 'hapus_data_user':
    $c->hapusDataUser($_POST['id']);
    header("location:../index.php");
    break;
}
