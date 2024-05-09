<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->pointModel = $this->model('Point');
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

    public function profile(){
        if (!isset($_SESSION['user_id']) ) {
         redirect('users/login');
        }
        $customers = $this->userModel->get_customers();
        $user = $this->userModel->getUserById($_SESSION['user_id']);
          $data = [
            'user' => $user,
            'customers' => $customers,
          ];

          // Load index view
        $this->view('users/profile', $data);
    
    }

      //update business logo function
      public function logo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $fileName = basename($_FILES["new_logo"]["name"]); 
          if(empty($fileName)) {
            flash('msg', 'Please select an image file', 'flash-msg alert alert-danger');
            redirect('users/profile');
          }else{ 

          $uploadPath = "logo/";
         
          $db_image_file =  $uploadPath . $fileName; 
          $imageUploadPath = $uploadPath . $fileName; 
          $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
             
          // Allow certain file formats 
          $allowTypes = array('jpg','png','jpeg','PNG'); 

          if(!in_array($fileType, $allowTypes)){ 
            //echo $fileName;
             flash('msg', 'Invalid image format..', 'flash-msg alert alert-danger');
             redirect('users/profile');
          }else{
            //check points balance
            //if points more than 300
            if($_SESSION['user_points'] > 300) {
              $imageTemp = $_FILES["new_logo"]["tmp_name"];
              $data = [
                'id' => $_SESSION['user_id'],
                'image' => $db_image_file,
                move_uploaded_file($imageTemp, $imageUploadPath)
              ];
              $upload = $this->userModel->edit_pic($data);
              if ($upload) {
                $_SESSION['user_points'] = $_SESSION['user_points'] - 300;
                $new_point_value = $this->pointModel->use3($_SESSION['user_points']);
                flash('msg', 'Upload Successfull..');
                redirect('users/profile');
              }else{
                die('Something went wrong..');
              }
            //Points is less than 300 
            }else{
              flash('msg', 'Not enough Points', 'flash-msg alert alert-danger');
              redirect('users/profile');
            }

          }
         }
        }
      }

     public function password(){
      $user = $this->userModel->getUserById($_SESSION['user_id']); 
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
        'old' => $_POST['old'],
        'new' => $_POST['new']
        ];

        if(password_verify($data['old'], $user->bizpassword)){
         //update new password
          $new = password_hash($data['new'], PASSWORD_DEFAULT);
          $this->userModel->updatePassword($new);
          flash('msg', 'Password updated Successfully');
          redirect('users/profile');
        } else {
          flash('msg', 'Password incorrect', 'flash-msg alert alert-danger');
          redirect('users/profile');
        }
      }

      // Load index view
      redirect('users/profile');
    }

    public function password_reset(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
        'email' => trim($_POST['email']),
        'phone' => $_POST['phone'],
        'email_err' => '',
        'phone_err' => ''
        ];

        // if(password_verify($data['old'], $user->bizpassword)){
        //  //update new password
        //   $new = password_hash($data['new'], PASSWORD_DEFAULT);
        //   $this->userModel->updatePassword($new);
        //   flash('msg', 'Password updated Successfully');
        //   redirect('users/profile');
        // } else {
        //   flash('msg', 'Password incorrect', 'flash-msg alert alert-danger');
        //   redirect('users/profile');
        // }
        if($this->userModel->findUserByEmail($data['email']) || $this->userModel->findUserByPhone($data['phone'])){
          if ($this->userModel->compareUserPhoneAndEmail($data['phone'],$data['email'])) {
            $_SESSION['phone'] = $data['phone'];
            redirect('users/password_reset_link');
          }else{
            $data['phone_err'] = 'Credentials does not match';
            $data['email_err'] = 'Credentials does not match';
            $this->view('users/password_reset', $data);
          }
        }else{
          $data['phone_err'] = 'Phone number not registered';
          $data['email_err'] = 'Email is not registered';
          $this->view('users/password_reset', $data);
        }
      }//end server request method
      else{

        $data = [
        'email' => '',
        'email_err' => '',
        'phone' => '',
        'phone_err' => ''

        ];
        // Load index view
        $this->view('users/password_reset', $data);
      }
    }

    public function password_reset_link(){
      if ($_SESSION['phone']) {
        $this->view('users/password_reset_link');
      }else{
        die('Something went wrong');
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
          'email' => trim($_POST['email']),
          'address' => trim($_POST['address']),
          'password' => trim($_POST['password']),
          'biz_dsc' => trim($_POST['biz_dsc']),
          'category' => $_POST['category'],
          'confirm_password' => trim($_POST['confirm_password']),
          'user_type' => 'regular',
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
          $this->view('users/register', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
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
          $data['phone_err'] = 'Please enter email or phone number.';
        }

        $email_check = $this->userModel->findUserByEmail($data['phone']);
        $phone_check = $this->userModel->findUserByPhone($data['phone']);
        // Check for user
        if($email_check || $phone_check){
          // User Found
        } else {
          // No User
          $data['phone_err'] = 'User not found.';
        }

        if(empty($data['password'])){
          $data['password_err'] = 'Please enter your password.';
        }


        // Make sure errors are empty
        if(empty($data['phone_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['phone'], $data['phone'], $data['password']);

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

      public function update_profile(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'dsc' => trim($_POST['dsc']),
            'phone' => trim($_POST['phone']),
            'email' => trim($_POST['email']),
            'address' => trim($_POST['address']),
            'phone_err' => '',
            'email_err' => '',
          ];

          $edit_profile = $this->userModel->updateProfile($data);
          if ($edit_profile) {
            $_SESSION['user_dsc'] = $data['dsc'];
            $_SESSION['user_phone'] = $data['phone'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['email'] = $data['email'];
            flash('msg', 'Profile updated Successfully');
           redirect('users/profile');
          }else{
             die('Something went wrong');
          }
        }//Edit profile Server request ends
      }

    // Create Session With User Info
    public function createUserSession($user){
      
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->bizname ;
        $_SESSION['user_phone'] = $user->bizphone;
        $_SESSION['address'] = $user->bizaddress;
        $_SESSION['user_dsc'] = $user->biz_dsc;
        $_SESSION['user_status'] = $user->status;
        $_SESSION['renew'] = $user->renew;
        $_SESSION['email'] = $user->email;
        $_SESSION['category'] = $user->category;
        $_SESSION['user_type'] = $user->user_type;
        $_SESSION['logo'] = $user->logo;
        $_SESSION['user_points'] = $user->points;
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
      unset($_SESSION['renew']);
      unset($_SESSION['user_type']);
      unset($_SESSION['category']);
      unset($_SESSION['logo']);
      unset($_SESSION['user_points']);
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