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
          'description' => 'Invoicing Admin Management Portal'
        ];
      // Load index view
      $this->view('admin/index', $data);
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

    

}