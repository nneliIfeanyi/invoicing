<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      if ($_SESSION['user_phone'] != "08122321931") {
        redirect('posts');
      }else{
        $users = $this->userModel->loadUsers();
         //Set Data
        $data = [
          'users' => $users,
          'description' => 'Invoicing Admin Management Portal'
        ];

        // Load index view
        $this->view('users/index', $data);
      }
    }

    public function register(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('posts');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'name' => trim($_POST['name']),
          'phone' => trim($_POST['phone']),
          'address' => trim($_POST['address']),
          'password' => trim($_POST['password']),
          'biz_dsc' => trim($_POST['biz_dsc']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'phone_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate email
        if(empty($data['name'])){
            $data['name_err'] = 'Please enter your business name';
            // Validate name
            if(empty($data['phone'])){
              $data['phone_err'] = 'Please enter your business phone number';
            }
        } else{
          // Check Email
          if($this->userModel->findUserByPhone($data['phone'])){
            $data['phone_err'] = 'Phone number already taken.';
          }
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
        if(empty($data['name_err']) && empty($data['phone_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // SUCCESS - Proceed to insert

          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          //Execute
          if($this->userModel->register($data)){
            // Redirect to login
            flash('register_success', 'You are now registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
           
        } else {
          // Load View
          $this->view('users/register', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
          'name' => '',
          'phone' => '',
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
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('posts');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'phone' => trim($_POST['phone']),
          'password' => trim($_POST['password']),        
          'phone_err' => '',
          'password_err' => '',       
        ];

        // Check for email
        if(empty($data['phone'])){
          $data['phone_err'] = 'Please enter phone number.';
        }

        // Check for name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name.';
        }

        // Check for user
        if($this->userModel->findUserByPhone($data['phone'])){
          // User Found
        } else {
          // No User
          $data['phone_err'] = 'This phone number is not registered.';
        }

        // Make sure errors are empty
        if(empty($data['phone_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['phone'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            $this->createUserSession($loggedInUser);
            flash('msg', 'Login Successfull..');
            
          } else {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('users/login', $data);
          }
           
        } else {
          // Load View
          $this->view('users/login', $data);
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'phone' => '',
          'password' => '',
          'phone_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('users/login', $data);
      }
    }

    // Create Session With User Info
    public function createUserSession($user){
      
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->bizname ;
        $_SESSION['user_phone'] = $user->bizphone;
        $_SESSION['address'] = $user->bizaddress;
        $_SESSION['user_dsc'] = $user->biz_dsc;
        $_SESSION['user_status'] = $user->status;
        redirect('posts');
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_phone']);
      unset($_SESSION['user_name']);
      unset($_SESSION['address']);
      unset($_SESSION['user_dsc']);
      unset($_SESSION['user_status']);
      session_destroy();
      redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
  }