<?php
  class Posts extends Controller{
    public function __construct(){
      if (!isset($_COOKIE['user-id']) ) {
        redirect('users/login');
      }else{
        $_SESSION['user_id'] = $_COOKIE['user-id'];
        $_SESSION['user_name'] = $_COOKIE['user-name'];
        $_SESSION['user_phone'] = $_COOKIE['user-phone'];
        $_SESSION['address'] = $_COOKIE['user-address'];
        $_SESSION['user_dsc'] = $_COOKIE['user-dsc'];
        $_SESSION['user_status'] = $_COOKIE['user-status'];
      }
      // Load Models
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');

      $this->isPaid($_SESSION['user_id']);
    }//ends construct function

    // Load All Posts
    public function index(){
      $transactions = $this->postModel->get_transactions();
      $data = [
        'transactions' =>$transactions
      ];
      
      $this->view('posts/index', $data);
    }

    // Show Single Post
    public function show($t_id){
      $post = $this->postModel->getPost($t_id);
      $customer_info = $this->postModel->getCustomerInfo($t_id);

      $data = [
        'post' => $post, 
        'customer_info' => $customer_info
      ];

      $this->view('posts/show', $data);
    }

    // Add Post
    public function add(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $t_id = date('s').date('i').date('s').rand(10,100) ;
        $qty = $_POST['qty'];
        $rate = $_POST['rate'];
        $dsc = $_POST['dsc'];
        $name = trim($_POST['customer_name']);
        $phone = trim($_POST['customer_phone']);
        $address =trim($_POST['customer_address']);
        $paid = $_POST['paid'];
        foreach($rate as $index=>$details ){
          $data = [
            'rate' => $rate[$index],
            'dsc' => $dsc[$index],
            'qty' => $qty[$index],
            'biz_id' => $_SESSION['user_id'],
            'c_year' => date('Y'),
            'c_month' => date('M'),
            'c_date' => date('D').' '.date('jS'),
            'c_week' => date('W'),
            'c_time' => date('H:ia'),
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_address' => $address,
            'paid' => $paid,
            't_id' => $t_id
          ];
         $this->postModel->addPost($data);
          flash('msg', 'Invoice recorded and saved successfully..');
           redirect('posts');
           $this->postModel->deleteEmpty();
        }//end for each
      } else {
        $data = [
          '' => '',
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
          flash('msg', 'Invoice updated and saved successfully..');
          redirect('posts/show/'.$t_id);
          $this->postModel->deleteEmpty();
        }//end for each
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
  }//end Add more function

    // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost($id)){
          // Redirect to login
          flash('post_message', 'Post Removed');
          redirect('posts');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('posts');
      }
    }

    public function isPaid($id){
      
      $user = $this->userModel->getUserById($id);
      $now = date('Y-m-d h:ia');
      $exp_date = $user->renew;
      if ($now > $exp_date) {
        $this->userModel->freeTrial($id);    
      }
      
    }




  }