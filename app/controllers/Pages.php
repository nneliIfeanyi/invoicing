<?php
  class Pages extends Controller{
    public function __construct(){
     $this->postModel = $this->model('Post');
     $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index(){
      // If logged in, redirect to posts
      if(isset($_SESSION['user_id'])){
        redirect('posts');
      }else{
        redirect('users/login');
      }
    }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('pages/about', $data);
    }

    public function subscribe(){
      //$_SESSION['user_status'] = '';
      //Set Data
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
        $t_infos = $this->postModel->get_transaction($t_id);
        $t_info = $this->userModel->getInfo($t_id);
        $user = $this->userModel->getUserById($t_info->biz_id);
        if ($user->status == 'monthly' OR $user->status == 'yearly' OR $user->status == 'freeTrial') {
          $data = [
            'post' => $t_infos, 
            'customer_info' => $t_info,
            'user' => $user
          ];

        $this->view('pages/share', $data);

      }else{
          die('Something went wrong.. Contact seller'); 
      } 
    }

    public function download_invoice($t_id){
      $t_info = $this->userModel->getInfo($t_id);
      $user = $this->userModel->getUserById($t_info->biz_id);
          $data = [

            't_id' => $t_id,
            't_info' => $t_info,
            'user' => $user

          ];
        $this->view('pages/download_invoice', $data);
     
    }
    
    public function customer_history($phone){
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