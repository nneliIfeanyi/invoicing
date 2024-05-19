<?php
  class Admin extends Controller{
    public function __construct(){
     if ($_SESSION['user_phone'] != "08122321931") {
     	redirect('users/login');
     }
     $this->userModel = $this->model('User');
      $this->pointModel = $this->model('Point');
    }

    // Load Homepage
    public function index(){
      $users = $this->userModel->loadUsers();
         //Set Data
        $data = [
          'users' => $users,
        ];
      // Load index view
      $this->view('admin/index', $data);
    }

     public function usertype(){
      $users = $this->userModel->loadUsers();
         //Set Data
        $data = [
          'users' => $users,
        ];
      // Load index view
      $this->view('admin/usertype', $data);
    }



    public function points_update(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [

            'id' => $_POST['id'],
            'value' => $_POST['points'],
            'name' => $_POST['name']

        ];
        $success = $this->pointModel->addPoints($data['id'], $data['value']);
        if ($success) {
          flash('msg', $data['name'].' points updated to '.$data['value']);
          redirect('admin');
        }else{
          die('Something went wrong');
        }

      }
      
    }


    public function agenting(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $val = rand(1000,10000);
        $data = [

            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'value' => $val

        ];
        $user = $this->userModel->getUserById($data['id']);
        if (empty($user->ref_id)) {
            $success = $this->pointModel->makeAgent($data['id']);
            if ($success) {
              $this->pointModel->ref_code_gen($data['id'], $data['value']);
              flash('msg', $data['name'].' user_type updated to marketer');
              redirect('admin/usertype');
            }else{
              die('Something went wrong');
            }
        }else{
          flash('msg', $data['name'].' already a marketer', 'flash-msg alert alert-danger');
          redirect('admin/usertype');
        }
       

      }
      
    }

        // if (!empty($user->ref_id)) {
        //   $my_refs = $this->userModel->get_my_refs($user->ref_id);
        //   $refs_numeric = $this->userModel->get_my_refs_count($user->ref_id);
        //   if ($refs_numeric == 5) {
        //      $_SESSION['user_points'] = $_SESSION['user_points'] + 300;
        //      $new_point_value = $this->pointModel->use3($_SESSION['user_points']);
        //   }
        // }

}