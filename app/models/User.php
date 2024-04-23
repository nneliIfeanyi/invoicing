<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      $next_sev_days = strtotime("+7 days");
      $renew_date = date('Y-m-d h:ia', $next_sev_days);
      // Prepare Query
      $this->db->query('INSERT INTO bizusers (bizname, biz_dsc, bizphone, bizaddress, bizpassword, status, renew) 
      VALUES (:name, :biz_dsc, :phone, :address, :password, :status, :renew)');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':password', $data['password']);     
      $this->db->bind(':biz_dsc', $data['biz_dsc']);
      $this->db->bind(':status', 'monthly');
      $this->db->bind(':renew', $renew_date);
      
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

     // Find USer BY Email
    public function loadUsers(){
      $this->db->query("SELECT * FROM bizusers ORDER BY id DESC;");

      $results = $this->db->resultset();
      return $results;
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

    //This gets uniqe information from the transaction
    public function getCustomerInfo($t_id){
      $this->db->query("SELECT * FROM invoicing WHERE t_id = :t_id");
      $this->db->bind(':t_id', $t_id);

      $row = $this->db->single();
      //Check Rows
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }


    public function updateStatus($id, $length){
      if ($length == 'monthly') {
        $next_month = strtotime("+1 month");
        $renew_date = date('Y-m-d h:ia', $next_month);
      }elseif ($length == 'yearly') {
        $next_year = strtotime("+1 year");
        $renew_date = date('Y-m-d h:ia', $next_year);
      }
      // Prepare Query
      $this->db->query('UPDATE bizusers SET status = :status, renew = :renew WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':status', $length);
      $this->db->bind(':renew', $renew_date);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function freeTrial($id){
      // Prepare Query
      $this->db->query('UPDATE bizusers SET status = :status WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':status', 'freeTrial');
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }









  }