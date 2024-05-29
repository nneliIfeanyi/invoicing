<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // $next_sev_days = strtotime("+7 days");
      // $renew_date = date('Y-m-d h:ia', $next_sev_days);
      // Prepare Query
      $this->db->query('INSERT INTO bizusers (bizname, biz_dsc, bizphone, email, category, bizaddress, bizpassword, user_type, points, refered_by) 
      VALUES (:name, :biz_dsc, :phone, :email, :category, :address, :password, :user_type, :points, :refered_by)');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':category', $data['category']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':password', $data['password']);     
      $this->db->bind(':biz_dsc', $data['biz_dsc']);
      $this->db->bind(':user_type', $data['user_type']);
      $this->db->bind(':points', '25');
      $this->db->bind(':refered_by', $data['refered_by']);
      
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

     // Find USer BY Email
    public function load_referals($ref_id){
      $this->db->query("SELECT * FROM bizusers WHERE refered_by = :id ORDER BY id DESC;");
      $this->db->bind(':id', $ref_id);
      $results = $this->db->resultset();
      return $results;
    }

    public function referals_count($ref_id){
      $this->db->query("SELECT * FROM bizusers WHERE refered_by = :id ORDER BY id DESC;");
      $this->db->bind(':id', $ref_id);
      $this->db->resultset();
      if($this->db->rowCount() > 0){
          return $this->db->rowCount();
        } else {
          return false;
      }
    }



    public function true_claim($id){
      $this->db->query('UPDATE bizusers SET claimed = :trues  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':trues', 'true');
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
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


     public function getUserByRefId($id){
      $this->db->query("SELECT * FROM bizusers WHERE ref_id = :id");
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

    //This gets uniqe information from the transaction
    public function getInfoz($t_id){
      $this->db->query("SELECT * FROM customers WHERE t_id = :t_id");
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


     public function page_visit_count($page){
     $date = date('Y-m-d h:ia');
      // Prepare Query
      $this->db->query('INSERT INTO visits (user_id, page_name, count, vdate) 
      VALUES (:id, :page, :count, :vdate)');

      // Bind Values
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':page', $page);
      $this->db->bind(':count', '');
      $this->db->bind(':vdate', $date);
      
      //Execute

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function get_page_visits($page){
      $this->db->query("SELECT * FROM visits WHERE user_id = :id AND page_name = :page");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':page', $page);
      $result = $this->db->single();
      return $result;
    }



    public function updateVisit($page,$count){
      // Prepare Query
      $this->db->query('UPDATE visits SET count = :count WHERE user_id = :id AND page_name = :page');

      // Bind Values
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':page', $page);
      $this->db->bind(':count', $count);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function get_my_refs($ref_id){
      $this->db->query("SELECT * FROM bizusers WHERE refered_by = :ref_id ");
      $this->db->bind(':ref_id', $ref_id);
      $results = $this->db->resultset();
      return $results;
    }

    public function get_my_refs_count($ref_id){
      $this->db->query("SELECT * FROM bizusers WHERE refered_by = :ref_id ");
      $this->db->bind(':ref_id', $ref_id);
      $this->db->resultset();
      if($this->db->rowCount() > 0){
        return $this->db->rowCount();
      } else {
        return false;
      }
    }







public function deleteEmpty(){
  // Prepare Query
  $this->db->query("DELETE FROM inventory WHERE qty = '' AND rate = '' AND dsc = '' ");
  
  //Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

public function deleteEmpty2(){
  // Prepare Query
  $this->db->query("DELETE FROM inventory2 WHERE qty = '' AND rate = '' AND dsc = '' ");
  
  //Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}


public function real_id_update(){
  // Prepare Query
  $this->db->query("UPDATE inventory SET real_id = :old WHERE real_id = :previous;");
  $this->db->bind(':old', 'old');
  $this->db->bind(':previous', 'previous');
  //Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}



 public function addGoods($data){
    // Prepare Query
    $this->db->query('INSERT INTO inventory (user_id, name, rate, qty, amount) 
    VALUES (:user_id, :name, :rate, :qty, :amount)');

    // Bind Values
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':rate', $data['rate']);
    $this->db->bind(':qty', $data['qty']);
    $this->db->bind(':amount', $data['amount']);
    
    //Execute

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function addGoods3($data){
    // Prepare Query
    $this->db->query('INSERT INTO inventory (user_id, name, rate, qty, amount, i_month, i_year, real_id) 
    VALUES (:user_id, :name, :rate, :qty, :amount, :i_month, :i_year, :real_id)');

    // Bind Values
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':rate', $data['rate']);
    $this->db->bind(':qty', $data['qty']);
    $this->db->bind(':amount', $data['amount']);
     $this->db->bind(':i_month', $data['i_month']);
      $this->db->bind(':i_year', $data['i_year']);
       $this->db->bind(':real_id', $data['real_id']);
    
    //Execute

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }





  public function addGoods2($data){
    // Prepare Query
    $this->db->query('INSERT INTO inventory2 (user_id, name, rate, qty, amount) 
    VALUES (:user_id, :name, :rate, :qty, :amount)');

    // Bind Values
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':rate', $data['rate']);
    $this->db->bind(':qty', $data['qty']);
    $this->db->bind(':amount', $data['amount']);
    
    //Execute

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }







  public function loadGoods(){
    $this->db->query("SELECT * FROM inventory WHERE user_id = :id AND real_id = :previous ORDER BY id DESC;");
    $this->db->bind(':id', $_SESSION['user_id']);
     $this->db->bind(':previous', 'previous');
    $results = $this->db->resultset();
    return $results;
  }




  public function getCapital(){
    $this->db->query("SELECT SUM(amount) FROM inventory WHERE user_id = :id AND real_id = :previous;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':previous', 'previous');
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }



  public function getStock(){
    $this->db->query("SELECT SUM(qty) FROM inventory WHERE user_id = :id AND real_id = :previous;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':previous', 'previous');
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }


 // Find User By ID
    public function getProductById($id){
      $this->db->query("SELECT * FROM inventory2 WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }


 // Update Post
    public function editProduct($data){
      // Prepare Query
      $this->db->query('UPDATE inventory2 SET qty = :qty, name = :dsc, rate = :rate, amount = :amount WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':qty', $data['qty']);
      $this->db->bind(':dsc', $data['dsc']);
      $this->db->bind(':rate', $data['rate']);
    
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }



    public function activate($id){
      $this->db->query('UPDATE bizusers SET inventory = :trues  WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      $this->db->bind(':trues', 'true');
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }













}