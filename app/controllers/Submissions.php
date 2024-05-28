<?php
  class Submissions extends Controller{
    public function __construct(){
     if (!isset($_SESSION['user_id']) ) {
         redirect('users/login');
      }
     $this->userModel = $this->model('User');
     $this->pointModel = $this->model('Point');
     $this->stockModel = $this->model('Inventorys');
    }



    // Load Homepage
    public function activate(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $done = $this->userModel->activate($_SESSION['user_id']);
        if ($done) {
          $_SESSION['inventory'] = 'true';
          flash('msg', 'inventory activated');
          redirect('inventory');
        }
        
      }
    }




    public function edit_product($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'id' => $id,
          'qty' => $_POST['qty'],
          'dsc' => $_POST['dsc'],
          'rate' => $_POST['rate'],
          'amount' => $_POST['qty'] * $_POST['rate'],   
          
        ];
      
        $this->userModel->editProduct($data);
        flash('msg','Product edit was successfull');
         echo "
              <script>
                history.go(-2);
              </script>
        ";
        
      }
    }






    public function add_goods(){
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $qty = $_POST['qty'];
        $rate = $_POST['rate'];
        $name = $_POST['name'];
        foreach($qty as $index=>$details ){
          $data = [
            'user_id' => $_SESSION['user_id'],
            'rate' => $rate[$index],
            'name' => $name[$index],
            'qty' => $qty[$index],
            'amount' => (int)$qty[$index] * (int)$rate[$index],
          ];
          $success = $this->userModel->addGoods($data);
          $success2 = $this->userModel->addGoods2($data); 
        }//end for each

        if ($success) {
            $this->userModel->deleteEmpty();
            $this->userModel->deleteEmpty2();
            flash('msg', 'Goods added successfully..');
            redirect('inventory/goods');
          }else{

            die('Something went wrong');
          }
      }//end server request method 
    }






    public function add_transaction(){
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$goods = $this->stockModel->loadGoods();
        $t_id = 's'.date('s').date('i').date('s').'v'.rand(10,99999).'c' ;
        $qty = $_POST['qty'];
        $rate = $_POST['rate'];
        $dsc = $_POST['name'];
        $name = trim($_POST['customer_name']);
        $phone = trim($_POST['customer_phone']);
        $address =trim($_POST['customer_address']);
        $paid = $_POST['paid'];
        $total = 0;
        foreach($qty as $index=>$details ){
          $data = [
            'user_id' => $_SESSION['user_id'],
            'rate' => $rate[$index],
            'dsc' => $dsc[$index],
            'qty' => $qty[$index],
            'amt' => (int)$qty[$index] * (int)$rate[$index],
            'biz_id' => $_SESSION['user_id'],
            'c_year' => date('Y'),
            'c_month' => date('M'),
            'c_date' => date('D').' '.date('jS'),
            'c_week' => date('W'),
            'c_time' => date('H:ia'),
            't_id' => $t_id,
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_address' => $address,
            'paid' => $paid,
            'total' => $total+=((int)$qty[$index] * (int)$rate[$index])
          ];
          $success = $this->stockModel->add_transaction($data);
        }//end for each

        if ($success) {
            $this->stockModel->deleteEmpty();
            $this->stockModel->add_customer($data);
            flash('msg', 'Transaction recorded successfully..');
            redirect('inventory/today');
          }else{

            die('Something went wrong');
          }
      }//end server request method 
    }





    public function agenting(){

      if ($_SESSION['user_points'] < 50) {
        flash('msg', 'Not enough Points.. you need at least 50 Points to activated this feature', 'flash-msg alert alert-danger');
        redirect('pages/referal');
      }else{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $val = rand(10000,100000);
        $data = [

            'id' => $_SESSION['user_id'],
            'value' => $val

        ];
        $user = $this->userModel->getUserById($data['id']);
        if (empty($user->ref_id)) {
            $success = $this->pointModel->makeAgent($data['id']);
            if ($success) {
              $this->pointModel->ref_code_gen($data['id'], $data['value']);
              $_SESSION['user_type'] = 'marketer';
              $_SESSION['ref_id'] = $val;
              flash('msg', 'Referal Status Activated');
              redirect('pages/referal');
            }else{
              die('Something went wrong');
            }
        }else{
          flash('msg', $data['name'].' already a marketer', 'flash-msg alert alert-danger');
          redirect('pages/referal');
        }
       

      }
      }
      
    }







}