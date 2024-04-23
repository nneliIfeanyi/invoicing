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
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('pages/subscribe', $data);
    }

    public function invoice(){
      $user = $this->userModel->getUserById($_SESSION['user_id']);
      if ($user->status == 'monthly' OR $user->status == 'yearly') {
          $this->view('pages/invoice');
        }else{
          redirect('pages/subscribe'); 
      }
     
    }

     public function share($t_id){
      $t_info = $this->userModel->getInfo($t_id);
      $user = $this->userModel->getUserById($t_info->biz_id);
      if ($user->status == 'monthly' OR $user->status == 'yearly') {
          $data = [

            't_id' => $t_id,
            't_info' => $t_info,
            'user' => $user

          ];
        $this->view('pages/share', $data);
      }else{
          redirect('pages/subscribe'); 
      }
     
    }


  }