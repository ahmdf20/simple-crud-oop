<?php

include("../core/Database.php");
include("../core/Flasher.php");

class LoginModel extends Database
{
    private $db, $f;


    public function __construct()
    {
        session_start();
        $this->f = new Flasher;
        $this->db = new Database;
    }

    public function cekLogin($data = [])
    {
        $this->db->query("SELECT * FROM users WHERE username=:username");
        $this->db->bind('username', $data['username']);

        $user = $this->db->single();
        if (!$user) {
            header("location:" . base_url . "views/auth/login.php");
        }
        if (!password_verify($data['password'], $user['password'])) {
            header("location:" . base_url . "views/auth/login.php");
        }
        $_SESSION['username'] = $user['username'];
        $_SESSION['roles'] = $user['roles'];
        header("location:" . base_url . "index.php");
    }
}
