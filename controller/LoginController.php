<?php
include('../config/config.php');
include('../model/LoginModel.php');

$c = new LoginModel;

switch ($_POST['rute']) {
    case 'cek_login':
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        ];
        $c->cekLogin($data);
        break;

    case 'logout':
        session_unset();
        break;
}
