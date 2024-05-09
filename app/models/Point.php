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

    



  }