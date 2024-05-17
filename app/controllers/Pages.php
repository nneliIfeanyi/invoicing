<?php
  class Pages extends Controller{
    public function __construct(){
     $this->postModel = $this->model('Post');
     $this->userModel = $this->model('User');
     $this->pointModel = $this->model('Point');
    }

    // Load Homepage
    public function index(){
      //Set Data
      $data = [
        'title' => '1.0.0',
        'description' => 'Oh yeah'
      ];

      // Load about view
      $this->view('pages/index', $data);
    }

    public function about(){
      //Set Data
      $data = [
        //'id' => $id,
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('pages/about', $data);
    }

     public function reset_password(){
      if ($_SESSION['phone']) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $data = [
            'password' => trim($_POST['password']),
            'password_err' => ''
          ];

          if(empty($data['password'])){
            $data['password_err'] = 'Enter at least 6 characters.';
             $this->view('pages/reset_password', $data);
          }
          elseif(strlen($data['password']) < 6){
            $data['password_err'] = 'Password must have at least 6 characters.';
             $this->view('pages/reset_password', $data);
          }else{

          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          $this->userModel->updatePassword2($data['password']);
          flash('msg', 'Password updated Successfully');
          unset($_SESSION['phone']);
          redirect('users/login');
          }
        }//Server request method ends
        $this->view('pages/reset_password');
      }//If not isset session variable
      else{
        die('Something went wrong...Link is expired');
      }
    }//Password reset link method ends

    public function subscribe(){
      
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('pages/subscribe', $data);
    }

    public function invoice(){
      $user = $this->userModel->getUserById($_SESSION['user_id']);
      if ($user->status == 'monthly' OR $user->status == 'yearly' OR $user->status == 'freeTrial') {
          $this->view('pages/invoice');
        }else{
          redirect('pages/subscribe'); 
      }
     
    }

    public function share($t_id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $t_infos = $this->postModel->get_transaction($t_id);
        $t_info = $this->userModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
        if($user->points > 2) {
        $points = $user->points - 5;
          $data = [
            'post' => $t_infos, 
            'customer_info' => $t_info,
            'user' => $user
          ];
        $new_point_value = $this->pointModel->use3($points);
        $_SESSION['user_points'] = $points;
        $phone = ltrim($data['customer_info']->customer_phone, '\0');
        header("location: https://wa.me/234".$phone."?text=invoice%20link%20".URLROOT."/pages/share/".$data['customer_info']->t_id);
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
          redirect('posts/show/'.$t_id);
        }

      }else{
        $t_infos = $this->postModel->get_transaction($t_id);
        $t_info = $this->userModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
          $data = [
            'post' => $t_infos, 
            'customer_info' => $t_info,
            'user' => $user
          ];
         $this->view('pages/share', $data);
      }
    }

    public function download_invoice($t_id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $t_info = $this->userModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
        if($user->points > 2) {
          $points = $user->points - 5;
          $data = [
            't_id' => $t_id,
            't_info' => $t_info,
            'user' => $user
          ];

          $new_point_value = $this->pointModel->use3($points);
          $_SESSION['user_points'] = $points;
          $this->view('pages/download_invoice', $data);
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
          redirect('posts/show/'.$t_id);
        }
      }else{
        $t_info = $this->userModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
      
        $data = [
          't_id' => $t_id,
          't_info' => $t_info,
          'user' => $user
        ];
        $this->view('pages/download_invoice', $data);
      }
     
    }


    public function share_reciept($t_id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$t_infos = $this->postModel->get_transaction($t_id);
        $t_info = $this->postModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
        if($user->points > 2) {
        $points = $user->points - 5;
          $data = [
            'post' => $t_infos, 
            'customer_info' => $t_info,
            'user' => $user
          ];
        $new_point_value = $this->pointModel->use3($points);
        $_SESSION['user_points'] = $points;
        $phone = ltrim($data['customer_info']->phone, '\0');
        header("location: https://wa.me/234".$phone."?text=invoice%20link%20".URLROOT."/pages/share_reciept/".$data['customer_info']->t_id);
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
          redirect('posts/preview/'.$t_id);
        }

      }else{
        $t_infos = $this->postModel->get_transactionz2($t_id);
        $t_info = $this->userModel->getInfoz($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
          $data = [
            'post' => $t_infos, 
            'customer_info' => $t_info,
            'user' => $user
          ];
         $this->view('pages/share_reciept', $data);
      }
    }

    public function download_reciept($t_id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $t_info = $this->postModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
        if($user->points > 2) {
          $points = $user->points - 5;
          $data = [
            't_id' => $t_id,
            't_info' => $t_info,
            'user' => $user
          ];

          $new_point_value = $this->pointModel->use3($points);
          $_SESSION['user_points'] = $points;
          $this->view('pages/download_reciept', $data);
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
          redirect('posts/preview/'.$t_id);
        }
      }else{
        $t_info = $this->userModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
      
        $data = [
          't_id' => $t_id,
          't_info' => $t_info,
          'user' => $user
        ];
        $this->view('pages/download_reciept', $data);
      }
     
    }
    
    public function customer_history($phone){
      if (!isset($_SESSION['user_id']) ) {
         redirect('users/login');
      }
      $history = $this->userModel->get_history($phone);
      $name = $this->userModel->get_customersName($phone);
      //Set Data
      $data = [
        'transactions' => $history,
        'name' => $name
      ];

      // Load about view
      $this->view('pages/customer_history', $data);
    }


  }