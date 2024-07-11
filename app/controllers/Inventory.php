<?php
  class Inventory extends Controller{
    public function __construct(){
     if (!isset($_SESSION['user_id']) || $_SESSION['inventory'] == 'false') {
        redirect('pages/inventory');
      }
      $this->postModel = $this->model('Post');
     $this->userModel = $this->model('User');
     $this->pointModel = $this->model('Point');
     $this->stockModel = $this->model('Inventorys');
    }

    // Load Homepage
    public function index(){
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




    public function goods(){
      $goods = $this->userModel->loadGoods();
      $capital = $this->userModel->getCapital();
      $stock = $this->userModel->getStock();
      $i_month = $this->stockModel->get_initial_month();
         //Set Data
        $data = [
          'goods' => $goods,
          'capital' => $capital,
          'stock' => $stock,
          'i_month' => $i_month->i_month
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
      $date = $this->stockModel->load_date();
      $day = $this->stockModel->load_day();
      $month = $this->stockModel->load_month();
      $year = $this->stockModel->load_year();
        //Set Data
        $data = [
          'goods' => $sales,
          'capital' => $amount,
          'stock' => $sold,
          'date' => $date,
          'day' => $day,
          'month' => $month,
          'year' => $year
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






     public function monthly(){
      $month = date('M');
      $monthly_total = $this->postModel->get_monthly_total($month);
      $all_sold = $this->postModel->get_monthly_qty($month);
      $get_tID = $this->postModel->get_salez($month);
    
        $data = [
          'sales' =>$get_tID,
          'total' => $monthly_total,
          'all_qty' => $all_sold
        ];
        
      $this->view('inventory/monthly', $data);
    }


public function download_today(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        $sales = $this->stockModel->get_today();
        $amount = $this->stockModel->get_amount_sold();
        $sold = $this->stockModel->num_goods_sold();
        if($user->points > 4) {
          $points = $user->points - 5;
          $data = [
            'user' => $user,
            'goods' => $sales,
            'capital' => $amount,
            'stock' => $sold
          ];

          $new_point_value = $this->pointModel->use3($points);
          $_SESSION['user_points'] = $points;
          $this->pointModel->history_add($_SESSION['user_id'],'debit','5','sales record download');
          $this->view('inventory/download_today', $data);
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
           redirect('inventory/today');
        }
      }else{
        redirect('inventory/today');
      }
     
    }



    public function download1(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        if($user->points < 4) {
          $points = $user->points - 5;
          $data = [
            'user' => $user
          ];

          $new_point_value = $this->pointModel->use3($points);
          $_SESSION['user_points'] = $points;
          $this->pointModel->history_add($_SESSION['user_id'],'debit','5','sales record download');
          $this->view('inventory/download1', $data);
        }else{
          flash('msg', 'Not enough Points.. Kindly fund your wallet and try again.', 'flash-msg alert alert-danger');
           redirect('inventory/today');
        }
      }else{
        redirect('inventory/today');
      }
     
    }









}