<?php require APPROOT . '/views/inc/header.php'; ?>


<!-- <div class="row my-3">
  <div class="col-lg-7 mx-auto">
    <h1 class="h6 mb-3 text-center text-muted"><span class="text-primary">Showing: Week <?php echo $data['week'].' '.'of'.' '.'year'.' '.$data['year']; ?></span></h1>
    <div class="row">
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
          <h1 class="h6 text-muted">Income:</h1>
          <p class="font-weight-light">
            <?php if(empty($data['income'])):?>
            &#8358;0.00
            <?php else:?>
            &#8358;<?= put_coma($data['income'])?>.00
            <?php endif;?>
          </p>
        </div>
      </div>
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
          <h1 class="h6 text-muted">Expense:</h1>
          <p class="">
           <?php if(empty($data['expense'])):?>
           &#8358;0.00
           <?php else:?>
           &#8358;<?= put_coma($data['expense'])?>.00
           <?php endif;?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="row">
  <div class="col-lg-9 mx-auto">
    <div class="row mb-3">
      <div class="col-md-6">
      <h1 class="h2 text-success">Recent Transactions</h1>
      </div>
    </div>

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
     <div class="d-grid gap-2">  
      <form action="<?php echo URLROOT; ?>/pages/invoice" method="POST">
        <input type="hidden" name="t_id" value="<?php echo $post->t_id ; ?>">
        <input class="btn btn-dark" name="generate-invoice" type="submit" value="Generate invoice">
      </form>
      <a href="<?= URLROOT;?>/posts/show/<?php echo $post->t_id;?>" class="btn btn-success">Preview transaction</a>
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
    <a href="<?php echo URLROOT;?>/posts/add" style="font-size: 22px;">
      <i class="fa fa-plus-circle fa-3x text-success"></i>
    </a>
  </p>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
