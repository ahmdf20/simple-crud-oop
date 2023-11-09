<?php

include('../core/Database.php');

class Model extends Database
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllDataUsers()
  {
    $this->db->query("SELECT * FROM users");
    return $this->db->resultSet();
  }

  public function storeToUser($data)
  {
    $query = "INSERT INTO users VALUES (null, :username, :pw, :roles)";
    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('pw', password_hash($data['password'], PASSWORD_DEFAULT));
    $this->db->bind('roles', $data['roles']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataUser($id)
  {
    $query = "DELETE FROM users WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
