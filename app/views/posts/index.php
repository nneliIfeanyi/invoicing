<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-lg-9 mx-auto">
    <p><a class="text-dark" href="<?php echo URLROOT;?>/posts">Business Dashboard</a></p>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-body">
          <h1 class="h3 m-0 text-muted">Total Transactions</h1>
          <p class="lead fw-bold">&#8358;<?= put_coma($data['total']); ?>.00</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-body">
          <h1 class="h3 m-0 text-muted">Total Credits</h1>
          <p class="lead fw-bold">&#8358;<?= put_coma($data['dept']); ?>.00</p>
        </div>
      </div>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-lg-9 mx-auto">
    <div class="card card-body my-3">
      <p class="lead fw-bold">Filter Transactions</p>
      <div class="row mb-3">
          <?= flash('msg');?>
        <div class="col-md-6">
          <form action="<?= URLROOT?>/posts/search_results" method="post" class="mt-2">
            <label class="text-muted" style="font-size: 12px;">Search by customer name</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" name="search" placeholder="Type customer name">
              <button type="submit" class="input-group-text px-3 bg-success text-light">
                <i class="fa fa-fw fa-search text-white"></i> Search
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <form action="<?= URLROOT?>/posts/search_results" method="post" class="mt-2">
            <label class="text-muted" style="font-size: 12px;">Search by customer phone</label>
            <div class="input-group mb-2">
              <input type="number" class="form-control" name="search2" placeholder="Type customer phone">
              <button type="submit" class="input-group-text px-3 bg-success text-light">
                <i class="fa fa-fw fa-search text-white"></i> Search
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <h1 class="h3">Recent Transactions</h1>
    <?php if(!empty($data['transactions'])):?>
      <?php foreach($data['transactions'] as $post):
        $customer_info = $this->postModel->getCustomerInfo($post->t_id);
      ?>
      <div class="card card-body mb-3">
        <h6 class="text-primary">Customer Details</h6>
        <h4 class="card-title text-muted"><i class="fa fa-user"></i>&nbsp;<?php echo $customer_info->customer_name; ?></h4>
        <p><i class="fa fa-map-marker"></i>&nbsp;<?= $customer_info->customer_address ?></p>
        <div class="bg-light p-2 mb-3">
          <i class="fa fa-calender-days"></i>
          Transaction date: <span class="text-muted fw-semibold"><?php echo $customer_info->c_date.' '.$customer_info->c_month; ?></span>
          at <?php echo $customer_info->c_time; ?>
        </div>

        <?php 
        $transactions = $this->postModel->get_per_dept($customer_info->t_id);
        $amt=0;
        foreach($transactions as $trns){
          if (empty($trns->qty)) {
            $trns->qty = 1;
          }
          $amt += (int)$trns->qty * (int)$trns->rate;
        }
        if (empty($customer_info->paid)) {
          $customer_info->paid = 0;
        }
        $to_balance = $amt - $customer_info->paid;
        ?>
        <p>To balance: <span class="text-primary h6 fw-bold">&#8358;<?php echo put_coma($to_balance); ?>.00</span></p>
       <div class="d-grid gap-2">  
        <!-- <form action="<?php echo URLROOT; ?>/pages/invoice" method="POST">
          <input type="hidden" name="t_id" value="<?php echo $post->t_id ; ?>">
          <input class="btn btn-sm btn-dark" name="generate-invoice" type="submit" value="Generate invoice">
        </form> -->
        <a href="<?= URLROOT;?>/posts/show/<?php echo $post->t_id;?>" class="btn btn-sm btn-success">Preview transaction</a>
      </div>
      </div>
      <?php endforeach;?> 
      <div class="fs-6 fs-italics text-center mb-2">
        <span class="spinner-border-sm spinner-border"> </span> No more transactions...
      </div>
    <?php else:?>
      <div class="lead">
        <p>Your transactions will appear here.</p>
      </div>
    <?php endif;?>

</div>
</div>

<div style="position: fixed;bottom: 1vh;right: 1vw;">
  <p data-bs-toggle="tooltip" data-bs-title="Add Transaction">
    <a href="<?php echo URLROOT;?>/posts/add/1" style="font-size: 22px;">
      <i class="fa fa-plus-circle fa-3x text-primary"></i>
    </a>
  </p>
</div>
<!-- <script>

    setTimeout(displayMessage, 2100);

    function displayMessage() {
    const body = document.body;

    const panel = document.createElement('div');
    panel.setAttribute('class','flash-msg1 card card-body');
    body.appendChild(panel);

    const msg = document.createElement('p');
    msg.textContent = 'System busy, please try again later';
    panel.appendChild(msg);
    msg.setAttribute('class','lead');



    const closeBtn = document.createElement('button');
    closeBtn.textContent = 'Continue';
    closeBtn.setAttribute('class','btn btn-success btn-sm');
    panel.appendChild(closeBtn);

    closeBtn.addEventListener('click', () => panel.parentNode.removeChild(panel));


} 
</script> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
