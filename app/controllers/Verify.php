<?php
  class Verify extends Controller{
    
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index($t_id){
      $t_info = $this->userModel->getInfoz($t_id);
      if ($t_info) {
        redirect('pages/share_reciept/'.$t_id);
      }else{
        die('Document not found, either it has been deleted or does not exist at all.');
      }    

    }



  }