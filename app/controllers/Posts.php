<?php
  class Posts extends Controller{
    public function __construct(){
      if (!isset($_SESSION['user_id']) ) {
         redirect('users/login');
      }
      // Load Models
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->pointModel = $this->model('Point');
    }//ends construct function

    
    public function search_results(){

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $search_input = trim($_POST['search']);
          if (empty($search_input)) {
            redirect('posts/index');
          }else{
            $search_results = $this->postModel->results($search_input);
            $data = [
              'search_input' =>$search_input,
              'transactions' =>$search_results
            ];
            $this->view('posts/search_results', $data);
          }
      
        
      }//end search server request post method
      else{
        redirect('posts/index');
      }
    }//end search function




    public function archive(){
        $count = $this->postModel->get_count();
        $transactions = $this->postModel->get_transactions();
        $transactions2 = $this->postModel->get_sales();
        $transactions3 = $this->postModel->get_dept();
        $amt = 0;
        $dept1 = 0;
        $dept = 0;
        foreach($transactions2 as $sales){
          if (empty($sales->qty)) {
            $sales->qty = 1;
          }
          $amt += (int)$sales->qty * (int)$sales->rate;
    
        }
        foreach($transactions3 as $paid){
          if (empty($paid->paid)) {
            $paid->paid = 0;
          }
          $dept1 += $paid->paid;
          $dept = $amt - $dept1;
        }
        $data = [
          'transactions' =>$transactions,
          'total' => $amt,
          'dept'=> $dept,
          'count' => $count
        ];
        
        $this->view('posts/archive', $data);
  
    }
    // Load All Posts
    public function index(){
      $total = $this->postModel->getTotal();
      $debt_all = $this->postModel->getTotal2();
      $get_tID = $this->postModel->get_transactionz();
    
        $data = [
          'transactions' =>$get_tID,
          't_total' => $total,
          'd_total' => $debt_all
        ];
        
      $this->view('posts/index', $data);
    }


    public function sales(){
      $month = date('M');
      $monthly_total = $this->postModel->get_monthly_total($month);
      $all_sold = $this->postModel->get_monthly_qty($month);
      $get_tID = $this->postModel->get_salez($month);
    
        $data = [
          'sales' =>$get_tID,
          'total' => $monthly_total,
          'all_qty' => $all_sold
        ];
        
      $this->view('posts/sales', $data);
    }


    //Payment Gateway integrate

    public function pay_now($amount){
       if ($amount == 1000) {
         $_SESSION['user_points'] = $_SESSION['user_points'] + 210;
         $new_point_value = $this->pointModel->use3($_SESSION['user_points']);
         $this->pointModel->history_add($_SESSION['user_id'],'credit','210','Wallet funding');


         $me = $this->userModel->getUserById($_SESSION['user_id']);
         $invitee = $this->userModel->getUserByRefId($_SESSION['refered_by']);
         if ($me->claimed == 'true') {
           $value = $invitee->points + '50';
           $this->pointModel->addPoints($invitee->id, $value);
           $this->pointModel->history_add($invitee->id,'credit','50','referal top_up');
         }
         flash('msg', 'Points Purchase Successfull..');
         redirect('users/profile');
       }elseif ($amount == 500) {
         $_SESSION['user_points'] = $_SESSION['user_points'] + 100;
         $new_point_value = $this->pointModel->use3($_SESSION['user_points']);
         $this->pointModel->history_add($_SESSION['user_id'],'credit','100','Wallet funding');

         $me = $this->userModel->getUserById($_SESSION['user_id']);
         $invitee = $this->userModel->getUserByRefId($_SESSION['refered_by']);
         if ($me->claimed == 'true') {
           $value = $invitee->points + '50';
           $this->pointModel->addPoints($invitee->id, $value);
           $this->pointModel->history_add($invitee->id,'credit','50','referal top_up');
         }


         flash('msg', 'Points Purchase Successfull..');
         redirect('users/profile');
       }elseif ($amount == 200) {
         $_SESSION['user_points'] = $_SESSION['user_points'] + 25;
         $new_point_value = $this->pointModel->use3($_SESSION['user_points']);
         $this->pointModel->history_add($_SESSION['user_id'],'credit','25','Wallet funding');
         flash('msg', 'Points Purchase Successfull..');
         redirect('users/profile');
       }elseif ($amount == 5000) {
         $_SESSION['user_points'] = $_SESSION['user_points'] + 1050;
         $new_point_value = $this->pointModel->use3($_SESSION['user_points']);
         $this->pointModel->history_add($_SESSION['user_id'],'credit','1050','Wallet funding');

         $me = $this->userModel->getUserById($_SESSION['user_id']);
         $invitee = $this->userModel->getUserByRefId($_SESSION['refered_by']);
         if ($me->claimed == 'true') {
           $value = $invitee->points + '50';
           $this->pointModel->addPoints($invitee->id, $value);
           $this->pointModel->history_add($invitee->id,'credit','50','referal top_up');
         }


         flash('msg', 'Points Purchase Successfull..');
         redirect('users/profile');
       }elseif ($amount == 2500) {
         $_SESSION['user_points'] = $_SESSION['user_points'] + 525;
         $new_point_value = $this->pointModel->use3($_SESSION['user_points']);
         $this->pointModel->history_add($_SESSION['user_id'],'credit','525','Wallet funding');

         $me = $this->userModel->getUserById($_SESSION['user_id']);
         $invitee = $this->userModel->getUserByRefId($_SESSION['refered_by']);
         if ($me->claimed == 'true') {
           $value = $invitee->points + '50';
           $this->pointModel->addPoints($invitee->id, $value);
           $this->pointModel->history_add($invitee->id,'credit','50','referal top_up');
         }

         flash('msg', 'Points Purchase Successfull..');
         redirect('users/profile');
       }
    }


    // Show Single Post
    public function show($t_id){
      $post = $this->postModel->getPost($t_id);
      $customer_info = $this->postModel->getCustomerInfo($t_id);

      $data = [
        'post' => $post, 
        'customer_info' => $customer_info,
        't_id' => $t_id
      ];

      $this->view('posts/show', $data);
    }

     // Show Single Post
    public function preview($t_id){
      $post = $this->postModel->getPostz($t_id);
      $customer_info = $this->postModel->getInfo($t_id);

      $data = [
        'post' => $post, 
        'customer_info' => $customer_info,
        't_id' => $t_id
      ];

      $this->view('posts/preview', $data);
    }

    // Add Post
    public function add($entry_rows){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $t_id = 's'.date('s').date('i').date('s').'v'.rand(10,99999).'c' ;
        
        $qty = $_POST['qty'];
        $rate = $_POST['rate'];
        $dsc = $_POST['dsc'];
        $name = trim($_POST['customer_name']);
        $phone = trim($_POST['customer_phone']);
        $address =trim($_POST['customer_address']);
        $paid = $_POST['paid'];
        $total = 0;
        foreach($qty as $index=>$details ){
          $data = [
            'rate' => $rate[$index],
            'dsc' => $dsc[$index],
            'qty' => $qty[$index],
            'amt' => (int)$qty[$index] * (int)$rate[$index],
            'biz_id' => $_SESSION['user_id'],
            'c_year' => date('Y'),
            'c_month' => date('M'),
            'c_date' => date('D').' '.date('jS'),
            'c_week' => date('W'),
            'c_time' => date('h:ia'),
            't_id' => $t_id,
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_address' => $address,
            'paid' => $paid,
            'total' => $total+=((int)$qty[$index] * (int)$rate[$index]),
          ];
          $success = $this->postModel->addPost($data); 
        }//end for each

        if ($success) {
            //$this->postModel->deleteEmpty();
            $this->postModel->add_customer($data);
            flash('msg', 'Invoice recorded and saved successfully..');
            $redirect = URLROOT.'/posts/preview/'.$t_id;
            echo "
                  <div class='flash-msg alert alert-success'>
                    Transaction Recorded Successfully...  <span class='spinner-border spinner-border-sm'> </span>
                </div>
              <meta http-equiv='refresh' content='1.1; $redirect'>
            ";
          }else{
            echo "
                  <div class='flash-msg alert alert-danger'>
                    Something went wrong... Try again later
                </div>
                  
            ";
          }
      }//end server request method 
      else {
        $data = [
          'entry_rows' => $entry_rows,
          '' => '',
        ];

        $this->view('posts/add', $data);
      }
    }

//Edit Transaction 
    public function edit($t_id){ 
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['post_id'];
        $qty = $_POST['qty'];
        $rate = $_POST['rate'];
        $dsc = $_POST['dsc'];
        $name = trim($_POST['customer_name']);
        $phone = trim($_POST['customer_phone']);
        $address =trim($_POST['customer_address']);
        $paid = $_POST['paid'];
        if ($_SESSION['user_points'] > 2) {
          foreach($qty as $index=>$details ){
          $data = [
            'qty' => $qty[$index],
            'rate' => $rate[$index],
            'dsc' => $dsc[$index],
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_address' => $address,
            'paid' => $paid,
            'id' => $id[$index]
            ];
            $this->postModel->updatePost($data);
          }//end for each// code...
          $_SESSION['user_points'] = $_SESSION['user_points'] - 3;
          $this->pointModel->use3($_SESSION['user_points']);
          $this->pointModel->history_add($_SESSION['user_id'],'debit','3','Transaction edit');
          flash('msg', 'Invoice updated and saved successfully..');
          redirect('posts/show/'.$t_id);
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
          redirect('posts/show/'.$t_id);
        }
          
          //$this->postModel->deleteEmpty();
      }//end server request
      
      else{

      $post = $this->postModel->getPost($t_id);
      $customer_info = $this->postModel->getCustomerInfo($t_id);
      //echo $this->isPaid($customer_info->biz_id);
        $data = [
          'post' => $post,
          'info' => $customer_info
        ];
         $this->view('posts/edit', $data);
    }
  }//end Edit more function

  //Edit2 Transaction 
    public function edit2($t_id){ 
      $date = $this->postModel->load_date();
      $day = $this->postModel->load_day();
      $month = $this->postModel->load_month();
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $customer_info = $this->postModel->getInfo($t_id);
        if (empty($_POST['day']) && empty($_POST['date'])) {
          $date = $customer_info->t_date;
        }elseif (empty($_POST['day'])) {
          $exp = explode(' ',  $customer_info->t_date);
          $d_date = $exp[0];
          $date = $d_date.' '.$_POST['date'];
        }elseif (empty($_POST['date'])) {
          $exp = explode(' ',  $customer_info->t_date);
          $d_date = $exp[1];
          $date = $_POST['day'].' '.$d_date;
        }
        else{
          $date = $_POST['day'].' '.$_POST['date'];
        }
        $id = $_POST['post_id'];
        $qty = $_POST['qty'];
        $rate = $_POST['rate'];
        $dsc = $_POST['dsc'];
        $name = trim($_POST['customer_name']);
        $phone = trim($_POST['customer_phone']);
        $address =trim($_POST['customer_address']);
        $paid = $_POST['paid'];
        $total = 0;
        if ($_SESSION['user_points'] > 2) {
          foreach($qty as $index=>$details ){
          $data = [
            'qty' => $qty[$index],
            'rate' => $rate[$index],
            'dsc' => $dsc[$index],
            'amt' => (int)$qty[$index] * (int)$rate[$index],
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_address' => $address,
            'paid' => $paid,
            'id' => $id[$index],
            'id2' => $t_id,
            'total' => $total+=((int)$qty[$index] * (int)$rate[$index]),
            'c_date' => $date,
            'c_month' => $_POST['month']
          ];
          $update = $this->postModel->updatePost2($data);
          }//end for each// code...
          if ($update) {
            $this->postModel->updatePost3($data);
            $_SESSION['user_points'] = $_SESSION['user_points'] - 3;
            $this->pointModel->use3($_SESSION['user_points']);
            $this->pointModel->history_add($_SESSION['user_id'],'debit','3','Transaction edit');
            flash('msg', 'Invoice updated and saved successfully..');
            redirect('posts/preview/'.$t_id);
          }else{
            die('Something went wrong..');
          }
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
          redirect('posts/preview/'.$t_id);
        }
          
          //$this->postModel->deleteEmpty();
      }//end server request
      
      else{

      $post = $this->postModel->getPostz($t_id);
      $customer_info = $this->postModel->getInfo($t_id);
     
        $data = [
          'post' => $post,
          'info' => $customer_info,
          'date' => $date,
          'day' => $day,
          'month' => $month
        ];
         $this->view('posts/edit2', $data);
    }
  }//end Edit more function

    // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost($id)){
          
          flash('msg', 'Transaction Removed', 'flash-msg alert alert-danger');
          redirect('users/profile');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('pages/customers');
      }
    }

    public function delete2($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost2($id)){
          $this->postModel->deletePost3($id);
          flash('msg', 'Transaction Removed', 'flash-msg alert alert-danger');
          redirect('posts');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('pages/customers');
      }
    }

    // public function isPaid($id){
      
    //   $user = 
    //   $now = date('Y-m-d h:ia');
    //   $exp_date = $user->renew;
    //   if ($now > $exp_date) {
    //   $this->userModel->expired($id);    
    //   }
      
    // }




  }