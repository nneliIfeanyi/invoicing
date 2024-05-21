<?php
  class Reg extends Controller{
    
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index($ref){

        $data = [
          'ref' => $ref,
          'name' => '',
          'phone' => '',
          'email' => '',
          'password' => '',
          'address' => '',
          'biz_dsc' => '',
          'confirm_password' => '',
          'name_err' => '',
          'phone_err' => '',
          'password_err' => '',
          'confirm_password_err',
          'address_err' => '',
          'biz_dsc_err' => '',
        ];

        // Load View
        $this->view('reg/index', $data);
    
    }

     public function home($ref){

        $data = [
          'ref' => $ref,
        ];

        // Load View
        $this->view('reg/home', $data);
    
    }

    public function about($ref){

        $data = [
          'ref' => $ref,
        ];

        // Load View
        $this->view('reg/about', $data);
    
    }



    public function register($ref){
      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'name' => trim($_POST['name']),
          'phone' => trim($_POST['phone']),
          'email' => trim($_POST['email']),
          'address' => trim($_POST['address']),
          'password' => trim($_POST['password']),
          'biz_dsc' => trim($_POST['biz_dsc']),
          'category' => $_POST['category'],
          'confirm_password' => trim($_POST['confirm_password']),
          'user_type' => 'regular',
          'refered_by' => $ref,
          'ref' => $ref,
          'phone_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        if($this->userModel->findUserByPhone($data['phone'])){
          $data['phone_err'] = 'Phone number already taken.';
        }
        elseif($this->userModel->findUserByEmail($data['email'])){
          $data['email_err'] = 'Email already taken.';
        }

        // Validate password
        if(empty($data['password'])){
          $password_err = 'Please enter a password.';     
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must have atleast 6 characters.';
        }

        // Validate confirm password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password.';     
        } else{
            if($data['password'] != $data['confirm_password']){
                $data['confirm_password_err'] = 'Password do not match.';
            }
        }
         
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['phone_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // SUCCESS - Proceed to insert

          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          
          //Execute
          if($this->userModel->register($data)){
            // Redirect to login
            flash('msg', 'You are now registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
           
        } else {
          // Load View
          $this->view('reg/index', $data);
        }
      }
    }











  }