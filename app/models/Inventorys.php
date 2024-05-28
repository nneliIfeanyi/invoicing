<?php
  class Inventorys {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

   

  //Function One === Get today's sales

  public function get_today(){
  $today = date('D').' '.date('jS');
    $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND t_date = :today ORDER BY id DESC");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':today', $today);
    $results = $this->db->resultset();
    return $results;
  }




  public function get_amount_sold(){
    $today = date('D').' '.date('jS');
    $this->db->query("SELECT SUM(amount) FROM transactions WHERE biz_id = :id AND t_date = :today;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':today', $today);
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }



  public function num_goods_sold(){
    $today = date('D').' '.date('jS');
    $this->db->query("SELECT SUM(qty) FROM transactions WHERE biz_id = :id AND t_date = :today;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':today', $today);
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }



  public function add_transaction($data){
      // Prepare Query
      $this->db->query('INSERT INTO transactions (biz_id, t_id, qty, dsc, rate, amount, t_date, t_month, t_year, t_time) 
      VALUES (:biz_id, :t_id, :qty, :dsc, :rate, :amt, :c_date, :c_month, :c_year, :c_time)');

      // Bind Values
      $this->db->bind(':biz_id', $data['biz_id']);
      $this->db->bind(':t_id', $data['t_id']);
      $this->db->bind(':qty', $data['qty']);
      $this->db->bind(':dsc', $data['dsc']);
      $this->db->bind(':rate', $data['rate']);
      $this->db->bind(':amt', $data['amt']);
      $this->db->bind(':c_date', $data['c_date']);
      $this->db->bind(':c_month', $data['c_month']);
      $this->db->bind(':c_year', $data['c_year']);
      $this->db->bind(':c_time', $data['c_time']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


 


    public function add_customer($data){
      // Prepare Query
      $this->db->query('INSERT INTO customers (biz_id, t_id, name, address, phone, paid, t_total, t_date, t_month, t_year, t_time) 
      VALUES (:biz_id, :t_id, :customer_name, :customer_address, :customer_phone, :paid, :total, :c_date, :c_month, :c_year, :c_time)');

      // Bind Values
      $this->db->bind(':biz_id', $data['biz_id']);
      $this->db->bind(':t_id', $data['t_id']);
      $this->db->bind(':customer_name', $data['customer_name']);
      $this->db->bind(':customer_address', $data['customer_address']);
      $this->db->bind(':customer_phone', $data['customer_phone']);
      $this->db->bind(':paid', $data['paid']);
      $this->db->bind(':total', $data['total']);
      $this->db->bind(':c_date', $data['c_date']);
      $this->db->bind(':c_month', $data['c_month']);
      $this->db->bind(':c_year', $data['c_year']);
      $this->db->bind(':c_time', $data['c_time']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }





    public function deleteEmpty(){
      // Prepare Query
      $this->db->query("DELETE FROM transactions WHERE qty = '' AND rate = '' AND dsc = '' ");
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }








  public function loadGoods(){
    $this->db->query("SELECT * FROM inventory2 WHERE user_id = :id ORDER BY id DESC;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $results = $this->db->resultset();
    return $results;
  }




  public function getCapital(){
    $this->db->query("SELECT SUM(amount) FROM inventory2 WHERE user_id = :id;");
    $this->db->bind(':id', $_SESSION['user_id']);
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }



  public function getStock(){
    $this->db->query("SELECT SUM(qty) FROM inventory2 WHERE user_id = :id;");
    $this->db->bind(':id', $_SESSION['user_id']);
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }





//Update Inventory After Sales
  public function update_inventory($qty,$amt,$dsc){
      // Prepare Query
      $this->db->query('UPDATE inventory2 SET qty = :qty, amount = :amount WHERE name = :dsc');

      // Bind Values
      $this->db->bind(':amount', $amt);
      $this->db->bind(':qty', $qty);
      $this->db->bind(':dsc', $dsc);
    
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }






  public function get_current_month(){
  $current_month = date('M');
    $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND t_month = :current_month ORDER BY id DESC");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':current_month', $current_month);
    $results = $this->db->resultset();
    return $results;
  }




  public function current_month_amount_sold(){
    $current_month = date('M');
    $this->db->query("SELECT SUM(amount) FROM transactions WHERE biz_id = :id AND t_month = :current_month;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':current_month', $current_month);
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }



  public function current_month_num_goods_sold(){
    $current_month = date('M');
    $this->db->query("SELECT SUM(qty) FROM transactions WHERE biz_id = :id AND t_month = :current_month;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':current_month', $current_month);
    //Execute
    $row = $this->db->sumColumn();
    return $row;
  }


}