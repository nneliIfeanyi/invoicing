<?php
  class Post {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }


    // NOW NEW



   public function load_date(){
    $this->db->query("SELECT dates FROM dating;");
    $results = $this->db->resultset();
    return $results;
  }

  public function load_day(){
    $this->db->query("SELECT days FROM dating WHERE days != '' ;");
    $results = $this->db->resultset();
    return $results;
  }

  public function load_month(){
    $this->db->query("SELECT months FROM dating WHERE months != '' ;");
    $results = $this->db->resultset();
    return $results;
  }



  public function get_transactionz(){
    $this->db->query("SELECT DISTINCT(t_id) FROM transactions WHERE biz_id = :id ORDER BY id DESC LIMIT 4;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $results = $this->db->resultset();
    return $results;
  }

   public function get_transactionz_rows(){
    $this->db->query("SELECT DISTINCT(t_id) FROM transactions WHERE biz_id = :id ORDER BY id DESC LIMIT 4;");
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->resultset();
    return $this->db->rowCount();
  }


public function doc_edited($t_id){
  $this->db->query('UPDATE customers SET edited = :trues  WHERE t_id = :id');

  // Bind Values
  $this->db->bind(':id', $t_id);
  $this->db->bind(':trues', 'true');

  //Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}



public function doc_download($t_id, $path){
  $this->db->query('UPDATE customers SET initial_doc = :paths  WHERE t_id = :id');

  // Bind Values
  $this->db->bind(':id', $t_id);
  $this->db->bind(':paths', $path);

  //Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}


public function doc_redownload($t_id, $path){
  $this->db->query('UPDATE customers SET edited_doc = :paths  WHERE t_id = :id');

  // Bind Values
  $this->db->bind(':id', $t_id);
  $this->db->bind(':paths', $path);

  //Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

  
// THE YESTERDAY SALES VIEW  //
  public function get_yesterday($day,$month,$year){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_date = :day AND t_month = :month AND t_year = :year ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':day', $day);
       $this->db->bind(':month', $month);
       $this->db->bind(':year', $year);
      $results = $this->db->resultset();
      return $results;
    }

    public function get_yesterday_count($day,$month,$year){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_date = :day AND t_month = :month AND t_year = :year ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':day', $day);
       $this->db->bind(':month', $month);
       $this->db->bind(':year', $year);
       $this->db->resultset();
      return $this->db->rowCount();
    }

    public function get_yesterday_total($day,$month,$year){
      $this->db->query("SELECT SUM(amount) FROM transactions WHERE biz_id = :id  AND t_date = :day AND t_month = :month AND t_year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':day', $day);
       $this->db->bind(':month', $month);
       $this->db->bind(':year', $year);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }
// THE YESTERDAY SALES VIEW  ENDS //





// THE TODAY SALES VIEW  //
  public function get_today($day,$month,$year){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_date = :day AND t_month = :month AND t_year = :year ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':day', $day);
       $this->db->bind(':month', $month);
       $this->db->bind(':year', $year);
      $results = $this->db->resultset();
      return $results;
    }

     public function get_today_count($day,$month,$year){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_date = :day AND t_month = :month AND t_year = :year ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':day', $day);
       $this->db->bind(':month', $month);
       $this->db->bind(':year', $year);
       $this->db->resultset();
      return $this->db->rowCount();
    }

    public function get_today_total($day,$month,$year){
      $this->db->query("SELECT SUM(amount) FROM transactions WHERE biz_id = :id  AND t_date = :day AND t_month = :month AND t_year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':day', $day);
       $this->db->bind(':month', $month);
       $this->db->bind(':year', $year);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }
// THE TODAY SALES VIEW  ENDS //


    // THIS WEEK SALES VIEW  //
  public function get_week($week,$year){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_week = :week AND t_year = :year ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':week', $week);
       $this->db->bind(':year', $year);
      $results = $this->db->resultset();
      return $results;
    }

     public function get_week_count($week,$year){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_week = :week AND t_year = :year ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':week', $week);
       $this->db->bind(':year', $year);
       $this->db->resultset();
      return $this->db->rowCount();
    }

    public function get_week_total($week,$year){
      $this->db->query("SELECT SUM(amount) FROM transactions WHERE biz_id = :id AND t_week = :week AND t_year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':week', $week);
       $this->db->bind(':year', $year);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }
// THIS WEEK SALES VIEW  ENDS //


// THE MONTHLY VIEW STUFF //

    public function get_salez($month){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_month = :month ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':month', $month);
      $results = $this->db->resultset();
      return $results;
    }

    public function get_salez_count($month){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND dsc != :empty AND t_month = :month ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':empty', '');
       $this->db->bind(':month', $month);
       $this->db->resultset();
      return $this->db->rowCount();
    }


    public function get_monthly_total($month){
      $this->db->query("SELECT SUM(amount) FROM transactions WHERE biz_id = :id AND t_month = :month;");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':month', $month);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }


    public function get_monthly_total_capital($month){
      $this->db->query("SELECT SUM(capital) FROM transactions WHERE biz_id = :id AND t_month = :month;");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':month', $month);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }




     public function get_monthly_qty($month){
      $this->db->query("SELECT SUM(qty) FROM transactions WHERE biz_id = :id AND t_month = :month;");
      $this->db->bind(':id', $_SESSION['user_id']);
       $this->db->bind(':month', $month);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }





// THE MONTHLY STUFF ENDS //


    //This gets uniqe information from the transaction
    public function getInfo($id){
      $this->db->query("SELECT * FROM customers WHERE biz_id = :id AND t_id = :t_id");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':t_id', $id);

      $row = $this->db->single();
      //Check Rows
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }

    //This gets every details of that single transaction
    public function getPostz($id){
      $this->db->query("SELECT * FROM transactions WHERE biz_id = :id AND t_id = :t_id");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':t_id', $id);
      $results = $this->db->resultset();
      return $results;
    }


    public function getTotal(){
      $this->db->query("SELECT SUM(t_total) FROM customers WHERE biz_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }

    public function getTotal2(){
      $this->db->query("SELECT SUM(paid) FROM customers WHERE biz_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }



    public function get_transactionz2($t_id){
      $this->db->query("SELECT * FROM transactions WHERE t_id = :t_id");
      $this->db->bind(':t_id', $t_id);

      $results = $this->db->resultset();
      return $results;
    }

// CREDITORS SECTION

     public function get_creditors(){
      $this->db->query("SELECT * FROM customers WHERE biz_id = :id AND t_total != paid ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    // Determine how many creditors
    public function get_creditors_num(){
      $this->db->query("SELECT * FROM customers WHERE biz_id = :id AND t_total != paid ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->resultset();
      if ($this->db->rowCount() > 0) {
        return $this->db->rowCount();
      }else{
        return false;
      }
    }

    // Get single creditor
    public function get_creditor($t_id){
      $this->db->query("SELECT * FROM customers WHERE t_id = :id ; ");
      $this->db->bind(':id', $t_id);
      $result = $this->db->single();
      return $result;
    }


// CREDITORS SECTION ENDS


    public function get_transactions(){
      $this->db->query("SELECT DISTINCT(t_id) FROM invoicing WHERE biz_id = :id ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    public function get_count(){
      $this->db->query("SELECT DISTINCT(t_id) FROM invoicing WHERE biz_id = :id ORDER BY id DESC");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->resultset();
      if($this->db->rowCount() > 0){
        return $this->db->rowCount();
      } else {
        return false;
      }
    }

    public function get_sales(){
      $this->db->query("SELECT * FROM invoicing WHERE biz_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    public function get_dept(){
      $this->db->query("SELECT DISTINCT(paid) FROM invoicing WHERE biz_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    public function get_per_dept($t_id){
      $this->db->query("SELECT * FROM invoicing WHERE t_id = :t_id");
      $this->db->bind(':t_id', $t_id);
      $results = $this->db->resultset();
      return $results;
    }

    public function results($search_input){
      $this->db->query("SELECT * FROM customers WHERE name LIKE '%$search_input%' OR phone LIKE '%$search_input%' AND biz_id = :id");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    public function search_results2($search_input){
      $this->db->query("SELECT DISTINCT(t_id) FROM invoicing WHERE customer_phone LIKE '%$search_input%' AND biz_id = :id");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

//This gets every detais of that single transaction
    public function getPost($id){
      $this->db->query("SELECT * FROM invoicing WHERE biz_id = :id AND t_id = :t_id");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':t_id', $id);
      $results = $this->db->resultset();
      return $results;
    }
//This gets uniqe information from the transaction
    public function getCustomerInfo($id){
      $this->db->query("SELECT * FROM invoicing WHERE biz_id = :id AND t_id = :t_id");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':t_id', $id);

      $row = $this->db->single();
      //Check Rows
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }


    // Add Post
    public function addPost($data){
      // Prepare Query
      $this->db->query('INSERT INTO transactions (biz_id, t_id, qty, dsc, rate, amount, c_p, capital, t_date, t_week, t_month, t_year, t_time) 
      VALUES (:biz_id, :t_id, :qty, :dsc, :rate, :amt, :c_p, :capital, :c_date, :c_week, :c_month, :c_year, :c_time)');

      // Bind Values
      $this->db->bind(':biz_id', $data['biz_id']);
      $this->db->bind(':t_id', $data['t_id']);
      $this->db->bind(':qty', $data['qty']);
      $this->db->bind(':dsc', $data['dsc']);
      $this->db->bind(':rate', $data['rate']);
      $this->db->bind(':amt', $data['amt']);
      $this->db->bind(':c_p', $data['c_p']);
      $this->db->bind(':capital', $data['capital']);
      $this->db->bind(':c_date', $data['c_date']);
      $this->db->bind(':c_week', date('W'));
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

    // Add Post
    public function add_customer($data){
      // Prepare Query
      $this->db->query('INSERT INTO customers (biz_id, t_id, name, address, phone, paid, t_total, t_date, t_week, t_month, t_year, t_time) 
      VALUES (:biz_id, :t_id, :customer_name, :customer_address, :customer_phone, :paid, :total, :c_date, :c_week, :c_month, :c_year, :c_time)');

      // Bind Values
      $this->db->bind(':biz_id', $data['biz_id']);
      $this->db->bind(':t_id', $data['t_id']);
      $this->db->bind(':customer_name', $data['customer_name']);
      $this->db->bind(':customer_address', $data['customer_address']);
      $this->db->bind(':customer_phone', $data['customer_phone']);
      $this->db->bind(':paid', $data['paid']);
      $this->db->bind(':total', $data['total']);
      $this->db->bind(':c_date', $data['c_date']);
      $this->db->bind(':c_week', date('W'));
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


    // Update Post
    public function updatePost($data){
      // Prepare Query
      $this->db->query('UPDATE invoicing SET customer_name = :customer_name, customer_address = :customer_address, customer_phone = :customer_phone, qty =:qty, dsc = :dsc, rate = :rate, paid = :paid WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':customer_name', $data['customer_name']);
      $this->db->bind(':customer_address', $data['customer_address']);
      $this->db->bind(':customer_phone', $data['customer_phone']);
      $this->db->bind(':qty', $data['qty']);
      $this->db->bind(':dsc', $data['dsc']);
      $this->db->bind(':rate', $data['rate']);
      $this->db->bind(':paid', $data['paid']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

     // Update Post
    public function updatePost2($data){
      // Prepare Query
      $this->db->query('UPDATE transactions SET qty =:qty, dsc = :dsc, rate = :rate, amount = :amt, c_p = :c_p, capital = :capital, t_date = :t_date, t_month = :t_month WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':qty', $data['qty']);
      $this->db->bind(':dsc', $data['dsc']);
      $this->db->bind(':rate', $data['rate']);
      $this->db->bind(':amt', $data['amt']);
      $this->db->bind(':c_p', $data['c_p']);
      $this->db->bind(':capital', $data['capital']);
      $this->db->bind(':t_date', $data['c_date']);
      $this->db->bind(':t_month', $data['c_month']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

     // Update Post
    public function updatePost3($data){
      // Prepare Query
      $this->db->query('UPDATE customers SET name = :customer_name, address = :customer_address, phone = :customer_phone, t_total = :total, paid = :paid, t_date = :t_date, t_month = :t_month WHERE t_id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id2']);
      $this->db->bind(':customer_name', $data['customer_name']);
      $this->db->bind(':customer_address', $data['customer_address']);
      $this->db->bind(':customer_phone', $data['customer_phone']);
      $this->db->bind(':total', $data['total']);
      $this->db->bind(':paid', $data['paid']);
      $this->db->bind(':t_date', $data['c_date']);
      $this->db->bind(':t_month', $data['c_month']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

//gets the result set of a specific transaction
    public function get_transaction($t_id){
      $this->db->query("SELECT * FROM invoicing WHERE t_id = :t_id");
      $this->db->bind(':t_id', $t_id);

      $results = $this->db->resultset();
      return $results;
    }

     
    
    public function deleteEmpty(){
      // Prepare Query
      $this->db->query("DELETE FROM invoicing WHERE qty = '' AND rate = '' AND dsc = '' ");
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Post
    public function deletePost($id){
      // Prepare Query
      $this->db->query('DELETE FROM invoicing WHERE t_id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Post
    public function deletePost2($id){
      // Prepare Query
      $this->db->query('DELETE FROM transactions WHERE t_id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Post
    public function deletePost3($id){
      // Prepare Query
      $this->db->query('DELETE FROM customers WHERE t_id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }




  }