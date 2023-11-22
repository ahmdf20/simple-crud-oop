<?php
include("../config/config.php");
require("../model/Model.php");

$c = new Model;

switch ($_POST['rute']) {
  case 'tambah_user':
    $data = [
      'username' => $_POST['username'],
      'password' => $_POST['password'],
      'roles' => $_POST['roles']
    ];
    $c->storeToUser($data);
    header("location:" . base_url . "views/users/users.php");
    break;

  case 'tampil_data_user':
    $data = $c->getAllDataUsers();
    echo json_encode($data);
    break;

  case 'hapus_data_user':
    $c->hapusDataUser($_POST['id']);
    header("location:" . base_url . "views/users/users.php");
    break;

  case 'data_single_user':
    $data = $c->getDataUsersRow($_POST['id']);
    echo json_encode($data);
    break;

  case 'update_data_user':
    $data = [
      'id' => $_POST['id'],
      'username' => $_POST['username'],
      'password' => $_POST['password'],
      'roles' => $_POST['roles']
    ];
    $c->updateToUser($data);
    header("location:" . base_url . "views/users/users.php");
    break;
}
