<?php
  class Point {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }


     


    public function use3($value){
      $this->db->query('UPDATE bizusers SET points = :points  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':points', $value);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function sell3($amount, $email){
      $this->db->query('UPDATE bizusers SET points = :points  WHERE email = :email');

      // Bind Values
      $this->db->bind(':email', $email);
      $this->db->bind(':points', $amount);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function use300($value){
      $this->db->query('UPDATE bizusers SET points = :points  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':points', $value);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function addPoints($id, $value){
      $this->db->query('UPDATE bizusers SET points = :points  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':points', $value);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


     public function makeAgent($id){
      $this->db->query('UPDATE bizusers SET user_type = :user_type  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':user_type', 'marketer');
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function ref_code_gen($id, $value){
      $this->db->query('UPDATE bizusers SET ref_id = :ref_id  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':ref_id', $value);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    



  }