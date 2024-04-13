<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->db->query('INSERT INTO bizusers (bizname, biz_dsc, bizphone, bizaddress, bizpassword) 
      VALUES (:name, :biz_dsc, :phone, :address, :password)');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':password', $data['password']);     
      $this->db->bind(':biz_dsc', $data['biz_dsc']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find USer BY Email
    public function findUserByPhone($phone){
      $this->db->query("SELECT * FROM bizusers WHERE bizphone = :phone");
      $this->db->bind(':phone', $phone);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login / Authenticate User
    public function login($phone, $password){
      $this->db->query("SELECT * FROM bizusers WHERE bizphone = :phone");
      $this->db->bind(':phone', $phone);

      $row = $this->db->single();
      
      $hashed_password = $row->bizpassword;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find User By ID
    public function getUserById($id){
      $this->db->query("SELECT * FROM bizusers WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }