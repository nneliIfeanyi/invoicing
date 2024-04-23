<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-lg-9 mx-auto">
    <div class="row mb-3">
      <div class="col-12">
        <?= flash('msg');?>
        <h1 class="h2 text-success m-0">Your Saved Transactions</h1>
          <p class="lead text-muted text-dark fs-6">Most recent appears at the top.</p>
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
    <a href="<?php echo URLROOT;?>/posts/add" style="font-size: 22px;">
      <i class="fa fa-plus-circle fa-3x text-success"></i>
    </a>
  </p>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
