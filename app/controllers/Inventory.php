<?php
  class Inventory extends Controller{
    public function __construct(){
     if (!isset($_SESSION['user_id']) ) {
         redirect('users/login');
      }
     $this->userModel = $this->model('User');
     $this->pointModel = $this->model('Point');
     $this->stockModel = $this->model('Inventorys');
    }

    // Load Homepage
    public function index(){
      $users = $this->userModel->loadUsers();
         //Set Data
        $data = [
          'users' => $users,
        ];
      // Load index view
      $this->view('inventory/index', $data);
    }




    public function goods(){
      if ($_SESSION['inventory'] == 'false') {
      flash('msg', 'Click to enable inventory for your profile', 'flash-msg alert alert-danger');
         redirect('inventory');
      }
      $goods = $this->userModel->loadGoods();
      $capital = $this->userModel->getCapital();
      $stock = $this->userModel->getStock();
         //Set Data
        $data = [
          'goods' => $goods,
          'capital' => $capital,
          'stock' => $stock
        ];
      // Load index view
      $this->view('inventory/goods', $data);
    }






    public function add_goods(){
      $users = $this->userModel->loadUsers();
         //Set Data
        $data = [
          'users' => $users,
        ];
      // Load index view
      $this->view('inventory/add_goods', $data);
    }




    public function edit($id){
      $product = $this->userModel->getProductById($id);
         //Set Data
        $data = [
          'id' => $product->id,
          'qty' => $product->qty,
          'dsc' => $product->name,
          'rate' => $product->rate,
        ];
      // Load index view
      $this->view('inventory/edit', $data);
    }




    public function today(){
      $sales = $this->stockModel->get_today();
      $amount = $this->stockModel->get_amount_sold();
      $sold = $this->stockModel->num_goods_sold();
         //Set Data
        $data = [
          'goods' => $sales,
          'capital' => $amount,
          'stock' => $sold
        ];
      // Load index view
      $this->view('inventory/today', $data);
    }




    public function add($rows){
      $goods = $this->userModel->loadGoods();
         //Set Data
        $data = [
          'goods' => $goods,
          'entry_rows' => $rows,
        ];
      // Load index view
      $this->view('inventory/add', $data);
    }




//\\ CURRENT INVENTORY VIEW //\\

    public function current(){
      $goods = $this->stockModel->loadGoods();
      $capital = $this->stockModel->getCapital();
      $stock = $this->stockModel->getStock();
        //Set Data
        $data = [
          'goods' => $goods,
          'capital' => $capital,
          'stock' => $stock
        ];
      $this->view('inventory/current', $data);
    }



//\\ BUSINESS SUMMARY VIEW //\\
    public function summary(){
      $capital2 = $this->stockModel->getCapital();
      $stock2 = $this->stockModel->getStock();
      $capital = $this->userModel->getCapital();
      $stock = $this->userModel->getStock();
      $capital3 = $this->stockModel->current_month_amount_sold();
      $stock3 = $this->stockModel->current_month_num_goods_sold();
         //Set Data
        $data = [
          'capital2' => $capital2,
          'stock2' => $stock2,
          'capital' => $capital,
          'stock' => $stock,
          'capital3' => $capital3,
          'stock3' => $stock3
        ];
      // Load index view
      $this->view('inventory/summary', $data);
    }


}