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
      $this->db->query('INSERT INTO bizusers (bizname, biz_dsc, bizphone, email, category, bizaddress, bizpassword, status, renew, user_type) 
      VALUES (:name, :biz_dsc, :phone, :email, :category, :address, :password, :status, :renew, :user_type)');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':category', $data['category']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':password', $data['password']);     
      $this->db->bind(':biz_dsc', $data['biz_dsc']);
      $this->db->bind(':status', 'freeTrial');
      $this->db->bind(':renew', $renew_date);
      $this->db->bind(':user_type', $data['user_type']);
      
      //Execute

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

     public function updateProfile($data){
     
      // Prepare Query
      $this->db->query('UPDATE bizusers SET biz_dsc = :dsc, bizphone = :phone, email = :email, bizaddress = :address WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':dsc', $data['dsc']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':address', $data['address']);
    
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find USer BY Phone
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
    //compare user email with userphone
     public function compareUserPhoneAndEmail($phone,$email){
      $this->db->query("SELECT * FROM bizusers WHERE bizphone = :phone");
      $this->db->bind(':phone', $phone);

      $row = $this->db->single();

      //Check Rows
      if($row->email == $email){
        return true;
      } else {
        return false;
      }
    }

    // Find USer BY Email
    public function findUserByEmail($email){
      $this->db->query("SELECT * FROM bizusers WHERE email = :email");
      $this->db->bind(':email', $email);

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
    public function login($phone, $email, $password){
      $this->db->query("SELECT * FROM bizusers WHERE bizphone = :phone OR email = :email");
      $this->db->bind(':phone', $phone);
      $this->db->bind(':email', $email);
      $row = $this->db->single();
      
      $hashed_password = $row->bizpassword;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }


    public function updatePassword($new){
      $this->db->query('UPDATE bizusers SET bizpassword = :password  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':password', $new);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updatePassword2($new){
      $this->db->query('UPDATE bizusers SET bizpassword = :password  WHERE bizphone = :id');

      // Bind Values
      $this->db->bind(':id', $_SESSION['phone']);
      $this->db->bind(':password', $new);
  
      //Execute
      if($this->db->execute()){
        return true;
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
    public function getInfo($t_id){
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

    //update business logo
     public function edit_pic($data){
      // Prepare Query
      $this->db->query('UPDATE bizusers SET logo = :img WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':img', $data['image']);
      
      //Execute
      if($this->db->execute()){
        return true;
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

    public function expired($id){
      // Prepare Query
      $this->db->query('UPDATE bizusers SET status = :status, renew = :renew WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':status', 'expired');
      $this->db->bind(':renew', '');
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //gets all customers by phone number
    public function get_customers(){
      $this->db->query("SELECT DISTINCT(customer_phone) FROM invoicing WHERE biz_id = :id ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    public function get_customersName($phone){
      $this->db->query("SELECT customer_name FROM invoicing WHERE customer_phone = :phone ORDER BY id DESC");
      $this->db->bind(':phone', $phone);
      $result = $this->db->single();
      return $result;
    }
    public function get_customersAddress($phone){
      $this->db->query("SELECT customer_address FROM invoicing WHERE customer_phone = :phone ORDER BY id DESC");
      $this->db->bind(':phone', $phone);
      $result = $this->db->single();
      return $result;
    }

    public function get_history($phone){
      $this->db->query("SELECT DISTINCT(t_id) FROM invoicing WHERE customer_phone = :phone ORDER BY id DESC");
      $this->db->bind(':phone', $phone);
      $results = $this->db->resultset();
      return $results;
    }







  }