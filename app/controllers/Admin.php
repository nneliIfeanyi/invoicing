<?php
  class Admin extends Controller{
    public function __construct(){
     if ($_SESSION['user_phone'] != "08122321931") {
     	redirect('users/login');
     }
     $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index(){
      //Set Data
      $data = [
        'title' => 'InvoiceOnline',
        'description' => 'Invoicing Admin Management Portal'
      ];

      // Load index view
      $this->view('admin/index', $data);
    }

    public function status_update($id){
      if (isset($_POST['monthly'])) {
      		$length = 'monthly';
      		$this->userModel->updateStatus($id, $length);
      		flash('msg', 'Status updated as MONTHLY for user with ID '.$id);
      		redirect('users');

      	}elseif(isset($_POST['yearly'])){
      		$length = 'yearly';
      		$this->userModel->updateStatus($id, $length);
      		flash('msg', 'Status updated as YEARLY for user with ID '.$id);
      		redirect('users');
  		}
  		else{
      		$length = 'expired';
      		$this->userModel->updateStatus($id, $length);
      		flash('msg', 'Status updated as EXPIRED for user with ID '.$id);
      		redirect('users');
  		}
    }

    

}